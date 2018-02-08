function getColumnsTextArea(){
    var columnsTextarea=['question','answer','marks','tag','youtube'];
    return columnsTextarea;
}

function getColumnSelect(){
    var columnSelect=['class', 'type', 'subject', 'chapter', 'topic', 'level'];
    return columnSelect;
}

function editQuestion(rowid){
    var columnsTextarea=getColumnsTextArea();
    var columnSelect=getColumnSelect();
    for(var i in columnsTextarea){
        var td=$('#'+columns[i]+rowid);
        var val=td.text();
        td.html('<textarea>'+val+'</textarea>');
    }
}

function saveQuestion(questionid, rowid){
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
    });
}   