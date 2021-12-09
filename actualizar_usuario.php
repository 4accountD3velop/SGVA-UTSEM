<?php 
  session_start();
  $nombreUsuario = $_SESSION['nombreCompletoUsuario'];

      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }   require"conexion.php";
  

 ?>
<body class="hold-transition sidebar-mini">

 <div class="wrapper">

<?php require'plantilla.php'; 
require("conexion.php");

?>  
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
                <h3 class="card-title">Crear rol usuario</h3>
              </div>








   <?php

      $id1 = intval($_GET['idUsuario']);
      $sql = mysqli_query($mysqli, "SELECT * FROM usuarios U INNER JOIN permisos P ON U.idPermiso = P.idPermiso WHERE idUsuario='$id1'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: mostrar_usuarios.php");
      }else{

        $row = mysqli_fetch_assoc($sql);

    // $usuarioRol =  $row['usuarioRol'] ;
    // $usuarioC =   $row['usuarioC'] ;
    // $usuarioR =   $row['usuarioR'] ;
    // $usuarioU =  $row['usuarioU'] ;
    // $usuarioD =   $row['usuarioD'] ;
    // $documentoRol = $row['documentosRol'] ;
    // $documentoC =  $row['documentoC'] ;
    // $documentoA =  $row['documentoA'] ;
    // $documentoR =   $row['documentoR'] ;
    // $documentoU =   $row['documentoU'] ;
    // $documentoD =   $row['documentoD'] ;
    // $visitasRol =  $row['visitasRol'] ;
    // $visitasC =   $row['visitasC'] ;
    // $visitasA =   $row['visitasA'] ;
    // $visitasR =   $row['visitasR'] ;
    // $visitasU =   $row['visitasU'] ;
    // $visitasD =   $row['visitasD'] ;
    // $alumnoRol =   $row['alumnoRol'] ;
    // $alumnoC =   $row['alumnoC'] ;
    // $alumnoV =  $row['alumnoV'] ;
    // $alumnoR =   $row['alumnoR'] ;
    // $alumnoU =   $row['alumnoU'] ;
    // $alumnoD =  $row['alumnoD'] ;
    // $actividadRol =   $row['actividadRol'] ;
    // $actividadC =   $row['actividadC'] ;
    // $actividadA =  $row['actividadA'] ;
    // $actividadR =   $row['actividadR'] ;
    // $actividadU =   $row['actividadU'] ;
    // $actividadD =  $row['actividadD'] ;

      } 
      ?>   

     <!--name="form1" id="form1" class="form-horizontal row-fluid" action="update_usuarios.php" method="POST"
-->
           <form name="form1" id="form1" class="form-horizontal row-fluid" action="update_usuarios.php" method="POST">
                <div class="card-body">
               
                  <div class="form-group">
                    <label for="nombreCompleto">Nombre completo Usuario</label>
                    <input type="text" class="form-control" name="nombreCompleto" id="nombreCompleto" value="<?php echo $row['nombreCompletoUsuario']; ?>"required>
                  </div>
                  <div class="control-group">
                      <label class="control-label" for="telefono">Número telefónico</label>
                      <div class="controls">
                        <input  name="telefono" id="telefono" class="form-control span8 tip" type="number"  value="<?php echo $row['telefono']; ?>" required />
                      </div>
                    </div>
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="mail" class="form-control" name="correo" id="correo" value="<?php echo $row['correo']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $row['usuario']; ?>"required>
                  </div>
                   
                  
                 <div class="form-group">
                    <label for="contrasena">Contraseña</label> 
                      <div class="input-group mb-3">
                           <input type="password" class="form-control" name="contrasena" id="contrasena"  value="<?php echo $row['contrasena']; ?>" required>
                            <div type="button" class="input-group-append" onclick="verpassword()">
                             <span class="input-group-text"><i class="fas fa-eye"></i></span>
                             </div>
                     </div>
                 </div>
               
                   <div class="form-group">
                    <label for="estatusUsuario">Estatus usuario</label>
                        <select class="form-control" name="estatusUsuario" id="estatusUsuario" required>
                            <option value="<?php echo $row['estatusUsuario']; ?>"><?php echo $row['estatusUsuario']; ?></option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option> 
                        </select>
                   </div>
                     
                  <div class="form-group">
                      <label   for="idPermiso">Perfil usuario</label>
                      
                        <select class="form-control" name="idPermiso" id="idPermiso" required>
                                    
                                     <option value="<?php echo $row['idPermiso'];?>"><?php echo $row['nombrePermiso'];?></option>
                                     
                                     <?php
                                         $insertar =$mysqli->query("SELECT idPermiso, nombrePermiso FROM permisos");
                                        while($personal = mysqli_fetch_array($insertar))
                                        {
                                    ?>
                                   
                                    <option value="<?php echo $personal['idPermiso']?>"><?php echo $personal['nombrePermiso']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                     
                    </div>

                    
                    <div class="form-group">
                      <label for="comentarios">Comentarios</label>
                        <textarea name="comentarios" id="comentarios" rows="4" cols="80"  class="form-control"  required><?php echo $row['comentarios']; ?></textarea>
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