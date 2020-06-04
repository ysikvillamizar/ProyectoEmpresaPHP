<?php
//error_reporting(E_ALL ^ E_NOTICE);
session_start();
if($_SESSION['Usu']==  null)header('Location: ../index2.php');
include("../controlador/configBd.php");
include("../modelo/Cliente.php");
include("../controlador/ControlCliente.php");
include("../controlador/ControlConexion.php");

try{
	$ced=$_POST["txtCedula"];
    	$nom=$_POST["txtNombre"];
    	$tipo=$_POST["txtTipoCliente"];
	$fechaRe=$_POST["txtFechaRegistro"];
	$fechaIn=$_POST["txtFechaInactivo"];
	$image=$_FILES["txtImagen"]["tmp_name"];
	$email=$_POST["txtEmail"];
	$tel=$_POST["txtTelefono"];
	$cupoCred=$_POST["txtCupoCredito"];
    	$bot=$_POST["btn"];
	
 switch ($bot) {
    
    case "Consultar":
	
        $objCliente= new Cliente($ced,"","","","","","","","");
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->consultar();
		
		$nom=$objCliente->getNombre();
		$tipo=$objCliente->getTipoCliente();
		$fechaRe=$objCliente->getFechaRegistro();
		$fechaIn=$objCliente->getFechaInactivo();
		$image=$objCliente->getImagen();
		$email=$objCliente->getEmail();
		$tel=$objCliente->getTelefono();
		$cupoCred=$objCliente->getCupoCredito();
		
        //echo phpinfo();
        break;
		
   
    case "Borrar":
        $objCliente= new Cliente($ced,"","","","","","","","");
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->borrar();
        break;        
	} 
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}
echo"

<!doctype html>
<html lang=\"en\">
  <head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"../css/bootstrap.css\" >
    <!-- estilos personalizados -->
    <link rel=\"stylesheet\" href=\"../css/estilos.css\" >
    
  </head>
  <body>
        <form method=\"post\" action=\"vistaCliente.php\">
     <!-- sesion titulo -->       
    <section id=\"cover\"> 
     <div id=cover-texto>
     <div class=\"container\">
      <div class=\"row\"-->
        <div class=\"col-sm-12\">
          <h1 class=\"display-3\"> Valentin Moda </h1>
          <p>Bienvenido a nuestro sitio web Valentin </p>

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
            <a class=\"nav-link\" href=\"../index3.html\">Inicio <span class=\"sr-only\">(current)</span></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"empresa.html\">Empresa</a>
          </li>
          <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Personal
            </a>
            <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
              <a class=\"dropdown-item\" href=\"vistaCliente.php\">Cliente</a>
              <a class=\"dropdown-item\" href=\"vistaEmpleado.php\">Empleado</a>
              <a class=\"dropdown-item\" href=\"vistaProveedor.php\">Proveedor</a>
              <div class=\"dropdown-divider\"></div>
              <a class=\"dropdown-item\" href=\"menu.htmlphp\">Administrador</a>
            </div>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link disabled\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">Disabled</a>
          </li>
        </ul>
        
      </div>
    </nav>


  <!-- seccion usuario -->
  <section class=\"usuario\">
    <div class=\"modal-dialog text-center\">
      <div class=\"col-sm-12 main-section\">
        <div class=\"modal-content\">
             <h1>Gestionar Cliente</h1>
             <form class=\"col-12\">





                 
                    
                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Cédula:</div>
                    <div id=\"form\"> 
                            <input  type=\"text\" name=\"txtCedula\" placeholder=\"cedula\" class=\"form-control\" value='\".$ced.\"' required=\"\">
                    </div>
                    </div>
                    
                  </br>
                  <div class=\"bn-group btn-group-justified\">
    
                  <button id=\"botonC\"><input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Consultar\"></button>
                  <button id=\"botonE\"><input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Eliminar\"></button>
                </div>
           
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
    <script src=\"../js/bootstrap.js\"></script>
  </body>
</html>
"
?>