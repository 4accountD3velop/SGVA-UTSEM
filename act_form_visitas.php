<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }   
  

 ?>

<?php
 require 'plantilla.php';
 require 'conexion.php';

?>
<link rel="stylesheet" href="formulario/css/app.css">


<body class="hold-transition sidebar-mini">

 

 <div class="wrapper">

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
    <div class="root">
   


<?php

      $id = $_GET['idVisita'];
      $sql = mysqli_query($mysqli, "SELECT * FROM visitas V INNER JOIN actividades A ON V.idActividad = A.idActividad WHERE idVisita='$id'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: mostrar_visitas.php");
      }else{

        $row = mysqli_fetch_assoc($sql);


      }
      ?>  

        <form action="update_form_act.php " method="POST" class="form-register" enctype="multipart/form-data">
             <div class="form-register__header">
               
                <ul class="progressbar">
                    <li class="progressbar__option active">Datos generales</li>
                    <li class="progressbar__option">Detalles</li>
                    <li class="progressbar__option">Alumnos </li>
                    <li class="progressbar__option">Documentos</li>
                   
                </ul>
            </div>

            <div class="form-register__body">
                <div class="step active" id="step-1">
                    <div class="step__header">
                        <h2 class="step__title">Datos generales</h2>
                    </div>
                    <div class="step__body">
                        <label>Seleccionar actividad</label>
                        <select class="step__input" name="tipoVisita" id="tipoVisita"  placeholder="Seleccionar actividad" required>
                             <option readonly  value="<?php echo $row['idActividad']?>"><?php echo $row['nombreActividad']?></option>      
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
                        <label>Área responsable</label>
                        <input name="areaResponsable" id="areaResponsable" type="text" placeholder="Área responsable" class="step__input" value="<?php echo $row['areaResponsable']?>"required>
                        <label>Objetivo de la actividad o visita</label>
                        <textarea name="objetivoVisita" id="objetivoVisita" rows="4" cols="80" placeholder="Objetivo de la actividad o visita" class="step__input" required><?php echo $row['objetivoVisita']?></textarea>
                        <label>Fecha en la que se llevara acabo la actividad</label>
                        <input name="fechaVisita" id="fechaVisita" onfocus="(this.type='date')" placeholder="Fecha en la que se llevara acabo la actividad" class="step__input" required value="<?php echo $row['fechaVisita']?>">
                        
                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1">Siguiente</button>
                    </div>
                </div>

                <div class="step" id="step-2">
                    <div class="step__header">
                        <h2 class="step__title">Detalles visita académica</h2>
                    </div>
                    <div class="step__body">
                        <label>Docente a cargo</label>
                        <input name="docenteAcargo" id="docenteAcargo" type="text" placeholder="Docente a cargo" class="step__input"value="<?php echo $row['docenteAcargo']?>">
                        <label>Materia</label>
                        <input name="Materia" id="Materia" type="text" placeholder="Materia" class="step__input"value="<?php echo $row['Materia']?>">
                        <label>Lugar donde se llevara acábo la actividad o visita</label>
                        <input name="lugar" id="lugar" type="text" placeholder="Lugar donde se llevara acábo la actividad o visita" class="step__input"value="<?php echo $row['lugar']?>">
                        <label>Descripción de actividades</label>
                        <textarea name="descripcionActividad" id="descripcionActividad" rows="4" cols="80" placeholder="Descripción de actividades" class="step__input"><?php echo $row['descripcionActividad']?></textarea>
                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                        <button type="button" class="step__button step__button--next" data-to_step="3" data-step="2">Siguiente</button>
                    </div>
                </div>

                <div class="step" id="step-3">
                    <div class="step__header">
                        <h2 class="step__title">Alumnos</h2>
                    </div>
                    <div class="step__body">

                        <?php

    require_once('./lib/nusoap.php');                    
class Login {

 function peticionAlServidor(){

  
$client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     
 try {
    $result = $client->call('Carreras');
    $data = $result['CarrerasResult']['diffgram'];



    //$mbd = new PDO($result, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e) {
      echo 'Error de conexión: ' . $e->getMessage();
      echo "algo salio mal en los servidores";
      exit;
    }

return $data;
}

public function getIformacionCarreras(){

  $datos = self::peticionAlServidor();

  if ($datos) {
    $arrayDeDatos = $datos['NewDataSet']['Carreras'];

    foreach ($arrayDeDatos as $key => $value) {
    }
  }else{


  }

  return $arrayDeDatos;
}

}



$login = new Login();
$infologin = $login ->getIformacionCarreras();
array_walk_recursive($infologin, function(&$item, $key) {
 if(!mb_detect_encoding($item,'utf-8', true)) {
   $item = utf8_encode($item);

   
 }

});

?>
       
                    <label>Carrera</label>
                    <select name="carrera" id="carrera" class="step__input" required>
                       <option readonly value="<?php echo $row['carrera']?>"><?php echo $row['carrera']?></option>
 <?php     
                           foreach ($infologin as $key => $value) {    
                       
                            
                            echo "<option value='".$value['descripcion']."'>".$value['descripcion']."</option>";
 }
 ?>
                       </select>
                       <label>Grupo</label> 
                        <input name="grupo" id="grupo" type="text" placeholder="Grupo" class="step__input"value="<?php echo $row['grupo']?>">
                        <label>Cutrimestre</label>
                        <input name="cuatrimestre" id="cuatrimestre" type="text" placeholder="Cuatrimestre" class="step__input"value="<?php echo $row['cuatrimestre']?>">

                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>
                        <button type="button" class="step__button step__button--next" data-to_step="4" data-step="3">Siguiente</button>
                    </div>
                </div>

                <div class="step" id="step-4">
                    <div class="step__header">
                        <h2 class="step__title">Documentos y datos Chofer</small></h2>
                    </div>
                    <div class="step__body">
                        <label>Nombre Completo chófer</label>
                        <input name="nombreChofer" id="nombreChofer" type="text" placeholder="Nombre Completo" class="step__input"value="<?php echo $row['nombreChofer']?>">
                        <label>Sexo</label>
                        <select name="sexoChofer" id="sexoChofer" class="step__input" required>
                            <option  reardonly value="<?php echo $row['sexoChofer']?>"><?php echo $row['sexoChofer']?></option>
                           <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <label>Numero de télefono</label>
                        <input name="numTelefonoC" id="numTelefonoC" type="tel" placeholder="Numero de télefono" class="step__input"value="<?php echo $row['numTelefonoC']?>">

                        <label>Licencia de conducir</label>
                        <input class="step__input" readonly type="text" name="licenciaChofer1" id="licenciaChofer1" value="<?php echo $row['licenciaChofer']?>">
                        <input name="licenciaChofer" id="licenciaChofer" type="file"  class="step__input" >

                        <label>Seguro vigente</label>
                        <input class="step__input" readonly type="text" name="seguroVehiculoC1" id="seguroVehiculoC1" value="<?php echo $row['seguroVehiculoC']?>">
                        <input name="seguroVehiculoC" id="seguroVehiculoC" type="file" class="step__input" >

                        <label>Tarjerta de circulación</label>
                         <input class="step__input" readonly name="tipoVehiculoC1" id="tipoVehiculoC1" type="text" class="step__input" required value="<?php echo $row['tipoVehiculoC']?>">
                        <input name="tipoVehiculoC" id="tipoVehiculoC" type="file" class="step__input">

                        <label>Estatus visita</label>
                        <select name="estatusVisita" id="estatusVisita" class="step__input" required>
                            <option selected reardonly style="display:none;"><?php echo $row['estatusVisita']?></option>
                            <option value="En proceso">En proceso</option>
                            <option value="Realizadas">Realizadas</option>
                            <option value="No realizadas">No realizadas</option>
                            <option value="Archivadas">Archivadas</option>
                        </select>
                         <textarea name="comentarios" id="comentarios" rows="4" cols="80" placeholder="Comentarios" class="step__input"><?php echo $row['comentarios']?></textarea>
                     <input name="alumnos" id="alumnos"  type="hidden" class="step__input">
                     <?php $idUsuario = $_SESSION["idUsuario"]; 
                     $fecha_actual= date("Y-m-d");
                     ?>
                     
                     <input name="fechaCreacion" id="fechaCreacion" value="<?php echo $row['fechaCreacion'];?>" type="hidden" class="step__input">
                     <input name="creadoPor" id="creadoPor" value="<?php echo $row['creadoPor'];?>" type="hidden" class="step__input">
                     <input name="fechaModificacion" id="fechaModificacion" value="<?php echo $fecha_actual;?>" type="hidden" class="step__input">
                     <input name="modificadoPor" id="modificadoPor" value="<?php echo $_SESSION['idUsuario'];?>" type="hidden" class="step__input">
                     <input name="idVisita" id="idVisita" value="<?php echo $id;?>" type="hidden" class="step__input">

                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--back" data-to_step="3" data-step="4">Regresar</button>
                        <button class="step__button" type="submit" name="update">Guardar</button>
                    </div>
                </div>
                 <script type="text/javascript" src="js/funcionLogin.js"></script>

            </div>
           
        </form>
    </div>
    <script type="text/javascript">
   //  var liga - "http://10.15.27.10:8080/UBICACION/";

    $(function(){
         $("#carrera").on('change', function(){
             var carrera = $("#carrera").val();
             

             var actividad =  document.getElementById('tipoVisita').value;
             console.log(actividad);
             let Datos = "Carrera="+carrera+"&tipoVisita="+actividad;
             var url = "obtenerAlumnos.php";

             $.ajax({
                 type: 'POST',
                 url:url,
                 data: Datos,
                 success:function(data){

                  // $("testado option").remove();
                  // $("#estado").append(Datos);

                  $('#respuesta').html(data);
             } 
        });
        return false;
    });

});
</script>
   <script src="formulario/js/app.js"></script>
 
     </div>
    </div>
   </div>
  </section>
 </div>  
</div>
</body>
</html>
