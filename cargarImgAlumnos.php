<?php
    
    session_start();

    //$id=$_SESSION['user_id'];

    include "conexion.php"; 

     $Nombres = $_POST['nombreDocumento'];
    $IdDocumento = $_POST['idDocumento'];
     $IdAlumno = $_POST['idAlumno'];
     $IdAlumno = $_POST['idAlumno'];
     $IdAlumno = $_POST['idAlumno'];
    $pendiente="Pendiente";


    


    if (isset($_FILES["imagen"]))
    {
        $file = $_FILES["imagen"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $carpeta = "docsAlumno/";
        
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
          echo "Error, el archivo no es una imagen"; 
        }
        else if ($size > 1024*1024)
        {
          echo "Error, el tamaño máximo permitido es un 1MB";
        }
        else
        {
            $src = $carpeta.$nombre;
           @move_uploaded_file($ruta_provisional, $src);

    $insertar =$mysqli->query("INSERT INTO archivos VALUES('','$Nombres','$src','$IdDocumento','$pendiente','$IdAlumno')");
   
   if($insertar){
                           echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente. </div>';


                            
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                            

                        }





           // $query=mysqli_query($con, "UPDATE user set image=\"$nombre\" where id=$id");
           // if($query){
           //  echo "<br><div class='alert alert-success' role='alert'>
           //      <button type='button' class='close' data-dismiss='alert'>&times;</button>
           //      <strong>¡Bien hecho!</strong> Perfil Actualizado Correctamente
           //  </div>";
           // }else{
           //  // echo "errror";
           // }
        }
    }

?>