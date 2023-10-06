var Tables = (function () {
    function Tables() {
        _classCallCheck(this, Tables);
        this.init();
    }
    _createClass(Tables, [{
        key: "init",
        value: function init() {
            this.TableTask();
        }
    },{
        key: "TableTask",
        value: function TableTask() {
        return $('#TableTask').DataTable({
				info: false,
				autoWidth: false,
				ajax: {
					url: '/task/debug/',
					type: 'GET',
					contentType: "application/json",
				},
				deferRender: true,
				dataSrc: "data",
				pageLength: 20,
				order: [3, 'asc'],
				columns: [
				{
					data: 'firstname',
					className: 'dt-nowrap'
				}, {
					data: 'alamat',
					className: 'dt-nowrap'
				}, {
					data: 'subscriptions',
					className: 'align-middle'
				}, {
					data: 'lat',
					className: 'align-middle'
				}, {
					data: 'lng',
					className: 'align-middle '
				},{
					data: 'status',
					className: 'align-middle '
				}],
			});
		
         
        }
    }]);

    return Tables;
})();



window.addEventListener('DOMContentLoaded', function() {
    var TableHelper = new Tables();
});
