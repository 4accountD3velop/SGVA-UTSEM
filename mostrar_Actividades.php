 <?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }
require 'conexion.php';
?>
<?php require'plantilla.php'; ?> 

<body class="hold-transition sidebar-mini">
 <section class="content">
  <div class="wrapper">
  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
        </div>
      </div> 
    </section>

    <?php
             if(isset($_GET['action']) == 'delete'){
        $id_delete = intval($_GET['idActividad']);
        $query = mysqli_query($mysqli, "SELECT * FROM actividades WHERE idActividad='$id_delete'");
        if(mysqli_num_rows($query) == 0){
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($mysqli, "DELETE FROM actividades WHERE idActividad='$id_delete'");
          if($delete){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, las actividades han sido eliminadas correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar las actividades.</div>';
          }
        }
      }
      ?> 

      <div class="container-fluid">
        <div class="row">
             <div class="col-md-12">
            <div class="card">
            <div id="respuestaPHP6"></div>
            <div id="respuestaPHP7"></div>
            <div id="respuest"></div>


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
                    <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Indice</th>
                    <th>Nombre Actividad</th>
                    <th>Fecha de creación</th>
                    <th>Estatus actividad</th>
                    <th>Elaborado por</th>
                    
                    
    <?php  if(isset($_SESSION['actividadU']) && $_SESSION['actividadU'] == "Activo"){

           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['actividadA']) && $_SESSION['actividadA'] == "Activo"){

   
         echo '<th>Archivar</th>';
       }

     if(isset($_SESSION['actividadD']) && $_SESSION['actividadD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
          $sql="SELECT * from actividades A INNER JOIN usuarios U ON A.idUsuario = U.idUsuario WHERE estatusActividad ='Activo' ";
          $result=mysqli_query($mysqli,$sql);

          while($mostrar=mysqli_fetch_array($result)){

        ?>

        <tr>
          <td><?php echo $mostrar['idActividad']?></td>
          <td><?php echo $mostrar['nombreActividad']?></td>
          <td><?php echo $mostrar['fechaCreacionA']?></td>
          <td><?php echo $mostrar['estatusActividad']?></td>    
          <td><?php echo $mostrar['nombreCompletoUsuario']?></td>

 <?php  if(isset($_SESSION['actividadU']) && $_SESSION['actividadU'] == "Activo"){ 

   echo" <td><button  class='btn btn-sm btn-primary'><a href='actualizar_formulario_Actividades.php?idActividad=$mostrar[idActividad]' data-toggle='tooltip' title='ACTUALIZTA'><img width='50px' height='50px' src='plantilla/utsem.png'></a></button>";
} 
   if(isset($_SESSION['actividadA']) && $_SESSION['actividadA'] == "Activo"){

          ?>   
       <td><button type="button"  class="btn btn-sm btn-success" onclick="ArchivarAct('<?php echo $mostrar['idActividad'] ?>');" ><img width='50px' height='50px' src='plantilla/archivar.png'></button></td> 
    
    <?php }  

  if(isset($_SESSION['actividadD']) && $_SESSION['actividadD'] == "Activo"){

   
           echo "<td><button class='btn btn-sm btn-danger'><a href='mostrar_actividades.php?action=delete&idActividad=$mostrar[idActividad]' data-toggle='tooltip' title='Eliminar'><img src='plantilla/borra.jpg' width='50px' height='50px'></a></button>
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
                    <th>Nombre Actividad</th>
                    <th>Fecha de creación</th>
                    <th>Estatus actividad</th>
                    <th>Elaborado por</th>
                    
   <?php  if(isset($_SESSION['actividadU']) && $_SESSION['actividadU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['actividadA']) && $_SESSION['actividadA'] == "Activo"){

   
         echo '<th>Archivar</th>';
       }

     if(isset($_SESSION['actividadD']) && $_SESSION['actividadD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                  </tr>
                  </tfoot>
                </table>
              </div>  
            </div>
            
                  <div class="tab-pane" id="timeline">
                    <div class="card-body">
                 <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Indice</th>
                    <th>Nombre Actividad</th>
                    <th>Fecha de creación</th>
                    <th>Estatus actividad</th>
                    <th>Elaborado por</th>
                    
    <?php  if(isset($_SESSION['actividadU']) && $_SESSION['actividadU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['actividadA']) && $_SESSION['actividadA'] == "Activo"){

   
         echo '<th>Desarchivar</th>';
       }

     if(isset($_SESSION['actividadD']) && $_SESSION['actividadD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
          $sql="SELECT * from actividades WHERE estatusActividad ='Archivado' ";
          $result=mysqli_query($mysqli,$sql);

          while($mostrar=mysqli_fetch_array($result)){

        ?>

        <tr>
          <td><?php echo $mostrar['idActividad']?></td>
          <td><?php echo $mostrar['nombreActividad']?></td>
          <td><?php echo $mostrar['fechaCreacionA']?></td>
          <td><?php echo $mostrar['estatusActividad']?></td>    
          <td><?php echo $mostrar['idUsuario']?></td>
 <?php  if(isset($_SESSION['actividadU']) && $_SESSION['actividadU'] == "Activo"){    

         echo "<td><button class='btn btn-sm btn-primary'><a href='actualizar_formulario_actividades.php?action=delete&idActividad=$mostrar[idActividad]' data-toggle='tooltip' title='Actualizar'><img width='50px' height='50px' src='plantilla/utsem.png'></a></button>
                    </td>";
      

}
   if(isset($_SESSION['actividadA']) && $_SESSION['actividadA'] == "Activo"){

          ?>   
       <td><button type="button" class="btn btn-sm btn-success" onclick="DesarchivarAct('<?php echo $mostrar['idActividad'] ?>');" ><img width='50px' height='50px' src='plantilla/archivar.png'></button></td> 
    
    <?php }  

  if(isset($_SESSION['actividadD']) && $_SESSION['actividadD'] == "Activo"){

   
           echo "<td><button class='btn btn-sm btn-danger'><a href='mostrar_actividades.php?action=delete&idActividad=$mostrar[idActividad]' data-toggle='tooltip' title='Eliminar'><img src='plantilla/borra.jpg' width='50px' height='50px'></a></button>
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
                    <th>Nombre Actividad</th>
                    <th>Fecha de creación</th>
                    <th>Estatus actividad</th>
                    <th>Elaborado por</th>
   <?php  if(isset($_SESSION['actividadU']) && $_SESSION['actividadU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['actividadA']) && $_SESSION['actividadA'] == "Activo"){

   
         echo '<th>Desarchivar</th>';
       }

     if(isset($_SESSION['actividadD']) && $_SESSION['actividadD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                  </tr>
                  </tfoot>
                </table>
              </div>  
             </div>
        <!--hasta aqui-->
               <div class="tab-pane" id="settings">
                    
                  </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


</div>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<?php
require 'footer.php';
?>
 </section>
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

