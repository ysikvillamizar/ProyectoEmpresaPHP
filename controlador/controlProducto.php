<?php 


class ControlProducto {
	var $objProducto;
 

	function __construct($objProducto){
	$this->objProducto=$objProducto;

	}

 
	function guardar(){
		$cod=$this->objProducto->getCodigo();
		$nom=$this->objProducto->getNombre();
		$idProv=$this->objProducto->getIdProv();
		$image=$this->objProducto->getImagen();
		$estado=$this->objProducto->getEstado();
		
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO PRODUCTO(IDPROV,NOMBRE,IMAGEN,ESTADO) VALUES('".$idProv."','".$nom."','".$image."','".$estado."')";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}


	function modificar(){
		$cod=$this->objProducto->getCodigo();
		$nom=$this->objProducto->getNombre();
		$idProv=$this->objProducto->getIdProv();
		$image=$this->objProducto->getImagen();
		$estado=$this->objProducto->getEstado();
	
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE PRODUCTO SET IDPROV='".$idProv."', NOMBRE='".$nom."',IMAGEN='".$image."',ESTADO=1 WHERE CODIGO='".$cod."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}


	
	function borrar(){
		$cod=$this->objProducto->getCodigo();
		$estado=$this->objProducto->getEstado();
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="UPDATE PRODUCTO SET ESTADO=0 WHERE CODIGO='".$cod."'";
		
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
		
	}
	 
	function consultar(){

		$cod=$this->objProducto->getCodigo();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM PRODUCTO  WHERE CODIGO='".$cod."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		
		$this->objProducto->setNombre($registro["nombre"]);
		$this->objProducto->setIdProv($registro["idProv"]);
		$this->objProducto->setImagen($registro["imagen"]);
		$this->objProducto->setEstado($registro["estado"]);
		 
		 
		}
		
		


		$objConexion->cerrarBd();
		return $this->objProducto;
	}

	function consultarIds(){
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT codigo, idProv FROM PRODUCTO";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		$this->objProducto->setCodigo($registro["codigo"]);
		$this->objProducto->setIdProv($registro["idProv"]);
		
		 
		 
		}	
		$objConexion->cerrarBd();
		return $this->objProducto;
	}

	function productoXProveedor(){
		$idProv=$this->objProducto->getIdProv();
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT *  FROM PRODUCTO WHERE IDPROV= '".$idProv."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
	
		while($registro = $recordSet->fetch_all(MYSQLI_BOTH)){
	
			$productos=(array)$registro;
	
		}
		
			 
		
		$objConexion->cerrarBd();
		return $productos;
		}
	
	
	


}

	  
	

?>