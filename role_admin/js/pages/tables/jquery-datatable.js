$(function () {
    $('.js-basic-example').DataTable();

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]    });

    //All Questions table
    $('#allQuestions').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        order: [[ 0, "asc" ]],
        pageLength: 100
    });

    //Question Paper table
    $('#questionPaperTable').DataTable({    
        order: [[ 3, "desc" ]]
    });

});

