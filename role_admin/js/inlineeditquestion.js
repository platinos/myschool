function editQuestion(youtubeid){
    var yt=$('#youtube'+youtubeid);
    var val=yt.text();
    yt.html('<textarea>'+val+'</textarea>');
}

function saveQuestion(obj){
    console.log("inside save question");
    console.log(this);
}