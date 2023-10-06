
var Task = (function () {
    function Task() {
        _classCallCheck(this, Task);
        this.init();
    }
    _createClass(Task, [{
        key: "init",
        value: function init() {
            this.clickRowsTask();
        }
    },{
        key: "clickRowsTask",
        value: function clickRowsTask() {
            
     $(".task").click(function() {


    });

        }
    }]);

    return Task;
})();



window.addEventListener('DOMContentLoaded', function() {
    var Tasks = new Task();
});
