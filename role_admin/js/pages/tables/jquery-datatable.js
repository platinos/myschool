$(function () {
    $('.js-basic-example').DataTable();

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]    });

    //Exportable table
    $('#allQuestions').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ],
        order: [[ 2, "asc" ]]
    });
});

