function editQuestion(rowid){
    replaceByTextarea('question',rowid);
    replaceByTextarea('class',rowid);
    replaceByTextarea('type',rowid);
    replaceByTextarea('subject',rowid);
    replaceByTextarea('chapter',rowid);
    replaceByTextarea('topic',rowid);
    replaceByTextarea('answer',rowid);
    replaceByTextarea('level',rowid);
    replaceByTextarea('marks',rowid);
    replaceByTextarea('tag',rowid);
    replaceByTextarea('youtube',rowid);
}

function replaceByTextarea(name, rowid){
    var td=$('#'+name+rowid);
    var val=td.text();
    td.html('<textarea>'+val+'</textarea>');
}

function saveQuestion(questionid, rowid){
    var link=$('#youtube'+rowid+' textarea').val();
    var tag=$('#tag'+rowid+' textarea').val();
    var marks=$('#marks'+rowid+' textarea').val();
    
    var topic=$('#topic'+rowid+' textarea').val();
    var cls=$('#class'+rowid+' textarea').val();
    var type=$('#type0'+rowid+' textarea').val();
    var subject=$('#subject'+rowid+' textarea').val();
    var chapter=$('#chapter'+rowid+' textarea').val();
    var level=$('#level0'+rowid+' textarea').val();
    var question=$('#question'+rowid+' textarea').val();
    var answer=$('#answer'+rowid+' textarea').val();
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
        $('#youtube'+rowid).html(link);
        $('#marks'+rowid).html(marks);
        $('#tag'+rowid).html(tag);
    });
}   