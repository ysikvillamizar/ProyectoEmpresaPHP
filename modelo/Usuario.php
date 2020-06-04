<?php
 class Usuario{

        var $nomUsuario;
        var $contrasena;
        var $nivelAcceso;
        
        
	

    function __construct($nomUsuario,$contrasena,$nivelAcceso){
	    $this->nomUsuario= $nomUsuario;
              $this->contrasena = $contrasena;
              $this->nivelAcceso=$nivelAcceso;
	  	
       
     }


    function getContrasena() {
        return $this->contrasena;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function getNomUsuario() {
        return $this->nomUsuario;
    }

    function setNomUsuario($nomUsuario) {
        $this->nomUsuario = $nomUsuario;
    }
    
    function getNivelAcceso() {
        return $this->nivelAcceso;
    }

    function setNivelAcceso($nivelAcceso) {
        $this->nivelAcceso = $nivelAcceso;
    }

	

}
    
?>