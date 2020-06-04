<?php 

class ControlCliente {
    var $objCliente;

	function __construct($objCliente){
	$this->objCliente=$objCliente;

	}
 // Guarda por primera vez el cliente con los datos ingresados por el administrador seteando en los campos temporales el mismo valor.
	function guardar(){
		$ced=$this->objCliente->getCedula();
		$nom=$this->objCliente->getNombre();
		$tipo=$this->objCliente->getTipoCliente();
		$fechaRe=$this->objCliente->getFechaRegistro();
		$fechaIn=$this->objCliente->getFechaInactivo();
		$image=$this->objCliente->getImagen();
		$email=$this->objCliente->getEmail();
		$tel=$this->objCliente->getTelefono();
		$cupoCred=$this->objCliente->getCupoCredito();
		$estado=$this->objCliente->getEstado();
		$usuario=$this->objCliente->getUsuario();
		$contrasena=$this->objCliente->getContrasena();
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO CLIENTE(CEDULA,NOMBRE,NOMBRE_TMP,TIPOCLIENTE,FECHAREGISTRO,FECHAINACTIVO,IMAGEN,EMAIL,TELEFONO,IMAGEN_TMP,EMAIL_TMP,TELEFONO_TMP, CUPOCREDITO,ESTADO,USUARIO,CONTRASENA) VALUES('".$ced."','".$nom."','".$nom."','".$tipo."','".$fechaRe."','".$fechaIn."','".$image."','".$email."','".$tel."','".$image."','".$email."','".$tel."','".$cupoCred."','".$estado."','".$usuario."','".$contrasena."')";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}
 
	
 // Modificar solo los datos temporales para el rol Administrador ajusta todos los valores con el real seteando los temporales con el real.

	function modificar(){
		$ced=$this->objCliente->getCedula();
		$nom=$this->objCliente->getNombre();
		$tipo=$this->objCliente->getTipoCliente();
		$fechaRe=$this->objCliente->getFechaRegistro();
		$fechaIn=$this->objCliente->getFechaInactivo();
		$image=$this->objCliente->getImagen();
		$email=$this->objCliente->getEmail();
		$tel=$this->objCliente->getTelefono();
		$cupoCred=$this->objCliente->getCupoCredito();
		//$estado=$this->objCliente->getEstado();
		$usuario=$this->objCliente->getUsuario();
		$contrasena=$this->objCliente->getContrasena();
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE CLIENTE SET NOMBRE='".$nom."',NOMBRE_TMP='".$nom."', TIPOCLIENTE='".$tipo."',FECHAREGISTRO='".$fechaRe."',FECHAINACTIVO='".$fechaIn."',IMAGEN='".$image."',EMAIL='".$email."',TELEFONO='".$tel."',IMAGEN_TMP='".$image."',EMAIL_TMP='".$email."',TELEFONO_TMP='".$tel."',CUPOCREDITO='".$cupoCred."', ESTADO=1 ,USUARIO='".$usuario."',CONTRASENA='".$contrasena."' WHERE CEDULA='".$ced."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}
// Modificar solo los datos temporales para el rol Cliente
	function modificarCliente(){
		$ced=$this->objCliente->getCedula();
		$nomTmp=$this->objCliente->getNombreTmp();
		$nom=$this->objCliente->getNombre();
		$tipo=$this->objCliente->getTipoCliente();
		$fechaRe=$this->objCliente->getFechaRegistro();
		$fechaIn=$this->objCliente->getFechaInactivo();
		$imagen=$this->objCliente->getImagen();
		$imagenTmp=$this->objCliente->getImagenTmp();
		$email=$this->objCliente->getEmail();
		$emailTmp=$this->objCliente->getEmailTmp();
		$tel=$this->objCliente->getTelefono();
		$telTmp=$this->objCliente->getTelefonoTmp();
		$cupoCred=$this->objCliente->getCupoCredito();
		$estado=$this->objCliente->getEstado();
		$usuario=$this->objCliente->getUsuario();
		$contrasena=$this->objCliente->getContrasena();
			
		  
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		//$comandoSql="UPDATE CLIENTE SET NOMBRE_TMP='".$nomTmp."',NOMBRE_TMP='".$nomTmp."', TIPOCLIENTE='".$tipo."',FECHAREGISTRO='".$fechaRe."',IMAGEN_TMP='".$image."',EMAIL_TMP='".$email."',TELEFONO_TMP='".$tel."',IMAGEN_TMP='".$image."',EMAIL_TMP='".$email."',TELEFONO_TMP='".$tel."',CUPOCREDITO='".$cupoCred."', ESTADO=1 ,USUARIO='".$usuario."',CONTRASENA='".$contrasena."' WHERE CEDULA='".$ced."'";
		$comandoSql="UPDATE CLIENTE SET NOMBRE_TMP='".$nomTmp."', TIPOCLIENTE='".$tipo."',FECHAREGISTRO='".$fechaRe."',IMAGEN_TMP='".$imagenTmp."',EMAIL_TMP='".$emailTmp."',TELEFONO_TMP='".$telTmp."',CUPOCREDITO='".$cupoCred."', CONTRASENA='".$contrasena."' WHERE CEDULA='".$ced."'";
		
		
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}
//Actualiza el cliente cuando se ha aprobado o rechazado con los valores correspondientes
	function modificarAprobaciones($cedula,$campoEditado,$valorNuevo){
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="UPDATE CLIENTE SET $campoEditado='".$valorNuevo."' WHERE CEDULA='".$cedula."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();

      
      
	}

	//Cambia a estado INACTIVO al cliente
	function borrar(){
		$ced=$this->objCliente->getCedula();
		$estado=$this->objCliente->getEstado();
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="UPDATE CLIENTE SET ESTADO=0 WHERE CEDULA='".$ced."'";
		
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
		
	}
	
	function consultar(){

		$ced=$this->objCliente->getCedula();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM CLIENTE  WHERE CEDULA='".$ced."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		
        $this->objCliente->setNombre($registro["nombre"]);
        $this->objCliente->setTipoCliente($registro["tipoCliente"]);
		$this->objCliente->setFechaRegistro($registro["fechaRegistro"]);
		$this->objCliente->setFechaInactivo($registro["fechaInactivo"]);
		$this->objCliente->setImagen($registro["imagen"]);
		$this->objCliente->setEmail($registro["email"]);
		$this->objCliente->setTelefono($registro["telefono"]);
		$this->objCliente->setCupoCredito($registro["cupoCredito"]);
		$this->objCliente->setEstado($registro["estado"]);
		$this->objCliente->setUsuario($registro["usuario"]);
		$this->objCliente->setContrasena($registro["contrasena"]);
		}	
		$objConexion->cerrarBd();
		return $this->objCliente;
	}
	
 
	function consultarUser(){
		$usu=$this->objCliente->getUsuario();
		//SELECT ESTADO FROM `cliente` WHERE `usuario`="lili"
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM CLIENTE  WHERE USUARIO='".$usu."' ";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		
		while($registro = $recordSet->fetch_array(MYSQLI_ASSOC)){
		
			$this->objCliente->setNombre($registro["nombre"]);
			$this->objCliente->setCedula($registro["cedula"]);
			$this->objCliente->setTipoCliente($registro["tipoCliente"]);
			$this->objCliente->setFechaRegistro($registro["fechaRegistro"]);
			$this->objCliente->setFechaInactivo($registro["fechaInactivo"]);
			$this->objCliente->setImagen($registro["imagen"]);
			$this->objCliente->setEmail($registro["email"]);
			$this->objCliente->setTelefono($registro["telefono"]);
			$this->objCliente->setCupoCredito($registro["cupoCredito"]);
			$this->objCliente->setEstado($registro["estado"]);
			
			$this->objCliente->setContrasena($registro["contrasena"]);
			}	
			$objConexion->cerrarBd();
			return $this->objCliente; 		
	}
	
	//funcion que trae todos los datos del cliente recibiendo el usuario
	function consultarUserCliente(){
		$usu=$this->objCliente->getUsuario();
		//SELECT ESTADO FROM `cliente` WHERE `usuario`="lili"
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		//$comandoSql="SELECT cedula, nombre_tmp, tipoCliente, fechaRegistro, imagen_tmp, email_tmp, telefono_tmp, cupoCredito, contrasena FROM CLIENTE  WHERE USUARIO='".$usu."' ";
		$comandoSql="SELECT * FROM CLIENTE  WHERE USUARIO='".$usu."' ";
	
		$recordSet=$objConexion->ejecutarSelect($comandoSql);

		     
		
		while($registro = $recordSet->fetch_array(MYSQLI_ASSOC)){
		
			$this->objCliente->setNombre($registro["nombre"]);
			$this->objCliente->setNombreTmp($registro["nombre_tmp"]);
			$this->objCliente->setCedula($registro["cedula"]);
			$this->objCliente->setTipoCliente($registro["tipoCliente"]);
			$this->objCliente->setFechaRegistro($registro["fechaRegistro"]);
			$this->objCliente->setFechaInactivo($registro["fechaInactivo"]);
			$this->objCliente->setImagen($registro["imagen"]);
			$this->objCliente->setImagenTmp($registro["imagen_tmp"]);
			$this->objCliente->setEmail($registro["email"]);
			$this->objCliente->setEmailTmp($registro["email_tmp"]);
			$this->objCliente->setTelefono($registro["telefono"]);
			$this->objCliente->setTelefonoTmp($registro["telefono_tmp"]);
			$this->objCliente->setCupoCredito($registro["cupoCredito"]);			
			$this->objCliente->setContrasena($registro["contrasena"]);
			$this->objCliente->setEstado($registro["estado"]);
		
			}	
			$objConexion->cerrarBd(); 
			return $this->objCliente; 		
	}
//funcion que trae todos los datos del cliente recibiendo la cedula
	function consultarCliente(){
		$ced=$this->objCliente->getCedula();
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM CLIENTE  WHERE CEDULA='".$ced."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		
		$this->objCliente->setNombre($registro["nombre"]);
		$this->objCliente->setNombreTmp($registro["nombre_tmp"]);
        $this->objCliente->setTipoCliente($registro["tipoCliente"]);
		$this->objCliente->setFechaRegistro($registro["fechaRegistro"]);
		$this->objCliente->setFechaInactivo($registro["fechaInactivo"]);
		$this->objCliente->setImagen($registro["imagen"]);
		$this->objCliente->setImagenTmp($registro["imagen_tmp"]);
		$this->objCliente->setEmail($registro["email"]);
		$this->objCliente->setEmailTmp($registro["email_tmp"]);
		$this->objCliente->setTelefono($registro["telefono"]);
		$this->objCliente->setTelefonoTmp($registro["telefono_tmp"]);
		$this->objCliente->setCupoCredito($registro["cupoCredito"]);
		$this->objCliente->setEstado($registro["estado"]);
		$this->objCliente->setUsuario($registro["usuario"]);
		$this->objCliente->setContrasena($registro["contrasena"]);
		}
		
		$objConexion->cerrarBd();
		return $this->objCliente; 		
	}
	function consultarAll(){
 
	
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM CLIENTE";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){
	
			$cliente=(array)$registro;
	
		}
		
			 
		
		$objConexion->cerrarBd();
		return $cliente;
	
	}

	function cantidad($empezar_desde,$clientesxPagina){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT *  FROM CLIENTE LIMIT ".(($empezar_desde)*1)." , $clientesxPagina";
		
		
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){
	
			$clientePage=(array)$registro;
			
	
			
		}
		
			 
		
		$objConexion->cerrarBd();
		return $clientePage;
	}

	
		
	
	
	


	}

?>