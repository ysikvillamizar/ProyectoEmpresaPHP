<?php
session_start();
include("../modelo/Notificacion.php");
include("../controlador/ControlNotificacion.php");
include("../controlador/ControlConexion.php");
include("../controlador/configBd.php");

if($_SESSION['Usu']==  null)	header('Location: ../paginaUsuario.php');



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
        <form method=\"post\" action=\"vistaCliente.php\" enctype=\"multipart/form-data\">
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
              Cliente
            </a>
            <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
              <a class=\"dropdown-item\" href=\"vistaCliente.php\">Agregar Nuevo</a>
              <a class=\"dropdown-item\" href=\"consultaCliente.php\">Editar</a>
              <a class=\"dropdown-item\" href=\"listaCliente.php\">Lista de Cliente</a>
              <a class=\"dropdown-item\" href=\"mapaCliente.php\">Mapa Cliente</a>
             
            </div>
          </li>
          
              
           <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Empleado
            </a>
            <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
              <a class=\"dropdown-item\" href=\"vistaEmpleado.php\">Agregar Nuevo</a>
              <a class=\"dropdown-item\" href=\"consultaEmpleado.php\">Editar</a>
              <a class=\"dropdown-item\" href=\"listaEmpleado.php\">Lista de Empleado</a>
              <a class=\"dropdown-item\" href=\"mapaEmpleado.php\">Mapa Empleado</a>
         
            </div>
          </li> 

          <li class=\"nav-item dropdown\">
          <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
            Proveedor
          </a>
          <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
              <a class=\"dropdown-item\" href=\"vistaProveedor.php\">Agregar Nuevo</a>
              <a class=\"dropdown-item\" href=\"consultaProveedor.php\">Editar</a>
              <a class=\"dropdown-item\" href=\"listaProveedor.php\">Lista de Proveedor</a>
              <a class=\"dropdown-item\" href=\"mapaProveedor.php\">Mapa Proveedor</a>
         
            
            </div>
          </li>

          <li class=\"nav-item dropdown\">
          <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
            Productos
          </a>
          <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
            <!--  <a class=\"dropdown-item\" aria-disabled=\"true\" href=\"vistaProducto.php\">Guardar</a>-->
              <a class=\"dropdown-item\" href=\"vistaProducto.php\">Agregar Nuevo</a>
              <a class=\"dropdown-item\" href=\"consultaProducto.php\">Editar</a>
           
            </div>

            </li>
            ";
  
  
            $objNotificacion= new Notificacion("","","","","","","");
            $objControlNotificacion= new ControlNotificacion($objNotificacion);
            $objNotificacion=$objControlNotificacion->cantidad();
            $cantidad = (array)$objNotificacion;
            $longitud = count($cantidad);
  
            for($i=0;$i<$longitud; $i++){
         
              $cantidad =$cantidad[$i]; 
        
                 } 
  
            echo"
            <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"notificacion.php\">
              Notificaciones (".$cantidad.")
            </a>
           </li>

      
		      <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"cerrarSesion.php\">Cerrar Sesión</a>
          </li>
        </ul>
        
      </div>
    </nav>

    <section class=\"usuario\">
        <div class=\"modal-dialog text-center\">
          <div class=\"col-sm-12 main-section\">
            <div class=\"modal-content\">
                <h1>Bienvenido a la plataforma 
                    de administración de personal </h1> 
                 <form class=\"col-12\">
                   </form>
            </div>
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