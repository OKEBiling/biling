var Task = (function() {
    function Task() {
        _classCallCheck(this, Task);
        this.winbox;
        this.init();
    }
    _createClass(Task, [{
        key: "init",
        value: function init() {
            this.clickRowsTask();
        }
    },
    {
        key: "clickRowsTask",
        value: function clickRowsTask() {
            var self = this; // Simpan referensi 'this' ke dalam variabel self
            $(".taskview").click(function() {
                var id = $(this).attr("id");
                self.blockUI(id);
            });
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
                class: ["no-full"],
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
            },
            function(data) {
                if ($(window).width() < 758) {
                    $("html, body").animate({
                        scrollTop: $("#showTaskView").offset().top
                    },
                    1000)
                }
               $("#showTaskView").html(data).hide().fadeIn(1000);
                self.followTask();
                self.cekodp();
                self.updateTask();
                self.clickUpdate();
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
                timeout: 1000,
                fadeIn: 200,
                fadeOut: 400,
                onBlock:function(){
                    
                },
                onUnblock: function() {
                    self.showTaskView(id);
                },
                css: {
                    backgroundColor: "transparent",
                    border: "0"
                },
                overlayCSS: {
                    backgroundColor: "#fff",
                    opacity: .8
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
                console.log(dataIdValue);
            });
        }
    },
    {
        key: "clickUpdate",
        value: function clickUpdate() {
            $('a[data-bs-toggle="collapse"]').on('click',
            function(e) {
                document.getElementById('message').focus();

            });
        }
    },
    {
        key: "updateTask",
        value: function updateTask() {
            var self = this;
            $('#update').on('submit',
            function(event) {
                event.preventDefault(); // Prevent the default form submission
                var dataObject = {};
                var formData = $(this).serializeArray();
                formData.forEach(function(input) {
                    dataObject[input.name] = input.value;
                });
                 self.blockUI(dataObject.idcustomer);
                request = $.ajax({
                    url: "/task/list",
                    type: "post",
                    data: JSON.stringify(dataObject),
                });
                console.log(JSON.stringify(dataObject));

            });
        }
    },
    {
        key: "scrollHandle",
        value: function scrollHandle() {
            var self = this;
            
               e = document.getElementById("taskActivity"),
            new PerfectScrollbar(e,{
                    wheelPropagation: !1,
                });
        }
    },
    {
        key: "followTask",
        value: function followTask() {
            var self = this;
            $("#followtask").click(function() {
                var dataIdValue = $("#followtask").data("id");
                var dataObject = {};
                dataObject['action'] = 'followtask';
                dataObject['idcustomer'] = dataIdValue;
                request = $.ajax({
                    url: "/task/list",
                    type: "post",
                    data: JSON.stringify(dataObject),
                });

                self.blockUI(dataIdValue);
                console.log(dataIdValue);
            });

        }
    }]);

    return Task;
})();

window.addEventListener('DOMContentLoaded',
function() {
    var Tasks = new Task();
});