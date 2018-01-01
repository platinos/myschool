function editQuestion(obj){
    console.log("inside edit question")
    console.log(this);
    obj.style.color= '#cc0000';
    $(obj).parent().parent().css("background-color","green");
}

function saveQuestion(obj){
    console.log("inside save question");
    console.log(this);
}