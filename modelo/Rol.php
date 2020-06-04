<?php
class Rol{
    var $id;
    var $rol;

	
    function __construct($id,$rol)
    {
        $this->id=$id;
        $this->rol=$rol;
    }
    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }

    function setRol($rol) { $this->rol = $rol; }
    function getRol() { return $this->rol; }

	
}
?>