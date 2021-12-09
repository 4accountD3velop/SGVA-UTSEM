<?php 
require("conexion.php");

	$id=$_POST['id_alumno'];
	$idDocumento=$_POST['idDocumento'];
	$comentarios=$_POST['comentarios'];

	
	



	

	$update = $mysqli->query("
		UPDATE archivos
		
		SET
		comentariosArchivo ='$comentarios'
			
		where id_alumno ='$id' AND idDocumento ='$idDocumento' ");

	 if($update){
                           echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los comentarios se realizarón correctamente. </div>';
                             // echo "<script> window.location= 'mostrar_Actividades.php' </script>";

                             
                            
                    }else
                          {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudieron asignar los comentarios.</div>';
                               // echo "<script> window.location= 'mostrar_Actividades.php' </script>";
                            

                           }

	
	//
 ?>