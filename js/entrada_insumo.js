 
 
   function esDigito(sChr){  
    var sCod = sChr.charCodeAt(0);  
    return ((sCod > 47) && (sCod < 58));  
   }  

   function valSep(oTxt){  
    var bOk = false;  
    bOk = bOk || ((oTxt.value.charAt(2) == "-") && (oTxt.value.charAt(5) == "-"));  
    bOk = bOk || ((oTxt.value.charAt(2) == "/") && (oTxt.value.charAt(5) == "/"));  
    return bOk;  
   }  

   function finMes(oTxt){  
    var nMes = parseInt(oTxt.value.substr(3, 2), 10);  
    var nAno = parseInt(oTxt.value.substr(6), 10);  
    var nRes = 0;  
    switch (nMes){  
     case 1: nRes = 31; break;  
     case 2: nRes = 28; break;  
     case 3: nRes = 31; break;  
     case 4: nRes = 30; break;  
     case 5: nRes = 31; break;  
     case 6: nRes = 30; break;  
     case 7: nRes = 31; break;  
     case 8: nRes = 31; break;  
     case 9: nRes = 30; break;  
     case 10: nRes = 31; break;  
     case 11: nRes = 30; break;  
     case 12: nRes = 31; break;  
    }  
    return nRes + (((nMes == 2) && (nAno % 4) == 0)? 1: 0);  
   }  

   function valDia(oTxt){  
    var bOk = false;  
    var nDia = parseInt(oTxt.value.substr(0, 2), 10);  
    bOk = bOk || ((nDia >= 1) && (nDia <= finMes(oTxt)));  
    return bOk;  
   }  

   function valMes(oTxt){  
    var bOk = false;  
    var nMes = parseInt(oTxt.value.substr(3, 2), 10);  
    bOk = bOk || ((nMes >= 1) && (nMes <= 12));  
    return bOk;  
   }  

   function valAno(oTxt){  
    var bOk = true;  
    var nAno = oTxt.value.substr(6);  
    bOk = bOk && ((nAno.length == 2) || (nAno.length == 4));  
    if (bOk){  
     for (var i = 0; i < nAno.length; i++){  
      bOk = bOk && esDigito(nAno.charAt(i));  
     }  
    }  
    return bOk;  
   }  

   function valFecha(oTxt){  
    var bOk = true;  
    if (oTxt.value != ""){  
     bOk = bOk && (valAno(oTxt));  
     bOk = bOk && (valMes(oTxt));  
     bOk = bOk && (valDia(oTxt));  
     bOk = bOk && (valSep(oTxt));  
     return bOk;  
    }  
   }  

   function fechaMayorOIgualQue(fecha_e, fecha_v){  
    var bRes = false;  
    var sDia0 = fecha_e.value.substr(0, 2);  
    var sMes0 = fecha_e.value.substr(3, 2);  
    var sAno0 = fecha_e.value.substr(6, 4);  
    var sDia1 = fecha_v.value.substr(0, 2);  
    var sMes1 = fecha_v.value.substr(3, 2);  
    var sAno1 = fecha_v.value.substr(6, 4);  
    if (sAno0 > sAno1) bRes = true;  
    else {  
     if (sAno0 == sAno1){  
      if (sMes0 > sMes1) bRes = true;  
      else {  
       if (sMes0 == sMes1)  
        if (sDia0 >= sDia1) bRes = true;  
      }  
     }  
    }  
    return bRes;  
   }  

   function valFechas(){  
    var bOk = false;  
	/******************Campos Vacios ********************/
	 cod_i = document.getElementById("cod_i").selectedIndex;
	 lote = document.getElementById("lote").value;
	 cantidad_entrada = document.getElementById("cantidad_entrada").value;
	 accion_de_entrada = document.getElementById("accion_de_entrada").selectedIndex;
	 proveedor = document.getElementById("proveedor").value; 
	 fecha_e = document.getElementById("fecha_e").value;
	 fecha_v = document.getElementById("fecha_v").value;
	 observacion = document.getElementById("observacion").value; 
	 
/******************COMPRUEBA EL CODIGO********************/
if( cod_i == null || cod_i == 0  ) {
 alert('Agregue un producto');
 document.getElementById("cod_i").focus();
  return false;
} /******************COMPRUEBA EL LOTE********************/
else if( lote == null || lote.length == 0 || /^\s+$/.test(lote) ) {
 alert('Debe ingresar el lote');
 document.getElementById("lote").focus();
  return false;
} /******************COMPRUEBA LA ACCION DE ENTRADA********************/
else if( accion_de_entrada == null || accion_de_entrada == 0  ) {
 alert('Agregue una accion de entrada');
 document.getElementById("accion_de_entrada").focus();
  return false;
} /******************COMPRUEBA EL PROVEEDOR********************/
else if( proveedor == null || proveedor.length == 0 || /^\s+$/.test(proveedor) ) {
 alert('Debe llenar todos los campos');
 document.getElementById("proveedor").focus();
  return false;
} /******************COMPRUEBA LA CANTIDAD DE ENTRADA********************/
else if( cantidad_entrada == null || cantidad_entrada.length == 0 || /^\s+$/.test(cantidad_entrada) ) {
 alert('Debe ingresar la cantidad de entrada');
 document.getElementById("cantidad_entrada").focus();
  return false;
} /******************COMPRUEBA LA OBSERVACION********************/
else if( observacion == null || observacion.length == 0 || /^\s+$/.test(observacion) ) {
 alert('agregue una observacion');
 document.getElementById("observacion").focus();
  return false;
}
/******************COMPRUEBA EL FECHA INICIAL********************/
else if( fecha_e == null || fecha_e.length == 0 || /^\s+$/.test(fecha_e) ) {
 alert('La Fecha de entrada es obligatoria');
 document.getElementById("fecha_e").focus();
  return false;
}
/******************COMPRUEBA EL FECHA FINAL********************/
else if( fecha_v == null || fecha_v.length == 0 || /^\s+$/.test(fecha_v) ) {
 alert('La Fecha de vencimiento es obligatoria');
 document.getElementById("fecha_v").focus();
  return false;
}
/******************Validacion de fechas con else if********************/
   else if (valFecha(document.formulario1.fecha_e)){  
     if (valFecha(document.formulario1.fecha_v)){  
      if (fechaMayorOIgualQue(document.formulario1.fecha_v, document.formulario1.fecha_e)){  
       bOk = true;  
      } else {  
       alert("Insumo Vencido");
       document.formulario1.fecha_v.focus(); 
       return false;	   
      }  
     } else {  
      alert("Fecha de vencimiento inválida"); 
return false;	  
      document.formulario1.fecha_v.focus();  
     }  
    } else {   
     alert("Fecha de Entrada inválida");  
	 return false;
     document.formulario1.fecha_e.focus();  
    }  
		/****************** Si cumple todo envia********************/
	return true;
   }  