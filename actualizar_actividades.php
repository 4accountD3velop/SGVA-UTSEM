   <?php

    require("conexion.php");

    if(isset($_POST['input'])){

    //$id = $_POST['id'];
    $idActividad = $_POST['idActividad'];
    $nombreActividad = $_POST['nombreActividad'];
    $estatusActividad = $_POST['estatusActividad'];
    $fechaCreacionA = $_POST['fechaCreacionA'];
    $idUsuario= $_POST['idUsuario'];
  
 $update = mysqli_query($mysqli, "UPDATE actividades SET 
          
          
          nombreActividad ='$nombreActividad',
          fechaCreacionA ='$fechaCreacionA', 
          estatusActividad ='$estatusActividad', 
          idUsuario ='$idUsuario'
          

       WHERE idActividad='$idActividad'");


   
   if($update){
                            
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, la actividad ha sido actualizada correctamente. </div>';
    
    
                             echo "<script>location.href='actualizar_formulario_Actividades.php?idActividad=$_POST[idActividad]'</script>"; 
          
                        
                            
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, la actividad no ha sido actualizada correctamente.s.</div>';

                            echo "<script>location.href='actualizar_formulario_Actividades.php?idActividad=$_POST[idActividad]'</script>"; 


                        }
    

}
    ?>