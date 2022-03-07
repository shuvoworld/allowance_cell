// All view pages datatable configuration goes here

$(function() {
	$(".datatable").DataTable({
		paging: true,
		lengthChange: false,
		ordering: true,
		info: true,
		autoWidth: false,
		dom: "Blfrtip",
		buttons: [
			{
				extend: "copy",
				text: "Copy",
				className: "btn btn-info btn-sm float-sm-left"
			},
			{
				extend: "excel",
				text: "Excel",
				className: "btn btn-warning btn-sm float-sm-left"
			}
		]
	});
});

var manageTable;
var getUrl = window.location;
var base_url =
	getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split("/")[1];
