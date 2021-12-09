<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }  
  

 ?>
<?php

require 'conexion.php';
?>

<?php require'plantilla.php'; ?> 


<body class="hold-transition sidebar-mini">

 <div class="wrapper">
 
  <!-- Main Sidebar Container -->
     <?php
        if(isset($_GET['action']) == 'delete'){
        $id_delete = intval($_GET['id_cuenta']);
        $query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE idUsuario ='$id_delete'");
        if(mysqli_num_rows($query) == 0){
          echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($mysqli, "DELETE FROM usuarios WHERE idUsuario ='$id_delete'");
          if($delete){
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
      ?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Usuarios registrados</h3>
              </div>
              <br>

 <!-- 
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
           
                      Agregar usuario

                   </button>
             /.card-header -->
           <!-- <div class="card-body"> -->
              
              <div class="table-responsive">

                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
        
                    <th>Nombre completo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Perfil</th>

 <?php  if(isset($_SESSION['usuarioU']) && $_SESSION['usuarioU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }


     if(isset($_SESSION['usuarioD']) && $_SESSION['usuarioD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                  </tr>
                  </thead>
                   <tbody>
        <?php 
          $sql="SELECT * from permisos INNER JOIN  usuarios ON usuarios.idPermiso = permisos.idpermiso";
          $result=mysqli_query($mysqli,$sql);

          while($mostrar=mysqli_fetch_array($result)){

        ?>

        <tr>
         
          <td><?php echo $mostrar['nombreCompletoUsuario']?></td>
          <td><?php echo $mostrar['telefono']?></td>
          <td><?php echo $mostrar['correo']?></td>
          <td><?php echo $mostrar['usuario']?></td>
          <td><?php echo $mostrar['contrasena']?></td>
          <td><?php echo $mostrar['rol']?></td>
          <td><?php echo $mostrar['nombrePermiso']?></td>
         <?php  if(isset($_SESSION['usuarioU']) && $_SESSION['usuarioU'] == "Activo"){        
         echo" <td><button  class='btn btn-sm btn-primary'><a href='actualizar_usuario.php?idUsuario=$mostrar[idUsuario]' data-toggle='tooltip' title='Actualizar'><img width='50px' height='50px' src='plantilla/utsem.png'></a></button>";
} 

       if(isset($_SESSION['usuarioD']) && $_SESSION['usuarioD'] == "Activo"){
 
   
           echo "<td><button class='btn btn-sm btn-danger'><a href='mostrar_usuarios.php?action=delete&id_cuenta=$mostrar[idUsuario]' data-toggle='tooltip' title='Eliminar'><img src='plantilla/borra.jpg' width='50px' height='50px'></a></button>
                    </td>";
              


        }
    ?>  

        </tr>
      
        <?php 
          }
        ?>
      </tbody>         
                  <tfoot>
                  <tr>
                    
                    <th>Nombre completo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Perfil</th>
 <?php  if(isset($_SESSION['usuarioU']) && $_SESSION['usuarioU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }


     if(isset($_SESSION['usuarioD']) && $_SESSION['usuarioD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                  </tr>
                  </tfoot>
                </table>
              </div>

              <!-- </div> -->

            </div>
           
          </div>
         
        </div>
        </div>
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
</div>
<!-- ./wrapper -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": true,
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