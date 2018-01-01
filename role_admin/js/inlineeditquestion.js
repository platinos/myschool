function editQuestion(youtubeid){
    var yt=$('#youtube'+youtubeid);
    var val=yt.text();
    yt.html('<input type="text" val="'+val+'"');
}

function saveQuestion(obj){
    console.log("inside save question");
    console.log(this);
}