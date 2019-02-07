$(function(){
$('#descripcion').blur( function(){
	$(".error").fadeOut().remove();
    if($('#descripcion').val()!= ""){
        $.ajax({
            type: "POST",
            url: "../js/comprobar_producto.php",
            data: "descripcion="+$("#descripcion").val(),
            success: function( respuesta ){
              if(respuesta==1){
                $("#descripcion").focus().after('<span class="error">Producto Registrado</span>');
				$("#incluir").attr("disabled", true);}
				else{
				$("#incluir").attr("disabled", false);}
				
            }
        });
    }
});
});