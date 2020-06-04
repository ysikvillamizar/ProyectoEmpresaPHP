<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if($_SESSION['Usu']==  null)	header('Location: ../paginaUsuario.php');
include("../controlador/configBd.php");
include("../modelo/Proveedor.php");
include("../modelo/Notificacion.php");
include("../controlador/ControlNotificacion.php");
include("../controlador/ControlProveedor.php");
include("../controlador/ControlConexion.php");




try{
    $ced=$_POST["txtCedula"];
    $nom=$_POST["txtNombre"];
    $tipo=$_POST["txtTipoProveedor"];
    $fechaReg=$_POST["txtFechaRegistro"];
    $fechaIn=$_POST["txtFechaInactivo"];
    $image=$_FILES["txtImagen"]["tmp_name"];
    $email=$_POST["txtEmail"];
    $tel=$_POST["txtTelefono"];
    $usuario=$_POST["txtUsuario"];
    $contrasena=$_POST["txtContrasena"];
	
    $bot=$_POST["btn"];
	
 switch ($bot) {
	 
    case "Guardar":
		try{

        $rutaImage= '../archivos/'.$_FILES['txtImagen']['name'];
        move_uploaded_file($image,$rutaImage);
        $estado=1;
        $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$fechaIn,$rutaImage,$email,$tel,$estado,$usuario,$contrasena);
        $objControlProveedor= new ControlProveedor($objProveedor);
        $objProveedor=$objControlProveedor->guardar();

         //header('Location: guardarProducto.php');
         
         echo "<script>alert('El Proveedor se guardó correctamente');</script>";

       

		
		}
	  catch (Exception $objExp){
		echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
    }
    
  break;
	
    case "Consultar":
        $objProveedor= new Proveedor($ced,"","","","","","","","","","");
        $objControlProveedor= new ControlProveedor($objProveedor);
        $objProveedor=$objControlProveedor->consultar();

        if(($estado=$objProveedor->getEstado())==1){
          $nom=$objProveedor->getNombre();
          $tipo=$objProveedor->getTipoProveedor();
          $fechaReg=$objProveedor->getFechaRegistro();
          $fechaIn=$objProveedor->getFechaInactivo();
          $image=$objProveedor->getImagen();
          $email=$objProveedor->getEmail();
          $tel=$objProveedor-> getTelefono();
          $usuario=$objProveedor->getUsuario();
          $contrasena=$objProveedor->getContrasena();
        }
        else{
          echo "<script>alert('El Proveedor se encuentra inactivo,si lo modificas se activará');</script>";
       	  $nom=$objProveedor->getNombre();
          $tipo=$objProveedor->getTipoProveedor();
          $fechaReg=$objProveedor->getFechaRegistro();
          $fechaIn=$objProveedor->getFechaInactivo();
          $image=$objProveedor->getImagen();
          $email=$objProveedor->getEmail();
          $tel=$objProveedor-> getTelefono();
          $usuario=$objProveedor->getUsuario();
          $contrasena=$objProveedor->getContrasena();

        	}
        //echo phpinfo();
        break;
		
    case "Modificar":
      try{ 
          $objProveedor= new Proveedor($ced,"","","","","","","","","",""); 
          $objControlProveedor= new ControlProveedor($objProveedor);
          $objProveedor=$objControlProveedor->consultar();
          $imagen=$objProveedor->getImagen();

       if(($estado=$objProveedor->getEstado())==0){
	      echo "<script>alert('El proveedor se encuentra inactivo,si lo modificas se activará');</script>";
               try{
                  if($image){
                      $rutaImage= '../archivos/'.$_FILES['txtImagen']['name'];
                      move_uploaded_file($image,$image);
                      $estado=1;
                      $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$fechaIn,$rutaImage,$email,$tel,$estado,$usuario,$contrasena);
                      $objControlProveedor= new ControlProveedor($objProveedor);
                      $objProveedor=$objControlProveedor->modificar();
                      echo "<script>alert('El proveedor se modificó correctamente');</script>";
                    }        
                  else{
                      $rutaImage= '../archivos/'.$_FILES['txtImagen']['name'];
                      move_uploaded_file($image,$image);
                      $estado=1;
                      $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$fechaIn,$imagen,$email,$tel,$estado,$usuario,$contrasena);
                      $objControlProveedor= new ControlProveedor($objProveedor);
                      $objProveedor=$objControlProveedor->modificar();
                      echo "<script>alert('El proveedor se modificó correctamente');</script>";
                  
                      }
                      }
               catch (Exception $objExp){
                        echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
                      }

          }
          else{
                try{
                    if($image){
                      $rutaImage= '../archivos/'.$_FILES['txtImagen']['name'];
                      move_uploaded_file($image,$image);
                      $estado=1;
                      $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$fechaIn,$rutaImage,$email,$tel,$estado,$usuario,$contrasena);
                      $objControlProveedor= new ControlProveedor($objProveedor);
                      $objProveedor=$objControlProveedor->modificar();
                      echo "<script>alert('El proveedor se modificó correctamente');</script>";
                    }        
                  else{
                      $rutaImage= '../archivos/'.$_FILES['txtImagen']['name'];
                      move_uploaded_file($image,$image);
                      $estado=1;
                      $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$fechaIn,$imagen,$email,$tel,$estado,$usuario,$contrasena);
                      $objControlProveedor= new ControlProveedor($objProveedor);
                      $objProveedor=$objControlProveedor->modificar();
                      echo "<script>alert('El proveedor se modificó correctamente');</script>";
                  
                    }
                }
                catch (Exception $objExp){
                      echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
                    }
          }
       }
        catch (Exception $objExp){
          echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
        }
	  
      
    break;
	default:

  
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
        <form method=\"post\" action=\"listaProveedor.php\" enctype=\"multipart/form-data\">
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
              <a class=\"dropdown-item\" href=\"vistaCliente.php\">Guardar</a>
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
              <a class=\"dropdown-item\" href=\"vistaEmpleado.php\">Guardar</a>
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
              <a class=\"dropdown-item\" href=\"vistaProveedor.php\">Guardar</a>
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
              <a class=\"dropdown-item\" href=\"vistaProducto.php\">Guardar</a>
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


   

    <!-- seccion usuario -->
    <section class=\"usuario\">
    <div class=\"table-responsive\">
       
    <br />
    <h4>Proveedores</h4>
    <br />
    
        <table id=\"user_data\" class=\"table table-bordered table-striped\">
    
        <thead class=table-dark>
          <tr>
           <th width=\"10%\">Imagen</th>
           <th width=\"10%\">Cédula</th>
           <th width=\"10%\">Nombre</th>
           <th width=\"10%\">Tipo Proveedor</th>
           <th width=\"10%\">Fecha Regístro</th>
           <th width=\"10%\">Fecha Inactivo</th>
           <th width=\"10%\">Email</th>
           <th width=\"10%\">Teléfono</th>
         </tr>
         </thead>
          
      
         ";

         $page = 1;     //inicializamos la variable $page a 1 por default
         if (array_key_exists('pg', $_GET)) {
         //si el valor pg existe en nuestra url, significa que estamos en una pagina en especifico.    
         $page = $_GET['pg']; 
         }


    
           $objProveedor= new Proveedor($ced,"","","","","","","","","","");
           $objControlProveedor= new ControlProveedor($objProveedor);
           $objProveedor=$objControlProveedor->consultarAll();
           $datos= (array)$objProveedor;
           $longitud = count($datos);
          
           //$page = $_GET['pagina'];
           $proveedorxPagina=5;
           $paginas=ceil($longitud/$proveedorxPagina);
           $empezar_desde=($page-1)*$proveedorxPagina;
         
           $objProveedor= new Proveedor($ced,"","","","","","","","","","");
           $objControlProveedor= new ControlProveedor($objProveedor);
           $objProveedor=$objControlProveedor->cantidad($empezar_desde,$proveedorxPagina);

           $datos= (array)$objProveedor;
           $longitud = count($datos);
      //$empezar=  ($paginas-1)*$clientesxPagina;
 
      
     	
      //listaCliente.php?pagina=1
     
      if($page>1){
        
        $ant=$page-1;
      }
      elseif($_GET['pagina']<=1){
        $ant=1;
      }
    
      if($page<$paginas){
        $sig=$page+1;
      }
      elseif($_GET['pagina']>=$paginas){
        $sig=$paginas;
      }




          for($i=0;$i<$longitud; $i++){
    
            
         echo"
        
         <tr class=\"table-secondary\">
          <td><img src='".$datos[$i]['imagen']."' width=\"100px\" height=\"100px\"></td>
          <td> ".$datos[$i]['cedula']."</td>
          <td> ".$datos[$i]['nombre']."</td>
          <td> ".$datos[$i]['tipoProveedor']."</td>
          <td> ".$datos[$i]['fechaRegistro']."</td>
          <td> ".$datos[$i]['fechaInactivo']."</td>
          <td> ".$datos[$i]['email']."</td>
          <td> ".$datos[$i]['telefono']."</td>
       
        </tr>
       
       
        ";
        }
      
        echo"
    
     
      
        </table>
        <br />        
        <nav aria-label=\"Page navigation example\">
        <ul class=\"pagination\">
    
        <li class=\"page-item \"><a class=\"page-link\" href=\"listaCliente.php?pagina=$ant \">Anterior</a></li>"; 
          for($i=1; $i<=$paginas; $i++){
    
            if($page==$i){
            echo"
              <li class=\"page-item active \"><a class=\"page-link\" href=\"#\">$page</a></li>";
            }
            else{
              echo"
              <li class=\"page-item \"><a class=\"page-link\" href=\"listaCliente.php?pagina=$i\">$i</a></li>";
            }
          }
           echo"
        
            <li class=\"page-item \"><a class=\"page-link\" href=\"listaCliente.php?pagina=$sig\">Siguiente</a></li>
        </ul>
        </nav>";
        
      
      echo"
                      </br>
    
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