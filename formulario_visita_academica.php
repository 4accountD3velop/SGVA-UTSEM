<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }  
  

 ?>
<?php require'plantilla.php'; ?> 

<body class="hold-transition sidebar-mini">

 <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         <!--   <div class="col-sm-6">
            <h1>Tabla usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>-->
        </div>
      </div> 
    </section> 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div  class="card card-success" >
              <div class="card-header">
                <h3 class="card-title">Formulario visita Acadámica</h3>
              </div>
              <!-- /.card-header -->
              <?php

    require("conexion.php");

    if(isset($_POST['input'])){



    //$id = $_POST['id'];
           $tipoVisita = $_POST["tipoVisita"];
          $areaResponsable = $_POST["areaResponsable"];
          $objetivoVisita = $_POST["objetivoVisita"];
          $fechaVisita = $_POST["fechaVisita"]; 
          $docenteAcargo= $_POST["docenteAcargo"];
          $Materia = $_POST["Materia"];
          $lugar = $_POST["lugar"];
          $descripcionActividad = $_POST["descripcionActividad"];
          $carrera =$_POST["carrera"];
          $grupo =$_POST["grupo"];
          $cuatrimestre =$_POST["cuatrimestre"];
          $nombreChofer =$_POST["nombreChofer"];
          $sexoChofer =$_POST["sexoChofer"];
          $numTelefonoC =$_POST["numTelefonoC"];
          $licenciaChofer =$_POST["licenciaChofer"];
          $seguroVehiculoC =$_POST["seguroVehiculoC"];
          $tipoVehiculoC =$_POST["tipoVehiculoC"];
          $alumnos =$_POST["alumnos"];
          $estatusVisita =$_POST["estatusVisita"];
          $imagenes =$_POST["imagenes"];
          $fechaCreacion =$_POST["fechaCreacion"];
          $creadoPor=$_POST["creadoPor"];
          $fechaModificacion =$_POST["fechaModificacion"];
          $modificadoPor =$_POST["modificadoPor"];
          $comentarios=$_POST["comentarios"];
   
   
      //$ruta = "imagenesVisitas/anonymous.png";
    foreach ($_FILES['imagenes']['name'] as $key => $name){

         if(isset($_FILES["imagenes"]["tmp_name"][$key])){

            list($ancho, $alto) = getimagesize($_FILES["imagenes"]["tmp_name"][$key]);


            $nuevoAncho = 500;
            $nuevoAlto = 500;

            /*========================================
            =            crear directorio            =
            ========================================*/


            $directorio = "imagenesVisitas/";

          // mkdir($directorio, 0755);

            if($_FILES["imagenes"]["type"][$key] == "image/jpeg") {
              
          
              $aleatorio = time() . "_" . $name;

              $ruta = "imagenesVisitas/".$aleatorio.".jpg";

              $origen = imagecreatefromjpeg($_FILES["imagenes"]["tmp_name"][$key]);

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagejpeg($destino, $ruta);
            }


            if ($_FILES["imagenes"]["type"][$key] == "image/png") {
              

              $aleatorio = time() . "_" . $name;


              $ruta = "imagenesVisitas/".$aleatorio.".png";

              $origen = imagecreatefrompng($_FILES["imagenes"]["tmp_name"][$key]);

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagepng($destino, $ruta);
            }
          }




  
  
  
    
 //$newFilename = time() . "_" . $name;
 //   move_uploaded_file($_FILES['imagenes']['tmp_name'][$key], 'imagenes/' . $newFilename);
  //  $location = 'imagenes/' . $newFilename;
    
  //  mysqli_query($conn,"insert into photo (location) values ('$location')");
  
//  header('location:index.php');


     }                                          
      

                            $insertar =$mysqli->query("INSERT INTO visitas VALUES('',
                                               '$tipoVisita',
                                               '$areaResponsable',
                                               '$objetivoVisita',
                                               '$fechaVisita', 
                                               '$docenteAcargo',
                                               '$Materia',
                                               '$lugar',
                                               '$descripcionActividad',
                                                '$carrera',
                                                '$grupo',
                                                '$cuatrimestre',
                                               '$nombreChofer',
                                               '$sexoChofer',
                                               '$numTelefonoC',
                                                '$licenciaChofer',
                                                '$seguroVehiculoC',
                                                '$tipoVehiculoC',
                                                '$alumnos',
                                                '$estatusVisita',
                                                '$imagenes',
                                                '$fechaCreacion',
                                                '$creadoPor',
                                                '$fechaModificacion',
                                                '$modificadoPor',
                                                '$comentarios')");
   
                 if($insertar)
                 {
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente. </div>';
                            header("location:formulario_visita_academica.php");


                            
                 }
                 else
                 {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                            

                 }
            


    
    

} 
    ?>
              <!-- form start -->
              <form name="form1" id="form1" class="form-horizontal row-fluid" action="formulario_visita_academica.php" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="tipoVisita">Tipo de actividad o visita académica</label>
                        <select class="form-control" name="tipoVisita" id="" required>
                            <option  reardonly style="display:none;"></option>
                           <option value="Actividad">Actividad</option>
                            <option value="Local">Visita local</option>
                            <option value="Externa">Visita externa</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="objetivoVisita">Objetivo de la actividad o visita</label>
                    <input type="text" class="form-control" name="objetivoVisita" id="objetivoVisita" placeholder="Objetivo de la actividad o visita" required>
                  </div>
                  <div class="form-group">
                    <label for="fechaVisita">Fecha en la que se llevó la actividad o visita</label>
                    <input type="date" class="form-control" name="fechaVisita" id="fechaVisita" placeholder="Fecha en la que se llevó la actividad o visita" required>
                  </div>

                  




<!--  <div style="height:50px;"></div>
  <div style="margin:auto; padding:auto; width:80%;">
    <hr>    
    <div style="height:20px;"></div>
     <div class="form-group">
                    <label for="imagenes[]">Imagenes</label>
                    <input type="file" accept=".png" class="form-control" name="imagenes[]" id="imagenes[]" placeholder="Imagenes"  multiple required>
                  </div>
  </div>
  <div style="margin:auto; padding:auto; width:80%;">
    <h2>Salida:</h2>
    <?php
      $query=mysqli_query($mysqli,"SELECT * FROM visitas");
      while($row=mysqli_fetch_array($query)){
        ?>
        <img src="<?php echo $row['imagenes']; ?>" height="150px;" width="150px;">
        <?php
      }
    
    ?>
  </div> -->



                  <div class="form-group">
                    <label for="lugar">Lugar</label>
                    <input type="text" class="form-control" name="lugar" id="lugar" placeholder="Lugar" required>
                  </div>
                  <div class="form-group">
                    <label for="Materia">Materia</label>
                    <input type="text" class="form-control" name="Materia" id="Materia" placeholder="Materia" required>
                  </div>
                   <div class="form-group">
                    <label for="cuatrimestre">Cuatrimestre</label>
                    <input type="text" class="form-control" name="cuatrimestre" id="cuatrimestre" placeholder="Cuatrimestre" required>
                  </div>
                  <div class="form-group">
                    <label for="grupo">Grupo</label>
                    <input type="text" class="form-control" name="grupo" id="grupo" placeholder="Grupo" required>
                  </div>
                  <div class="form-group">
                    <label for="carrera">Carrera</label>
                    <input type="text" class="form-control" name="carrera" id="carrera" placeholder="Carrera" required>
                  </div>
                  <div class="form-group">
                    <label for="chofer">Chofer</label>
                    <input type="text" class="form-control" name="chofer" id="chofer" placeholder="Chofer" required>
                  </div>
                  <div class="form-group">
                    <label for="alumnos">Alumnos</label>
                    <input type="text" class="form-control" name="alumnos" id="alumnos" placeholder="Alumnos" required>
                  </div>
                  <div class="form-group">
                    <label for="estatusVisita">Estatus visita académica</label>
                    <input type="text" class="form-control" name="estatusVisita" id="estatusVisita" placeholder="Estatus visita académica" required>
                  </div>
                   <div class="form-group">
                    <label for="docenteAcargo">Docente a Cargo</label>
                    <input type="text" class="form-control" name="docenteAcargo" id="docenteAcargo" placeholder="Docente a Cargo" required>
                  </div>
                  <div class="form-group">
                    <label for="descripcionActividad">Descripción de las actividades</label>
                    <input type="text" class="form-control" name="descripcionActividad" id="descripcionActividad" placeholder="Descripción de las actividades" required>
                  </div>
                  <input type="text" class="form-control" name="estatusDocumento" id="estatusDocumento" value="Pendiente" hidden>
                  <?php
                  $fecha_actual= date("Y-m-d");
                   ?>
                  <input type="date" class="form-control" name="fechaCreacionFormulario" id="fechaCreacionFormulario" value="<?php echo $fecha_actual?>" hidden>
                  <!--<input type="date" class="form-control" name="Usuario" id="Usuario" value="<?php echo $usuario['']?>" hidden> -->


                
                </div>
                <!-- /.card-body -->

               <div class="card-footer">
                      
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-success">Crear</button>
                                               <a href="inicio.php" class="btn btn-sm btn-danger">Cancelar</a>
                    
                    </div>
              </form>
            </div>
            <!-- /.card -->
    <!-- /.content -->
        </div>
  <!-- /.content-wrapper -->
      </div>
   </div>
</section>
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- // BOTON MODAL AGREGAR USUARIO --> 


</div>
<!-- ./wrapper -->
</div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); 
</script> 

<?php
require 'footer.php';
?>