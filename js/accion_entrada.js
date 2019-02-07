$(function(){
$('#razon_entrada').blur( function(){
	$(".error").fadeOut().remove();
    if($('#razon_entrada').val()!= ""){
        $.ajax({
            type: "POST",
            url: "../js/comprobar_accion_entrada.php",
            data: "razon_entrada="+$('#razon_entrada').val(),
            success: function( respuesta ){
              if(respuesta==1){
                $("#razon_entrada").focus().after('<span class="error">Razon de Entrada Registrada</span>');
				$("#incluir").attr("disabled", true);}
				else{
				$("#incluir").attr("disabled", false);}
				
            }
        });
    }
});
});