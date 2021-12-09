
<?php 
require("conexion.php");

	$id=$_POST['idArchivo'];
	$estatusArchivo=$_POST['estatusArchivo'];

	

	if ($estatusArchivo=="Pendiente") {
    
    $estatus ="Activo";

		$update = $mysqli->query("
		UPDATE archivos
		
		SET
		estatusArchivo ='$estatus'
			
		where idArchivo ='$id' ");
		
	}else{
      
      if ($estatusArchivo=="Activo") {

      	$estatus ="Pendiente";

		$update = $mysqli->query("
		UPDATE archivos
		
		SET
		estatusArchivo ='$estatus'
			
		where idArchivo ='$id' ");
      }


	}
	
	

	 if($update){
                           echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido archivados correctamente. </div>';
                            // echo "<script> window.location= 'mostrar_Actividades.php' </script>";

                               //echo '<script>location.href="mostrar_documentos.php"</script>';
                            
                    }else
                          {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo archivar los datos.</div>';
                             // echo "<script> window.location= 'mostrar_Actividades.php' </script>";

                            

                           }

	
	//
 ?>