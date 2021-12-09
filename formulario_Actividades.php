<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }   
  


 require 'head.php';
?>

<?php require'plantilla.php'; ?> 

<body class="hold-transition sidebar-mini">

 <div class="wrapper">

  <div class="content-wrapper">

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
                <h3 class="card-title">Crear actividades</h3>
              </div>
              <!-- /.card-header -->
                <div id="res10"></div>

              <!-- form start name="form1" id="form1" class="form-horizontal row-fluid" action="formulario_Actividades.php" method="POST" -->
              <form  >
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombreActividad">Nombre de la actividad</label>
                    <input type="text" class="form-control" name="nombreActividad" id="nombreActividad" required>
                  </div>
                 
                  <input type="text" class="form-control" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario'];?>" hidden>
               
                  <input type="text" class="form-control" name="estatusActividad" id="estatusActividad" value="Activo" hidden>
                  <?php
                  $fecha_actual= date("Y-m-d");
                   ?>
                  <input type="date" class="form-control" name="fechaCreacionA" id="fechaCreacionA" value="<?php echo $fecha_actual?>" hidden>


                
                </div>
                <!-- /.card-body -->

               <div class="card-footer">
                      
                        <button type="submit" name="input" id="input" onclick="crear_actividad();" class="btn btn-sm btn-success">Crear</button>
                                               <a href="inicio.php" class="btn btn-sm btn-danger">Cancelar</a>
                                               <a href="mostrar_Actividades.php" class="btn btn-sm btn-warning">Mostrar actividades</a>

                                               


                    
                    </div>
              </form>
           <!--  <script src="js/funcionLogin.js"></script> -->
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
  
  </div>
</div>
<!-- ./wrapper -->


<?php
require 'footer.php';
?>