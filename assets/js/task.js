var Task = (function() {
    function Task() {
        _classCallCheck(this, Task);
        this.winbox;
         this.csrfToken;
        this.myLeafletMaps;
        this.defaultOrigin = [-7.75601670793721, 110.39742489154364];
        this.defaultZoom = 15;
        this.init();
    }
    _createClass(Task, [{
            key: "init",
            value: function init() {
                this.checklastidonload();
                this.clickRowsTask();
                this.publisher();
                this.scrollHandle();
            }
        },
        {
            key: "checklastidonload",
            value: function clickRowsTask() {
                var self = this;
                const lastid = LocalStorageManager.get('lastidcustomer');
                if (lastid) {
                    self.blockUI(lastid);
                } else {
                    // Handle jika lastid tidak ada dalam localStorage
                    console.log('lastidcustomer tidak ditemukan dalam localStorage');
                }
            }
        }, {
            key: "clickRowsTask",
            value: function clickRowsTask() {
                var self = this;
                $(".taskview").click(function() {
                    var id = $(this).attr("id");
                    LocalStorageManager.set('lastidcustomer', id);
                    self.blockUI(id);
                });
            }
        }, {
            key: "publisher",
            value: function() {
                $(document).on("focusin", ".publisher .form-control", function() {
                    var e = $(this).parents(".publisher");
                    $(".publisher").each(function() {
                            $(this).find(".form-control").val() || ($(this).removeClass("active"),
                                $(this).not(".keep-focus").removeClass("focus"))
                        }),
                        e.addClass("focus active")
                }).on("click", "html", function() {
                    var e = $(".publisher.active"),
                        t = !e.find(".form-control").val();
                    e.removeClass("active"),
                        t && e.not(".keep-focus").removeClass("focus")
                }).on("click", ".publisher.active", function(e) {
                    e.stopPropagation()
                })
            }
        },
        {
            key: "createWindow",
            value: function createWindow() {
                var self = this;
                this.winbox = new WinBox({
                    y: "center",
                    x: "center",
                    minheight: "30%",
                    minwidth: "25%",
                    border: '2',
                    class: ["no-full", "no-shadow"],
                    title: "Window",
                    index: "10005",
                    background: "rgb(88 104 123)",
                });
            }
        },
        {
            key: "showTaskView",
            value: function showTaskView(id) {
                var self = this;
                var csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
                this.csrfToken = csrfTokenMeta.getAttribute('content');
                $.get("/task/view/?authorization=" +  this.csrfToken + "&id=" + id, {
                    nocache: Math.random()
                }, function(data) {
                    if ($(window).width() < 758) {
                        $("html, body").animate({
                            scrollTop: $("#showTaskView").offset().top
                        }, 1000);
                    }
                    $("#showTaskView").html(data).hide().fadeIn(1000);
                    
                    self.clicksetup(id);
                    self.selectOptionEach();
                    self.copyStatus();
                    self.followTask();
                    self.cekodp();
                    self.clickUpdate();
                    self.CameraSN();
                    var nilaiFn = $("input[name='fn']").val();
                    self.updateTask(nilaiFn, id);
                    self.scrollHandle();
                    $('#showTaskView').unblock();
                });

                $.get("/task/timelineView/?authorization=" +  this.csrfToken + "&id=" + id, {
                    nocache: Math.random()
                }, function(data) {

                    $("#showTaskTImeLineView").html(data).hide().fadeIn(1000);
                    
                    self.scrollHandle();
                });
            }
        },
        {
            key: "blockUI",
            value: function blockUI(id) {
                var self = this;
                $("#showTaskView").empty();
                $("#showTaskTImeLineView").empty();
                return $("#showTaskView").block({
                    message: '<div class="spinner-border text-primary" role="status"></div>',
                    timeout: 100,
                    fadeIn: 200,
                    fadeOut: 400,
                    onBlock: function() {},
                    onUnblock: function() {
                        self.showTaskView(id);
                    },
                    css: {
                        backgroundColor: "transparent",
                        border: "0"
                    },
                    overlayCSS: {
                        backgroundColor: "#fff",
                        opacity: 0.8
                    }
                });
            }
        },
        {
            key: "cekodp",
            value: function cekodp() {
                var self = this;
                $("#cekodp").click(function() {
                    var dataIdValue = $("#cekodp").data("id");
                    self.createWindow();
                    self.winbox.mount(document.getElementById("map"));
                    self.winbox.setTitle("Maps ODP");
                    self.winbox.addClass("no-resize").addClass("no-max").addClass("no-shadow").addClass("no-full");
                    self.myLeafletMaps = L.map("map", {
                        attributionControl: false,
                        transform3DLimit: false,
                        zoomControl: false,
                    }).setView(self.defaultOrigin, self.defaultZoom);
                    L.tileLayer(`https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}`, {
                        maxZoom: 22,
                        minZoom: 2,
                        attribution: false,
                        subdomains: ["mt0", "mt1", "mt2", "mt3"],
                    }).addTo(self.myLeafletMaps);
                    console.log(dataIdValue);
                });
            }
        }, {
            key: "CameraSN",
            value: function CameraSN() {
                var self = this;
                $("#SN").click(function() {
                    self.createWindow();
                    self.winbox.setTitle("CAMERA SCAN SN");
                    self.winbox.resize("50%", "50%").move("center", "center");
                });
            }
        },{
            key: "optionSet",
            value: function optionSet() {
                var self = this;
               
            }
        },
        {
            key: "uploadHandle",
            value: function uploadHandle(param, idcustomer) {
                var self = this;
                var e = ` <div class="dz-preview ms-1 dz-file-preview mt-1 pd-3 mb-1">
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                </div>
                <div class="dz-details">
                    <div class="dz-thumbnail">
                        <img data-dz-thumbnail>
                        <span class="dz-nopreview">No preview</span>
                        <div class="dz-success-mark"></div>
                        <div class "dz-error-mark"></div>
                        <div class="dz-error-message"></div>
                    </div>
                    <div class="dz-filename" data-dz-name></div>
                    <div class="dz-size" data-dz-size></div>
                    <span data-dz-errormessage class="text-center" style="color: red;"></span>
                </div>
            </div> `;
                Dropzone.autoDiscover = false;
                this.myDropzone = new Dropzone("#upload-files", {
                    dictRemoveFile: "Remove foto",
                    dictMaxFilesExceeded: "limit 5 foto.",
                    previewTemplate: e,
                    parallelUploads: 5,
                    maxFiles: 5,
                    uploadMultiple: true,
                    maxFilesize: 5,
                    addRemoveLinks: true,
                    acceptedFiles: 'image/*',
                    autoProcessQueue: false,
                    url: "/task/upload/",
                    init: function() {
                        this.on("sending", function(file, xhr, formData) {
                            formData.append("idcustomer", idcustomer);
                            formData.append("action", 'uploadFoto');
                            formData.append("param", param);
                        });
                    }
                });
            }
        },
        {
            key: "clickUpdate",
            value: function clickUpdate() {
                var self = this;

                $('#globalComent').on('shown.bs.collapse', function() {
                    $('#updateCollapse').collapse('hide');
                    $(this).find('.message').focus();
                });

                $('#updateCollapse').on('shown.bs.collapse', function() {
                    $('#globalComent').collapse('hide');
                    $(this).find('.message').focus();
                });
            }
        },{
            key: "selectOptionEach",
            value: function selectOptionEach() {
            var self = this;
            var t = $(".select2");
            t.each(function() {
                var es = $(this);
                es.wrap('<div class="position-relative"></div>').select2({
                    placeholder: "Select value",
                    dropdownParent: es.parent(),
                    allowClear: false,
                    minimumResultsForSearch: Infinity, // Disable the clear option
                });
                es.attr("required", true);
                $(this).on('select2:unselecting', function (e) {
                    // Cegah penghapusan semua item
                    e.preventDefault();
                    Okebar.show({
                    text: 'Setidaknya anda perlu memilih satu',
                    showAction: false,
                    });
                });
            });
            }
        },

        {
            key: "updateTask",
            value: function updateTask(fn, id) {
                var self = this;
                if (fn === 'updateTaskPending') {
                    self.updateTaskPending();
                    self.flatpiker();
                } else if (fn === 'updateTaskOnsurvey') {
                    self.updateTaskOnsurvey();
                    self.uploadHandle('onsurvey', id);
                    self.flatpiker();
                } else if (fn === 'updateTaskOnprogress') {
                    self.updateTaskOnprogress();
                    self.uploadHandle('onprogress', id);
                    self.flatpiker();
                } else if (fn === 'updateTaskLogic') {
                    self.updateTaskLogic();
                    self.uploadHandle('onlogic', id);
                } else if (fn === 'updateTaskDone') {
                    self.updateTaskDone();
                    self.uploadHandle('done', id);
                } else if (fn === 'updateTaskUncoverage') {
                    self.updateTaskUncoverage();
                }
            }
        },
        {
            key: "updateTaskPending",
            value: function updateTaskPending() {
                var self = this;
                
                $('#update').on('submit', function(event) {
                    Okebar.show({
                        text: 'Updating.'
                    });
                    event.preventDefault();
                    var dataObject = self.serializeFormData($(this));
                    self.sendDataToServer(dataObject, );
                });
            }
        },
        {
            key: "clicksetup",
            value: function clicksetup(id) {
                var self = this;
                
                $("#setupmode").click(function() {
                    
                 window.history.pushState(null,"",'/task/setup/'+id);
                $.get("/task/setupmode/?authorization=" +  self.csrfToken + "&id=" + id, {
                    nocache: Math.random()
                }, function(data) {

                    $("#workflow").html(data).hide().fadeIn(1000);
                    
                  
                });
                    
                });
                
                
            }
        },
        {
            key: "updateTaskOnsurvey",
            value: function updateTaskOnsurvey() {
                var self = this;
            $('#selectOption').on('select2:select', function (e) {
                    var data = e.params.data;
                    if (data.id == "reschedule") {
                         $('#hidenformAll').show();
                        $('#hidenformAll [name]').prop('disabled', false);
                        $('#hidenform').hide();
                        $('#hidenform [name]').prop('disabled', true);
                    } else if(data.id == "nocoverage") {
                        
                        $('#hidenformAll').hide();
                        $('#hidenformAll [name]').prop('disabled', true);
                    }else {
                        
                        $('#hidenformAll').show();
                        $('#hidenformAll [name]').prop('disabled', false);
                        $('#hidenform').show();
                        $('#hidenform [name]').prop('disabled', false);
                    }
                });
                $('#update').on('submit', function(event) {
                    var dataObject = self.serializeFormData($(this));
                    event.preventDefault();

                    var queuedFiles = self.myDropzone.getQueuedFiles();

                    if (queuedFiles.length > 0) {
                        // Jika ada file dalam antrian, unggah foto dan kirim data
                        self.myDropzone.processQueue();
                        Okebar.show({
                            text: 'Uploading foto.'
                        });

                        self.myDropzone.on("successmultiple", function(files, response) {
                            var json = JSON.parse(response);

                            var imagePaths = {
                                file: json.original
                            };

                            console.log(imagePaths);
                            self.sendDataToServer(dataObject, imagePaths);
                        });
                    } else {
                        // Jika tidak ada file dalam antrian, kirim data tanpa mengunggah foto
                        self.sendDataToServer(dataObject);
                    }
                });
            }
        },


        {
            key: "updateTaskOnprogress",
            value: function updateTaskOnprogress() {
                var self = this;
                
                        $('#scheduleForm').hide();
                        $('#scheduleForm [name]').prop('disabled', true);
           
           
           
           
            $('#selectOption').on('select2:select', function (e) {
                    var data = e.params.data;
                    if (data.id == "reschedule") {
                         $('#scheduleForm').show();
                         $('#scheduleForm [name]').prop('disabled', false);
                         $('#form').hide();
                         $('#form [name]').prop('disabled', true);
                    } else if(data.id == "nocoverage") {
                        $('#scheduleForm').hide();
                        $('#hidenformAll [name]').prop('disabled', true);
                    }else {
                        $('#form').show();
                        $('#form [name]').prop('disabled', false);
                        $('#scheduleForm').hide();
                        $('#scheduleForm [name]').prop('disabled', true);
                    }
                });

                $('#update').on('submit', function(event) {
                    var dataObject = self.serializeFormData($(this));
                    event.preventDefault();

                    var queuedFiles = self.myDropzone.getQueuedFiles();

                    if (queuedFiles.length > 0) {
                        // Jika ada file dalam antrian, unggah foto dan kirim data
                        self.myDropzone.processQueue();
                        Okebar.show({
                            text: 'Uploading foto.'
                        });

                        self.myDropzone.on("successmultiple", function(files, response) {
                            var json = JSON.parse(response);

                            var imagePaths = {
                                file: json.original
                            };

                            console.log(imagePaths);
                            self.sendDataToServer(dataObject, imagePaths);
                        });
                    } else {
                        // Jika tidak ada file dalam antrian, kirim data tanpa mengunggah foto
                        self.sendDataToServer(dataObject);
                    }
                });
            }
        }, {
            key: "updateTaskLogic",
            value: function updateTaskLogic() {
                var self = this;
                // Implement the updateTaskDone logic here
            }
        }, {
            key: "updateTaskDone",
            value: function updateTaskDone() {
                var self = this;
                // Implement the updateTaskDone logic here
            }
        },
        {
            key: "updateTaskUncoverage",
            value: function updateTaskUncoverage() {
                var self = this;
                // Implement the updateTaskUncoverage logic here
            }
        },
        {
            key: "sendDataToServer",
            value: function sendDataToServer(dataObject, imagePaths) {
                var self = this;
                var requestData = imagePaths ? Object.assign({}, dataObject, imagePaths) : dataObject;

                request = $.ajax({
                    url: "/task/list",
                    type: "post",
                    data: JSON.stringify(requestData),
                    contentType: "application/json",
                });

                request.done(function(response) {
                    console.log(response);
                    self.blockUI(dataObject.idcustomer);
                });

                request.fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("Request failed: " + textStatus + ", " + errorThrown);
                });
            }
        },

        {
            key: "serializeFormData",
            value: function serializeFormData(form) {
                var dataObject = {};
                var formData = form.serializeArray();
                formData.forEach(function(input) {
                    dataObject[input.name] = input.value;
                });
                return dataObject;
            }
        }, {
            key: "scrollHandle",
            value: function scrollHandle() {
              var taskActivity = $("#taskActivity");
            var commentArea = $("#commentarea");
            
            if (taskActivity.length > 0) {
                new PerfectScrollbar(taskActivity[0], {
                    wheelPropagation: false,
                });
            }
            
            if (commentArea.length > 0) {
                new PerfectScrollbar(commentArea[0], {
                    wheelPropagation: false,
                });
            }

            }
        },{
            key: "flatpiker",
            value: function flatpiker() {
              var  a = document.querySelector("#flatpickr-datetime");
              const now = new Date();
                const year = now.getFullYear();
                const month = String(now.getMonth() + 1).padStart(2, '0');
                const day = String(now.getDate()).padStart(2, '0');
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                
                const formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:00`;
                a.flatpickr({
                        enableTime: true,
                        dateFormat: "Y-m-d H:i:S",
                        time_24hr: true,
                        minDate: "today",
                        defaultHour: new Date().getHours(),
                        defaultMinute: new Date().getMinutes(),
                         defaultDate: formattedTime,
                    
                });
            
        }
        }, {
            key: "copyStatus",
            value: function copyStatus() {
              $('[id="copy"]').each(function () {
                var dataId = $(this).data('id');
                var pasteElement = $('[id="paste"][data-id="' + dataId + '"]');
                var copyText = $(this).text();
                var copyClass = $(this).attr('class');
                pasteElement.text(copyText);
                pasteElement.attr('class', copyClass);
              });
            }
        },
        {
            key: "followTask",
            value: function followTask() {
                var self = this;
                $("#followtask").click(function() {
                    var dataIdValue = $("#followtask").data("id");
                    var dataObject = {
                        'action': 'followtask',
                        'idcustomer': dataIdValue
                    };
                    self.sendDataToServer(dataObject);
                });
            }
        },
    ]);

    return Task;
})();

window.addEventListener('DOMContentLoaded', function() {
    var Tasks = new Task();
});