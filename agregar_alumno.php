<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }   
  

 ?>
<?php
require"conexion.php";

?>

<body class="hold-transition sidebar-mini">

 <div class="wrapper">

<?php require'plantilla.php'; ?>  
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
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Usuarios </h3>
                
              </div>
 <!-- 
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
           
                      Agregar usuario

                   </button>
             /.card-header -->

         <div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Índice</th>
                    <th>Nombre completo</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acción</th>
                  </tr>
                  </thead>
                  <tbody> 
<?php





      $nivel = 6 ;
      $cuatri = "SEP-DIC 21";
      $carrera = "IEV";

   $client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     

    $params = array(

        'liNivel' => $nivel,
        'lsCuatrimestre' => $cuatri,
      'lsCarrera' => $carrera
    );

    $result = $client->call('MatriculaXCarrera',$params);
   
    if ($result) {

        $data = $result['MatriculaXCarreraResult']['diffgram'];
          
   var_dump($data);

        foreach ($data as $key => $value) {
                                           
          foreach ($value as $key => $value1) {

             foreach ($value1 as $key => $value2) {

 ?>
        <tr>
          
          <td><?php echo $value2['apaterno']?></td>
          <td><?php echo $value2['amaterno']?></td>
          <td><?php echo $value2['nombre']?></td>
          <td><?php echo $value2['fecha_nacimiento']?></td>
          <td><?php echo $value2['edad']?></td>
          <td><?php echo $value2['sexo']?></td>
          <td><?php echo $value2['curp']?></td>
          <td><?php echo $value2['calle']?></td>
          <td><?php echo $value2['estado']?></td>
          <td><center>
                     <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario"><a href="editar.php?Id_estatus= <?php echo $datos['Id_estatus']?>"  data-toggle="tooltip" title="Actualizar pago" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i></a>
                     <a href="index.php?action=delete&id_cuenta=<?php echo $datos['Id_estatus'];?>"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i></a>
             </center></td>

        </tr>
<?php 
          }  
        }
      }    
    }
  ?>     
                 </tbody> 
                 <tfoot>
                  <tr>
                    <th>Índice</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acción</th>
                  </tr>
                  </tfoot>
                </table>
                 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- // BOTON MODAL AGREGAR USUARIO --> 


    <div class="modal  fullscreen-modal fade" id="modalAgregarUsuario" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">


<!--  // CABECERA MODAL -->  
        <form role="form" method="post"  enctype="multipart/form-data">  

      
          <div class="modal-header" style="background: #3c8dbc; color: white;">

            <h4 class="modal-title">Agregar usuario</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <!--  //Modal body  -->
          <div class="modal-body">
           
              <div class="box-body">

       <!--     //nombre -->
                <div class="form-group">
                  
                   <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                     

                   </div>

                </div>

              <!--  //next -->
                 <div class="form-group">
                  
                   <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-lg"  name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
                     

                   </div>

                </div>
             
                 <div class="form-group">
                  
                   <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                    <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                     

                   </div>

                </div>
                
                 <div class="form-group">
                  
                   <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                   <select  class="form-control input-lg" name="nuevoPerfil">
                     
                        <option value="">Selecionar perfil</option>

                        <option value="Administrador">Administrador</option>

                        <option value="Especial">Especial</option>

                        <option value="Vendedor">Vendedor</option>

                   </select>
                     

                   </div>

                </div>
                
                <!--<div class="form-group">

                  <div class="panel">Subir foto</div>

                  <input type="file"  class="nuevaFoto" name="nuevaFoto">

                  <p class="help-block">Peso maximo dela foto 200 MB</p>

                  <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" >
                  
                   
                </div>-->
             
              </div>

          </div>

         <!-- //Modal footer -->
          <div class="modal-footer">

            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary pull-right">Agregar usuario</button>

          </div>

          </form>

        </div>

      </div>

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