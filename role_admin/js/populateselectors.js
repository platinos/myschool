function topic_select(){
	var form = new FormData();
	form.append("func", "gettopics");
	form.append("ch_id", document.getElementById("chapters").value);
	var settings = {
		"async": false	,
		"url": "functions.php",
		"method": "POST",
		"processData": false,
		"contentType": false,
		"mimeType": "multipart/form-data",
		"data": form
	}
	$.ajax(settings).done(function (response) {
		var jsonData1= JSON.parse(response);
		var dataSize = jsonData1.data.size;
		var str="";
		for (var i = 0; i < dataSize; i++) {
			var counter = jsonData1.data[i];
			str += "<option value='"+counter.topic+"'>"+counter.topic+"</option>";
		}
	//$('#here').html(str);
	var select = $('#topic');
	select.empty().append(str);
	});
}  
function chap_select(){
	var form = new FormData();
	form.append("func", "getchapters");
	form.append("class", document.getElementById("class").value);
	form.append("subject", document.getElementById("subject").value);
	var settings = {
		"async": false,
		"url": "functions.php",
		"method": "POST",
		"processData": false,
		"contentType": false,
		"mimeType": "multipart/form-data",
		"data": form
	}
	$.ajax(settings).done(function (response) {
		var jsonData= JSON.parse(response);
		var dataSize = jsonData.size;
		var str="<option value=select>Select</option>";
		for (var i = 0; i < jsonData.data.length; i++) {
			var counter = jsonData.data[i];
			str += "<option value='"+counter.id+"'>"+counter.chapter+"</option>";
		}
	//alert(str);
	//$('#here').html(str);
	var select = $('#chapters');
	select.empty().append(str);
	});
}  