function editQuestion(rowid){
    var yt=$('#youtube'+rowid);
    var val=yt.text();
    yt.html('<textarea>'+val+'</textarea>');
}

function saveQuestion(questionid, rowid){
    var link=$('#youtube'+rowid+' textarea').val();
    
    var topic=$('#topic'+rowid).val();
    var cls=$('#class'+rowid).val();
    var type=$('#type'+rowid).val();
    var subject=$('#subject'+rowid).val();
    var chapter=$('#chapter'+rowid).val();
    var tag=$('#tag'+rowid).val();
    var level=$('#level'+rowid).val();
    var marks=$('#marks'+rowid).val();
    var question=$('#question'+rowid).val();
    var answer=$('#answer'+rowid).val();
    var mcq1=$('#mcq1'+rowid).val();
    var mcq2=$('#mcq2'+rowid).val();
    var mcq3=$('#mcq3'+rowid).val();
    var mcq4=$('#mcq4'+rowid).val();
    
    console.log(rowid+' '+questionid+' '+topic+' '+cls+' '+type+' '+subject+' '+chapter+' '+tag+' '+level+' '+marks+' '+question+' '+answer+' '+mcq1+' '+mcq2+' '+mcq3+' '+mcq4);

    var form = new FormData();
    form.append("func", "editquestion");
    form.append("id", questionid);
    form.append("question", question); 
    form.append("answer", answer); 
    form.append("mcq1", mcq1);
    form.append("mcq2", mcq2);
    form.append("mcq3", mcq3);
    form.append("mcq4", mcq4); 
    form.append("class", cls);
    form.append("subject", subject);
    form.append("type", type);
    form.append("tag", tag);
    form.append("chapter", chapter);
    form.append("topic", topic);
    form.append("level", level);
    form.append("marks", marks);
    form.append("link", link);
    form.append("truefalse", true);
    form.append("file", "bfb dbjbd");

    var settings = {
    "async": true,
    "crossDomain": true,
    "url": "functions.php",
    "method": "POST",
    "processData": false,
    "contentType": false,
    "mimeType": "multipart/form-data",
    "data": form
    }

    $.ajax(settings).done(function (response) {
        alert(response);
        $('#youtube'+rowid).html(link);
    });
}