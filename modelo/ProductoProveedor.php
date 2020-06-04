<?php
class ProductoProveedor{
    var $docProveedor;
    var $codProducto;
   
	
    function __construct($docProveedor,$codProducto)
    {
        $this->docProveedor=$docProveedor;
        $this->codProducto=$codProducto;
        
    }
    function setDocProveedor($docProveedor) { $this->docProveedor = $docProveedor; }
    function getDocProveedor() { return $this->docProveedor; }

    function setCodProducto($codProducto) { $this->codProducto = $codProducto; }
    function getCodProducto() { return $this->codProducto; }


	
}
?>