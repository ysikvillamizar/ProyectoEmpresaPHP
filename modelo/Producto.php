<?php
class Producto{
    var $codigo;
    var $nombre;
    var $idProv;
    var $imagen;
    var $estado;
	
	
    function __construct($codigo,$idProv,$nombre,$imagen,$estado)
    {
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->idProv=$idProv;
        $this->imagen=$imagen;
        $this->estado=$estado;
        		
    }
    function setCodigo($codigo) { $this->codigo = $codigo; }
    function getCodigo() { return $this->codigo; }

    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }

    function setIdProv($idProv) { $this->idProv = $idProv; }
    function getIdProv() { return $this->idProv; }

   	function setImagen($imagen) { $this->imagen = $imagen; }
    function getImagen() { return $this->imagen; }
	
	function setEstado($estado) { $this->estado = $estado; }
    function getEstado() { return $this->estado; }
	
}
?>