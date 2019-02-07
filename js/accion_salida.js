$(function(){
$('#razon_salida').blur( function(){
	$(".error").fadeOut().remove();
    if($('#razon_salida').val()!= ""){
        $.ajax({
            type: "POST",
            url: "../js/comprobar_accion_salida.php",
            data: "razon_salida="+$('#razon_salida').val(),
            success: function( respuesta ){
              if(respuesta==1){
                $("#razon_salida").focus().after('<span class="error">Razon de Salida Registrada</span>');
				$("#incluir").attr("disabled", true);}
				else{
				$("#incluir").attr("disabled", false);}
				
            }
        });
    }
});
});