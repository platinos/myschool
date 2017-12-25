$(function () {
    $('.js-basic-example').DataTable();

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#questionpaper').DataTable( {
        buttons: [
            {
                extend: 'print',
                text: 'Print current page',
                autoPrint: false
            }
        ]
    } );
});