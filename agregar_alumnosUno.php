<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }   require"conexion.php";
  

 ?>
<!--<?php
//require 'head.php';
?>

<body class="hold-transition sidebar-mini">

 <div class="wrapper">

 
   Main Sidebar Container -->


 <!-- Content Header (Page header)
  <div class="content-wrapper">
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2"> -->
         <!--   <div class="col-sm-6">
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
    </section> -->

    <!-- Main content 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          left column 
          <div class="col-md-12">
           
            <div  class="card card-success" >
              <div class="card-header">
                <h3 class="card-title">Definir documentos por tipo de visita Acadámica</h3>
              </div>


    $matricula = $_GET['matricula'];
    $nombre= $_GET['nombre'];
    $apaterno = $_GET['apaterno'];
    $amaterno = $_GET['amaterno'];
    $sexo = $_GET['sexo'];
    $fecha_nacimiento = $_GET['fecha_nacimiento'];     
    $edad = $_GET['edad'];    
    $des_carrera = $_GET['desc_carrera'];
    $mail = $_GET['mail'];
    $clave_carrera = $_GET['clave_carrera'];
             /.card-header -->
 <?php

    require("conexion.php");


 
    $matricula1 = $_POST['Matricula'];
    $nombre1= $_POST['Nombre'];
    $apaterno1 = $_POST['Apaterno'];
    $amaterno1 = $_POST['Amaterno'];
    $sexo1 = $_POST['Sexo'];   
    $des_carrera1 = $_POST['Desc_carera'];
    $desc_grado = $_POST['Desc_grado'];
    $mail1 = $_POST['Email'];
    $Estatus="Activo";
     $idVisita=;
                                     

    $insertar =$mysqli->query("INSERT INTO alumnos VALUES('','$matricula1','$nombre1','$apaterno1','$amaterno1','$sexo1','$des_carrera1','$desc_grado', '$mail1', '$Estatus', '$idVisita')");
   
   if($insertar){
                           echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente. </div>';


                            
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                            

                        }
    

?>  
<!--
    
              form start 

                                           
               
              <form name="form1" id="form1" class="form-horizontal row-fluid" action="formulario_documentos.php" method="POST" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Matricula</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $matricula  ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="fechaInicio">Nombre alumno</label>
                    <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $nombre  ?>" placeholder="Nombre del documento a solicitar" required>
                  </div>

                  <div class="form-group">
                    <label for="fechaInicio">Apellido paterno</label>
                    <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $apaterno  ?>" placeholder="Nombre del documento a solicitar" required>
                  </div>
                  <div class="form-group">
                    <label for="fechaInicio">Apellido materno</label>
                    <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $amaterno  ?>" placeholder="Nombre del documento a solicitar" required>
                  </div>
                  <div class="form-group">
                    <label for="fechaInicio">Sexo</label>
                    <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $sexo  ?>" placeholder="Nombre del documento a solicitar" required>
                  </div>

                  <div class="form-group">
                    <label for="tipoVisita">Estatus alumno</label>
                        <select class="form-control" name="tipoVisita" id="" required>
                            <option readonly  style="display:none;"></option>
                            <option value="Actividad">Actividad</option>
                            <option value="Local">Visita local</option>
                            <option value="Externa">Visita externa</option>
                        </select>
                  </div>
                    
    
                  <div class="form-group">
                    <label for="fechaInicio">Carrera</label>
                    <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $fecha_nacimiento ?>" placeholder="Nombre del documento a solicitar" required>
                  </div>

                  <div class="form-group">
                    <label for="fechaInicio">EF</label>
                    <input type="text" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $edad  ?>" placeholder="Nombre del documento a solicitar" required>
                  </div>

                  <div class="form-group">
                    <label for="fechaInicio">Correo</label>
                    <input type="mail" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $mail  ?>" placeholder="Nombre del documento a solicitar" required>
                  </div>

                   <div class="form-group">
                    <label for="fechaInicio">Clave carrera</label>
                    <input type="mail" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $clave_carrera ?>" placeholder="Nombre del documento a solicitar" required>
                  </div>

                  <div class="form-group">
                      <label   for="idUsuario">Visita a asignar</label>
                        <select class="form-control" style="text-transform:uppercase;" name="idVisita" id="lugar" required>
                                    <?php
                                         $insertar =$mysqli->query("SELECT idVisita, lugar FROM visitas");
                                        while($personal = mysqli_fetch_array($insertar))
                                        {
                                    ?>
                                    <option value="0" style="display:none;"><label>Seleccionar</label></option>
                                    <option value="<?php echo $personal['idVisita']?>"><?php echo $personal['lugar']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                    </div>

                  <input type="text" class="form-control" name="estatusDocumento" id="estatusDocumento" value="Pendiente" hidden>
                  <?php
                  $fecha_actual= date("Y-m-d");
                  
                   ?>
                  <input type="date" class="form-control" name="fechaCreacionDocumento" id="fechaCreacionDocumento" value="<?php echo $fecha_actual?>" hidden>


                
                </div>
    

               <div class="card-footer">
                      
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-success">Crear</button>
                        <a href="agregar_alumnos.php" class="btn btn-sm btn-danger">Cancelar</a>
                    
                    </div>
              </form>
            </div>
   

        </div>

      </div>
   </div>
</section>
 

  <aside class="control-sidebar control-sidebar-dark">

  </aside>

  
  </div>
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

?>
-->