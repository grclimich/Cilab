<?php 
class conexion
{
public $servidor;
public $usuario;
public $clave;
public $bd;
function  conexion()
{
$this->servidor="localhost";
$this->usuario="root";
$this->clave="";
$this->bd="cilab";
}
  function conectar(){
    //$bd= "cilab";//nombre de la base de datos
    $idConn=mysql_connect($this->servidor,$this->usuario,$this->clave);//el 111 es el pass, es lo que tienen que cambiar ""
	  if($idConn==0)
	     echo "No se pudo conectar con MySQL";
          else{

		 $strsql="create database if not exists ".$this->bd.";";
	     $result=mysql_query($strsql);
         $dbSelect= mysql_select_db($this->bd,$idConn);	

         if(!$dbSelect)
	         echo "No se pudo conectar con la Base de Datos ".$bd;
		 
		 else{	//en este else se colocan todas las tablas y las relacionas entre ellas
	    
			 
			 $strsql="CREATE TABLE IF NOT EXISTS `insumo` (
  `cod_i` INT NOT NULL,
  `descripcion` VARCHAR(30) NOT NULL,
  `presentacion` VARCHAR(30) NOT NULL,
  `almacen` VARCHAR(30) NOT NULL,
  `observacion` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`cod_i`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `entrada_insumo` (
  `cod_e` INT NOT NULL,
 `nombre` VARCHAR(50) NOT NULL,
  `lote` INT NOT NULL,
    `cantidad_entrada` INT NOT NULL,
	  `accion_de_entrada` VARCHAR NOT NULL,
	    `nro_entrada` INT NOT NULL,
  `proveedor` VARCHAR(30) NOT NULL,
  `fecha_e` DATE NOT NULL,
    `fecha_v` DATE NOT NULL,
  `observacion`VARCHAR(120) NOT NULL,
  PRIMARY KEY (`cod_e`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `salida_insumo` (
  `cod_s` INT NOT NULL,
    `nombre_1` VARCHAR(50) NOT NULL,
  `cantidad_salida` INT NOT NULL,
  `accion_de_salida` VARCHAR NOT NULL,
  `nro_salida` INT NOT NULL,
  `laboratorio_r` VARCHAR(50) NOT NULL,
  `fecha_s` DATE NOT NULL,
  `observaciones` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`cod_s`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `accion_entrada` (
  `id_e` INT NOT NULL,
  `razon_entrada` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `accion_salida` (
  `id_s` INT NOT NULL,
  `razon_salida` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `laboratorio_receptor` (
  `cod_r` INT NOT NULL,
  `nombre_2` VARCHAR(120) NOT NULL,
  `direccion` VARCHAR(120) NOT NULL,
  `telefono` INT NOT NULL,
  `nro_fax` INT NOT NULL,
  `nro_rif` VARCHAR(20) NOT NULL,
  `id_m` VARCHAR NOT NULL, 
  PRIMARY KEY (`cod_r`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `municipio` (
  `id_m` INT NOT NULL,
  `nombre_municipio` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`id_m`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `presentacion` (
  `cod_presentacion` INT NOT NULL,
  `clase_presentacion` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`cod_presentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `solicitud` (
  `nro_solicitud` INT NOT NULL,
  `fecha_solicitud` DATE NOT NULL,
  `status` VARCHAR(30) NOT NULL,
  `contenido` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`nro_solicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `insumo`
  ADD CONSTRAINT `insumo_ibfk_1` FOREIGN KEY (`cod_i`) REFERENCES `presentacion` (`cod_presentacion`);
  
  ALTER TABLE `entrada_insumo`
  ADD CONSTRAINT `entrada_insumo_ibfk_1` FOREIGN KEY (`cod_e`) REFERENCES `insumo` (`cod_i`);

  ALTER TABLE `salida_insumo`
  ADD CONSTRAINT `salida_insumo_ibfk_1` FOREIGN KEY (`cod_s`) REFERENCES `laboratorio_receptor` (`cod_r`);
  
  ALTER TABLE `accion_entrada`
  ADD CONSTRAINT `accion_entrada_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `entrada_insumo` (`cod_e`);
  
  ALTER TABLE `accion_salida`
  ADD CONSTRAINT `accion_salida_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `salida_insumo` (`cod_s`);

  ALTER TABLE `laboratorio_receptor`
  ADD CONSTRAINT `laboratorio_receptor_ibfk_1` FOREIGN KEY (`cod_r`) REFERENCES `municipio` (`id_m`);
  
  ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_m`) REFERENCES `laboratorio_receptor` (`cod_r`);
  
  ALTER TABLE `presentacion`
  ADD CONSTRAINT `presentacion_ibfk_1` FOREIGN KEY (`cod_presentacion`) REFERENCES `insumo` (`cod_i`);
  
  ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`nro_solicitud`) REFERENCES `insumo` (`cod_i`);";

			 $result=mysql_query($strsql);
			 
		 }// fin de crear tablas y referencias....
	}	 

  }//fin de conectar()  
  }
?>

