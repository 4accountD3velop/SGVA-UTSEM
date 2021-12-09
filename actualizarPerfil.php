<?php 
  session_start();



      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }   
 $nombreUsuario = $_SESSION['nombreCompletoUsuario'];
 $idSesionUsuario = $_SESSION['idUsuario'];

 ?>
<?php require'plantilla.php'; 
require("conexion.php");

?> 
<body class="hold-transition sidebar-mini">

 <div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
         
   <?php

      $id1 = intval($_GET['idUsuario']);
      $sql = mysqli_query($mysqli, "SELECT * FROM permisos WHERE idPermiso='$id1'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: mostrar_usuarios.php");
      }else{

        $row = mysqli_fetch_assoc($sql);

    $usuarioRol =  $row['usuarioRol'] ;
    $usuarioC =   $row['usuarioC'] ;
    $usuarioR =   $row['usuarioR'] ;
    $usuarioU =  $row['usuarioU'] ;
    $usuarioD =   $row['usuarioD'] ;
    $documentoRol = $row['documentosRol'] ;
    $documentoC =  $row['documentoC'] ;
    $documentoA =  $row['documentoA'] ;
    $documentoR =   $row['documentoR'] ;
    $documentoU =   $row['documentoU'] ;
    $documentoD =   $row['documentoD'] ;
    $visitasRol =  $row['visitasRol'] ;
    $visitasC =   $row['visitasC'] ;
    $visitasA =   $row['visitasA'] ;
    $visitasR =   $row['visitasR'] ;
    $visitasU =   $row['visitasU'] ;
    $visitasD =   $row['visitasD'] ;
    $alumnoRol =   $row['alumnoRol'] ;
    $alumnoC =   $row['alumnoC'] ;
    $alumnoV =  $row['alumnoV'] ;
    $alumnoR =   $row['alumnoR'] ;
    $alumnoU =   $row['alumnoU'] ;
    $alumnoD =  $row['alumnoD'] ;
    $actividadRol =   $row['actividadRol'] ;
    $actividadC =   $row['actividadC'] ;
    $actividadA =  $row['actividadA'] ;
    $actividadR =   $row['actividadR'] ;
    $actividadU =   $row['actividadU'] ;
    $actividadD =  $row['actividadD'] ;
    $permisoRol =  $row['permisoRol'] ;
    $permisoC =   $row['permisoC'] ;
    $permisoR =   $row['permisoR'] ;
    $permisoU =  $row['permisoU'] ;
    $permisoD =   $row['permisoD'] ;

      } 
      ?>   

     <!--name="form1" id="form1" class="form-horizontal row-fluid" action="update_usuarios.php" method="POST"
-->
           <form name="form1" id="form1" class="form-horizontal row-fluid" action="update_perfil.php" method="POST">
             <div class="card-body">
              <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Permisos usuario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <label for="nombreCompleto">Nombre perfil</label>
                    <input type="text" class="form-control" name="nombreCompleto" id="nombreCompleto" value="<?php echo $row['nombrePermiso']; ?>"required>
                  </div>

                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        
                        <div class="custom-control custom-checkbox">
                           <input class="custom-control-input" type="checkbox" name="usuarioRol" id="usuarioRol" <?php if ($usuarioRol=="Activo") echo "checked"; ?> value="Activo" >
                          <label for="usuarioRol" class="custom-control-label">Usuarios</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="usuarioC" id="usuarioC" <?php if ($usuarioC=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioC" class="custom-control-label">Crear usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="usuarioR" id="usuarioR" <?php if ($usuarioR=="Activo") echo "checked"; ?>  value="Activo">

                          <label for="usuarioR" class="custom-control-label">Ver usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="usuarioU" id="usuarioU" <?php if ($usuarioU=="Activo") echo "checked"; ?>  value="Activo">

                          <label for="usuarioU" class="custom-control-label">Modificar usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="usuarioD" id="usuarioD" <?php if ($usuarioD=="Activo") echo "checked"; ?>  value="Activo">

                          <label for="usuarioD" class="custom-control-label">Eliminar usuarios</label>
                        </div> 

                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="permisoRol" id="permisoRol" <?php if ($permisoRol=="Activo") echo "checked"; ?> value="Activo">

                          <label for="permisoRol" class="custom-control-label">Perfil usuario</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="permisoC" id="permisoC" <?php if ($permisoC=="Activo") echo "checked"; ?> value="Activo">

                          <label for="permisoC" class="custom-control-label">Crear perfil</label>
                        </div>

                        <!-- <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="permisoA" id="permisoA" <?php if ($permisoA=="Activo") echo "checked"; ?> value="Activo">

                          <label for="permisoA" class="custom-control-label">Archivar</label>
                        </div> -->

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="permisoR" id="permisoR" <?php if ($permisoR=="Activo") echo "checked"; ?> value="Activo">

                          <label for="permisoR" class="custom-control-label">Ver perfil</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="permisoU" id="permisoU" <?php if ($permisoU=="Activo") echo "checked"; ?> value="Activo">

                          <label for="permisoU" class="custom-control-label">Modificar perfil</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="permisoD" id="permisoD" <?php if ($permisoD=="Activo") echo "checked"; ?> value="Activo">

                          <label for="permisoD" class="custom-control-label">Eliminar perfil</label>
                        </div>

                      </div>
                    </div>
                  </div><hr>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <!-- checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="visitasRol" id="visitasRol" <?php if ($visitasRol=="Activo") echo "checked"; ?> value="Activo">

                          <label for="visitasRol" class="custom-control-label">Formularios visitas académicas</label>
                        </div><hr>
                      
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="visitasC" id="visitasC" <?php if ($visitasC=="Activo") echo "checked"; ?> value="Activo">

                          <label for="visitasC" class="custom-control-label">Crear visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="visitasA" id="visitasA" <?php if ($visitasA=="Activo") echo "checked"; ?> value="Activo">

                          <label for="visitasA" class="custom-control-label">Archivar visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="visitasR" id="visitasR" <?php if ($visitasR=="Activo") echo "checked"; ?> value="Activo">

                          <label for="visitasR" class="custom-control-label">Ver visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="visitasU" id="visitasU" <?php if ($visitasU=="Activo") echo "checked"; ?> value="Activo">
                          
                          <label for="visitasU" class="custom-control-label">Modificar visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="visitasD" id="visitasD" <?php if ($visitasD=="Activo") echo "checked"; ?> value="Activo">

                          <label for="visitasD" class="custom-control-label">Eliminar visitas académicas</label>
                        </div>

                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="alumnoRol" id="alumnoRol" <?php if ($alumnoRol=="Activo") echo "checked"; ?> value="Activo">

                          <label for="alumnoRol" class="custom-control-label">Alumnos</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="alumnoC" id="alumnoC" <?php if ($alumnoC=="Activo") echo "checked"; ?> value="Activo">

                          <label for="alumnoC" class="custom-control-label">Agregar alumnos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="alumnoV" id="alumnoV" <?php if ($alumnoV=="Activo") echo "checked"; ?> value="Activo">

                          <label for="alumnoV" class="custom-control-label">Validar documentacion alumno</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="alumnoR" id="alumnoR" <?php if ($alumnoR=="Activo") echo "checked"; ?> value="Activo">

                          <label for="alumnoR" class="custom-control-label">Ver alumnos activos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="alumnoU" id="alumnoU" <?php if ($alumnoU=="Activo") echo "checked"; ?> value="Activo">

                          <label for="alumnoU" class="custom-control-label">Modificar alumnos activos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="alumnoD" id="alumnoD" <?php if ($alumnoD=="Activo") echo "checked"; ?> value="Activo">

                          <label for="alumnoD" class="custom-control-label">Eliminar alumnos</label>
                        </div>

                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group"><!-- checkbox -->
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="actividadRol" id="actividadRol" <?php if ($actividadRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="actividadRol" class="custom-control-label">Actividades</label>
                        </div><hr>
                      
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="actividadC" id="actividadC" <?php if ($actividadC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="actividadC" class="custom-control-label">Crear actividades</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="actividadA" id="actividadA" <?php if ($actividadA=="Activo") echo "checked"; ?> value="Activo">
                          <label for="actividadA" class="custom-control-label">Archivar actividad</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="actividadR" id="actividadR" <?php if ($actividadR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="actividadR" class="custom-control-label">Ver actividades</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="actividadU" id="actividadU" <?php if ($actividadU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="actividadU" class="custom-control-label">Modificar actividades</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="actividadD" id="actividadD" <?php if ($actividadD=="Activo") echo "checked"; ?> value="Activo">
                          <label for="actividadD" class="custom-control-label">Eliminar actividades</label>
                        </div> 

                        
                      </div>
                    </div>
                    <div class="col-sm-6">
               
                      <div class="form-group">

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="documentoRol" id="documentoRol" <?php if ($documentoRol=="Activo") echo "checked"; ?> value="Activo">

                          <label for="documentoRol" class="custom-control-label">Documentos a solicitar</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="documentoC" id="documentoC" <?php if ($documentoC=="Activo") echo "checked"; ?> value="Activo">

                          <label for="documentoC" class="custom-control-label">Crear documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="documentoA" id="documentoA" <?php if ($documentoA=="Activo") echo "checked"; ?> value="Activo">

                          <label for="documentoA" class="custom-control-label">Archivar</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="documentoR" id="documentoR" <?php if ($documentoR=="Activo") echo "checked"; ?> value="Activo">

                          <label for="documentoR" class="custom-control-label">Ver documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="documentoU" id="documentoU" <?php if ($documentoU=="Activo") echo "checked"; ?> value="Activo">

                          <label for="documentoU" class="custom-control-label">Modificar documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="documentoD" id="documentoD" <?php if ($documentoD=="Activo") echo "checked"; ?> value="Activo">

                          <label for="documentoD" class="custom-control-label">Eliminar documentos</label>
                        </div>

                      </div>
                    </div> 

              </div>
                    <div class="form-group">
                    <label for="estatusPermiso">Estatus usuario</label>
                        <select class="form-control" name="estatusPermiso" id="estatusPermiso" required>
                            <option value="<?php echo $row['estatusPermiso']; ?>"><?php echo $row['estatusPermiso']; ?></option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option> 
                        </select>
                   </div>
                   <div class="form-group">
                      <label for="comentarios">Comentarios</label>
                        <textarea name="comentarios" id="comentarios" rows="4" cols="80"  class="form-control"  ><?php echo $row['comentarios']; ?></textarea>
                    </div> 
               </div>

                  
                  

                  <input type="text" class="form-control" name="rol" id="rol" value="Docente" hidden>
                  <?php
                  $fecha_actual= date("Y-m-d");
                   ?>
                  <input type="date" class="form-control" name="fechaCreacion" id="fechaCreacion" value="<?php echo $row['fechaCreacion']; ?>"  hidden>
                  <input type="text" class="form-control" name="idUsuario" id="idUsuario" value="<?php echo $id1 ?>" hidden>
                  <input type="text" class="form-control" name="modificadoPor" id="modificadoPor" value="<?php echo $nombreUsuario ?>" hidden>
                   <input type="text" class="form-control" name="creadoPor" id="creadoPor" value="<?php echo $row['creadoPor']; ?>" hidden>
                   <input type="date" class="form-control" name="fechaModificacion" id="fechaModificacion" value="<?php echo $fecha_actual?>" hidden>



                
                </div>
                <!-- /.card-body onclick="ActualizarUsuario();" -->

               <div class="card-footer">    
                  <div class="control-group">
                      <div class="controls">
                        <button type="submit" name="input" id="input" class="btn btn-sm btn-success" >Actualizar</button>
                            <a href="mostrar_usuarios.php" class="btn btn-sm btn-warning">Cancelar</a>
                            <a href="mostrar_usuarios.php" class="btn btn-sm btn-danger">Salir</a>
                     </div>
                  </div>
                  </div>
                </div>
                </div>
              </form>
            </div>
        </div>
      </div>

 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
</section>
  
  </div>
</div>


<script>
  function verpassword(){
      var tipo = document.getElementById("contraseña");
      if(tipo.type == "password")
    {
          tipo.type = "text";
      }
    else
    {
          tipo.type = "password";
      }
  }
  </script>