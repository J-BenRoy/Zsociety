function autocomplet() {
	var min_length = 0; // nombre de caractère avant lancement recherch 
	var keyword = $('#nomclient').val();  // #nomclient fait référence au champ de recherche puis lancement de la recherche 
	
		// Pas besoin d'explication ici tu fais copier coller
	
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'include/autocompletion.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#list_nomclient').show();
				$('#list_nomclient').html(data);
			}
		});
	} else {
		$('#list_nomclient').hide();
	}
}

// Lors du choix dans la liste
function set_item(item,id) {
	// change input value
	//  change les valeurs des input :) 
	$('#nomclient').val(item);
	$('#idclient').val(id);
	// cache la liste une fois validé
	$('#list_nomclient').hide();
}

