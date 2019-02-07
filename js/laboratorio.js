$(function(){
$('#nombre_2').blur( function(){
	$(".error").fadeOut().remove();
    if($('#nombre_2').val()!= ""){
        $.ajax({
            type: "POST",
            url: "../js/comprobar_laboratorio.php",
            data: "nombre_2="+$('#nombre_2').val(),
            success: function( respuesta ){
              if(respuesta==1){
                $("#nombre_2").focus().after('<span class="error">Laboratorio Registrado</span>');
				$("#incluir").attr("disabled", true);}
				else{
				$("#incluir").attr("disabled", false);}
				
            }
        });
    }
});
});