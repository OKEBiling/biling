var Task = (function() {
    function Task() {
        _classCallCheck(this, Task);
        this.winbox;
        this.myLeafletMaps;
        this.defaultOrigin = [-7.75601670793721, 110.39742489154364];
        this.defaultZoom = 15;
        this.init();
    }
    _createClass(Task, [{
            key: "init",
            value: function init() {
                this.clickRowsTask();
                this.publisher();
            }
        },
        {
            key: "clickRowsTask",
            value: function clickRowsTask() {
                var self = this;
                $(".taskview").click(function() {
                    var id = $(this).attr("id");
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
                var e = $(".publisher.active")
                  , t = !e.find(".form-control").val();
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
                    class: ["no-full","no-shadow"],
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
                var csrfToken = csrfTokenMeta.getAttribute('content');
                $.get("/task/view/?authorization=" + csrfToken + "&id=" + id, {
                    nocache: Math.random()
                }, function(data) {
                    if ($(window).width() < 758) {
                        $("html, body").animate({
                            scrollTop: $("#showTaskView").offset().top
                        }, 1000);
                    }
                    $("#showTaskView").html(data).hide().fadeIn(1000);
                    self.followTask();
                    self.cekodp();
                    self.clickUpdate();
                    self.CameraSN();
                    var nilaiFn = $("input[name='fn']").val();
                    self.updateTask(nilaiFn, id);
                    self.scrollHandle();
                    $('#showTaskView').unblock();
                });
                
                
            }
        },
        {
            key: "blockUI",
            value: function blockUI(id) {
                var self = this;
                $("#showTaskView").empty();
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

        $('#globalComent').on('shown.bs.collapse', function () {
            $('#updateCollapse').collapse('hide');
           $(this).find('.message').focus(); 
        });

        $('#updateCollapse').on('shown.bs.collapse', function () {
            $('#globalComent').collapse('hide');
            $(this).find('.message').focus(); 
        });
    }
},

        {
            key: "updateTask",
            value: function updateTask(fn, id) {
                var self = this;
                if (fn === 'updateTaskPending') {
                    self.updateTaskPending();
                } else if (fn === 'updateTaskOnsurvey') {
                    self.updateTaskOnsurvey();
                    self.uploadHandle('onsurvey', id);
                } else if (fn === 'updateTaskOnprogress') {
                    self.updateTaskOnprogress();
                    self.uploadHandle('onprogress', id);
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
                key: "updateTaskOnsurvey",
                value: function updateTaskOnsurvey() {
                    var self = this;
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
                // Implement the updateTaskDone logic here
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

        new PerfectScrollbar(taskActivity[0], {
            wheelPropagation: false,
        });

        new PerfectScrollbar(commentArea[0], {
            wheelPropagation: false,
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