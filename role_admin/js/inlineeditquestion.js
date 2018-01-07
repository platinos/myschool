function editQuestion(rowid){
    var yt=$('#youtube'+rowid);
    var val=yt.text();
    yt.html('<textarea>'+val+'</textarea>');
}

function saveQuestion(questionid, rowid){
    var val=$('#youtube'+rowid+' textarea').val();
    
    var form = new FormData();
    form.append("func", "editquestion");
    form.append("id", "1201");
    form.append("question", "bleh");
    form.append("answer", "bleh");
    form.append("mcq1", "blhh");
    form.append("mcq2", "b");
    form.append("mcq3", "b");
    form.append("mcq4", "jdb");
    form.append("class", "9");
    form.append("subject", "Chemistry");
    form.append("type", "bleh");
    form.append("tag", "bhb");
    form.append("chapter", "10");
    form.append("level", "3");
    form.append("marks", "10");
    form.append("link", "hbh");
    form.append("file", "bfb dbjbd");

    var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://35.194.226.60/msapi/api.php",
    "method": "POST",
    "processData": false,
    "contentType": false,
    "mimeType": "multipart/form-data",
    "data": form
    }

    $.ajax(settings).done(function (response) {
        $('#youtube'+rowid).html(val);
    });
}