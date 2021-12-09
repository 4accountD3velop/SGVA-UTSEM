<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");
  }  
  $id = $_SESSION['idUsuario'];
 ?>

<?php
require 'conexion.php';
?>
<body class="hold-transition sidebar-mini">
<?php require'plantilla1.php'; ?> 
<!-- <section class="content">
 <div class="wrapper">
  -->
   
  <section   class="content-header">
    <div class="container-fluid"> 
      <div style="background-color: white;" class="content-wrapper">
    <!--     <div class="row mb-2">
        </div>
      </div> 
    </section> -->

    <?php
             if(isset($_GET['action']) == 'delete'){
        $id_delete = intval($_GET['idDocumento']);
        $query = mysqli_query($mysqli, "SELECT * FROM documentos WHERE idDocumento='$id_delete'");
        if(mysqli_num_rows($query) == 0){
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($mysqli, "DELETE FROM documentos WHERE idDocumento='$id_delete'");
          if($delete){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los documentos han sido eliminados correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los documentos.</div>';
          }
        }
      }
      ?> 
    <!-- <div class="container-fluid"> -->
       <!--  <div class="row"> -->
          <!-- <div class="col-md-12"> -->
           <!--  <div class="card"> -->
            <div id="respuesta"></div>
            

              <!-- <div class="card-header p-2"> -->
               <!--  <ul class="nav nav-pills">
                  <li  class="nav-item"><a class="nav-link success active" href="#activity" data-toggle="tab">Subir documentos</a></li> -->
                 <!-- <s -->
               <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>-->
               <!--  </ul>
              </div> -->

            <!--   <div class="card-body"> -->
             <!--    <div class="tab-content"> -->
                  <!-- <div class="active tab-pane" id="activity"> -->
<?php 

$query = mysqli_query($mysqli, "SELECT * FROM actividades W INNER JOIN documentos D ON W.idActividad = D.idActividad INNER JOIN alumnos A ON W.idActividad = A.idActividad WHERE A.matricula = '$id'");
$query1 = mysqli_query($mysqli, "SELECT * FROM actividades W INNER JOIN documentos D ON W.idActividad = D.idActividad INNER JOIN archivos F ON D.idDocumento = F.idDocumento INNER JOIN alumnos A ON F.id_alumno = A.id_alumno WHERE A.matricula = '$id'");
   echo("primera".$query1 = (mysqli_num_rows($query1)));
   echo("segunda".$query = (mysqli_num_rows($query)));

         
// mysqli_num_rows($query) == 0
// $sql5 = "SELECT F.estatusArchivo as estatusA, F.idAlumno as idAlum, F.idArchivo as idArch FROM actividades W INNER JOIN documentos D ON W.idActividad = D.idActividad INNER JOIN archivos F ON D.idDocumento = F.idDocumento INNER JOIN alumnos A ON F.id_alumno = A.id_alumno WHERE A.matricula = '$id'";

//  $resultA = mysqli_query ($mysqli,$sql5);

// if(mysqli_num_rows($resultA) == 0){

if($query1 ==0 AND $query1 != $query){
?>
   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre documento</th>
                    <th>Nombre actividad</th>
                    <th>Cargar archivos</th>
                    <th>Acción</th>
                  </tr>
                  </thead>      
                  <tbody>

  <?php   

   $sql1="SELECT * from alumnos WHERE matricula = '$id'";
         $result1=mysqli_query($mysqli,$sql1);
          while($mostrar2=mysqli_fetch_array($result1)){
            $actividad = $mostrar2['idActividad'];
            $idAlumno = $mostrar2['id_alumno'];
         }  
 $sql="SELECT * FROM actividades W INNER JOIN documentos D ON W.idActividad = D.idActividad INNER JOIN alumnos A ON W.idActividad = A.idActividad WHERE A.matricula = '$id' ";
    $result=mysqli_query($mysqli,$sql);


           while($mostrar=mysqli_fetch_array($result)){
  $idDocumentonuvo = $mostrar['idDocumento'];

  $sql6 = mysqli_query($mysqli, "SELECT * FROM actividades W INNER JOIN documentos D ON W.idActividad = D.idActividad INNER JOIN archivos F ON D.idDocumento = F.idDocumento INNER JOIN alumnos A ON F.id_alumno = A.id_alumno WHERE A.matricula = '$id' AND D.idDocumento = '$idDocumentonuvo'");

 ?> <form method="POST" id="formImg<?php echo $mostrar['idDocumento'] ?>" enctype="multipart/form-data">

           <tr>
          <td><?php echo $mostrar['nombreDocumento']?></td>
          <td><?php echo $mostrar['nombreActividad']?></td>

          <td><input  type="file" name="imagen" id="imagen"></td>

          <td hidden><input  value="<?php echo $mostrar['nombreDocumento'] ?>" name="nombreDocumento" id="nombreDocumento"></td>
          <td hidden><input  value="<?php echo $mostrar['idDocumento'] ?>" name="idDocumento" id="idDocumento"></td>
          <td hidden><input  value="<?php echo $mostrar['id_alumno'] ?>" name="idAlumno" id="idAlumno"></td>
          <td hidden><input  value="<?php echo $mostrar['nombreActividad']?>" name="nombreActividad" id="nombreActividad"></td>
          <td hidden><input  value="<?php echo $mostrar['matricula'] ?>" name="matricula" id="matricula"></td>
             <?php
        if ($sql6->num_rows===0) {
          ?>
            <td><button  type="button"  onclick="Cargar(<?php echo $mostrar['idDocumento'] ?>);" class="btn btn-success">Subir</button></td>
         <?php   
            
          }else{
?>
            <td><button  type="button"  class="btn btn-danger">Subido</button></td>
       <?php      
          }  
         ?>
        </tr>

      </form>

<?php
 }
?>


 </tbody>         
                  <tfoot>
                  <tr>
                    <th>Nombre documento</th>
                    <th>Nombre actividad</th>
                    <th>Cargar archivos</th>
                    <th>Acción</th>
                  </tr>
                  </tfoot>
                </table>
  <?php
  }else if($query1 == $query){

    ?>
         <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre documento</th>
                    <th>Nombre actividad</th>
                    <th>Comentarios</th>
                    <th>Estatus archivo</th>
                    <th>Cargar archivos</th>
                    <th>Acción</th>
                  </tr>
                  </thead>      
                  <tbody>
  <?php

    $sql1="SELECT * from alumnos WHERE matricula = '$id'";
         $result1=mysqli_query($mysqli,$sql1);
          while($mostrar2=mysqli_fetch_array($result1)){
            $actividad = $mostrar2['idActividad'];
            $idAlumno = $mostrar2['id_alumno'];
         } 
         $sql2="SELECT * FROM actividades N INNER JOIN documentos D ON N.idActividad = D.idActividad INNER JOIN archivos A ON D.idDocumento = A.idDocumento INNER JOIN alumnos S ON A.id_alumno = S.id_alumno WHERE A.id_alumno = '$idAlumno'";
 $result2=mysqli_query($mysqli,$sql2);
 while($mostrar=mysqli_fetch_array($result2)){ 

  if ($mostrar['estatusArchivo'] == "Pendiente") {    
?>
       <form method="POST" id="formImg" enctype="multipart/form-data">
        <tr>
                    
          <td><?php echo $mostrar['nombreDocumento']?></td>
          <td><?php echo $mostrar['nombreActividad']?></td>
          <td><?php echo $mostrar['comentariosArchivo']?></td>
          <td><?php echo $mostrar['estatusArchivo']?></td>
          <td><input  type="file" name="imagen" id="imagen"></td>
           <td hidden><input  value="<?php echo $mostrar['nombreDocumento'] ?>" name="nombreDocumento" id="nombreDocumento"></td>
          <td hidden><input  value="<?php echo $mostrar['idDocumento'] ?>" name="idDocumento" id="idDocumento"></td> 
          <td hidden><input  value="<?php echo $idAlumno ?>" name="idAlumno" id="idAlumno"></td>
          <td><input type="button" value="Subido" class="btn btn-danger"></input>
          </td>
        </tr>
      </form>
        <?php 
         
          }else{
          ?>
          <form method="POST" id="formImg" enctype="multipart/form-data">

           <tr>
          <td><?php echo $mostrar['nombreDocumento']?></td>
          <td><?php echo $mostrar['nombreActividad']?></td>
          <td><?php echo $mostrar['comentariosArchivo']?></td>
          <td><?php echo $mostrar['estatusArchivo']?></td>
          <td><input  type="file" name="imagen" id="imagen"></td>
          <td hidden><input  value="<?php echo $mostrar['nombreDocumento'] ?>" name="nombreDocumento" id="nombreDocumento"></td>
          <td hidden><input  value="<?php echo $mostrar['idDocumento'] ?>" name="idDocumento" id="idDocumento"></td>
          <td hidden><input  value="<?php echo $idAlumno ?>" name="idAlumno" id="idAlumno"></td>
            
          <td><button  value="<?php echo $mostrar['nombreDocumento'].'-'.$mostrar['idDocumento'].'-'.$idAlumno ?>" type="button" onclick="Cargar('<?php echo $mostrar['nombreDocumento']; ?>','<?php echo $mostrar['idDocumento']; ?>','<?php echo $idAlumno; ?>');" class="btn btn-success">Subir</button>
          </td>
        </tr>
      </form>
       <?php     

     }

  }
?>
   </tbody>         
                  <tfoot>
                  <tr>
                    <th>Nombre documento</th>
                    <th>Nombre actividad</th>
                    <th>Comentarios</th>
                    <th>Estatus archivo</th>
                    <th>Cargar archivos</th>
                    <th>Acción</th>
                  </tr>
                  </tfoot>
                </table>
<?php
}

 ?>

          </div>
        
        </div>
<script type="text/javascript" src="js/funcionLogin.js"></script> 
  </section>
 

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  }); 
</script> 
 

<?php
require 'footer.php';
?>


---------------------------
<div class="table-responsive">

                 <table >
                  <thead>
                  <tr>
                    <th>Índice</th>
                    <th>Nombre completo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                   </tr>
                  </thead>
                   <tbody>

        <tr>
          <td><?php echo $mostrar['idUsuario']?></td>
          <td><?php echo $mostrar['nombreCompletoUsuario']?></td>
          <td><?php echo $mostrar['telefono']?></td>
          <td><?php echo $mostrar['correo']?></td>
          <td><?php echo $mostrar['usuario']?></td>
          <td><?php echo $mostrar['contrasena']?></td>
          <td><?php echo $mostrar['rol']?></td>
        
        </tr>
    
      </tbody>         
                  <tfoot>
                  <tr>
                    <th>Índice</th>
                    <th>Nombre completo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                  </tr>
                  </tfoot>
                </table>
-------------------------------
<!-- 
                <div class="step" id="step-5">
                    <div class="step__header">
                        <h2 class="step__title">Evidencia Imágenes</h2>
                    </div>
                    <div class="step__body">
                    
                     

                      <link rel="stylesheet" href="Preview-Images-master/css/styles.css">
                       <link rel="stylesheet" href="Preview-Images-master/css/icons.css">    
                 
                      <div style="background-color: #07A882" class="col-sm-12">
                        <br>
                        <h3 style="color: white" class="card-title">Selecciona tres imágenes como evidencia </h3>

                        
    <div class="modal">
      <div class="modal-main">
        <div class="row">
          <div class="c-3-lg c-3-md c-1-sm close-modal"></div>
          <div class="c-6-lg c-6-md c-10-sm c-12-xs close-modal">
            <div class="modal-card" id="loading">
              <div class="preloader"></div>
              <span class="tag">Cargando...</span>
            </div>
            <div class="modal-card" id="Message">
              <span class="tag"></span>
            </div>
          </div>
          <div class="c-3-lg c-3-md c-1-sm close-modal"></div>
        </div>
      </div>
    </div>


    <header></header>


    <main>
        <div class="container">
            <section id="Images" class="images-cards">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12" id="add-photo-container">
                            <div class="add-new-photo first" id="add-photo">
                                <span><i class="icon-camera"></i></span>
                            </div>
                            <input class="step__input" type="file" multiple id="add-new-photo" name="imagenes[]" >
                        </div>
                    </div>

                
            </section>
        </div>
    </main>

            <script src="Preview-Images-master/js/modal.js"></script>
            <script src="Preview-Images-master/js/functions.js"></script>
            <script src="Preview-Images-master/js/scripts.js"></script>

</div>
                    <div class="row">
                    <br>
                    <select name="estatusVisita" id="estatusVisita" class="step__input" required>
                            <option selected reardonly style="display:none;">Estatus visita</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Realizadas">Realizadas</option>
                            <option value="No realizadas">No realizadas</option>
                            <option value="Archivadas">Archivadas</option>
                        </select>
                    <textarea name="comentarios" id="comentarios" rows="4" cols="80" placeholder="Comentarios" class="step__input"></textarea>
                     <input name="alumnos" id="alumnos" value="Todos" type="hidden" class="step__input">
                     // <?php $idUsuario  $_SESSION[]; 
                     // $fecha_actual = date("Y-m-d");
                     ?>
                     
                     <input name="fechaCreacion" id="fechaCreacion" value="<?php  $fecha_actual?>" type="hidden" class="step__input">
                     <input name="creadoPor" id="creadoPor" value="<?php  $nombreUsuario?>" type="hidden" class="step__input">
                     <input name="fechaModificacion" id="fechaModificacion" value="0000-00-00" type="hidden" class="step__input">
                     <input name="modificadoPor" id="modificadoPor" value="Nadie" type="hidden" class="step__input">


                    </div>
                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--back" data-to_step="4" data-step="5">Regresar</button>
                        <button class="step__button" type="submit" name="input">Guardar</button>
                    </div>
                </div> -->