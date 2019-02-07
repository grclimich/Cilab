    function soloNumeros(e){
       key = e.keyCode ? e.keyCode : e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       numeros = " 0123456789";
	  
	   
	   

        if(numeros.indexOf(tecla)==-1){
            return false;
        }
    }
	
/************************************************************************************************************************************************************/

function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	 


        if(letras.indexOf(tecla)==-1){
            return false;
        }
    }
/************************************************************************************************************************************************************/

function soloLetrasnumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "";


        if(letras.indexOf(tecla)==-1){
            return false;
        }
    }
	
/************************************************************************************************************************************************************/
function detectkey(evt,obj) {
keycode = (evt.keyCode==0) ? evt.which : evt.keyCode;
alert(obj.value + String.fromCharCode(keycode));
}
//para el input: onkeydown="detectkey(event,this)"
