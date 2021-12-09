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
       <?php 

require 'conexion.php';

  if(isset($_POST['input'])){
    
          $tipoVisita = $_POST["tipoVisita"];
          $areaResponsable = $_POST["areaResponsable"];
          $objetivoVisita = $_POST["objetivoVisita"];
          $fechaVisita = $_POST["fechaVisita"]; 
          $docenteAcargo= $_POST["docenteAcargo"];
          $Materia = $_POST["Materia"];
          $lugar = $_POST["lugar"];
          $descripcionActividad = $_POST["descripcionActividad"];
          $carrera =$_POST["carrera"];
          $grupo =$_POST["grupo"];
          $cuatrimestre =$_POST["cuatrimestre"];
          $nombreChofer =$_POST["nombreChofer"];
          $sexoChofer =$_POST["sexoChofer"];
          $numTelefonoC =$_POST["numTelefonoC"];
          $estatusVisita =$_POST["estatusVisita"];
          $fechaCreacion =$_POST["fechaCreacion"];
          $creadoPor=$_POST["creadoPor"];
          $fechaModificacion =$_POST["fechaModificacion"];
          $modificadoPor =$_POST["modificadoPor"];
          $comentarios=$_POST["comentarios"];
          $alumnos = '';
      $sql1="SELECT * from alumnos WHERE desc_carrera = '$carrera' AND idActividad ='$tipoVisita'AND estatus_alumno = 'Validado' ";
         $result=mysqli_query($mysqli,$sql1);               
        
     while($mostrar=mysqli_fetch_array($result)){

         $alumnos= $alumnos.($mostrar['nombre'].' '.$mostrar['apaterno'].' '.$mostrar['apaterno']); 
          
          
     }    
    
         
          $imagenes1='';
          $imagenes2='';
          $imagenes3='';  


          if (isset($_FILES["licenciaChofer"]))
    {
        $licenciaChofer = $_FILES["licenciaChofer"];
        $nombre = $licenciaChofer["name"];
        $tipo = $licenciaChofer["type"];
        $ruta_provisional = $licenciaChofer["tmp_name"];
        $size = $licenciaChofer["size"];
        $carpeta = "imagenesVisitas/";
        
        // if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
           if ($tipo != 'application/pdf')
        {
          echo "Error, el archivo no es una .pdf"; 
        }
        else if ($size > 1024*1024)
        {
          echo "Error, el tamaño máximo permitido es un 1MB";
        }
        else
        {
            $src = $carpeta.$nombre;
           @move_uploaded_file($ruta_provisional, $src);
     }
   }

  if (isset($_FILES["seguroVehiculoC"]))
    {
        $seguroVehiculoC = $_FILES["seguroVehiculoC"];
        $nombre1 = $seguroVehiculoC["name"];
        $tipo1 = $seguroVehiculoC["type"];
        $ruta_provisional1 = $seguroVehiculoC["tmp_name"];
        $size1 = $seguroVehiculoC["size"];
        $carpeta1 = "imagenesVisitas/";
        
        // if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
          if ($tipo1 != 'application/pdf')
        {
          echo "Error, el archivo no es una .pdf"; 
        }
        else if ($size1 > 1024*1024)
        {
          echo "Error, el tamaño máximo permitido es un 1MB";
        }
        else
        {
            $src1 = $carpeta1.$nombre1;
           @move_uploaded_file($ruta_provisional1, $src1);
        }
      }

  if (isset($_FILES["tipoVehiculoC"]))
    {
        $tipoVehiculoC = $_FILES["tipoVehiculoC"];
        $nombre2 = $tipoVehiculoC["name"];
        $tipo2 = $tipoVehiculoC["type"];
        $ruta_provisional2 = $tipoVehiculoC["tmp_name"];
        $size2 = $tipoVehiculoC["size"];
        $carpeta2 = "imagenesVisitas/";
        
        // if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
          if ($tipo2 != 'application/pdf')
        {
          echo "Error, el archivo no es una .pdf"; 
        }
        else if ($size2 > 1024*1024)
        {
          echo "Error, el tamaño máximo permitido es un 1MB";
        }
        else
        {
            $src2 = $carpeta2.$nombre2;
           @move_uploaded_file($ruta_provisional2, $src2);                          
      
         }
        }
                            $insertar =$mysqli->query("INSERT INTO visitas VALUES('',
                                               '$tipoVisita',
                                               '$areaResponsable',
                                               '$objetivoVisita',
                                               '$fechaVisita', 
                                               '$docenteAcargo',
                                               '$Materia',
                                               '$lugar',
                                               '$descripcionActividad',
                                                '$carrera',
                                                '$grupo',
                                                '$cuatrimestre',
                                               '$nombreChofer',
                                               '$sexoChofer',
                                               '$numTelefonoC',
                                                '$src',
                                                '$src1',
                                                '$src2',
                                                '$alumnos',
                                                '$estatusVisita',
                                                '$imagenes1',
                                                '$imagenes2',
                                                '$imagenes3',
                                                '$fechaCreacion',
                                                '$creadoPor',
                                                '$fechaModificacion',
                                                '$modificadoPor',
                                                '$comentarios')");
   
                 if($insertar)
                 {
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente. </div>';
                            //header("location:formulario_visita_academica.php");


                            
                 }
                 else
                 {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                 }

                  }


?>

          <!-- left column -->
          <div class="col-md-12">
        <div class="root">

      



     <!-- action="form_visitas.php" -->
        <form  id="visita" method="POST" class="form-register" enctype="multipart/form-data">
             <div class="form-register__header">
               
                <ul class="progressbar">
                    <li class="progressbar__option active">Datos generales</li>
                    <li class="progressbar__option">Detalles</li>
                    <li class="progressbar__option">Alumnos </li>
                    <li class="progressbar__option">Documentos</li>
                   <!--  <li class="progressbar__option">Resultados Imágenes</li> -->
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
                                    <option readonly selected style="display:none;"><label>Seleccionar actividad</label></option>

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
                        <input name="areaResponsable" id="areaResponsable" type="text" placeholder="Área responsable" class="step__input"required>
                        <label>Objetivo de la actividad o visita</label>
                        <textarea name="objetivoVisita" id="objetivoVisita" rows="4" cols="80" placeholder="Objetivo de la actividad o visita" class="step__input" required></textarea>
                        <label>Fecha en la que se llevara acabo la actividad</label>
                        <input name="fechaVisita" id="fechaVisita" onfocus="(this.type='date')" placeholder="Fecha en la que se llevara acabo la actividad" class="step__input" required>

                        
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
                        <input name="docenteAcargo" id="docenteAcargo" type="text" placeholder="Docente a cargo" class="step__input">
                        <label>Materia</label>
                        <input name="Materia" id="Materia" type="text" placeholder="Materia" class="step__input">
                        <label>Lugar donde se llevará acabo la visita</label>
                        <input name="lugar" id="lugar" type="text" placeholder="Lugar donde se llevará acabo la visita" class="step__input">
                        <label>Descripción de actividades</label>
                        <textarea name="descripcionActividad" id="descripcionActividad" rows="4" cols="80" placeholder="Descripción de actividades" class="step__input"></textarea>
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

     echo 'hola';
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
       
                    <label>Carerra</label>
                    <select name="carrera" id="carrera" class="step__input" required>
                       <option readonly style="display:none;"><label>Carrera</label></option>
 <?php     
                           foreach ($infologin as $key => $value) {    
                       
                            
                            echo "<option value='".$value['descripcion']."'>".$value['descripcion']."</option>";
 }
 ?>
                       </select>
                       <div id="respuesta"></div>
                       <label>Grupo</label>
                       <select name="grupo" id="grupo" class="step__input" required>
                       <option selected style="display:none;"><label>Grupo</label></option> 
                       <option value="A">A</option>
                       <option value="B">B</option>
                       <option value="C">C</option>
                       <option value="D">D</option>
                       </select>
                       <?php 

class Ciclos {

 function peticionACiclos(){

  
$client1 = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client1->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     
   
    $result1 = $client1->call('Ciclos');
    $data1 = $result1['CiclosResult']['diffgram'];

return $data1;
}





public function getIformacionCiclos(){

  $datos1 = self::peticionACiclos();

  if ($datos1) {
    $arrayDeDatos1 = $datos1['NewDataSet']['Ciclos'];

    foreach ($arrayDeDatos1 as $key4 => $value4) {
      
    }
  }else{

    echo "se callog el sistema no devuelve nada";
  }

  return $arrayDeDatos1;
}

}

$ciclos = new Ciclos();
$infociclos = $ciclos ->getIformacionCiclos();

array_walk_recursive($infociclos, function(&$item1, $key2) {
 if(!mb_detect_encoding($item1,'utf-8', true)) {
   $item1 = utf8_encode($item1);

   
 }

});

?>

        <label >Cuatrimestre</label>
         
               
                  <select name="cuatrimestre" id="cuatrimestre" class="step__input" required>
                            <option selected reardonly style="display:none;">Cuatrimestre</option>
                            <option value="1">1ro</option>
                            <option value="2">2do</option>
                            <option value="3">3ro</option>
                            <option value="4">4to</option>
                            <option value="5">5to</option>
                            <option value="6">6to</option>
                            <option value="7">7mo</option>
                            <option value="8">8vo</option>
                            <option value="9">9no</option>
                            <option value="10">10mo</option>
                            <option value="11">11vo</option>
                           
                  </select>

                        <!-- <input name="cuatrimestre" id="cuatrimestre" type="text" placeholder="Cuatrimestre" class="step__input"> -->


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
                        <label>Nombre completo</label>
                        <input name="nombreChofer" id="nombreChofer" type="text" placeholder="Nombre Completo" class="step__input">
                        <label>Sexo</label>
                        <select name="sexoChofer" id="sexoChofer" class="step__input" required>
                            <option selected reardonly style="display:none;">Sexo</option>
                           <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <label>Número télefonico</label>
                        <input name="numTelefonoC" id="numTelefonoC" type="tel" placeholder="Numero de télefono" class="step__input">
                        <label>Licencia de conducir</label>
                        <input name="licenciaChofer" id="licenciaChofer" type="file"  class="step__input" required>
                        <label>Seguro vigente</label>
                        <input name="seguroVehiculoC" id="seguroVehiculoC" type="file" class="step__input"required>
                        <label>Tarjerta de circulación</label>
                        <input name="tipoVehiculoC" id="tipoVehiculoC" type="file" class="step__input" required>
                        <label>Estatus visita</label>
                        <select name="estatusVisita" id="estatusVisita" class="step__input" required>
                            <option selected reardonly style="display:none;">Estatus visita</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Realizadas">Realizadas</option>
                            <option value="No realizadas">No realizadas</option>
                            <option value="Archivadas">Archivadas</option>
                        </select>
                         <textarea name="comentarios" id="comentarios" rows="4" cols="80" placeholder="Comentarios" class="step__input"></textarea>
                     <input name="alumnos" id="alumnos"  type="hidden" class="step__input">
                     <?php $idUsuario = $_SESSION["idUsuario"]; 
                     $fecha_actual= date("Y-m-d");
                     ?>
                     
                     <input name="fechaCreacion" id="fechaCreacion" value="<?php echo $fecha_actual?>" type="hidden" class="step__input">
                     <input name="creadoPor" id="creadoPor" value="<?php echo $_SESSION['idUsuario'];?>" type="hidden" class="step__input">
                     <input name="fechaModificacion" id="fechaModificacion" value="0000-00-00" type="hidden" class="step__input">
                     <input name="modificadoPor" id="modificadoPor" value="Nadie" type="hidden" class="step__input">

                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--back" data-to_step="3" data-step="4">Regresar</button>
                        <button class="step__button" type="submit" name="input" onclick="visitaCargar();" >Guardar</button>
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
