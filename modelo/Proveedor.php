<?php
class Proveedor{
    var $cedula;
    var $nombre;
    var $tipoProveedor;
	var $fechaRegistro;
	var $fechaInactivo;
	var $imagen;
	var $email;
    var $telefono;
    var $estado;
    var $usuario;
    var $contrasena;
    var $nombre_tmp;
    var $imagen_tmp;
	var $email_tmp;
    var $telefono_tmp;
	
	
	
    function __construct($cedula,$nombre,$tipoProveedor,$fechaRegistro, $fechaInactivo,$imagen,$email,$telefono,$estado,$usuario, $contrasena,
    $nombre_tmp, $imagen_tmp, $email_tmp, $telefono_tmp)
    {
        $this->cedula=$cedula;
        $this->nombre=$nombre;
        $this->tipoProveedor=$tipoProveedor;
		$this->fechaRegistro=$fechaRegistro;
		$this->fechaInactivo=$fechaInactivo;
		$this->imagen=$imagen;
		$this->email=$email;
        $this->telefono=$telefono;
        $this->estado=$estado;
        $this->usuario=$usuario;
        $this->contrasena=$contrasena;
        $this->nombre_tmp=$nombre_tmp;
        $this->imagen_tmp=$imagen_tmp;
		$this->email_tmp=$email_tmp;
        $this->telefono_tmp=$telefono_tmp;
		
    }
    function setCedula($cedula) { $this->cedula = $cedula; }
    function getCedula() { return $this->cedula; }

    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }

    function setTipoProveedor($tipoProveedor) { $this->tipoProveedor = $tipoProveedor; }
    function getTipoProveedor() { return $this->tipoProveedor; }
	
	function setFechaRegistro($fechaRegistro) { $this->fechaRegistro = $fechaRegistro; }
    function getFechaRegistro() { return $this->fechaRegistro; }
	
	function setFechaInactivo($fechaInactivo) { $this->fechaInactivo = $fechaInactivo; }
    function getFechaInactivo() { return $this->fechaInactivo; }
	
	function setImagen($imagen) { $this->imagen = $imagen; }
    function getImagen() { return $this->imagen; }
	
	function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }
	
	function setTelefono($telefono) { $this->telefono = $telefono; }
    function getTelefono() { return $this->telefono; }
	
    function setEstado($estado) { $this->estado = $estado; }
    function getEstado() { return $this->estado; }
    
    function setUsuario($usuario) { $this->usuario = $usuario; }
    function getUsuario() { return $this->usuario; }

    function setContrasena($contrasena) { $this->contrasena = $contrasena; }
    function getContrasena() { return $this->contrasena; }

    function setNombreTmp($nombre_tmp) { $this->nombre_tmp = $nombre_tmp; }
    function getNombreTmp() { return $this->nombre_tmp; }

    function setImagenTmp($imagen_tmp) { $this->imagen_tmp = $imagen_tmp; }
    function getImagenTmp() { return $this->imagen_tmp; }
	
	function setEmailTmp($email_tmp) { $this->email_tmp = $email_tmp; }
    function getEmailTmp() { return $this->email_tmp; }
	
	function setTelefonoTmp($telefono_tmp) { $this->telefono_tmp = $telefono_tmp; }
    function getTelefonoTmp() { return $this->telefono_tmp; }
	
	
}
?>