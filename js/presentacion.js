$(function(){
$('#clase_presentacion').blur( function(){
	$(".error").fadeOut().remove();
    if($('#clase_presentacion').val()!= ""){
        $.ajax({
            type: "POST",
            url: "../js/comprobar_presentacion.php",
            data: "clase_presentacion="+$('#clase_presentacion').val(),
            success: function( respuesta ){
              if(respuesta==1){
                $("#clase_presentacion").focus().after('<span class="error">Presentaci&oacuten Registrada</span>');
				$("#incluir").attr("disabled", true);}
				else{
				$("#incluir").attr("disabled", false);}
				
            }
        });
    }
});
});