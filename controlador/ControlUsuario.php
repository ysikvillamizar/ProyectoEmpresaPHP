<?php
    class ControlUsuario{
	      var $objUsuario;
        function __construct($objUsuario){
           $this->objUsuario=$objUsuario;
        }


      

      function  validarIngreso(){
            $esValido=false;
            $objUsuario1 = new Usuario('','','');
            $usu= $this->objUsuario->getNomUsuario();
            $con=$this->objUsuario->getContrasena();
            $objConexion = new ControlConexion();
            try{
                $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
                $comandoSql="SELECT * FROM USUARIO  WHERE NOMUSUARIO='".$usu."' AND CONTRASENA='".$con."'";
                $recordSet=$objConexion->ejecutarSelect($comandoSql);
                while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
                $objUsuario1->setNomUsuario($registro['nomUsuario']);
                $objUsuario1->setContrasena($registro['contrasena']);
			      	  }
              }
         	    catch (Exception $e){
            	  echo "ERROR ".$e->getMessage()."\n";
                }
            $objConexion->cerrarBd();

            if ($this->objUsuario->getNomUsuario()==$objUsuario1->			getNomUsuario() &&
                $this->objUsuario->getContrasena()==$objUsuario1->getContrasena()  &&
			          $this->objUsuario->getNomUsuario() != "" &&
                $this->objUsuario->getContrasena() != "")
                {
              
                  $esValido = true;
            }
            else
            {
              $esValido = false; 
            }
        return $esValido;
      }



    


      function guardar(){
        $usu= $this->objUsuario->getNomUsuario();
        $acceso=$this->objUsuario->getNivelAcceso();
        $con=$this->objUsuario->getContrasena();
      
     
        $objConexion = new ControlConexion();
	    	$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
	    	$comandoSql="INSERT INTO USUARIO  (NOMUSUARIO, CONTRASENA, NIVELACCESO) VALUES('".$usu."','".$con."','".$acceso."')";
	    	$recordSet=$objConexion->ejecutarComandoSql($comandoSql);
        $objConexion->cerrarBd();
      }
	
       
    
    
      function modificar(){
        $usu= $this->objUsuario->getNomUsuario();
        $acceso=$this->objUsuario->getNivelAcceso();
        $con=$this->objUsuario->getContrasena();
        
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE USUARIO SET NOMUSUARIO='".$nomUsu."',CONTRASENA='".$con."',NIVELACCESO='".$acceso."' WHERE NIVELACCESO='".$acceso."'";
        $objConexion->ejecutarComandoSql($comandoSql);
        $objConexion->cerrarBd();
      }
    
    
      
      function borrar(){
        $usu= $this->objUsuario->getNomUsuario();
        $acceso=$this->objUsuario->getNivelAcceso();
        $con=$this->objUsuario->getContrasena();
        
        
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="DELETE USUARIO WHERE NIVELACCESO='".$acceso."'";
        $objConexion->ejecutarComandoSql($comandoSql);
        $objConexion->cerrarBd();
        
      }
      
      function consultar(){
    
        $usu= $this->objUsuario->getNomUsuario();
        //$acceso=$this->objUsuario->getNivelAcceso();
        $con=$this->objUsuario->getContrasena();
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="SELECT * FROM USUARIO  WHERE nomUsuario='".$usu."' AND contrasena='".$con."'";
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        
        while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
        
          $this->objUsuario->setNomUsuario($registro["nomUsuario"]);
          $this->objUsuario->setContrasena($registro["contrasena"]);
          $this->objUsuario->setNivelAcceso($registro["nivelAcceso"]);
   
     
        }	
       
        $objConexion->cerrarBd();
        return $this->objCliente;
      }
      function consultarCliente(){
    
        $usu= $this->objUsuario->getNomUsuario();
        //$acceso=$this->objUsuario->getNivelAcceso();
        
        $objConexion = new ControlConexion();
        $objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="SELECT * FROM USUARIO  WHERE nomUsuario='".$usu."'";
        $recordSet=$objConexion->ejecutarSelect($comandoSql);
        
        while($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
        
         // $this->objUsuario->setNomUsuario($registro["nomUsuario"]);
          $this->objUsuario->setContrasena($registro["contrasena"]);
          $this->objUsuario->setNivelAcceso($registro["nivelAcceso"]);
   
     
        }	
        $objConexion->cerrarBd();
        return $this->objCliente;
      }
    

 }
?>