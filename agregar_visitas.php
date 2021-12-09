<?php 
require 'conexion.php';
    //$id = $_POST['id'];
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
          $licenciaChofer =$_POST["licenciaChofer"];
          $seguroVehiculoC =$_POST["seguroVehiculoC"];
          $tipoVehiculoC =$_POST["tipoVehiculoC"];
          $alumnos =$_POST["alumnos"];
          $estatusVisita =$_POST["estatusVisita"];
          
          $fechaCreacion =$_POST["fechaCreacion"];
          $creadoPor=$_POST["creadoPor"];
          $fechaModificacion =$_POST["fechaModificacion"];
          $modificadoPor =$_POST["modificadoPor"];
          $comentarios=$_POST["comentarios"];

          $imagenes='';  
          

     if(isset($_FILES["imagenes"])) {

    //$imagenes=implode('--',$_FILES['imagenes']);

      //$ruta = "imagenesVisitas/anonymous.png";
    foreach ($_FILES['imagenes']['name'] as $key => $name){

       //print_r($name);

}
 }
  
 //$newFilename = time() . "_" . $name;
 //   move_uploaded_file($_FILES['imagenes']['tmp_name'][$key], 'imagenes/' . $newFilename);
  //  $location = 'imagenes/' . $newFilename;
    
  //  mysqli_query($conn,"insert into photo (location) values ('$location')");
  
//  header('location:index.php');


    // }                                          
      

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
                                                '$licenciaChofer',
                                                '$seguroVehiculoC',
                                                '$tipoVehiculoC',
                                                '$alumnos',
                                                '$estatusVisita',
                                                '$imagenes',
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
            

/*  
         if(isset($_FILES["imagenes"]["tmp_name"][$key])){

            list($ancho, $alto) = getimagesize($_FILES["imagenes"]["tmp_name"][$key]);


            $nuevoAncho = 500;
            $nuevoAlto = 500;

            /*========================================
            =            crear directorio            =
            ========================================*/

/*
            $directorio = "imagenesVisitas/";

          // mkdir($directorio, 0755);

            if($_FILES["imagenes"]["type"][$key] == "image/jpeg") {
              
          
              $aleatorio = time() . "_" . $name;

              $ruta = "imagenesVisitas/".$aleatorio.".jpg";

              $origen = imagecreatefromjpeg($_FILES["imagenes"]["tmp_name"][$key]);

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagejpeg($destino, $ruta);
            }


            if ($_FILES["imagenes"]["type"][$key] == "image/png") {
              

              $aleatorio = time() . "_" . $name;


              $ruta = "imagenesVisitas/".$aleatorio.".png";

              $origen = imagecreatefrompng($_FILES["imagenes"]["tmp_name"][$key]);

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagepng($destino, $ruta);
            }
          }


*/ 
    