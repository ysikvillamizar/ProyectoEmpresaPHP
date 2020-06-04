<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if($_SESSION['Usu']==  null)	header('Location: ../paginaUsuario.php');
include("../controlador/configBd.php");
include("../modelo/Proveedor.php");
include("../modelo/Usuario.php");
include("../modelo/Notificacion.php");
include("../controlador/ControlProveedor.php");
include("../controlador/ControlUsuario.php");
include("../controlador/ControlNotificacion.php");
include("../controlador/ControlConexion.php");
try{ 
    $ced=$_POST["txtCedula"];
    $nomTmp=$_POST["txtNombre"];
    $tipo=$_POST["txtTipoProveedor"];
    $fechaReg=$_POST["txtFechaRegistro"];
    $imageTmp=$_FILES["txtImagen"]["tmp_name"];
    $emailTmp=$_POST["txtEmail"];
    $telTmp=$_POST["txtTelefono"];
    $contrasena =$_POST["txtContrasena"];
    $usuario=$_GET['usuario'];
    $bot=$_POST["btn"];
  
    $objProveedor= new Proveedor("","","","","","","","","",$usuario,"","","","","");
    $objControlProveedor= new ControlProveedor($objProveedor);
    $objProveedor=$objControlProveedor->consultarUserProveedor();

    $ced=$objProveedor->getCedula();
    $nom=$objProveedor->getNombre();
    $tipo=$objProveedor->getTipoProveedor();
    $fechaReg=$objProveedor->getFechaRegistro();
    $fechaIn=$objProveedor->getFechaInactivo();
    $imagen=$objProveedor->getImagen();
    $email=$objProveedor->getEmail();
    $tel=$objProveedor-> getTelefono();
    $contrasena=$objProveedor->getContrasena();
    $nomTmp=$objProveedor->getNombreTmp();
    $imageTmp=$objProveedor->getImagenTmp();
    $emailTmp=$objProveedor->getEmailTmp();
    $telTmp=$objProveedor-> getTelefonoTmp();
    
 switch ($bot) {
 
	
    case "Modificar":
        
      try{ 
        $ced=$_POST["txtCedula"];
        $nomTmp=$_POST["txtNombre"];
        $tipo=$_POST["txtTipoProveedor"];
        $fechaReg=$_POST["txtFechaRegistro"];
        $imageTmp=$_FILES["txtImagen"]["tmp_name"];
        $emailTmp=$_POST["txtEmail"];
        $telTmp=$_POST["txtTelefono"];
        $contrasena =$_POST["txtContrasena"];
        $ruta= '../archivos/'.$_FILES['txtImagen']['name'];
        move_uploaded_file($imagenTmp,$ruta);

         //objeto con todos los datos del proveedor
        $objProveedor= new Proveedor($ced,"","","","","","","","","","","","","","");
        $objControlProveedor= new ControlProveedor($objProveedor);
        $objProveedor=$objControlProveedor->consultarProveedor();
  
         //objeto con todos los datos temporales
        $objProveedor2= new Proveedor($ced,$nom,$tipo,$fechaReg,$fechaIn,$imagen,$email,$tel,$estado,$usuario,$contrasena,$nomTmp,$ruta,$emailTmp,$telTmp);
        
        $objControlProveedor2= new ControlProveedor($objProveedor2);
        $objProveedor2=$objControlProveedor2->modificarProveedor();

        $objProveedor2=$objControlProveedor2->consultarProveedor();
      
        $nom=$objProveedor->getNombre();
        $imagen=$objProveedor->getImagen();
        $imagenTmp=$ruta;   
        $email=$objProveedor->getEmail();  
        $tel=$objProveedor->getTelefono();


       
        if($nom!=$nomTmp ){
          $objNotificacion= new Notificacion("","Proveedor",$ced,"Nombre",$nom,$nomTmp,"PENDIENTE");
          $objControlNotificacion= new ControlNotificacion($objNotificacion);
          $objNotificacion=$objControlNotificacion->guardar();
         }
          
         if($imagen!=$imagenTmp ){

       
          $objNotificacion= new Notificacion("","Proveedor",$ced,"Imagen",$imagen,$imagenTmp,"PENDIENTE");
          $objControlNotificacion= new ControlNotificacion($objNotificacion);
          $objNotificacion=$objControlNotificacion->guardar();
        }
         

        if($email!=$emailTmp   ){
          $objNotificacion= new Notificacion("","Proveedor",$ced,"Email",$email,$emailTmp,"PENDIENTE");
          $objControlNotificacion= new ControlNotificacion($objNotificacion);
          $objNotificacion=$objControlNotificacion->guardar();
       }

       if($tel!=$telTmp ){
          $objNotificacion= new Notificacion("","Proveedor",$ced,"Teléfono",$tel,$telTmp,"PENDIENTE");
          $objControlNotificacion= new ControlNotificacion($objNotificacion);
          $objNotificacion=$objControlNotificacion->guardar();
       }
       $objProveedor=$objControlProveedor->consultarProveedor();

    }
    catch (Exception $objExp){
      echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
     }
         
       echo "<script> alert('El cliente se modificó correctamente')</script>";
     break;
     default: 
   }
 
 }catch (Exception $objExp) {
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
        <form method=\"post\" action=\"accesoProveedor.php\" enctype=\"multipart/form-data\">
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
            Proveedor
          </a>
          <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
            
              <a class=\"dropdown-item\" href=\"accesoProveedor.php\">Editar</a>
            
            
            </div>
          </li>

		  <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"cerrarSesion.php\">Cerrar Sesión</a>
          </li>
        </ul>
        
      </div>
    </nav>


  <!-- seccion usuario -->
  <section class=\"usuario\">
    <div class=\"modal-dialog text-center\">
      <div class=\"col-sm-12 main-section\">
        <div class=\"modal-content\">
             <h1>Gestionar Proveedor</h1>
             <form class=\"col-12\">





                    <div class=\"form-group \" id=\"user-group\">
                    <label id=\"texto\" class=\"text-left\">Nombre:</label>
                    <div id=\"form\"> 
                          <input  type=\"text\" name=\"txtNombre\" placeholder=\"usuario\" class=\"form-control\" value='".$nomTmp."'/>
                    </div>
                    </div>
                    
                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Cédula:</div>
                    <div id=\"form\"> 
                            <input  type=\"text\" name=\"txtCedula\" readonly=»readonly» placeholder=\"cedula\" class=\"form-control\" value='".$ced."' required=\"\"/>
                    </div>
                    </div>
                        
                      
                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Tipo :</div>
                    <div id=\"form\"> 
                            <input type=\"text\" name=\"txtTipoProveedor\" readonly=»readonly» placeholder=\"tipo proveedor\" class=\"form-control\"  value='".$tipo."' />
                    </div>
                   </div>
              <div class=\"form-group\" id=\"user-group\">
                    
              <div id=\"texto\">Fecha registro:</div>
              <div id=\"form\"> 
                      <input type=\"date\" name=\"txtFechaRegistro\"  readonly=»readonly» class=\"form-control\" value='".$fechaReg."'>
              </div>
               </div>
                    
            


                  <div class=\"form-group\" id=\"user-group\">
                  <div id=\"texto\">Imagen:</div>
                  <div id=\"form\"> 
                  
                          <img src='".$imageTmp."' width=\"100px\" height=\"100px\">
                         
                  </div>
                  </div>
                  
                  <div class=\"form-group\" id=\"user-group\">
                  <div id=\"texto\">Imagen:</div>
                  <div id=\"form\"> 
                  <input  type=\"file\" name=\"txtImagen\" class=\"form-control\" value='".$imageTmp."' accept=\"image/*\">
                  </div>
                  </div>

                  
                   
                  <div class=\"form-group\" id=\"user-group\">
                  <div id=\"texto\">Email:</div>
                  <div id=\"form\"> 
                          <input type=\"email\" name=\"txtEmail\" placeholder=\"email\" class=\"form-control\" value='".$emailTmp."' />
                  </div>
                  </div>

                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Telefono:</div>
                    <div id=\"form\"> 
                            <input type=\"text\" name=\"txtTelefono\" placeholder=\"telefono\"  class=\"form-control\" value='".$telTmp."' />
                    </div>
                  </div>

                  <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Contraseña:</div>
                    <div id=\"form\"> 
                            <input type=\"text\" name=\"txtContrasena\" placeholder=\"telefono\"  class=\"form-control\" value='".$contrasena."' />
                    </div>
                  </div>

                  </br>
                  <div class=\"bn-group btn-group-justified\">
                  <!-- <input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Guardar\">-->
                  <!--<input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Consultar\"> -->
                    <input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Modificar\"> 
                   </br>
                  
                  <!--<input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Eliminar\">--> 
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