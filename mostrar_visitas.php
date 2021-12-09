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
        $id_delete = intval($_GET['idVisita']);
        $query = mysqli_query($mysqli, "SELECT * FROM visitas WHERE idVisita='$id_delete'");
        if(mysqli_num_rows($query) == 0){
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($mysqli, "DELETE FROM visitas WHERE idVisita='$id_delete'");
          if($delete){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, las visitas han sido eliminadas correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar las visitas.</div>';
          }
        }
      }
      ?> 

      <div class="container-fluid">
        <div class="row">
             <div class="col-md-12">
            <div class="card">
            <div id="respuestaPHP9"></div>
            <div id="respuestaPHP10"></div>
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
                 <table id="example1" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>



                    <th>Indice</th>
                    <th>Actividad o visita</th>
                    <th>Área responsable</th>
                    <th>Objetivo de la actividad o visita</th>
                    <th>Fecha de la actividad o visita</th>
                    <th>Docente a cargo</th>
                    <th>Materia</th>
                    <th>Lugar</th>
                    <th>Descripción actividad</th>
                    <th>Carrera</th>
                    <th>Grupo</th>
                    <th>Cuatrimestre</th>
                    <th>Nombre chófer</th>
                    <th>Sexo</th>
                    <th>Número tel.</th>
                    <th>Licencia Conducir</th>
                    <th>Seguro Vigente</th>
                    <th>Tarjeta de Circulación</th>
                    <th>Alumnos</th>
                    <th>Estatus visita</th>
                    <th>Imagen #1</th>
                    <th>Imagen #2</th>
                    <th>Imagen #3</th>
                    <th>Fecha creación</th>
                    <th>Creado por</th>
                    <th>Fecha Modificación</th>
                    <th>Modificado por</th>
                    <th>Comentarios</th>
                    
                    
  <?php  if(isset($_SESSION['visitasR']) && $_SESSION['visitasR'] == "Activo"){

   
           echo '<th>Descargar PDF</th>';
    } 



  if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){

   
           echo '<th>Anexar evidencia</th>';
    }     

          if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['visitasA']) && $_SESSION['visitasA'] == "Activo"){

   
         echo '<th>Desarchivar</th>';
       }

     if(isset($_SESSION['visitasD']) && $_SESSION['visitasD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                    
                  </tr>
                  </thead>
                  <tbody>
        <?php 
          $sql="SELECT * from visitas V INNER JOIN actividades A ON V.idActividad = A.idActividad WHERE estatusVisita ='En proceso' OR estatusVisita ='Realizadas' OR estatusVisita ='No realizadas'  ";
          $result=mysqli_query($mysqli,$sql);

          while($mostrar=mysqli_fetch_array($result)){

        ?>
        
        <tr>
          <td><?php echo $mostrar['idVisita']?></td>
          <td><?php echo $mostrar['nombreActividad']?></td>
          <td><?php echo $mostrar['areaResponsable']?></td>
          <td><?php echo $mostrar['objetivoVisita']?></td>
          <td><?php echo $mostrar['fechaVisita']?></td>    
          <td><?php echo $mostrar['docenteAcargo']?></td>
          <td><?php echo $mostrar['Materia']?></td>
          <td><?php echo $mostrar['lugar']?></td>
          <td><?php echo $mostrar['descripcionActividad']?></td>
          <td><?php echo $mostrar['carrera']?></td>    
          <td><?php echo $mostrar['grupo']?></td>
          <td><?php echo $mostrar['cuatrimestre']?></td>
          <td><?php echo $mostrar['nombreChofer']?></td>
          <td><?php echo $mostrar['sexoChofer']?></td>    
          <td><?php echo $mostrar['numTelefonoC']?></td>
          <td><a href="<?php echo $mostrar['licenciaChofer']?>" target="_blank"><?php echo $mostrar['licenciaChofer']?></a></td>
          <td><a href="<?php echo $mostrar['seguroVehiculoC']?>" target="_blank"><?php echo $mostrar['seguroVehiculoC']?></a></td>
          <td><a href="<?php echo $mostrar['tipoVehiculoC']?>" target="_blank"><?php echo $mostrar['tipoVehiculoC']?></a></td>
          <td><?php echo $mostrar['alumnos']?></td>    
          <td><?php echo $mostrar['estatusVisita']?></td>
          <td><a href="<?php echo $mostrar['imagenes']?>" target="_blank"><?php echo $mostrar['imagenes']?></a></td>
          <td><a href="<?php echo $mostrar['imagenesDos']?>" target="_blank"><?php echo $mostrar['imagenesDos']?></a></td>
          <td><a href="<?php echo $mostrar['imagenesTres']?>" target="_blank"><?php echo $mostrar['imagenesTres']?></a></td>
          <td><?php echo $mostrar['fechaCreacion']?></td>
          <td><?php echo $mostrar['creadoPor']?></td>
          <td><?php echo $mostrar['fechaModificacion']?></td>
          <td><?php echo $mostrar['modificadoPor']?></td>
          <td><?php echo $mostrar['comentarios']?></td>


 <?php  if(isset($_SESSION['visitasR']) && $_SESSION['visitasR'] == "Activo"){    
         echo "<td><button class='btn btn-sm btn-danger'><a href='pdf/pdfVisita.php?idVisita=$mostrar[idVisita]' data-toggle='tooltip' title='Actualizar'><img width='50px' height='50px' src='plantilla/pdfnew.png'></a></button>
                    </td>";
}



 if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){    

         echo "<td><button class='btn btn-sm btn-warning'><a href='subir_evidencia.php?idVisita=$mostrar[idVisita]' data-toggle='tooltip' title='Actualizar'><img width='50px' height='50px' src='plantilla/uplooad.PNG'></a></button>
                    </td>";
}

   if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){ 

   echo" <td><button  class='btn btn-sm btn-primary'><a href='act_form_visitas.php?idVisita=$mostrar[idVisita]' data-toggle='tooltip' title='ACTUALIZTA'><img width='50px' height='50px' src='plantilla/utsem.png'></a></button></td>";
} 
   if(isset($_SESSION['visitasA']) && $_SESSION['visitasA'] == "Activo"){

          ?>   
       <td><button type="button"  class="btn btn-sm btn-success" onclick="ArchivarVst('<?php echo $mostrar['idVisita'] ?>');" ><img width='50px' height='50px' src='plantilla/archivar.png'></button></td> 
    
    <?php }  

  if(isset($_SESSION['visitasD']) && $_SESSION['visitasD'] == "Activo"){

   
           echo "<td><button class='btn btn-sm btn-danger'><a href='mostrar_visitas.php?action=delete&idVisita=$mostrar[idVisita]' data-toggle='tooltip' title='Eliminar'><img src='plantilla/borra.jpg' width='50px' height='50px'></a></button>
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
                    <th>Actividad o visita</th>
                    <th>Área responsable</th>
                    <th>Objetivo de la actividad o visita</th>
                    <th>Fecha de la actividad o visita</th>
                    <th>Docente a cargo</th>
                    <th>Materia</th>
                    <th>Lugar</th>
                    <th>Descripción actividad</th>
                    <th>Carrera</th>
                    <th>Grupo</th>
                    <th>Cuatrimestre</th>
                    <th>Nombre chófer</th>
                    <th>Sexo</th>
                    <th>Número tel.</th>
                    <th>Licencia Conducir</th>
                    <th>Seguro Vigente</th>
                    <th>Tarjeta de Circulación</th>
                    <th>Alumnos</th>
                    <th>Estatus visita</th>
                    <th>Imagen #1</th>
                    <th>Imagen #2</th>
                    <th>Imagen #3</th>
                    <th>Fecha creación</th>
                    <th>Creado por</th>
                    <th>Fecha Modificación</th>
                    <th>Modificado por</th>
                    <th>Comentarios</th>
                    
  <?php  if(isset($_SESSION['visitasR']) && $_SESSION['visitasR'] == "Activo"){

   
           echo '<th>Descargar PDF</th>';
    } 

     if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){

   
           echo '<th>Anexar evidencia</th>';
    }                
          if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['visitasA']) && $_SESSION['visitasA'] == "Activo"){

   
         echo '<th>Desarchivar</th>';
       }

     if(isset($_SESSION['visitasD']) && $_SESSION['visitasD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                  </tr>
                  </tfoot>
                </table>
                </div>
            

                  <div class="tab-pane" id="timeline">
             
                <div class="table-responsive">

                 <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Indice</th>
                    <th>Actividad o visita</th>
                    <th>Área responsable</th>
                    <th>Objetivo de la actividad o visita</th>
                    <th>Fecha de la actividad o visita</th>
                    <th>Docente a cargo</th>
                    <th>Materia</th>
                    <th>Lugar</th>
                    <th>Descripción actividad</th>
                    <th>Carrera</th>
                    <th>Grupo</th>
                    <th>Cuatrimestre</th>
                    <th>Nombre chófer</th>
                    <th>Sexo</th>
                    <th>Número tel.</th>
                    <th>Licencia Conducir</th>
                    <th>Seguro Vigente</th>
                    <th>Tarjeta de Circulación</th>
                    <th>Alumnos</th>
                    <th>Estatus visita</th>
                    <th>Imagen #1</th>
                    <th>Imagen #2</th>
                    <th>Imagen #3</th>
                    <th>Fecha creación</th>
                    <th>Creado por</th>
                    <th>Fecha Modificación</th>
                    <th>Modificado por</th>
                    <th>Comentarios</th>
                    
    <?php  if(isset($_SESSION['visitasR']) && $_SESSION['visitasR'] == "Activo"){

   
           echo '<th>Descargar PDF</th>';
    } 

    if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){

   
           echo '<th>Anexar evidencia</th>';
    }   

          if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['visitasA']) && $_SESSION['visitasA'] == "Activo"){

   
         echo '<th>Desarchivar</th>';
       }

     if(isset($_SESSION['visitasD']) && $_SESSION['visitasD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                   

                  </tr>
                  </thead>
                  <tbody>
        <?php 
          $sql="SELECT * from visitas WHERE estatusVisita ='Archivado' ";
          $result=mysqli_query($mysqli,$sql);

          while($mostrar=mysqli_fetch_array($result)){

        ?>

        <tr>
          <td><?php echo $mostrar['idVisita']?></td>
          <td><?php echo $mostrar['tipoVisita']?></td>
          <td><?php echo $mostrar['areaResponsable']?></td>
          <td><?php echo $mostrar['objetivoVisita']?></td>
          <td><?php echo $mostrar['fechaVisita']?></td>    
          <td><?php echo $mostrar['docenteAcargo']?></td>
          <td><?php echo $mostrar['Materia']?></td>
          <td><?php echo $mostrar['lugar']?></td>
          <td><?php echo $mostrar['descripcionActividad']?></td>
          <td><?php echo $mostrar['carrera']?></td>    
          <td><?php echo $mostrar['grupo']?></td>
          <td><?php echo $mostrar['cuatrimestre']?></td>
          <td><?php echo $mostrar['nombreChofer']?></td>
          <td><?php echo $mostrar['sexoChofer']?></td>    
          <td><?php echo $mostrar['numTelefonoC']?></td>
          <td><?php echo $mostrar['licenciaChofer']?></td>
          <td><?php echo $mostrar['seguroVehiculoC']?></td>
          <td><?php echo $mostrar['tipoVehiculoC']?></td>
          <td><?php echo $mostrar['alumnos']?></td>    
          <td><?php echo $mostrar['estatusVisita']?></td>
          <td><?php echo $mostrar['imagenes']?></td>
          <td><?php echo $mostrar['fechaCreacion']?></td>
          <td><?php echo $mostrar['creadoPor']?></td>
          <td><?php echo $mostrar['fechaModificacion']?></td>
          <td><?php echo $mostrar['modificadoPor']?></td>
          <td><?php echo $mostrar['comentarios']?></td>

 <?php  if(isset($_SESSION['visitasR']) && $_SESSION['visitasR'] == "Activo"){    
         echo "<td><button class='btn btn-sm btn-danger'><a href='pdf/pdfVisita.php?idVisita=$mostrar[idVisita]' data-toggle='tooltip' title='Actualizar'><img width='50px' height='50px' src='plantilla/pdfnew.png'></a></button>
                    </td>";
}
 if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){    

         echo "<td><button class='btn btn-sm btn-warning'><a href='subir_evidencia.php?idVisita=$mostrar[idVisita]' data-toggle='tooltip' title='Actualizar'><img width='50px' height='50px' src='plantilla/uplooad.PNG'></a></button>
                    </td>";
}

 if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){    

         echo "<td><button class='btn btn-sm btn-primary'><a href='act_form_visitas.php?idVisita=$mostrar[idVisita]' data-toggle='tooltip' title='Actualizar'><img width='50px' height='50px' src='plantilla/utsem.png'></a></button>
                    </td>";
      

}
   if(isset($_SESSION['visitasA']) && $_SESSION['visitasA'] == "Activo"){

          ?>   
       <td><button type="button" class="btn btn-sm btn-success" onclick="DesarchivarVst('<?php echo $mostrar['idVisita'] ?>');" ><img width='50px' height='50px' src='plantilla/archivar.png'></button></td> 
    
    <?php }  

  if(isset($_SESSION['visitasD']) && $_SESSION['visitasD'] == "Activo"){

   
    echo "<td><button class='btn btn-sm btn-danger'><a href='mostrar_visitas.php?action=delete&idVisita=$mostrar[idVisita]' data-toggle='tooltip' title='Eliminar'><img src='plantilla/borra.jpg' width='50px' height='50px'></a></button>
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
                    <th>Actividad o visita</th>
                    <th>Área responsable</th>
                    <th>Objetivo de la actividad o visita</th>
                    <th>Fecha de la actividad o visita</th>
                    <th>Docente a cargo</th>
                    <th>Materia</th>
                    <th>Lugar</th>
                    <th>Descripción actividad</th>
                    <th>Carrera</th>
                    <th>Grupo</th>
                    <th>Cuatrimestre</th>
                    <th>Nombre chófer</th>
                    <th>Sexo</th>
                    <th>Número tel.</th>
                    <th>Licencia Conducir</th>
                    <th>Seguro Vigente</th>
                    <th>Tarjeta de Circulación</th>
                    <th>Alumnos</th>
                    <th>Estatus visita</th>
                    <th>Imagen #1</th>
                    <th>Imagen #2</th>
                    <th>Imagen #3</th>
                    <th>Fecha creación</th>
                    <th>Creado por</th>
                    <th>Fecha Modificación</th>
                    <th>Modificado por</th>
                    <th>Comentarios</th>

  <?php   if(isset($_SESSION['visitasR']) && $_SESSION['visitasR'] == "Activo"){

   
           echo '<th>Descargar PDF</th>';
    }

  if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){

   
           echo '<th>Anexar evidencia</th>';
    }                
          if(isset($_SESSION['visitasU']) && $_SESSION['visitasU'] == "Activo"){

   
           echo '<th>Actualizar</th>';
    }

   if(isset($_SESSION['visitasA']) && $_SESSION['visitasA'] == "Activo"){

   
         echo '<th>Desarchivar</th>';
       }

     if(isset($_SESSION['visitasD']) && $_SESSION['visitasD'] == "Activo"){

   
           echo '<th>Eliminar</th>';
              
         

        }
    ?>
                  </tr>
                  </tfoot>
                </table>
            
             </div>
           </div>
         </div>
        <!--hasta aqui
               <div class="tab-pane" id="settings">
                    
                  </div>-->
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  
  <aside class="control-sidebar control-sidebar-dark"></aside>

 <?php
require 'footer.php';
?>

 </section>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  }); 
</script> 

<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    
  }); 
</script> 

