$(document).ready(function(){
 
	$("#datematch1").click(function(e){
		e.preventDefault();
 
		$.post(
			'convocation_table.php',
			{
			},
 
			function(data){
				if(data == 'Success'){ // Le membre est connecté. Ajoutons lui un message dans la page HTML.
					$("#comp1").html("Yes");
				}else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")
					$("#comp1").html("...");
				}
         
			},
			'text'
		);
	});
});
