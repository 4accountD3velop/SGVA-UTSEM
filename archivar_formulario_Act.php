
<?php 
require("conexion.php");

	$id=$_POST['idActividad'];

	$estatus ="Archivado";
	



	

	$update = $mysqli->query("
		UPDATE actividades
		
		SET
		estatusActividad ='$estatus'
			
		where idActividad ='$id' ");

	 if($update){
                           echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido archivados correctamente. </div>';
                            echo "<script> window.location= 'mostrar_Actividades.php' </script>";

                               //echo '<script>location.href="mostrar_documentos.php"</script>';
                            
                    }else
                          {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo archivar los datos.</div>';
                             echo "<script> window.location= 'mostrar_Actividades.php' </script>";

                            

                           }

	
	//
 ?>