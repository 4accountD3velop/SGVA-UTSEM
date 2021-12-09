 <?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }   require"conexion.php";
  

 ?>


<?php require'plantilla.php'; ?> 
<body class="hold-transition sidebar-mini">

 <div class="wrapper">
 
  <!-- Main Sidebar Container -->


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
                <h3 class="card-title">Actualizar documentos por tipo de visita Acadámica</h3>
              </div>
              <!-- /.card-header -->
          
    <?php


  /*  if(isset($_POST['input'])){

    //$id = $_POST['id'];
    $nombreDocumento = $_POST['nombreDocumento'];
    $tipoVisita = $_POST['tipoVisita'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $estatusDocumento = $_POST['estatusDocumento'];
    $fechaCreacionDocumento = $_POST['fechaCreacionDocumento'];
    $idUsuario= $_SESSION['idUsuario'];
    //$telefono = $_POST['telefono'];
    //$correo = $_POST['correo'];
    //$contraseña = $_POST['contraseña'];
    //$estatus_persona = $_POST['estatus_persona'];

    $insertar =$mysqli->query("INSERT INTO documentos VALUES('','$nombreDocumento','$tipoVisita','$fechaInicio','$fechaFin','$estatusDocumento', '$fechaCreacionDocumento', '$idUsuario')");


$id_equipo = $_POST['id_equipo'];
$nombre_equipo = $_POST['nombre_equipo'];
$numero_serie = $_POST['numero_serie'];
$fecha = $_POST['fecha'];


$modificar = $mysqli->query("UPDATE equipo SET 
  
  id_equipo='$id_equipo',
  nombre_equipo='$nombre_equipo', 
  numero_serie='$numero_serie',
  fecha='$fecha'
  where id_equipo='$id_equipo'");

echo '<script>alert("Laboratorio modificado con éxito")</script>';
echo "<script>location.href='registropc.php'</script>";


   
   if($insertar){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente. </div>';


                            
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                            

                        }
    

}
    ?>
*/
      
       $id = intval($_GET['idDocumento']);
      $sql = mysqli_query($mysqli, "SELECT * FROM documentos WHERE idDocumento='$id'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: mostrar_documentos.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      ?>
              <!-- form start -->
              <form name="form1" id="form1" class="form-horizontal row-fluid" action="formulario_documentos.php" method="POST" >
                <div class="card-body">
                  <div class="col-md-12" id="respuestaPHP2">
                <h1></h1>
            </div>
                  <div class="form-group">
                    <label for="nombreDocumento">Nombre del documento a solicitar</label>
                    <input type="text" class="form-control" name="nombreDocumento" id="nombreDocumento" value="<?php echo $row['nombreDocumento']; ?>" required>
                  </div>
                   <div class="form-group">
                      <label   for="tipoVisita">Tipo de actividad académica a realizar</label>
                        <select class="form-control" name="tipoVisita" id="tipoVisita" required>
                          
                                    <?php
                                         $insertar =$mysqli->query("SELECT idActividad, nombreActividad FROM Actividades");
                                        while($personal = mysqli_fetch_array($insertar))
                                        {
                                    ?>

                                    <option value="<?php echo $personal['idActividad']?>"><?php echo $personal['nombreActividad']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                    </div>
                  

                  <input type="text" class="form-control"  name="estatusDocumento" id="estatusDocumento" value="Pendiente" hidden>
                  <?php
                  $fecha_actual= date("Y-m-d");
                  
                   ?>
                  <input type="date" class="form-control" name="fechaCreacionDocumento" id="fechaCreacionDocumento" value="<?php echo $fecha_actual?>" hidden>


                
                </div>
                <!-- /.card-body -->

               <div class="card-footer">
                      
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-success">Crear</button>
                                               <a href="mostrar_documentos.php" class="btn btn-sm btn-danger">Cancelar</a>
                    
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
  
  </div>
</div>
<!-- ./wrapper -->
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