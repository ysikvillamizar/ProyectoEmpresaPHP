<?php 

class ControlProveedor {
    var $objProveedor;

	function __construct($objProveedor){
	$this->objProveedor=$objProveedor;

	}

	function guardar(){
		$ced=$this->objProveedor->getCedula();
		$nom=$this->objProveedor->getNombre();
		$tipo=$this->objProveedor->getTipoProveedor();
		$fechaReg=$this->objProveedor->getFechaRegistro();
		$fechaIn=$this->objProveedor->getFechaInactivo();
		$image=$this->objProveedor->getImagen();
		$email=$this->objProveedor->getEmail();
		$tel=$this->objProveedor->getTelefono();
		$estado=$this->objProveedor->getEstado();
		$usuario=$this->objProveedor->getUsuario();
		$contrasena=$this->objProveedor->getContrasena();
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO PROVEEDOR(CEDULA,NOMBRE,TIPOPROVEEDOR,FECHAREGISTRO,FECHAINACTIVO,IMAGEN,EMAIL,TELEFONO,ESTADO,USUARIO,CONTRASENA) VALUES('".$ced."','".$nom."','".$tipo."','".$fechaReg."','".$fechaIn."','".$image."','".$email."','".$tel."','".$estado."','".$usuario."','".$contrasena."')";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	function modificar(){
		$ced=$this->objProveedor->getCedula();
		$nom=$this->objProveedor->getNombre();
		$tipo=$this->objProveedor->getTipoProveedor();
		$fechaReg=$this->objProveedor->getFechaRegistro();
		$fechaIn=$this->objProveedor->getFechaInactivo();
		$image=$this->objProveedor->getImagen();
		$email=$this->objProveedor->getEmail();
		$tel=$this->objProveedor->getTelefono();
		$estado=$this->objProveedor->getEstado();
		$usuario=$this->objProveedor->getUsuario();
		$contrasena=$this->objProveedor->getContrasena();

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE PROVEEDOR SET NOMBRE='".$nom."',TIPOPROVEEDOR='".$tipo."',FECHAREGISTRO='".$fechaReg."',FECHAINACTIVO='".$fechaIn."',IMAGEN='".$image."',EMAIL='".$email."',TELEFONO='".$tel."', ESTADO=1,USUARIO='".$usuario."',CONTRASENA='".$contrasena."' WHERE CEDULA='".$ced."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	function borrar(){
		$ced=$this->objProveedor->getCedula();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE PROVEEDOR SET ESTADO=0   WHERE CEDULA='".$ced."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}
	function consultar(){

		$ced=$this->objProveedor->getCedula();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM  PROVEEDOR   WHERE CEDULA='".$ced."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$registro = $recordSet->fetch_array(MYSQLI_BOTH);
		
        $this->objProveedor->setNombre($registro["nombre"]);
        $this->objProveedor->setTipoProveedor($registro["tipoProveedor"]);
		$this->objProveedor->setFechaRegistro($registro["fechaRegistro"]);
		$this->objProveedor->setFechaInactivo($registro["fechaInactivo"]);
		$this->objProveedor->setImagen($registro["imagen"]); 
		$this->objProveedor->setEmail($registro["email"]);
		$this->objProveedor->setTelefono($registro["telefono"]);
		$this->objProveedor->setEstado($registro["estado"]);
		$this->objProveedor->setUsuario($registro["usuario"]);
		$this->objProveedor->setContrasena($registro["contrasena"]);
		 
		$objConexion->cerrarBd();
		return $this->objProveedor;
	}



function nomProveedor(){

		
	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="SELECT NOMBRE, CEDULA FROM  PROVEEDOR ";
	$recordSet=$objConexion->ejecutarSelect($comandoSql);
	while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){
		$nombre=(array)$registro;
		

	}

	$objConexion->cerrarBd();
	return $nombre;
}


function idProveedor(){

		
	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="SELECT CEDULA FROM  PROVEEDOR ";
	$recordSet=$objConexion->ejecutarSelect($comandoSql);
	while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		$nombre=(array)$registro;
		

	}
 
	$objConexion->cerrarBd();
	return $this->objProveedor;
} 

function consultarUser(){
	$usu=$this->objProveedor->getUsuario();
	//SELECT ESTADO FROM `cliente` WHERE `usuario`="lili"
	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="SELECT * FROM PROVEEDOR  WHERE USUARIO='".$usu."' ";
	$recordSet=$objConexion->ejecutarSelect($comandoSql);
	while($registro = $recordSet->fetch_array(MYSQLI_ASSOC)){
 
	
		$this->objProveedor->setNombre($registro["nombre"]);
		$this->objProveedor->setCedula($registro["cedula"]);
        $this->objProveedor->setTipoProveedor($registro["tipoProveedor"]);
		$this->objProveedor->setFechaRegistro($registro["fechaRegistro"]);
		$this->objProveedor->setFechaInactivo($registro["fechaInactivo"]);
		$this->objProveedor->setImagen($registro["imagen"]); 
		$this->objProveedor->setEmail($registro["email"]);
		$this->objProveedor->setTelefono($registro["telefono"]);
		$this->objProveedor->setEstado($registro["estado"]);
		
		$this->objProveedor->setContrasena($registro["contrasena"]);
	}
		$objConexion->cerrarBd();
		return $this->objProveedor;



}

function consultarAll(){

	
	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="SELECT * FROM PROVEEDOR ";
	$recordSet=$objConexion->ejecutarSelect($comandoSql);
	
	while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){

		$proveedor=(array)$registro;

	}
	
		 
	
	$objConexion->cerrarBd();
	return $proveedor;

}
function cantidad($empezar_desde,$proveedorxPagina){

	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="SELECT *  FROM PROVEEDOR LIMIT ".(($empezar_desde)*1)." , $proveedorxPagina";
	
	
	$recordSet=$objConexion->ejecutarSelect($comandoSql);
	
	while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){

		$proveedorPage=(array)$registro;
		

		
	}
	
		 
	
	$objConexion->cerrarBd();
	return $proveedorPage;
}

function consultarUserProveedor(){
	$usu=$this->objProveedor->getUsuario();
	
	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="SELECT * FROM PROVEEDOR  WHERE USUARIO='".$usu."' ";
	$recordSet=$objConexion->ejecutarSelect($comandoSql);
	while($registro = $recordSet->fetch_array(MYSQLI_ASSOC)){
 
	
		$this->objProveedor->setNombre($registro["nombre"]);
		$this->objProveedor->setCedula($registro["cedula"]);
        $this->objProveedor->setTipoProveedor($registro["tipoProveedor"]);
		$this->objProveedor->setFechaRegistro($registro["fechaRegistro"]);
		$this->objProveedor->setFechaInactivo($registro["fechaInactivo"]);
		$this->objProveedor->setImagen($registro["imagen"]); 
		$this->objProveedor->setEmail($registro["email"]);
		$this->objProveedor->setTelefono($registro["telefono"]);
		$this->objProveedor->setEstado($registro["estado"]);
		$this->objProveedor->setContrasena($registro["contrasena"]);
		$this->objProveedor->setNombreTmp($registro["nombre_tmp"]);
		$this->objProveedor->setImagenTmp($registro["imagen_tmp"]); 
		$this->objProveedor->setEmailTmp($registro["email_tmp"]);
		$this->objProveedor->setTelefonoTmp($registro["telefono_tmp"]);
		
	}
		$objConexion->cerrarBd();
		return $this->objProveedor;
}

//funcion que trae todos los datos del proveedor recibiendo la cedula
function consultarProveedor(){
	$ced=$this->objProveedor->getCedula();
	
	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="SELECT * FROM PROVEEDOR  WHERE CEDULA='".$ced."' ";
	$recordSet=$objConexion->ejecutarSelect($comandoSql);
	while($registro = $recordSet->fetch_array(MYSQLI_ASSOC)){
 
	
		$this->objProveedor->setNombre($registro["nombre"]);
	    $this->objProveedor->setTipoProveedor($registro["tipoProveedor"]);
		$this->objProveedor->setFechaRegistro($registro["fechaRegistro"]);
		$this->objProveedor->setFechaInactivo($registro["fechaInactivo"]);
		$this->objProveedor->setImagen($registro["imagen"]); 
		$this->objProveedor->setEmail($registro["email"]);
		$this->objProveedor->setTelefono($registro["telefono"]);
		$this->objProveedor->setEstado($registro["estado"]);
		$this->objProveedor->setUsuario($registro["usuario"]);
		$this->objProveedor->setContrasena($registro["contrasena"]);
		$this->objProveedor->setNombreTmp($registro["nombre_tmp"]);
		$this->objProveedor->setImagenTmp($registro["imagen_tmp"]); 
		$this->objProveedor->setEmailTmp($registro["email_tmp"]);
		$this->objProveedor->setTelefonoTmp($registro["telefono_tmp"]);
	}
		$objConexion->cerrarBd();
		return $this->objProveedor;
}

// Modificar solo los datos temporales para el rol Proveedor
function modificarProveedor(){

	$ced=$this->objProveedor->getCedula();
	$nom=$this->objProveedor->getNombre();
	$tipo=$this->objProveedor->getTipoProveedor();
	$fechaReg=$this->objProveedor->getFechaRegistro();
	$fechaIn=$this->objProveedor->getFechaInactivo(); 
	$image=$this->objProveedor->getImagen();
	$email=$this->objProveedor->getEmail();
	$tel=$this->objProveedor->getTelefono();
	$estado=$this->objProveedor->getEstado();
	$usuario=$this->objProveedor->getUsuario();
	$contrasena=$this->objProveedor->getContrasena();
	$nomTmp=$this->objProveedor->getNombreTmp();
	$imagenTmp=$this->objProveedor->getImagenTmp();
	$emailTmp=$this->objProveedor->getEmailTmp();
	$telTmp=$this->objProveedor->getTelefonoTmp();

	
	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="UPDATE PROVEEDOR SET NOMBRE_TMP='".$nomTmp."', TIPOPROVEEDOR='".$tipo."',FECHAREGISTRO='".$fechaRe."',IMAGEN_TMP='".$imagenTmp."',
	EMAIL_TMP='".$emailTmp."',TELEFONO_TMP='".$telTmp."', CONTRASENA='".$contrasena."' WHERE CEDULA='".$ced."'";
	
	$objConexion->ejecutarComandoSql($comandoSql);
	$objConexion->cerrarBd();
}


}


?>


