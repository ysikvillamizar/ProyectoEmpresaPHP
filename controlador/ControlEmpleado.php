<?php 

class ControlEmpleado {
    var $objEmpleado;

	function __construct($objEmpleado){
	$this->objEmpleado=$objEmpleado;
 
	}

 	function guardar(){
		$ced=$this->objEmpleado->getCedula();
		$nom=$this->objEmpleado->getNombre();
		$fechaIng=$this->objEmpleado->getFechaIngreso();
		$fechaRet=$this->objEmpleado->getFechaRetiro();
		$salBas=$this->objEmpleado->getSalarioBasico();
		$ded=$this->objEmpleado->getDeducciones();
		$foto=$this->objEmpleado->getFoto();
		$hojaV=$this->objEmpleado->getHojaVida();
		$email=$this->objEmpleado->getEmail();
		$tel=$this->objEmpleado->getTelefono();
		$cel=$this->objEmpleado->getCelular();
		$estado=$this->objEmpleado->getEstado();
		$usuario=$this->objEmpleado->getUsuario();
		$contrasena=$this->objEmpleado->getContrasena();
		
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO EMPLEADO(CEDULA,NOMBRE,FECHAINGRESO,FECHARETIRO,SALARIOBASICO,DEDUCCIONES,FOTO,HOJAVIDA,EMAIL,TELEFONO, CELULAR,ESTADO,USUARIO,CONTRASENA) VALUES('".$ced."','".$nom."','".$fechaIng."','".$fechaRet."','".$salBas."','".$ded."','".$foto."','".$hojaV."','".$email."','".$tel."','".$cel."','".$estado."','".$usuario."','".$contrasena."')";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	function modificar(){
		$ced=$this->objEmpleado->getCedula();
		$nom=$this->objEmpleado->getNombre();
		$fechaIng=$this->objEmpleado->getFechaIngreso();
		$fechaRet=$this->objEmpleado->getFechaRetiro();
		$salBas=$this->objEmpleado->getSalarioBasico();
		$ded=$this->objEmpleado->getDeducciones();
		$foto=$this->objEmpleado->getFoto();
		$hojaV=$this->objEmpleado->getHojaVida();
		$email=$this->objEmpleado->getEmail();
		$tel=$this->objEmpleado->getTelefono();
		$cel=$this->objEmpleado->getCelular();
		$estado=$this->objEmpleado->getEstado();
		$usuario=$this->objEmpleado->getUsuario();
		$contrasena=$this->objEmpleado->getContrasena();

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE EMPLEADO SET NOMBRE='".$nom."', FECHAINGRESO='".$fechaIng."', FECHARETIRO='".$fechaRet."', SALARIOBASICO='".$salBas."', DEDUCCIONES='".$ded."', FOTO='".$foto."', HOJAVIDA='".$hojaV."', EMAIL='".$email."', TELEFONO='".$tel."', CELULAR='".$cel."' , ESTADO=1,USUARIO='".$usuario."',CONTRASENA='".$contrasena."' WHERE CEDULA='".$ced."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}
 
	function borrar(){
		$ced=$this->objEmpleado->getCedula();
		$estado=$this->objEmpleado->getEstado();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE EMPLEADO SET ESTADO=0   WHERE CEDULA='".$ced."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}
	function consultar(){

		$ced=$this->objEmpleado->getCedula();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM EMPLEADO  WHERE CEDULA='".$ced."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);

		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		
        $this->objEmpleado->setNombre($registro["nombre"]);
        $this->objEmpleado->setFechaIngreso($registro["fechaIngreso"]);
		$this->objEmpleado->setFechaRetiro($registro["fechaRetiro"]);
		$this->objEmpleado->setSalarioBasico($registro["salarioBasico"]);
		$this->objEmpleado->setDeducciones($registro["deducciones"]);
		$this->objEmpleado->setFoto($registro["foto"]);
		$this->objEmpleado->setHojaVida($registro["hojaVida"]);
		$this->objEmpleado->setEmail($registro["email"]);
		$this->objEmpleado->setTelefono($registro["telefono"]);
		$this->objEmpleado->setCelular($registro["celular"]);
		$this->objEmpleado->setEstado($registro["estado"]);
		$this->objEmpleado->setUsuario($registro["usuario"]);
		$this->objEmpleado->setContrasena($registro["contrasena"]);
		}
		$objConexion->cerrarBd();
		
		return $this->objEmpleado;
	}

	function consultarUser(){
		$usu=$this->objEmpleado->getUsuario();
		//SELECT ESTADO FROM `cliente` WHERE `usuario`="lili"
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM EMPLEADO  WHERE USUARIO='".$usu."' ";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		
			$this->objEmpleado->setNombre($registro["nombre"]);
			$this->objEmpleado->setCedula($registro["cedula"]);
			$this->objEmpleado->setFechaIngreso($registro["fechaIngreso"]);
			$this->objEmpleado->setFechaRetiro($registro["fechaRetiro"]);
			$this->objEmpleado->setSalarioBasico($registro["salarioBasico"]);
			$this->objEmpleado->setDeducciones($registro["deducciones"]);
			$this->objEmpleado->setFoto($registro["foto"]);
			$this->objEmpleado->setHojaVida($registro["hojaVida"]);
			$this->objEmpleado->setEmail($registro["email"]);
			$this->objEmpleado->setTelefono($registro["telefono"]);
			$this->objEmpleado->setCelular($registro["celular"]);
			$this->objEmpleado->setEstado($registro["estado"]);
		
			$this->objEmpleado->setContrasena($registro["contrasena"]);
			}
			$objConexion->cerrarBd();
			
			return $this->objEmpleado;
		}


	function consultarAll(){

	
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM EMPLEADO ";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){
	
			$empleado=(array)$registro;
	
		}
		
			 
		
		$objConexion->cerrarBd();
		return $empleado;
	
	}

	function cantidad($empezar_desde,$empleadosxPagina){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT *  FROM EMPLEADO LIMIT ".(($empezar_desde)*1)." , $empleadosxPagina";
		
		
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){
	
			$empleadoPage=(array)$registro;
			
	
			
		}
		
			 
		
		$objConexion->cerrarBd();
		return $empleadoPage;
	}

//funcion que trae todos los datos del cliente recibiendo el usuario
	function consultarUserEmpleado(){
		
		$usu=$this->objEmpleado->getUsuario();
		//SELECT ESTADO FROM `cliente` WHERE `usuario`="lili"
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		//$comandoSql="SELECT cedula, nombre_tmp, tipoCliente, fechaRegistro, imagen_tmp, email_tmp, telefono_tmp, cupoCredito, contrasena FROM CLIENTE  WHERE USUARIO='".$usu."' ";
		$comandoSql="SELECT * FROM EMPLEADO  WHERE USUARIO='".$usu."' ";
		
		$recordSet=$objConexion->ejecutarSelect($comandoSql);

		     
		
		while($registro = $recordSet->fetch_array(MYSQLI_ASSOC)){
		
			$this->objEmpleado->setNombre($registro["nombre"]);
			$this->objEmpleado->setCedula($registro["cedula"]);
			$this->objEmpleado->setFechaIngreso($registro["fechaIngreso"]);
			$this->objEmpleado->setFechaRetiro($registro["fechaRetiro"]);
			$this->objEmpleado->setSalarioBasico($registro["salarioBasico"]);
			$this->objEmpleado->setDeducciones($registro["deducciones"]);
			$this->objEmpleado->setFoto($registro["foto"]);
			$this->objEmpleado->setHojaVida($registro["hojaVida"]);
			$this->objEmpleado->setEmail($registro["email"]);
			$this->objEmpleado->setTelefono($registro["telefono"]);
			$this->objEmpleado->setCelular($registro["celular"]);
			$this->objEmpleado->setEstado($registro["estado"]);
			$this->objEmpleado->setContrasena($registro["contrasena"]);
			$this->objEmpleado->setNombreTmp($registro["nombre_tmp"]);
			$this->objEmpleado->setFotoTmp($registro["foto_tmp"]);
			$this->objEmpleado->setHojaVidaTmp($registro["hojaVida_tmp"]);
			$this->objEmpleado->setEmailTmp($registro["email_tmp"]);
			$this->objEmpleado->setTelefonoTmp($registro["telefono_tmp"]);
			$this->objEmpleado->setCelularTmp($registro["celular_tmp"]);

			
			}	
			
			$objConexion->cerrarBd(); 
			return $this->objEmpleado; 		
	}


//funcion que trae todos los datos del empleado recibiendo la cedula
function consultarEmpleado(){
	$ced=$this->objEmpleado->getCedula();
	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	//$comandoSql="SELECT cedula, nombre_tmp, tipoCliente, fechaRegistro, imagen_tmp, email_tmp, telefono_tmp, cupoCredito, contrasena FROM CLIENTE  WHERE USUARIO='".$usu."' ";
	$comandoSql="SELECT * FROM EMPLEADO  WHERE CEDULA='".$ced."' ";

	$recordSet=$objConexion->ejecutarSelect($comandoSql);

		 
	
	while($registro = $recordSet->fetch_array(MYSQLI_ASSOC)){
	
		$this->objEmpleado->setNombre($registro["nombre"]);
		$this->objEmpleado->setFechaIngreso($registro["fechaIngreso"]);
		$this->objEmpleado->setFechaRetiro($registro["fechaRetiro"]);
		$this->objEmpleado->setSalarioBasico($registro["salarioBasico"]);
		$this->objEmpleado->setDeducciones($registro["deducciones"]);
		$this->objEmpleado->setFoto($registro["foto"]);
		$this->objEmpleado->setHojaVida($registro["hojaVida"]);
		$this->objEmpleado->setEmail($registro["email"]);
		$this->objEmpleado->setTelefono($registro["telefono"]);
		$this->objEmpleado->setCelular($registro["celular"]);
		$this->objEmpleado->setEstado($registro["estado"]);
		$this->objEmpleado->setContrasena($registro["contrasena"]);
		$this->objEmpleado->setNombreTmp($registro["nombre_tmp"]);
		$this->objEmpleado->setFotoTmp($registro["foto_tmp"]);
		$this->objEmpleado->setHojaVidaTmp($registro["hojaVida_tmp"]);
		$this->objEmpleado->setEmailTmp($registro["email_tmp"]);
		$this->objEmpleado->setTelefonoTmp($registro["telefono_tmp"]);
		$this->objEmpleado->setCelularTmp($registro["celular_tmp"]);
		}	
		$objConexion->cerrarBd(); 
		return $this->objEmpleado; 		
}

// Modificar solo los datos temporales para el rol Empleado
function modificarEmpleado(){
	$ced=$this->objEmpleado->getCedula();
	$nom=$this->objEmpleado->getNombre();
	$fechaIng=$this->objEmpleado->getFechaIngreso();
	$fechaRet=$this->objEmpleado->getFechaRetiro();
	$salBas=$this->objEmpleado->getSalarioBasico();
	$ded=$this->objEmpleado->getDeducciones();
	$foto=$this->objEmpleado->getFoto();
	$hojaV=$this->objEmpleado->getHojaVida();
	$email=$this->objEmpleado->getEmail();
	$tel=$this->objEmpleado->getTelefono();
	$cel=$this->objEmpleado->getCelular();
	$estado=$this->objEmpleado->getEstado();
	$usuario=$this->objEmpleado->getUsuario();
	$contrasena=$this->objEmpleado->getContrasena();
	$nomTmp=$this->objEmpleado->getNombreTmp();
	$fotoTmp=$this->objEmpleado->getFotoTmp();
	$hojaVTmp=$this->objEmpleado->getHojaVidaTmp();
	$emailTmp=$this->objEmpleado->getEmailTmp();
	$telTmp=$this->objEmpleado->getTelefonoTmp();
	$celTmp=$this->objEmpleado->getCelularTmp();

	$objConexion = new ControlConexion();
	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	$comandoSql="UPDATE EMPLEADO SET NOMBRE_TMP='".$nomTmp."', FECHAINGRESO='".$fechaIng."', 
	SALARIOBASICO='".$salBas."', DEDUCCIONES='".$ded."', FOTO_TMP='".$fotoTmp."', HOJAVIDA_TMP='".$hojaVTmp."', EMAIL_TMP='".$emailTmp."',
	TELEFONO_TMP='".$telTmp."', CELULAR_TMP='".$celTmp."',CONTRASENA='".$contrasena."' WHERE CEDULA='".$ced."'";
	$objConexion->ejecutarComandoSql($comandoSql);
	$objConexion->cerrarBd();
}


}
?>