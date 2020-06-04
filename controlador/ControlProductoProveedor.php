<?php 

 
class ControlProductoProveedor {
    var $objProductoProveedor;

	function __construct($objProductoProveedor){
	$this->objProductoProveedor=$objProductoProveedor;

	}  
	
	function guardarProdProv(){
		$idProv=$this->objProductoProveedor->getDocProveedor();
		$cod=$this->objProductoProveedor->getCodProducto();
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO producto_proveedor(docProveedor,codProducto) VALUES ('".$idProv."','".$cod."')";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarBd();
	}

	
	function consultar(){

		$docProveedor=$this->objProductoProveedor->getDocProveedor();
		$codProducto=$this->objProductoProveedor->getCodProducto();
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM producto_proveedor  WHERE docProveedor='".$docProveedor."'";
	
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		
        $this->objProductoProveedor->setDocProveedor($registro["docProveedor"]);
		 $this->objProductoProveedor->setCodProducto($registro["codProducto"]);
		 
		 
		 
		}	
		$objConexion->cerrarBd();
		return $this->objProductoProveedor;
	}

	function idProveedor(){

		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT docProveedor FROM  producto_proveedor ";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
		$this->objProductoProveedor->setIdProv($registro["idProv"]);
		}
		$objConexion->cerrarBd();
		return $this->objProductoProveedor;
	}

}
?>