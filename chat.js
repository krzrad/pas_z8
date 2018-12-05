const $chatForm = $('#form');
const $zapytanie = $('#question');

var chat = $('#chat');
$chatForm.on("submit", function(event){
	event.preventDefault();
	$.post(
		$($chatForm).attr('action'),
		{q: $zapytanie.val()
	}).done(function(res){
		$(chat).append("<b>Użytkownik:</b> ");
		$(chat).append($zapytanie.val());
		$(chat).append("<br>");
		$(chat).append(res);
		$(chat).append("<br>");
	}).fail(function(){
		$(chat).html('nie działa');
	}).always(function(){
		console.log(jQuery.type($zapytanie.val()));
		$zapytanie.val("");
	});
});