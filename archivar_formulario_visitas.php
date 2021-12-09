
<?php 
require("conexion.php");

	$id=$_POST['idVisita'];

	$estatus ="Archivado";
	
	$update = $mysqli->query("
		UPDATE visitas
		
		SET
		estatusVisita ='$estatus'
			
		where idVisita ='$id' ");

	 if($update){
                           echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido archivados correctamente. </div>';
                           // echo "<script> window.location= 'mostrar_Actividades.php' </script>";

                               echo '<script>location.href="subir_doc_alumno.php"</script>';
                            
                    }else
                          {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo archivar los datos.</div>';
                             echo "<script> window.location= 'mostrar_Actividades.php' </script>";

                            

                           }

	
	//
 ?>