<!DOCTYPE html>
<html>
<head>
<?php

require 'head.php';
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sistema de Gestión de Visitas Académicas</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="plantilla/icono-negro.png">

</head>
<body class="hold-transition sidebar-mini">
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   
    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
       <h5> <strong >SISTEMA DE GESTIÓN DE VISITAS ACADÉMICAS</strong></h5>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <!-- Messages Dropdown Menu -->
      <a href="desconexionadmin.php"  class="btn btn-sm btn-danger">Salir</a>
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
   
    <a style="background-color: white;" href="inicio.php" class="brand-link">
   <!-- Brand Logo  -->   <img src="plantilla/logo-blanco-lineal1.png"  width="245px" height="40px">
   
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="inicio.php" class="nav-link">
              <i style="color: white" class="nav-icon fas fa-home"></i>
              <p style="color: white">
               Inicio
              </p>
            </a>
          </li>
<?php

  if(isset($_SESSION['usuarioRol']) && $_SESSION['usuarioRol'] == "Activo"){
    ?>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i style="color: white" class="nav-icon fas fa-address-book"></i>
              <p style="color: white">
                Usuarios
                <i style="color: white" class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

 <?php if(isset($_SESSION['usuarioC']) && $_SESSION['usuarioC'] == "Activo"){ 
 ?> 
              <li class="nav-item">
                <a  href="crear_usuario.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Crear usuario</p>
                </a>
              </li>
<?php
}
    if(isset($_SESSION['usuarioR']) && $_SESSION['usuarioR'] == "Activo"){ 
 ?> 
              <li class="nav-item">
                <a href="mostrar_usuarios.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Mostrar usuarios</p>
                </a>
              </li>
 <?php 
 }
 ?>
             
            </ul>
            </li>
<?php
}

  if(isset($_SESSION['permisoRol']) && $_SESSION['permisoRol'] == "Activo"){
    ?>

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i style="color: white" class="nav-icon fas fa-address-card"></i>
              <p style="color: white">
               Perfil usuario
                <i style="color: white" class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
<?php          
 if(isset($_SESSION['permisoC']) && $_SESSION['permisoC'] == "Activo"){ 
   ?> 
              <li class="nav-item">
                <a  href="crear_perfil.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Crear Perfil</p>
                </a>
              </li>
<?php 
}         
 if(isset($_SESSION['permisoR']) && $_SESSION['permisoR'] == "Activo"){ 
   ?> 
              <li class="nav-item">
                <a href="mostrar_perfiles.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Mostrar perfiles</p>
                </a>
              </li>
<?php
    }
?>
            </ul>
            </li>

<?php  }

  if(isset($_SESSION['documentosRol']) && $_SESSION['documentosRol'] == "Activo"){

     echo'    <li class="nav-item">
            <a href="#" class="nav-link">
              <i style="color: white" class="nav-icon fas fa-file"></i>
              <p style="color: white">
                Documentos a solicitar
                <i style="color: white" class="right fas fa-angle-left"></i>
              </p>
            </a>
          
            <ul class="nav nav-treeview">';
          
   if(isset($_SESSION['documentoC']) && $_SESSION['documentoC'] == "Activo"){          
          echo   '<li class="nav-item">
                <a href="formulario_documentos.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Solicitar documentos</p>
                </a>
              </li>';
}


  if(isset($_SESSION['documentoR']) && $_SESSION['documentoR'] == "Activo"){          
          echo '<li class="nav-item">
                <a href="mostrar_documentos.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white" >Mostrar documentos</p>
                </a>
              </li>';
          
}

       echo '</ul>
            </li>';
}
   


  if(isset($_SESSION['visitasRol']) && $_SESSION['visitasRol'] == "Activo"){
?>

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i style="color: white" class="nav-icon fas fa-list-alt"></i>
              <p style="color: white">
               Visitas Académica
                <i style="color: white" class="right fas fa-angle-left"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
<?php          
 if(isset($_SESSION['visitasC']) && $_SESSION['visitasC'] == "Activo"){ 
   ?>           
               <li class="nav-item">
                <a href="newformvisitas.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white" >Nueva visita </p>
                </a>
              </li>
 <?php  
  } 
         
 if(isset($_SESSION['visitasR']) && $_SESSION['visitasR'] == "Activo"){ 
   ?> 


              <li class="nav-item">
                <a href="mostrar_visitas.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Mostrar visita</p>
                </a>
              </li>
<?php        
   } ?>

            </ul>
          </li>
<?php 
}  

  if(isset($_SESSION['alumnoRol']) && $_SESSION['alumnoRol'] == "Activo"){
?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i style="color: white" class="nav-icon fas fa fa-graduation-cap"></i>
              <p style="color: white">
                Alumnos
                <i style="color: white" class="right fas fa-angle-left"></i>
              </p>
            </a>
          
            <ul class="nav nav-treeview">
<?php          
 if(isset($_SESSION['alumnoC']) && $_SESSION['alumnoC'] == "Activo"){ 
   ?> 

              <li class="nav-item">
                <a href="agregar_alumnos.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white" >Agregar alumno a visita académica</p>
                </a>
              </li>

<?php
}

if(isset($_SESSION['alumnoV']) && $_SESSION['alumnoV'] == "Activo"){ 
   ?> 

              <li class="nav-item">
                <a href="validar_documentacion.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Validar documentación</p>
                </a>
              </li>
 <?php
  } ?>             
            </ul>
          </li>
<?php
 }
?>
<?php
if(isset($_SESSION['actividadRol']) && $_SESSION['actividadRol'] == "Activo"){
?>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i style="color: white" class="nav-icon fas fa-list"></i>
              <p style="color: white">
                Catálogos
                <i style="color: white" class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
<?php          
 if(isset($_SESSION['actividadC']) && $_SESSION['actividadC'] == "Activo"){ 
   ?> 

              <li class="nav-item">
                <a href="formulario_Actividades.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Nuevo tipo de visita</p>
                </a>
              </li>
<?php 
}         
 if(isset($_SESSION['actividadR']) && $_SESSION['actividadR'] == "Activo"){ 
   ?> 
              <li class="nav-item">
                <a href="mostrar_Actividades.php" class="nav-link">
                  <i style="color: white" class="far fa-circle nav-icon"></i>
                  <p style="color: white">Visualizar tipo de visita</p>
                </a>
              </li>
  <?php

  }?>
            </ul>
          </li>
<?php  
}
?>

        </ul>

      </nav>
    
    </div>
  
  </aside>


