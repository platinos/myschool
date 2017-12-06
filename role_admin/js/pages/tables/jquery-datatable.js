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
        order: [[ 0, "asc" ]],
        pageLength: 100

    });

    //Question Paper table
    $('#questionPaperTable').DataTable({    
        order: [[ 3, "desc" ]]
    });

});

