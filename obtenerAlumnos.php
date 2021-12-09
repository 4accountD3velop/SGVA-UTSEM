<?php 

require 'conexion.php'; 

$carrera = $_POST['Carrera'];

$tipoVisita = $_POST['tipoVisita'];

$sql1="SELECT * from alumnos WHERE desc_carrera = '$carrera' AND idActividad ='$tipoVisita'AND estatus_alumno = 'Validado' ";
         $result=mysqli_query($mysqli,$sql1);

echo '<div class="table-responsive">

                 <table class="table table-striped table-bordered table-hover ">
                  <thead>
                  <tr>
                    
                    <th>Nombre completo</th>
                    <th>Carrera</th>
                  
                   
                   </tr>
                  </thead>
                   <tbody>';

               

     while($mostrar=mysqli_fetch_array($result)){
  
     	 

          echo'<tr>';
          echo'<td>'; echo "$mostrar[nombre]".' '."$mostrar[apaterno]".' '."$mostrar[apaterno]"; echo'</td>';
          echo'<td>'; echo "$mostrar[desc_carrera]"; echo'</td>';
          
        
         echo'</tr>';
    
      
     }
         
         echo'</tbody>         
                  <tfoot>
                  <tr>
                    
                    <th>Nombre completo</th>
                    <th>Carrera</th>
                    
                    
                  </tr>
                  </tfoot>
                </table>
         </div>';
        
?>
             