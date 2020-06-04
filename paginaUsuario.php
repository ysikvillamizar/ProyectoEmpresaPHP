<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

//if($_SESSION['Usu']==  null)	header('Location: ../paginaUsuario.php');
include("controlador/configBd.php");
include("modelo/Usuario.php");
include("modelo/Cliente.php");
include("modelo/Empleado.php");
include("modelo/Proveedor.php");
include("controlador/ControlUsuario.php");
include("controlador/ControlCliente.php");
include("controlador/ControlEmpleado.php");
include("controlador/ControlProveedor.php");
include("controlador/ControlConexion.php");

//$errors = array();
try{

    $usu=$_POST["txtUsuario"];
    $con=$_POST["txtContrasena"];
    //$acceso=$_GET["nivel"];
    $bot=$_POST["btn"];

    if($bot=="Ingresar"){

       
        $objUsuario=new Usuario($usu,$con,"");
        $objCtrUsuario =new ControlUsuario($objUsuario);
        $objCtrUsuario->consultar();
        $estado=$objUsuario->getNivelAcceso(); 
      
        
        if($estado==1){
          $objUsuario=new Usuario($usu,$con,"");
          $objCtrUsuario =new ControlUsuario($objUsuario);
            if($objCtrUsuario->validarIngreso()){
              // $estado=$objUsuario->getNivelAcceso(); 
              $_SESSION['Usu']=  $usu;
              $_SESSION['Con']=  $con;
              //$_SESSION['Id']= $estado;
              //$objCtrUsuario->consultarIndex()
              header('Location: vista/menu.php');
            } 
            else{
              echo "<script>alert('Usuario y/o contraseña incorrectos.');</script>";
            } 
        } 
        elseif ($estado==2) {
        
        $objCliente= new Cliente("","","","","","","","","","","","","","",$usu,"");
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->consultarUser();
        $estadoCliente=$objCliente->getEstado();
              
       
       if(($estadoCliente)==0){
        echo "<script>alert('El usuario se encuentra inactivo.');</script>";
      
        }
        else{
    
        $objUsuario=new Usuario($usu,$con,"");
        $objCtrUsuario =new ControlUsuario($objUsuario);
          if($objCtrUsuario->validarIngreso()){
              $_SESSION['Usu']=  $usu;
              $_SESSION['Con']=  $con;
              header("Location: vista/accesoCliente.php?usuario=$usu");
            } 
            else{
              echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
            }
          }
        }

        elseif ($estado==3) {
          $objEmpleado= new Empleado("","","","","","","","","","","","",$usu,"","","","","","","");
          $objControlEmpleado= new ControlEmpleado($objEmpleado);
          $objEmpleado=$objControlEmpleado->consultarUser();
          $estadoEmpleado=$objEmpleado->getEstado();

          if(($estadoEmpleado)==0){
            echo "<script>alert('El usuario se encuentra inactivo');</script>";
        
          }
          else{
          

          $objUsuario=new Usuario($usu,$con,"");
          $objCtrUsuario =new ControlUsuario($objUsuario);
            if($objCtrUsuario->validarIngreso()){
              $_SESSION['Usu']=  $usu;
              $_SESSION['Con']=  $con;
              header("Location: vista/accesoEmpleado.php?usuario=$usu");
            
            }
            else{
              echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
            }
          }
        }
      
        elseif ($estado==4){ 
          $objProveedor= new Proveedor("","","","","","","","","",$usu,"","","","","");
          $objControlProveedor= new ControlProveedor($objProveedor);
          $objProveedor=$objControlProveedor->consultarUser();
          $estadoProveedor=$objProveedor->getEstado();
          if(($estadoProveedor)==0){
            echo "<script>alert('El usuario se encuentra inactivo');</script>";
         
           }
           else{
          $objUsuario=new Usuario($usu,$con,"");
          $objCtrUsuario =new ControlUsuario($objUsuario);
            if($objCtrUsuario->validarIngreso()){
              $_SESSION['Usu']=  $usu;
              $_SESSION['Con']=  $con;
              header("Location: vista/accesoProveedor.php?usuario=$usu");
            }
            else{
              echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
            }
          }
          
        } 
   }   
}

catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}




echo "
<!doctype html>
<html lang=\"en\">
  <head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"css/bootstrap.css\" >
    <!-- estilos personalizados -->
    <link rel=\"stylesheet\" href=\"css/estilos.css\" >
    
  </head>
  <body>
        <form method=\"post\" action=\"paginaUsuario.php\">
     <!-- sesion titulo -->       
    <section id=\"cover\"> 
     <div id=cover-texto>
     <div class=\"container\">
      <div class=\"row\"-->
        <div class=\"col-sm-12\">
          <h1 class=\"display-3\"> Valentin Moda </h1>
          

      </div>
    </div>
     </div>
    </div>
    </section>
    <!-- sesion menu -->
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
      <a class=\"navbar-brand\" href=\"#\">Menú</a>
      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
    
      <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav mr-auto\">
          <li class=\"nav-item active\">
            <a class=\"nav-link\" href=\"index3.html\">Inicio <span class=\"sr-only\">(current)</span></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"vista/empresa.html\">Empresa</a>
          </li>
          <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Personal
            </a>
            <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
              <a class=\"dropdown-item\" href=\"paginaUsuario.php\">Cliente</a>
              <a class=\"dropdown-item\" href=\"paginaUsuario.php\">Empleado</a>
              <a class=\"dropdown-item\" href=\"paginaUsuario.php\">Proveedor</a>
              <div class=\"dropdown-divider\"></div>
              <a class=\"dropdown-item\" href=\"paginaUsuario.php\">Administrador</a>
            </div>
          </li>
        <!--  <li class=\"nav-item\">-->
        <!--<a class=\"nav-link disabled\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">Disabled</a>-->
        <!--</li>-->
        </ul>
        
      </div>
    </nav>


  <!-- seccion usuario -->
  <section class=\"usuario\">
    <div class=\"modal-dialog text-center\">
      <div class=\"col-sm-12 main-section\">
        <div class=\"modal-content\">
            <div class=\"col-12 user-img\">
                <h1>Registro de usuario</h1>
                <img src=\"images/computer-icons-avatar-user-login-avatar-thumb.jpg\"/>

            </div>
            <form class=\"col-12\">
                <div class=\"form-group\" id=\"user-group\">
                    <input type=\"text\" name= \"txtUsuario\" class=\"form-control\" placeholder=\"Nombre de usuario\" required=\"\"/>
                </div>
                <div class=\"form-group\" id=\"contrasena-group\">
                        <input type=\"password\" name= \"txtContrasena\" class=\"form-control\" placeholder=\"******\" required=\"\" />
                    </div>
                    <button type=\"submit\" name=\"btn\" class=\"btn btn-primary\"  value=\"Ingresar\"> Ingresar </button> 
            </form>
        </div>
    </div>
    </section>        
        <!-- seccion pie de pagina -->       
    <footer class=\"\" id=\"footer\">
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-sm-3\">
            <p>Creado por Valentin.SA</p>
          </div>
          
          <div class=\"col-sm-3\">
            <ul class=\"list-unstyled\">
              <li><a href=\"\">Inicio</a></li>
              <li><a href=\"\">Acerca de</a></li>
              <li><a href=\"\">Valentin</a></li>
              
            </ul>
          </div>
          <div class=\"col-sm-3\">
            <ul class=\"list-unstyled\">
              <li><a href=\"\">Facebook</a></li>
              <li><a href=\"\">Twitter</a></li>
              <li><a href=\"\">Youtube</a></li>
              
            </ul>
          </div>
          <div class=\"col-sm-3\">
            <h6>Info</h6>
              <p>Suscribite a nuestro sitio web y redes sociales, donde podras saber y aprender tips de moda</p>
              
           
          </div>
       
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\" integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
    <script src=\"js/bootstrap.js\"></script>
  </body>
</html>
"
 

?>