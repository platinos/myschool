$(document).ready(function() {
	$('#answerkeybutton').click(function() {
		toggleQuesAns();
	});

	$('#questionpaperbutton').click(function() {
		toggleQuesAns();
	});
});


function toggleQuesAns () {
	$('#answerkey').toggle();
	$('#questionpaper').toggle();
	$('#questionpaperbutton').toggle();
	$('#answerkeybutton').toggle();
}
