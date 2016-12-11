$(document).ready(function() {
	$("#list_nomclient").click(function() {
		var id = $('#idclient').attr('value');
		$.ajax({
			type : "POST",
			url : "action.php",
			data : "&id=" + id,
			success : result,
			dataType : "json"
		});
		return false;
	});
});

function result(data){
	var resulat = '<p> Nom : <b>'+data.nomclients+'</b> Prenom : <b>'+data.prenomclients'</b></p>';
	$('div#success').fadeIn("slow");
	$('div#success').append(resultat);
}
