<?php
require_once('./lib/nusoap.php');



 
      $nivel = 6 ;
      $cuatri = "SEP-DIC 21";
      $carrera = "IEV";

   $client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     

    $params = array(

        'liNivel' => $nivel,
        'lsCuatrimestre' => $cuatri,
      'lsCarrera' => $carrera
    );

    $result = $client->call('MatriculaXCarrera',$params);
   
    if ($result) {

        $data = $result['MatriculaXCarreraResult']['diffgram'];
          
  // print_r($data);

        foreach ($data as $key => $value) {
     //echo print_r($value);                                      
          foreach ($value as $key1 => $value1) {
    

    // echo print_r($key1);
             foreach ($value1 as $key2 => $value2) {
    // echo  print_r($key2);
              


              echo"<td> $value2[apaterno] </td><br>";
}
   }
 }
}
 ?>



<!--
        <tr>
                                           
          <td><?php echo $value2['apaterno']?></td>
          <td><?php echo $value2['amaterno']?></td>
          <td><?php echo $value2['nombre']?></td>
          <td><?php echo $value2['fecha_nacimiento']?></td>
          <td><?php echo $value2['edad']?></td>
          <td><?php echo $value2['sexo']?></td>
          <td><?php echo $value2['curp']?></td>
          <td><?php echo $value2['calle']?></td>
          <td><?php echo $value2['estado']?></td>

        </tr>
      
        <?php 
          

         // }

                                         

                                          
//var_dump($value1);

        
       
//}

//}    


//}
        ?>
       
      </tbody>         
                  <tfoot>
                  <tr>
                    <th>Índice</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                  </tr>
                  </tfoot>
                </table>


</body>
</html>




  <?php            if(isset($_POST['input'])){

    //$id = $_POST['id'];
    //$idUsuario = $_POST['idUsuario'];
    $nombreCompleto = echo $row['nombreCompleto']; ?>;
    $telefono = $_POST['telefono']; <?php echo $row['telefono']; ?>;
    $correo = $_POST['correo']; <?php echo $row['nombreCompleto']; ?>;
    $usuario = $_POST['usuario']; <?php echo $row['nombreCompleto']; ?>;
    $contraseña = $_POST['contraseña']; <?php echo $row['nombreCompleto']; ?>;
    $rol= $_POST['rol']; <?php echo $row['nombreCompleto']; ?>;
    $usuarioRol = <?php echo $row['usuarioRol']; ?>;
    $usuarioC =  <?php echo $row['usuarioC']; ?>;
    $usuarioR =  <?php echo $row['usuarioR']; ?>;
    $usuarioU = <?php echo $row['usuarioU']; ?>;
    $usuarioD =  <?php echo $row['usuarioD']; ?>;
    $documentoRol  <?php echo $row['documentosRol']; ?>;
    $documentoC = <?php echo $row['documentoC']; ?>;
    $documentoA = <?php echo $row['documentoA']; ?>;
    $documentoR =  <?php echo $row['documentoR']; ?>;
    $documentoU =  <?php echo $row['documentoU']; ?>;
    $documentoD =  <?php echo $row['documentoD']; ?>;
    $visitasRol = <?php echo $row['visitasRol']; ?>;
    $visitasC =  <?php echo $row['visitasC']; ?>;
    $visitasR =  <?php echo $row['visitasR']; ?>;
    $visitasU =  <?php echo $row['visitasU']; ?>;
    $visitasD =  <?php echo $row['visitasD']; ?>;
    $alumnoRol =  <?php echo $row['alumnoRol']; ?>;
    $alumnoC =  <?php echo $row['alumnoC']; ?>;
    $alumnoV = <?php echo $row['alumnoV']; ?>;
    $alumnoR =  <?php echo $row['alumnoR']; ?>;
    $alumnoU =  <?php echo $row['alumnoU']; ?>;
    $alumnoD = <?php echo $row['alumnoD']; ?>;



    $insertar =$mysqli->query("INSERT INTO usuarios VALUES('','$nombreCompleto','$telefono','$correo','$usuario', '$contraseña', '$rol', '$usuarioRol', '$usuarioC', '$usuarioR', '$usuarioU', '$usuarioD', '$documentoRol', '$documentoC', '$documentoA', '$documentoR', '$documentoU', '$documentoD', '$visitasRol', '$visitasC', '$visitasR', '$visitasU', '$visitasD', '$alumnoRol', '$alumnoC', '$alumnoV', '$alumnoR', '$alumnoU', '$alumnoD' )");
   
   if($insertar){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente. </div>';


                            
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                            

                        }
    

}
    ?>

      <div class="card-body">
               

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        
                        <div class="custom-control custom-checkbox">
                           <input class="custom-control-input" type="hidden" name="usuarioRol" id="usuarioRol" value="Inactivo" >
                           <input class="custom-control-input" type="checkbox" name="usuarioRol" id="usuarioRol" <?php if ($usuarioRol=="Activo") echo "checked"; ?>  />
                          <label for="usuarioRol" class="custom-control-label">Usuarios</label>
                        </div>

                      <input class="custom-control-input" type="checkbox" name="checkbox" value="Activo" <?php if ($usuarioRol) echo "checked"; ?> /> 

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="usuarioC" id="usuarioC" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="usuarioC" id="usuarioC" <?php if ($usuarioC=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioC" class="custom-control-label">Crear usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="usuarioR" id="usuarioR" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="usuarioR" id="usuarioR" <?php if ($usuarioR=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioR" class="custom-control-label">Ver usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="usuarioU" id="usuarioU" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="usuarioU" id="usuarioU" <?php if ($usuarioU=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioU" class="custom-control-label">Modificar usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="usuarioD" id="usuarioD" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="usuarioD" id="usuarioD" <?php if ($usuarioD=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioD" class="custom-control-label">Eliminar usuarios</label>
                        </div> 

                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                    radio 
                      <div class="form-group">

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoRol" id="documentoRol" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoRol" id="documentoRol" <?php if ($documentoRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoRol" class="custom-control-label">Documentos a solicitar</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoC" id="documentoC" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoC" id="documentoC" <?php if ($documentoC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoC" class="custom-control-label">Crear documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoA" id="documentoA" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoA" id="documentoA" <?php if ($documentoA=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoA" class="custom-control-label">Archivar</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoR" id="documentoR" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoR" id="documentoR" <?php if ($documentoR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoR" class="custom-control-label">Ver documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                           <input class="custom-control-input" type="hidden" name="documentoU" id="documentoU" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoU" id="documentoU" <?php if ($documentoU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoU" class="custom-control-label">Modificar documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoD" id="documentoD" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoD" id="documentoD" <?php if ($documentoD=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoD" class="custom-control-label">Eliminar documentos</label>
                        </div>

                      </div>
                    </div>
                  </div><hr>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
               
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="visitasRol" id="visitasRol" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="visitasRol" id="visitasRol" <?php if ($visitasRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasRol" class="custom-control-label">Formularios visitas académicas</label>
                        </div><hr>
                      
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="visitasC" id="visitasC" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="visitasC" id="visitasC" <?php if ($visitasC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasC" class="custom-control-label">Crear visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="visitasR" id="visitasR" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="visitasR" id="visitasR" <?php if ($visitasR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasR" class="custom-control-label">Ver visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="visitasU" id="visitasU" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="visitasU" id="visitasU" <?php if ($visitasU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasU" class="custom-control-label">Modificar visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="visitasD" id="visitasD" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="visitasD" id="visitasD" <?php if ($visitasD=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasD" class="custom-control-label">Eliminar visitas académicas</label>
                        </div>

                        
                      </div>
                    </div>
                    <div class="col-sm-6">
              
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="alumnoRol" id="alumnoRol" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="alumnoRol" id="alumnoRol" <?php if ($alumnoRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoRol" class="custom-control-label">Alumnos</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="alumnoC" id="alumnoC" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="alumnoC" id="alumnoC" <?php if ($alumnoC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoC" class="custom-control-label">Agregar alumnos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="alumnoV" id="alumnoV" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="alumnoV" id="alumnoV" <?php if ($alumnoV=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoV" class="custom-control-label">Validar documentacion alumno</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="alumnoR" id="alumnoR" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="alumnoR" id="alumnoR" <?php if ($alumnoR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoR" class="custom-control-label">Ver alumnos activos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="alumnoU" id="alumnoU" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="alumnoU" id="alumnoU" <?php if ($alumnoU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoU" class="custom-control-label">Modificar alumnos activos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="alumnoD" id="alumnoD" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="alumnoD" id="alumnoD" <?php if ($alumnoD=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoD" class="custom-control-label">Eliminar alumnos</label>
                        </div>

                      </div>
                    </div>
                  </div>


</div>                     
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoRol" id="documentoRol" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoRol" id="documentoRol" <?php if ($documentoRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoRol" class="custom-control-label">Documentos a solicitar</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoC" id="documentoC" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoC" id="documentoC" <?php if ($documentoC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoC" class="custom-control-label">Crear documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoA" id="documentoA" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoA" id="documentoA" <?php if ($documentoA=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoA" class="custom-control-label">Archivar</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="hidden" name="documentoR" id="documentoR" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoR" id="documentoR" <?php if ($documentoR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoR" class="custom-control-label">Ver documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                           <input class="custom-control-input" type="hidden" name="documentoU" id="documentoU" value="Inactivo">
                          <input class="custom-control-input" type="checkbox" name="documentoU" id="documentoU" <?php if ($documentoU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoU" class="custom-control-label">Modificar documentos</label>
                        </div>

                        
                          <input class="custom-control-input" type="hidden" name="documentoD" id="documentoD" value="Inactivo">
                         
                    
                      
                          <input class="custom-control-input" type="hidden" name="visitasRol" id="visitasRol" value="Inactivo">
                         
                       
                          <input class="custom-control-input" type="hidden" name="visitasC" id="visitasC" value="Inactivo">
                         

                        
                          <input class="custom-control-input" type="hidden" name="visitasR" id="visitasR" value="Inactivo">
                        

                        
                          <input class="custom-control-input" type="hidden" name="visitasU" id="visitasU" value="Inactivo">
                         

                  
                          <input class="custom-control-input" type="hidden" name="visitasD" id="visitasD" value="Inactivo">
                          

                          <input class="custom-control-input" type="hidden" name="alumnoRol" id="alumnoRol" value="Inactivo">
                        

                          <input class="custom-control-input" type="hidden" name="alumnoC" id="alumnoC" value="Inactivo">
                          

                    
                          <input class="custom-control-input" type="hidden" name="alumnoV" id="alumnoV" value="Inactivo">
                         

                      
                          <input class="custom-control-input" type="hidden" name="alumnoR" id="alumnoR" value="Inactivo">
                         

                          <input class="custom-control-input" type="hidden" name="alumnoU" id="alumnoU" value="Inactivo">
                         

                       
                          <input class="custom-control-input" type="hidden" name="alumnoD" id="alumnoD" value="Inactivo">
                         
                          
               

              </div>
            
            </div>


            <div class="custom-control custom-checkbox">

                           <input class="custom-control-input" type="checkbox" name="usuarioRol" id="usuarioRol" <?php if ($usuarioRol=="Activo") echo "checked"; ?>  />
                          <label for="usuarioRol" class="custom-control-label">Usuarios</label>
                        </div>

                      <input class="custom-control-input" type="checkbox" name="checkbox" value="Activo" <?php if ($usuarioRol) echo "checked"; ?> /> 

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="usuarioC" id="usuarioC" <?php if ($usuarioC=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioC" class="custom-control-label">Crear usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="usuarioR" id="usuarioR" <?php if ($usuarioR=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioR" class="custom-control-label">Ver usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="usuarioU" id="usuarioU" <?php if ($usuarioU=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioU" class="custom-control-label">Modificar usuarios</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="usuarioD" id="usuarioD" <?php if ($usuarioD=="Activo") echo "checked"; ?>  value="Activo">
                          <label for="usuarioD" class="custom-control-label">Eliminar usuarios</label>
                        </div> 

                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                  
                      <div class="form-group">

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoRol" id="documentoRol" <?php if ($documentoRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoRol" class="custom-control-label">Documentos a solicitar</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoC" id="documentoC" <?php if ($documentoC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoC" class="custom-control-label">Crear documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoA" id="documentoA" <?php if ($documentoA=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoA" class="custom-control-label">Archivar</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                          
                          <input class="custom-control-input" type="checkbox" name="documentoR" id="documentoR" <?php if ($documentoR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoR" class="custom-control-label">Ver documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoU" id="documentoU" <?php if ($documentoU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoU" class="custom-control-label">Modificar documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoD" id="documentoD" <?php if ($documentoD=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoD" class="custom-control-label">Eliminar documentos</label>
                        </div>

                      </div>
                    </div>
                  </div><hr>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      
                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="visitasRol" id="visitasRol" <?php if ($visitasRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasRol" class="custom-control-label">Formularios visitas académicas</label>
                        </div><hr>
                      
                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="visitasC" id="visitasC" <?php if ($visitasC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasC" class="custom-control-label">Crear visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="visitasR" id="visitasR" <?php if ($visitasR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasR" class="custom-control-label">Ver visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="visitasU" id="visitasU" <?php if ($visitasU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasU" class="custom-control-label">Modificar visitas académicas</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="visitasD" id="visitasD" <?php if ($visitasD=="Activo") echo "checked"; ?> value="Activo">
                          <label for="visitasD" class="custom-control-label">Eliminar visitas académicas</label>
                        </div>

                        
                      </div>
                    </div>
                    <div class="col-sm-6">
          
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="alumnoRol" id="alumnoRol" <?php if ($alumnoRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoRol" class="custom-control-label">Alumnos</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="alumnoC" id="alumnoC" <?php if ($alumnoC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoC" class="custom-control-label">Agregar alumnos</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="alumnoV" id="alumnoV" <?php if ($alumnoV=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoV" class="custom-control-label">Validar documentacion alumno</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                         

                          <input class="custom-control-input" type="checkbox" name="alumnoR" id="alumnoR" <?php if ($alumnoR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoR" class="custom-control-label">Ver alumnos activos</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="alumnoU" id="alumnoU" <?php if ($alumnoU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoU" class="custom-control-label">Modificar alumnos activos</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="alumnoD" id="alumnoD" <?php if ($alumnoD=="Activo") echo "checked"; ?> value="Activo">
                          <label for="alumnoD" class="custom-control-label">Eliminar alumnos</label>
                        </div>

                      </div>
                    </div>
                  </div>


</div>                     
                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoRol" id="documentoRol" <?php if ($documentoRol=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoRol" class="custom-control-label">Documentos a solicitar</label>
                        </div><hr>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoC" id="documentoC" <?php if ($documentoC=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoC" class="custom-control-label">Crear documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoA" id="documentoA" <?php if ($documentoA=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoA" class="custom-control-label">Archivar</label>
                        </div>

                        <div class="custom-control custom-checkbox">

                          <input class="custom-control-input" type="checkbox" name="documentoR" id="documentoR" <?php if ($documentoR=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoR" class="custom-control-label">Ver documentos</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                           
                          <input class="custom-control-input" type="checkbox" name="documentoU" id="documentoU" <?php if ($documentoU=="Activo") echo "checked"; ?> value="Activo">
                          <label for="documentoU" class="custom-control-label">Modificar documentos</label>
                        </div>


                          <input class="custom-control-input" type="hidden" name="usuarioRol" id="usuarioRol" value="Inactivo" >
                           <input class="custom-control-input" type="hidden" name="usuarioC" id="usuarioC" value="Inactivo">
                            <input class="custom-control-input" type="hidden" name="usuarioR" id="usuarioR" value="Inactivo">
                           <input class="custom-control-input" type="hidden" name="usuarioU" id="usuarioU" value="Inactivo">
                           <input class="custom-control-input" type="hidden" name="usuarioD" id="usuarioD" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="documentoRol" id="documentoRol" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="documentoC" id="documentoC" value="Inactivo">
                            <input class="custom-control-input" type="hidden" name="documentoA" id="documentoA" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="documentoR" id="documentoR" value="Inactivo">
                           <input class="custom-control-input" type="hidden" name="documentoU" id="documentoU" value="Inactivo">
                           <input class="custom-control-input" type="hidden" name="documentoD" id="documentoD" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="visitasRol" id="visitasRol" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="visitasC" id="visitasC" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="visitasR" id="visitasR" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="visitasU" id="visitasU" value="Inactivo">
                            <input class="custom-control-input" type="hidden" name="visitasD" id="visitasD" value="Inactivo">
                           <input class="custom-control-input" type="hidden" name="alumnoRol" id="alumnoRol" value="Inactivo">
                           <input class="custom-control-input" type="hidden" name="alumnoC" id="alumnoC" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="alumnoV" id="alumnoV" value="Inactivo">
                           <input class="custom-control-input" type="hidden" name="alumnoR" id="alumnoR" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="alumnoU" id="alumnoU" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="alumnoD" id="alumnoD" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="documentoRol" id="documentoRol" value="Inactivo">
                            <input class="custom-control-input" type="hidden" name="documentoC" id="documentoC" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="documentoA" id="documentoA" value="Inactivo">
                           <input class="custom-control-input" type="hidden" name="documentoR" id="documentoR" value="Inactivo">
                          <input class="custom-control-input" type="hidden" name="documentoU" id="documentoU" value="Inactivo">