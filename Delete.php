<?php
include('conexion.php');

$datos= $_POST['datos'];
  $Estatus="Activo";
   



foreach ($datos as $row) {
	// echo ("Valores: ".json_encode($row));
	//echo ("Valores: ".$row['nombre']);

	$matricula = $row['matricula'];
    $nombre= $row['nombre'];
    $apaterno = $row['apaterno'];
    $amaterno = $row['amaterno'];
    $sexo = $row['sexo'];   
    $desc_carrera = $row['desc_carrera'];
    $desc_grado = $row['desc_grado'];
    $mail = $row['mail'];
    $idVisita = $row['visita'];
    





  

   $insertar =$mysqli->query("INSERT INTO alumnos VALUES('','$matricula','$nombre','$apaterno','$amaterno','$sexo','$desc_carrera','$desc_grado', '$mail', '$Estatus', '$idVisita')");

 }


	

	if($insertar){
                           echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente. </div>';


                            
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                            

                        }




?>