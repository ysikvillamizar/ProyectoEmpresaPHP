<?php 

class ControlNotificacion {
    var $objNotificacion;

	function __construct($objNotificacion){
	$this->objNotificacion=$objNotificacion;

	} 

	function guardar(){ 
		$id=$this->objNotificacion->getId();
		$rol=$this->objNotificacion->getRol();
		$cedula=$this->objNotificacion->getCedula();
		$campoEditado=$this->objNotificacion->getCampoEditado();
		$valorAnterior=$this->objNotificacion->getValorAnterior();
		$valorNuevo=$this->objNotificacion->getValorNuevo();
		$estado=$this->objNotificacion->getEstado();
	
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO NOTIFICACION(ID,ROL,CEDULA,CAMPOEDITADO,VALORANTERIOR,VALORNUEVO,ESTADO) VALUES('".$id."','".$rol."','".$cedula."','".$campoEditado."','".$valorAnterior."','".$valorNuevo."','".$estado."')";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}


	function modificar(){
		$id=$this->objNotificacion->getId();
		$estado=$this->objNotificacion->getEstado();

		$objConexion2 = new ControlConexion();
		$objConexion2->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql2="UPDATE NOTIFICACION SET ESTADO= '".$estado."' WHERE ID='".$id."' ";
		$objConexion2->ejecutarComandoSql($comandoSql2);
		$objConexion2->cerrarBd();		
	}
	
	function consultarRol()
	{	
		$id=$this->objNotificacion->getId();
		$estado=$this->objNotificacion->getEstado();

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM NOTIFICACION  WHERE ID='".$id."' ";
		//$comandoSql2="UPDATE Cliente SET NOMBRE='ccc' WHERE CEDULA='123' ";	

		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		//$objConexion->ejecutarComandoSql($comandoSql2);
		
		
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
	
			$this->objNotificacion->setNombre($registro["id"]);
			$this->objNotificacion->setTipoCliente($registro["rol"]);
			$this->objNotificacion->setFechaRegistro($registro["cedula"]);
			$this->objNotificacion->setFechaInactivo($registro["campoEditado"]);
			$this->objNotificacion->setImagen($registro["valorAnterior"]);
			$this->objNotificacion->setImagen($registro["valorNuevo"]);
			$this->objNotificacion->getEstado($registro["estado"]);
				
		}	
		$objConexion->cerrarBd();
		return $this->objNotificacion;

	}



	function modificarRol(){
		$id=$this->objNotificacion->getId();
		$rol=$this->objNotificacion->getRol();
		$cedula=$this->objNotificacion->getCedula();
		$campoEditado=$this->objNotificacion->getCampoEditado();
		$valorAnterior=$this->objNotificacion->getValorAnterior();
		$valorNuevo=$this->objNotificacion->getValorNuevo();
		$estado=$this->objNotificacion->getEstado();

		if($estado='APROBADO'){
				
			$objConexion3= new ControlConexion();
			$objConexion3->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
			//$comandoSql3="UPDATE Cliente SET NOMBRE='mmm' WHERE CEDULA='".$cedula."' ";
			$comandoSql3="UPDATE Cliente SET Nombre='vvv' WHERE CEDULA='123'";
			$objConexion3->ejecutarComandoSql($comandoSql3);
			$objConexion3->cerrarBd();
			
		}
		else{
			//$campoTemporal=$campoEditado."'._tmp.'";
			//$comandoSql = "UPDATE $rol SET $campoEditado='" . $valorAnterior . "' WHERE CEDULA='" . $cedula . "'";
		}
	
			

	}
	

	//consultar todos los campos de notificacion con estado PENDIENTE
	function consultar(){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM NOTIFICACION  WHERE ESTADO='PENDIENTE'";
		
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){
	
			$notificacion=(array)$registro;
	
		}		
		
		$objConexion->cerrarBd();
		return $notificacion;
	}
 
	//consultar campos que enviare al cliente
	function consultarCampoEditado($id){
	
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT CEDULA , VALORNUEVO, CAMPOEDITADO WHERE ID='".$id."' ";
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
	
			$cedula=$this->objNotificacion->getCedula();
			$campoEditado=$this->objNotificacion->getCampoEditado();
			$valorNuevo=$this->objNotificacion->getValorNuevo();

		
			}	
		
		$objConexion->cerrarBd();
		return $this->objNotificacion;
	}

	function consultarId(){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT ID FROM NOTIFICACION  WHERE ESTADO='PENDIENTE'";
		
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){
	
			$notificacion=(array)$registro;
	
		}		
		
		$objConexion->cerrarBd();
		return $notificacion;
	}


	//contar la cantidad de notificaciones PEDIENTES
	function cantidad(){

		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT count(1)  FROM NOTIFICACION WHERE ESTADO='PENDIENTE'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);

		while($registro = $recordSet->fetch_array(MYSQLI_NUM)){
	
			$cantidad=(array)$registro;
	
		}

		$longitud = count($cantidad);

		for($i=0;$i<$longitud; $i++){
	 
		  $cantidad =$cantidad[$i]; 
	
			 } 

	
		 
		
		$objConexion->cerrarBd();
		
		return $cantidad;
	}

	}

?>