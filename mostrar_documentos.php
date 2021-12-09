<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");
  }  
 ?>
<?php

require 'conexion.php';
?>

<body class="hold-transition sidebar-mini">

 <div class="wrapper">

<?php require'plantilla.php'; ?>  

  <div class="content-wrapper">
   
  <!--  <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
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



    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div id="respuestaPHP4"></div>
            <div id="respuestaPHP5"></div>

              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li  class="nav-item"><a class="nav-link success active" href="#activity" data-toggle="tab">Activos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Archivados</a></li>
               <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>-->
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Indice</th>
                    <th>Nombre documento</th>
                    <th>Tipo de Visita</th>
                    <th>Estatus visita</th>
                    <th>Elaborado por</th>
                    <th>Fecha</th>
                    
                    
    <?php  if(isset($_SESSION['documentoU']) && $_SESSION['documentoU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['documentoA']) && $_SESSION['documentoA'] == "Activo"){

   
         echo '<th>Archivar</th>';
       }

     if(isset($_SESSION['documentoD']) && $_SESSION['documentoD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
          $sql="SELECT * from usuarios U INNER JOIN actividades A ON U.idUsuario = A.idUsuario INNER JOIN documentos D ON A.idActividad = D.idActividad WHERE estatusDocumento = 'Activo'";
          $result=mysqli_query($mysqli,$sql);

          while($mostrar=mysqli_fetch_array($result)){

        ?>

        <tr>
          <td><?php echo $mostrar['idDocumento']?></td>
          <td><?php echo $mostrar['nombreDocumento']?></td>
          <td><?php echo $mostrar['nombreActividad']?></td>
          <td><?php echo $mostrar['estatusDocumento']?></td>
          <td><?php echo $mostrar['nombreCompletoUsuario']?></td>
          <td><?php echo $mostrar['fechaCreacionDocumento']?></td>
 <?php  if(isset($_SESSION['documentoU']) && $_SESSION['documentoU'] == "Activo"){   

         
       echo" <td><button  class='btn btn-sm btn-primary'><a href='actualizar_documentos.php?idDocumento=$mostrar[idDocumento]' data-toggle='tooltip' title='Eliminar'><img width='50px' height='50px' src='plantilla/utsem.png'></a></button></td>";



}
   if(isset($_SESSION['documentoA']) && $_SESSION['documentoA'] == "Activo"){

          ?>   
       <td><button type="button" class="btn btn-sm btn-success" onclick="ArchivarDoc('<?php echo $mostrar['idDocumento'] ?>');" ><img width='50px' height='50px' src='plantilla/archivar.png'></button></td> 
    
    <?php }  

  if(isset($_SESSION['documentoD']) && $_SESSION['documentoD'] == "Activo"){

   
           echo "<td><button class='btn btn-sm btn-danger'><a href='mostrar_documentos.php?action=delete&idDocumento=$mostrar[idDocumento]' data-toggle='tooltip' title='Eliminar'><img src='plantilla/borra.jpg' width='50px' height='50px'></a></button>
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
                    <th>Indice</th>
                    <th>Nombre documento</th>
                    <th>Tipo de Visita</th>
                    <th>Estatus visita</th>
                    <th>Elaborado por</th>
                    <th>Fecha</th>
   <?php  if(isset($_SESSION['documentoU']) && $_SESSION['documentoU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['documentoA']) && $_SESSION['documentoA'] == "Activo"){

   
         echo '<th>Archivar</th>';
       }

     if(isset($_SESSION['documentoD']) && $_SESSION['documentoD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                  </tr>
                  </tfoot>
                </table>
              
            </div>
            
                  <div class="tab-pane" id="timeline">
                   
                 <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Indice</th>
                    <th>Nombre documento</th>
                    <th>Tipo de Visita</th>
                    <th>Estatus visita</th>
                    <th>Elaborado por</th>
                    <th>Fecha</th>
                    
    <?php  if(isset($_SESSION['documentoU']) && $_SESSION['documentoU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['documentoA']) && $_SESSION['documentoA'] == "Activo"){

   
         echo '<th>Desarchivar</th>';
       }

     if(isset($_SESSION['documentoD']) && $_SESSION['documentoD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
          $sql="SELECT D.idDocumento, D.nombreDocumento, A.nombreActividad, D.estatusDocumento, U.nombreCompletoUsuario, D.fechaCreacionDocumento from usuarios U INNER JOIN actividades A ON U.idUsuario = A.idUsuario INNER JOIN documentos D ON A.idActividad = D.idActividad WHERE estatusDocumento = 'Archivado'; ";
          $result=mysqli_query($mysqli,$sql);

          while($mostrar=mysqli_fetch_array($result)){

        ?>

        <tr>
          <td><?php echo $mostrar['idDocumento']?></td>
          <td><?php echo $mostrar['nombreDocumento']?></td>
          <td><?php echo $mostrar['nombreActividad']?></td>
          <td><?php echo $mostrar['estatusDocumento']?></td>
          <td><?php echo $mostrar['nombreCompletoUsuario']?></td>
          <td><?php echo $mostrar['fechaCreacionDocumento']?></td>
 <?php  if(isset($_SESSION['documentoU']) && $_SESSION['documentoU'] == "Activo"){        
         echo" <td><button  class='btn btn-sm btn-primary'><a href='actualizar_documentos.php?idDocumento=$mostrar[idDocumento]' data-toggle='tooltip' title='Eliminar'><img width='50px' height='50px' src='plantilla/utsem.png'></a></button></td>";
}
   if(isset($_SESSION['documentoA']) && $_SESSION['documentoA'] == "Activo"){

          ?>   
       <td><button type="button" class="btn btn-sm btn-success" onclick="DesarchivarDoc('<?php echo $mostrar['idDocumento'] ?>');" ><img width='50px' height='50px' src='plantilla/archivar.png'></button></td> 
    
    <?php }  

  if(isset($_SESSION['documentoD']) && $_SESSION['documentoD'] == "Activo"){

   
           echo "<td><button class='btn btn-sm btn-danger'><a href='mostrar_documentos.php?action=delete&idDocumento=$mostrar[idDocumento]' data-toggle='tooltip' title='Eliminar'><img src='plantilla/borra.jpg' width='50px' height='50px'></a></button>
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
                    <th>Indice</th>
                    <th>Nombre documento</th>
                    <th>Tipo de Visita</th>
                    <th>Estatus visita</th>
                    <th>Elaborado por</th>
                    <th>Fecha</th>
   <?php  if(isset($_SESSION['documentoU']) && $_SESSION['documentoU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['documentoA']) && $_SESSION['documentoA'] == "Activo"){

   
         echo '<th>Desarchivar</th>';
       }

     if(isset($_SESSION['documentoD']) && $_SESSION['documentoD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                  </tr>
                  </tfoot>
                </table>
              
            </div>
                  <div class="tab-pane" id="settings"></div>
                 
                </div>
               
              </div>
         <!--   </div>
           
          </div>

       Main content -->
             
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
  
  
</div>

 
          


<!--  hasta aqui -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  }); 
</script> 

<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    
  }); 
</script>
<?php
require 'footer.php';
?>