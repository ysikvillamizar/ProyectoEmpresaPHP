﻿<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if($_SESSION['Usu']==  null)	header('Location: ../paginaUsuario.php');
include("../controlador/configBd.php");
include("../modelo/Proveedor.php");
include("../modelo/Producto.php");
include("../modelo/Notificacion.php");
include("../controlador/ControlNotificacion.php");
include("../controlador/ControlProveedor.php");
include("../controlador/controlProducto.php");
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
	 
  
	
    case "Consultar":
      $objProveedor= new Proveedor($ced,"","","","","","","","","","");
      $objControlProveedor= new ControlProveedor($objProveedor);
      $objProveedor=$objControlProveedor->consultar();

      
      $ced=$objProveedor->getCedula();

      

      $objProducto= new Producto("",$ced,"","","");
      $objControlProducto= new controlProducto($objProducto);
      $objProducto=$objControlProducto->productoXProveedor();
      

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
      elseif (($estado=$objProveedor->getEstado())==0){
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
        else{
          echo "<script>alert('El proveedor no existe');</script>";
        }
        break;
		
        case "Modificar":
          try{
            $objProveedor= new Proveedor($ced,"","","","","","","","","",""); 
            $objControlProveedor= new ControlProveedor($objProveedor);
            $objProveedor=$objControlProveedor->consultar();
            $imagen=$objProveedor->getImagen();

            $rutaImage= '../archivos/'.$_FILES['txtImagen']['name'];
            move_uploaded_file($image,$rutaImage);
            $diaActivo=date("00-0-0");
            $estado=1;

            
   
         if(($estado=$objProveedor->getEstado())==0){
          echo "<script>alert('El proveedor se encuentra inactivo,si lo modificas se activará');</script>";
         }
                 try{
                    if($image){
                   
                        
                        $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$diaActivo,$rutaImage,$email,$tel,$estado,$usuario,$contrasena);
                        $objControlProveedor= new ControlProveedor($objProveedor);
                        $objProveedor=$objControlProveedor->modificar();
                        echo "<script>alert('El proveedor se modificó correctamente');</script>";
                      }        
                    else{
                        
                        
                        $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$diaActivo,$imagen,$email,$tel,$estado,$usuario,$contrasena);
                        $objControlProveedor= new ControlProveedor($objProveedor);
                        $objProveedor=$objControlProveedor->modificar();
                        echo "<script>alert('El proveedor se modificó correctamente');</script>";
                    
                        }
                }
                catch (Exception $objExp){
                          echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
                        }
  
           }
          catch (Exception $objExp){
            echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
          }
      
        break;
		
    case "Eliminar":
     
    $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$fechaIn,$image,$email,$tel,$estado,$usuario,$contrasena);
    $objControlProveedor= new ControlProveedor($objProveedor);
    $objProveedor=$objControlProveedor->consultar();
    $imagen=$objProveedor->getImagen();

    if(($estado=$objProveedor->getEstado())==1){
      echo "<script>alert('¿Está seguro que desea inactivar el proveedor?');
             </script>"; 
             $dia=date("yy-m-d");
             $objProveedor= new Proveedor($ced,$nom,$tipo,$fechaReg,$dia,$imagen,$email,$tel,$estado,$usuario,$contrasena);
             $objControlProveedor= new ControlProveedor($objProveedor);
             $objProveedor=$objControlProveedor->modificar();

				$objProveedor=$objControlProveedor->borrar();
           
            echo "<script>alert('El proveedor se inactivó con éxito');</script>";
			}
			else{
				echo "<script>alert('El proveedor esta inactivo ');</script>";
			}
        
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
        <form method=\"post\" action=\"consultaProveedor.php\" enctype=\"multipart/form-data\">
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
              <a class=\"dropdown-item\" href=\"producto.php\">Productos</a>
              
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
          <";


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
    <div class=\"modal-dialog text-center\">
      <div class=\"col-sm-12 main-section\">
        <div class=\"modal-content\">
             <h1>Gestionar Proveedor</h1>
             <form class=\"col-12\">

             <!-- readonly=»readonly» required=\"\" -->



                    <div class=\"form-group \" id=\"user-group\">
                    <label id=\"texto\" class=\"text-left\">Nombre:</label>
                    <div id=\"form\"> 
                          <input  type=\"text\" name=\"txtNombre\" placeholder=\"usuario\" class=\"form-control\" value='".$nom."' />
                    </div>
                    </div>
                    
                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Cédula:</div>
                    <div id=\"form\"> 
                            <input  type=\"text\" name=\"txtCedula\" placeholder=\"cedula\" class=\"form-control\"  value='".$ced."' required=\"\"/>
                    </div>
                    </div>
                        
                      
                      <div class=\"form-group\" id=\"user-group\">
                      <div id=\"texto\">Tipo :</div>
                      <div id=\"form\"> 
                              <input type='text' name='txtTipoProveedor' placeholder='tipo proveedor' class=\"form-control\"  value='".$tipo."' />
                      </div>
                </div>
                <div class=\"form-group\" id=\"user-group\">
                      
                <div id=\"texto\">Fecha registro:</div>
                <div id=\"form\"> 
                        <input type='date' name='txtFechaRegistro'  class=\"form-control\"  value='".$fechaReg."'>
                </div>
                 </div>
                      
                 
                      <div class=\"form-group\" id=\"user-group\">
                      <div id=\"texto\">Fecha inactivo:</div>
                      <div id=\"form\"> 
                              <input type='date' name='txtFechaInactivo' class=\"form-control\"   value='".$fechaIn."'>
                      </div>
                    </div>

                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Imagen:</div>
	            	  <div id=\"form\"> 
			  	    <img src='".$image."' width=\"100px\" height=\"100px\">
		            </div>
                    </div>


                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Imagen:</div>
                    <div id=\"form\"> 
                    <input  type=\"file\" name=\"txtImagen\"  class=\"form-control\" value= '".$image."' accept=\"image/*\">
                    </div>
                    </div>

                     
                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Email:</div>
                    <div id=\"form\"> 
                            <input type='email' name='txtEmail' placeholder='email' class=\"form-control\"  value='".$email."' />
                    </div>
                    </div>

                      <div class=\"form-group\" id=\"user-group\">
                      <div id=\"texto\">Telefono:</div>
                      <div id=\"form\"> 
                              <input type='text' name='txtTelefono' placeholder='telefono'  class=\"form-control\"   value='".$tel."' />
                      </div>
                    </div>
                   
                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Usuario</div>
                    <div id=\"form\"> 
                            <input  type=\"text\" name=\"txtUsuario\" readonly=»readonly» placeholder=\"usuario\" class=\"form-control\" value='".$usuario."' />
                    </div>
                    </div>

                    <div class=\"form-group\" id=\"user-group\">
                    <div id=\"texto\">Contraseña</div>
                    <div id=\"form\"> 
                            <input  type=\"password\" name=\"txtContrasena\" placeholder=\"*******\" class=\"form-control\" value='".$contrasena."' />
                    </div>
                    </div>
 
                  </br>
                  <div class=\"bn-group btn-group-justified\">
                  <!-- <input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Guardar\">--> 
                  <input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Consultar\"> 
                  <input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Modificar\">
                  <input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Eliminar\"> 
          
                </div>
           
            </form>
        </div>
    </div>

    </section>
    
    



    <section class=\"usuario\">
    <div class=\"table-responsive\">

<br />
<h4>Productos</h4>
<br />

<div class=\"col-sm-12 col-md-6\">
<div id=\"example_filter\" class=\"dataTables_filter\">
 </div>
</div>
<!--<table id=user_data-->
<table id=\"example\" class=\"table table-bordered table-striped\">




<thead class=table-dark>
<tr>
<th width=\"10%\">Imagen</th>
<th width=\"10%\">Código</th>
<th width=\"10%\">Proveedor</th>
<th width=\"10%\">Nombre</th>
</tr>
</thead>

";

  $datos= (array)$objProducto;
  $longitud = count($datos);
  for($i=0;$i<$longitud; $i++){


    echo"

    <tr class=\"table-secondary\">
    <td><img src='".$datos[$i]['imagen']."' width=\"100px\" height=\"100px\"></td>
    <td> ".$datos[$i]['codigo']."</td>
    <td> ".$datos[$i]['idProv']."</td>
    <td> ".$datos[$i]['nombre']."</td>
    </tr>


    ";
  }

echo"


</table>

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