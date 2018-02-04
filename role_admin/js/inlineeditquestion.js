function getColumnsArray(){
    var columns=['question','class','type','subject','chapter','topic','answer','level','marks','tag','youtube'];
    return columns;
}

function editQuestion(rowid){
    var columns=getColumnsArray();
    for(var i in columns){
        var td=$('#'+columns[i]+rowid);
        var val=td.text();
        td.html('<textarea>'+val+'</textarea>');
    }
}

function saveQuestion(questionid, rowid){
    //var link=$('#youtube'+rowid+' textarea').val();
    //var tag=$('#tag'+rowid+' textarea').val();
    //var marks=$('#marks'+rowid+' textarea').val();
    
    //var topic=$('#topic'+rowid+' textarea').val();
    //var cls=$('#class'+rowid+' textarea').val();
    //var type=$('#type0'+rowid+' textarea').val();
    //var subject=$('#subject'+rowid+' textarea').val();
    //var chapter=$('#chapter'+rowid+' textarea').val();
    //var level=$('#level0'+rowid+' textarea').val();
    //var question=$('#question'+rowid+' textarea').val();
    //var answer=$('#answer'+rowid+' textarea').val();
    var columns=getColumnsArray();
    var columnsMap=new Array();
    for(var i in columns){
        var column=columns[i];
        columnsMap[column]=$('#'+column+rowid+' textarea').val();
    }

    columnsMap['mcq1']=$('#mcq1'+rowid).html();
    columnsMap['mcq2']=$('#mcq2'+rowid).html();
    columnsMap['mcq3']=$('#mcq3'+rowid).html();
    columnsMap['mcq4']=$('#mcq4'+rowid).html();
    columnsMap['file']=$('#ques_img'+rowid).html();

    console.log('Columns map:');
    console.log(columnsMap);

    var form = new FormData();
    form.append("func", "editquestion");
    
    for(var key in columnsMap){
        form.append(key,columnsMap[key]);
    }

    // form.append("id", questionid);
    // form.append("question", question); 
    // form.append("answer", answer); 
    // form.append("mcq1", mcq1);
    // form.append("mcq2", mcq2);
    // form.append("mcq3", mcq3);
    // form.append("mcq4", mcq4); 
    // form.append("class", cls);
    // form.append("subject", subject);
    // form.append("type", type);
    // form.append("tag", tag);
    // form.append("chapter", chapter);
    // form.append("topic", topic);
    // form.append("level", level);
    // form.append("marks", marks);
    // form.append("link", link);
    // form.append("file", file);

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

        for(var key in columnsMap){
            var value=columnsMap[key];
            $('#'+key+rowid).html(value);
        }

        // $('#youtube'+rowid).html(link);
        // $('#marks'+rowid).html(marks);
        // $('#tag'+rowid).html(tag);
    });
}   