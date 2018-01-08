function editQuestion(rowid){
    var yt=$('#youtube'+rowid);
    var val=yt.text();
    yt.html('<textarea>'+val+'</textarea>');
}

function saveQuestion(questionid, rowid){
    var link=$('#youtube'+rowid+' textarea').val();
    
    var topic=$('#topic'+rowid).html();
    var cls=$('#class'+rowid).html();
    var type=$('#type'+rowid).html();
    var subject=$('#subject'+rowid).html();
    var chapter=$('#chapter'+rowid).html();
    var tag=$('#tag'+rowid).html();
    var level=$('#level'+rowid).html();
    var marks=$('#marks'+rowid).html();
    var question=$('#question'+rowid).html();
    var answer=$('#answer'+rowid).html();
    var mcq1=$('#mcq1'+rowid).html();
    var mcq2=$('#mcq2'+rowid).html();
    var mcq3=$('#mcq3'+rowid).html();
    var mcq4=$('#mcq4'+rowid).html();
    var file=$('#ques_img'+rowid).html();

    console.log(rowid+' '+file+' '+questionid+' '+topic+' '+cls+' '+type+' '+subject+' '+chapter+' '+tag+' '+level+' '+marks+' '+question+' '+answer+' '+mcq1+' '+mcq2+' '+mcq3+' '+mcq4);

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
    form.append("file", file);

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