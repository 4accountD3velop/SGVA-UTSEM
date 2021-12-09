<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Gestion de Visitas Academicas</title>
<?php  require 'head.php';?>
 
</head>
<body style="background-image: url('plantilla/back.png'); width: 2048px height:728px " class="hold-transition login-page" >
<!--style="background-image: url('plantilla/back.png');"-->
<div class="login-box">
  <div class="login-logo">
    <img width="357" height="115" src="plantilla/logo-blanco-bloque.png"  class="img-fluid" alt="Responsive image">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <p style="color: white;" class="login-box-msg">Iniciciar sesión</p>
      <div class="text-center small" id="respuesta"></div>
      <form >
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo Electrónico o Matrícula">
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color: white;" class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="contraseña" id="contrasena" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color: white;" class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control"name="tipo_usuario" id="tipo_usuario" required>
             <option readonly  style="display:none;"><label>Tipo usuario</label></option>
            <option value="Docente">Docente</option>
            <option value="Alumno">Alumno</option>   
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color: white;" class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="ub1">
       <input  type="checkbox" onclick="verpassword()">&nbsp;<label style="color: white;">Mostrar contraseña
        </label></div><br>
        <div class="row">
          <!-- /.col -->
          <div class="col-1">
            <button type="button" value="login" onclick="Login()" class="btn btn-light btn-">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
      
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a style="color: white;" href="http://mi-escuelamx.com:8888/utsem/recuperacion_contrasena.asp">¿Olvidaste tu contraseña?</a>
      </p>
    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script>
  function verpassword(){
      var tipo = document.getElementById("contrasena");
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


</body>
</html>
