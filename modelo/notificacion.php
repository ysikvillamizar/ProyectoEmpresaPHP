<?php
class Notificacion{
    var $id;
    var $rol;
    var $cedula;
    var $campoEditado;
	var $valorAnterior;
	var $valorNuevo;
	var $estado;
   
	 
    function __construct($id,$rol,$cedula,$campoEditado,$valorAnterior,$valorNuevo,$estado)
    {
        $this->id=$id;
        $this->rol=$rol;
        $this->cedula=$cedula;
        $this->campoEditado=$campoEditado;		
        $this->valorAnterior=$valorAnterior;
        $this->valorNuevo=$valorNuevo;
        $this->estado=$estado;

    }

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
   
	function setRol($rol) { $this->rol = $rol; }
    function getRol() { return $this->rol; }

    function setCedula($cedula) { $this->cedula = $cedula; }
    function getCedula() { return $this->cedula; }

	function setCampoEditado($campoEditado) { $this->campoEditado = $campoEditado; }
    function getCampoEditado() { return $this->campoEditado; }

    function setValorAnterior($valorAnterior) { $this->valorAnterior = $valorAnterior; }
    function getValorAnterior() { return $this->valorAnterior; }

    function setValorNuevo($valorNuevo) { $this->valorNuevo = $valorNuevo; }
    function getValorNuevo() { return $this->valorNuevo; }

    function setEstado($estado) { $this->estado = $estado; }
    function getEstado() { return $this->estado; }

}
?>