<?php
class Empleado{
    var $cedula;
    var $nombre;
    var $fechaIngreso;
	var $fechaRetiro;
	var $SalarioBasico;
	var $deducciones;
	var $foto;
	var $hojaVida;
	var $email;
	var $telefono;
	var $celular;
	var $estado;
	var $usuario;
	var $contrasena;
	var $nombre_tmp;
	var $foto_tmp;
	var $hojaVida_tmp;
	var $email_tmp;
	var $telefono_tmp;
	var $celular_tmp;
	
	
	
	function __construct($cedula,$nombre,$fechaIngreso,$fechaRetiro,$salarioBasico,$deducciones,$foto,
	$hojaVida,$email,$telefono, $celular, $estado,$usuario, $contrasena,$nombre_tmp, $foto_tmp, $hojaVida_tmp,
	$email_tmp, $telefono_tmp, $celular_tmp)
    {
        $this->cedula=$cedula;
        $this->nombre=$nombre;
		$this->fechaIngreso=$fechaIngreso;
		$this->fechaRetiro=$fechaRetiro;
        $this->salarioBasico=$salarioBasico;
		$this->deducciones=$deducciones;
		$this->foto=$foto;
		$this->hojaVida=$hojaVida;
		$this->email=$email;
		$this->telefono=$telefono;
		$this->celular=$celular;
		$this->estado=$estado;
		$this->usuario=$usuario;
        $this->contrasena=$contrasena;
		$this->nombre_tmp= $nombre_tmp;
		$this->foto_tmp= $foto_tmp;
		$this->hojaVida_tmp= $hojaVida_tmp;
		$this->email_tmp= $email_tmp;
		$this->telefono_tmp= $telefono_tmp;
		$this->celular_tmp= $celular_tmp;
	
    } 
    function setCedula($cedula) { $this->cedula = $cedula; }
    function getCedula() { return $this->cedula; }

    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }

	function setFechaIngreso($fechaIngreso) { $this->fechaIngreso = $fechaIngreso; }
    function getFechaIngreso() { return $this->fechaIngreso; }
	
	function setFechaRetiro($fechaRetiro) { $this->fechaRetiro = $fechaRetiro; }
    function getFechaRetiro() { return $this->fechaRetiro; }
	
    function setSalarioBasico($salarioBasico) { $this->salarioBasico = $salarioBasico; }
    function getSalarioBasico() { return $this->salarioBasico; }
	
	function setDeducciones($deducciones) { $this->deducciones = $deducciones; }
    function getDeducciones() { return $this->deducciones; }
	
	function setFoto($foto) { $this->foto = $foto; }
    function getFoto() { return $this->foto; }
	
	function setHojaVida($hojaVida) { $this->hojaVida = $hojaVida; }
    function getHojaVida() { return $this->hojaVida; }
	
	function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }
	
	function setTelefono($telefono) { $this->telefono = $telefono; }
    function getTelefono() { return $this->telefono; }
	
	function setCelular($celular) { $this->celular = $celular; }
    function getCelular() { return $this->celular; }
	
	function setEstado($estado) { $this->estado = $estado; }
	function getEstado() { return $this->estado; }
		
    function setUsuario($usuario) { $this->usuario = $usuario; }
    function getUsuario() { return $this->usuario; }

    function setContrasena($contrasena) { $this->contrasena = $contrasena; }
    function getContrasena() { return $this->contrasena; }

	function setNombreTmp($nombre_tmp) { $this->nombre_tmp = $nombre_tmp; }
    function getNombreTmp() { return $this->nombre_tmp; }
	
	function setFotoTmp($foto_tmp) { $this->foto_tmp = $foto_tmp; }
    function getFotoTmp() { return $this->foto_tmp; }
	
	function setHojaVidaTmp($hojaVida_tmp) { $this->hojaVida_tmp = $hojaVida_tmp; }
    function getHojaVidaTmp() { return $this->hojaVida_tmp; }
	
	function setEmailTmp($email_tmp) { $this->email_tmp = $email_tmp; }
    function getEmailTmp() { return $this->email_tmp; }
	
	function setTelefonoTmp($telefono_tmp) { $this->telefono_tmp = $telefono_tmp; }
    function getTelefonoTmp() { return $this->telefono_tmp; }
	
	function setCelularTmp($celular_tmp) { $this->celular_tmp = $celular_tmp; }
    function getCelularTmp() { return $this->celular_tmp; }
}
?>