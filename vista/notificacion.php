<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

//if($_SESSION['Usu']==  null)	header('Location: ../paginaUsuario.php');
include("../controlador/configBd.php");
include("../modelo/notificacion.php");
include("../modelo/Cliente.php");
include("../controlador/ControlCliente.php");
include("../controlador/ControlNotificacion.php");
include("../controlador/ControlConexion.php");

$btn=$_POST["btn"]; 
$botonId=$_POST["id"]; 
$cedula=$_POST["cedula"];

$objNotificacion= new Notificacion("","","","","","","");
$objControlNotificacion= new ControlNotificacion($objNotificacion);
$objNotificacion=$objControlNotificacion->cantidad();
$cantidad = $objNotificacion;  
$objNotificacion=$objControlNotificacion->consultar();
$datos= (array)$objNotificacion;
$longitud = count($datos);

switch ($btn) {
  
  case "Aprobar":

    try{  

        $estado="APROBADO";   
           
       
        $objNotificacion= new Notificacion($botonId,"","","","","",$estado);
        $objControlNotificacion= new ControlNotificacion($objNotificacion);
        // Actualizar a APROBADA la  notificacion         
        $objNotificacion=$objControlNotificacion->modificar();
        $objNotificacion=$objControlNotificacion->consultarRol(); 

        $id=$objNotificacion->getId();
        $rol=$objNotificacion->getRol();
        $cedula=$objNotificacion->getCedula();
        $campoEditado=$objNotificacion->getCampoEditado();
        $valorAnterior=$objNotificacion->getValorAnterior();
        $valorNuevo=$objNotificacion->getValorNuevo();
        $estado=$objNotificacion->getEstado();

        echo '<script language="javascript">alert("Error al crear sugerencia");</script>'; 

       $objNotificacion3= new Notificacion($id,$rol,$cedula,$campoEditado,$valorAnterior,$valorNuevo,$estado);
        $objControlNotificacion3= new ControlNotificacion($objNotificacion3);
        $objNotificacion3=$objControlNotificacion3->modificarRol();
        // Actualizar el cliente         
       
		
       
        // Actualizar a las entidades con la modificación de la  notificacion 
      
       // echo "<script type='text/javascript'>alert('$btn');</script>";
        //echo "<script>alert('Se RECHAZÓ el cambio.');</script>";
  }
        catch (Exception $objExp){
          echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
  }
  break;  

  case "Rechazar":
    try {
        $estado="RECHAZADO";
        $objNotificacion= new Notificacion($botonId,"","","","","",$estado);
        $objControlNotificacion= new ControlNotificacion($objNotificacion);
        // Actualizar a RECHAZADA la  notificacion  
        $objNotificacion=$objControlNotificacion->modificar();
        echo "<script>alert('Se RECHAZÓ el cambio.');</script>";
    }
        catch (Exception $objExp){
          echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";         
    }
  break;  
    } 
  ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" >
    <!-- estilos personalizados -->
    <link rel="stylesheet" href="../css/estilos.css" >

   
    
  </head>
  <body>
        <form method="post" action="notificacion.php" enctype="multipart/form-data">
     <!-- sesion titulo -->       
     <section id="cover"> 
     <div id=cover-texto>
     <div class="container">
      <div class="row"-->
        <div class="col-sm-12">
          <h1 class="display-3"> Valentin Moda </h1>
          <p>Bienvenido a nuestro sitio web Valentin </p>

      </div>
    </div>
     </div>
    </div>
    </section>
    <!-- sesion menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Menú</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index3.html">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="empresa.html">Empresa</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cliente
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="vistaCliente.php">Agregar Nuevo</a>
              <a class="dropdown-item" href="consultaCliente.php">Editar</a>
              <a class="dropdown-item" href="listaCliente.php">Lista de Cliente</a>
              <a class="dropdown-item" href="mapaCliente.php">Mapa Cliente</a>
              
            </div>
          </li> 
          
              
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Empleado
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="vistaEmpleado.php">Agregar Nuevo</a>
              <a class="dropdown-item" href="consultaEmpleado.php">Editar</a>
              <a class="dropdown-item" href="listaEmpleado.php">Lista de Empleado</a>
              <a class="dropdown-item" href="mapaEmpleado.php">Mapa Empleado</a>
           
            </div>
          </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Proveedor
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="vistaProveedor.php">Agregar Nuevo</a>
              <a class="dropdown-item" href="consultaProveedor.php">Editar</a>
              <a class="dropdown-item" href="listaProveedor.php">Lista de Proveedor</a>
              <a class="dropdown-item" href="mapaProveedor.php">Mapa Proveedor</a>
              <a class="dropdown-item" href="producto.php">Productos</a>
            
            </div>
          </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Productos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="vistaProducto.php">Agregar Nuevo</a>
              <a class="dropdown-item" href="consultaProducto.php">Consultar y Eliminar</a>
     
            </div>
          </li>
         

          <li class="nav-item">
          <a class="nav-link" href="notificacion.php">
            Notificaciones (<?php echo $cantidad ?>)
          </a>
         </li>
        
        

         <li class="nav-item">
            <a class="nav-link" href="cerrarSesion.php">Cerrar Sesión</a>
          </li>
        </ul>
        
      </div>
    </nav>

   
  <!-- seccion usuario -->

  <section class="usuario">
               <div class="table-responsive">

        <br />
        <h4>Notificaciones Pendientes</h4>

      <?php  if ($cantidad==0) { ?>
       
        
          </br> <h6 style="color:purple text-align:center ">En el momento no tiene notificaciones pendientes!!!</h6>
          <?php  
          
          } 
       
        else { ?>
 
          
    <table id="example" class="table-hover  table-bordered  table-striped">
    <thead class=table-dark>
      <tr >
      <th scope="col" width="10%" style="text-align:center">Id.</th>
       <th scope="col" width="10%" style="text-align:center">Rol</th>
       <th scope="col" width="10%" style="text-align:center">Cédula</th>
       <th scope="col" width="10%" style="text-align:center">Campo Editado</th>
       <th scope="col" width="10%" style="text-align:center">Valor Anterior</th>
       <th scope="col" width="10%" style="text-align:center">Valor Nuevo</th>
       <th scope="col" width="10%" style="text-align:center">Estado</th>
       <th scope="col" width="10%" style="text-align:center" colspan="2" >Acciones</th>
    
      </tr>
     </thead>
    


  
     
      
<?php
    for($i=0;$i<$longitud; $i++)
    {
          $botonId=$datos[$i]['id'];
          $bot=$datos[$i];
          $k=$i+1;
          $j=$i;
          $apr=0;

        
        echo"
        <tr class=\"table-secondary\">
          <td style=\"text-align:center\" name=\"txtId\">  ".$datos[$i]['id']."</td>
          <td> ".$datos[$i]['rol']."</td>
          <td> ".$datos[$i]['cedula']."</td>
          <td> ".$datos[$i]['campoEditado']."</td>
          <td> ".$datos[$i]['valorAnterior']."</td>
          <td> ".$datos[$i]['valorNuevo']."</td>
          <td style=\"text-align:center\"> ".$datos[$i]['estado']."</td>
          
          
          <td><input  type=\"submit\" id=".$botonId."  name= \"btn\"  class=\"btn btn-primary\" value=\"Aprobar\">
          <td><input  type=\"submit\" id=".$botonId."  name= \"btn\" class=\"btn btn-danger\" value=\"Rechazar\">
          
          </td> 
        </td>	
    </tr>
   
   
      ";
    
    }
  
 }
  ?>




  
    </table>
                 
            </form>
        </div>
    </div>
    </section>       
    
   </br>


        <!-- seccion pie de pagina -->       
        <footer class="" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <p>Creado por Valentin.SA</p>
          </div>
          
          <div class="col-sm-3">
            <ul class="list-unstyled">
              <li><a href="">Inicio</a></li>
              <li><a href="">Acerca de</a></li>
              <li><a href="">Valentin</a></li>
              
            </ul>
          </div>
          <div class="col-sm-3">
            <ul class="list-unstyled">
              <li><a href="">Facebook</a></li>
              <li><a href="">Twitter</a></li>
              <li><a href="">Youtube</a></li>
              
            </ul>
          </div>
          <div class="col-sm-3">
            <h6>Info</h6>
              <p>Suscribite a nuestro sitio web y redes sociales, donde podras saber y aprender tips de moda</p>
              
           
          </div>
       
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.js"></script>

    <script> 
    $(document).ready(function(){
        $('.btn').click(function(){
            event.preventDefault();
            var clickBtnValue = $(this).val();
            var btnId =$(this).attr("id");
            var url = 'notificacion.php',
            data =  {'btn': clickBtnValue, 'id': btnId};
            $.post(url, data, function (response) {
              location.reload();
            });
        });
    });
    </script>
















    
  </body>
</html>




