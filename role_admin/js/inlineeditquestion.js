function editQuestion(rowid){
    var yt=$('#youtube'+rowid);
    var val=yt.text();
    yt.html('<textarea>'+val+'</textarea>');
}

function saveQuestion(questionid, rowid){
    var val=$('#youtube'+rowid+' textarea').val();
    $('#youtube'+rowid).html(val);

    // $.ajax({
    //     type: "method",
    //     url: "url",
    //     data: "data",
    //     dataType: "dataType",
    //     success: function (response) {
            
    //     }
    // });
}