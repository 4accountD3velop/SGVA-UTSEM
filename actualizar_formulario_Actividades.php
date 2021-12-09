<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }
require 'conexion.php';
require 'plantilla.php';
?>
<body class="hold-transition sidebar-mini">

 <div class="wrapper">



  <div class="content-wrapper">
   
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tabla usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
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
                <h3 class="card-title">Crear actividades</h3>
              </div>
              <!-- /.card-header -->
<?php 
require 'conexion.php';

 if(isset($_POST['input'])){

    //$id = $_POST['id'];
    $idActividad = $_POST['idActividad'];
    $nombreActividad = $_POST['nombreActividad'];
    $estatusActividad = $_POST['estatusActividad'];
    $fechaCreacionA = $_POST['fechaCreacionA'];
    $idUsuario= $_POST['idUsuario'];
  
 $update = mysqli_query($mysqli, "UPDATE actividades SET 
          
          
          nombreActividad ='$nombreActividad',
          fechaCreacionA ='$fechaCreacionA', 
          estatusActividad ='$estatusActividad', 
          idUsuario ='$idUsuario'
          

       WHERE idActividad='$idActividad'");


   
   if($update){
                            
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, la actividad ha sido actualizada correctamente. </div>';
    
    
                             echo "<script>location.href='actualizar_formulario_Actividades.php?idActividad=$_POST[idActividad]'</script>"; 
          
                        
                            
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, la actividad no ha sido actualizada correctamente.s.</div>';

                            echo "<script>location.href='actualizar_formulario_Actividades.php?idActividad=$_POST[idActividad]'</script>"; 


                        }
    

}
    ?>

    <?php

      $id = $_GET['idActividad'];
      $sql = mysqli_query($mysqli, "SELECT * FROM actividades WHERE idActividad='$id'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: mostrar_Actividades.php");
      }else{

        $row = mysqli_fetch_assoc($sql);


      }
      ?>  

                  

              <!-- form start -->
              <form name="form1" id="form1" class="form-horizontal row-fluid" action="actualizar_formulario_Actividades.php" method="POST" >

                <div class="card-body">
                  <div class="form-group">
                    <label for="nombreActividad">Nombre de la actividad</label>
                    <input type="text" class="form-control" name="nombreActividad" id="nombreActividad" value="<?php echo $row['nombreActividad']?>"required>
                  </div>
                 
                  <input type="text" class="form-control" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']?>" hidden>

                  <input type="text" class="form-control" name="idActividad" id="idActividad" value="<?php echo $row['idActividad']?>" hidden>

                  <input type="text" class="form-control" name="estatusActividad" id="estatusActividad" value="Activo" hidden>
                  <?php
                  $fecha_actual= date("Y-m-d");
                   ?>
                  <input type="date" class="form-control" name="fechaCreacionA" id="fechaCreacionDocumento" value="<?php echo $fecha_actual?>" hidden>


                
                </div>
                <!-- /.card-body -->

               <div class="card-footer">
                      
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-success">Actualizar</button>
                                               <a href="mostrar_Actividades.php" class="btn btn-sm btn-danger">Cancelar</a>
                    
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
  
<!--  </div>
</div>
 ./wrapper -->


