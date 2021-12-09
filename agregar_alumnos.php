 <?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }   
  

 ?>
<?php

require 'conexion.php';

?>

<body class="hold-transition sidebar-mini">

 <div class="wrapper">

<?php require'plantilla.php'; ?>  
  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
        
        </div>
      </div> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">

                <h3 class="card-title">Seleccionar alumnos a participar de la visita académica </h3>

                <div class="col-md-12" id="respuestaPHP2">
                  
            </div>
                
              </div>
              
<?php
require_once('./lib/nusoap.php');



 
 ?>
    

              <!-- form start -->
              <form name="form1" id="form1" class="form-horizontal row-fluid" action="agregar_alumnos.php" method="POST" >

<section class="content-header">
    <div class="container-fluid">
       <div class="row mb-1">
        <div class="col-md-6">
 <div class="container">
           <div class="form-group">
            <div id="resp"></div>
                   <label  >Paso N°1 Seleccionar el ciclo y carrera de los alumnos a asignar la visita </label><br>
              </div>
  <div class="row">
    <div class="col-sm">
   
<?php
class Login {

 function peticionAlServidor(){

  
$client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     
 try {
    $result = $client->call('Carreras');
    $data = $result['CarrerasResult']['diffgram'];



    //$mbd = new PDO($result, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e) {
      echo 'Error de conexión: ' . $e->getMessage();
      echo "algo salio mal en los servidores";
      exit;
    }

return $data;
}





public function getIformacionCarreras(){

  $datos = self::peticionAlServidor();

  if ($datos) {
    $arrayDeDatos = $datos['NewDataSet']['Carreras'];

    foreach ($arrayDeDatos as $key => $value) {
    }
  }else{

     echo 'hola';
  }

  return $arrayDeDatos;
}

}



$login = new Login();
$infologin = $login ->getIformacionCarreras();
array_walk_recursive($infologin, function(&$item, $key) {
 if(!mb_detect_encoding($item,'utf-8', true)) {
   $item = utf8_encode($item);

   
 }

});

  ?>
       

  
      <div class="form-group">

        <label   for="carrera">Carrera</label>
           <select class="form-control"  name="carrera" id="carrera" required>
          
            <option value="0" style="display:none;"><label>Seleccionar</label></option>

              <?php     
              foreach ($infologin as $key => $value) {    
                       
                            
 echo "<option value='".$value['cve_carrera'].",".$value['cve_nivel']."'>".$value['descripcion']."</option>";
                       

                              }
                                    ?>
          </select>
          
        </div>


    </div>
   <!--  <div class="col-sm">
      <div class="form-group">
        <label   for="nivel">Nivel</label>

        <input type="input" name="nivel" id="nivel" value="<?php echo "$clave"; ?>" >
         <select class="form-control" style="text-transform:uppercase;" name="nivel" id="nivel" required>
          
            <option value="0" style="display:none;"><label>Seleccionar</label></option>

     <?php   
           $property_types = array();
           $property_types1 = array();
              foreach($infologin as $key => $filter_result){
    if ( in_array($filter_result['cve_nivel'], $property_types) ) {
        continue;  
      }
       $property_types[] = $filter_result['cve_nivel'];
      if ( in_array($filter_result['desc_nivel'], $property_types1) ) {
        continue;  
      }
      $property_types1[] = $filter_result['desc_nivel'];
     
   
                               ?>

                               
         <option value="<?php echo $filter_result['cve_nivel'];?>"><?php echo $filter_result['desc_nivel']?></option>
                                    <?php
            
                                  }

                                    ?>
          </select>
        </div>


    </div>-->

<?php 

class Ciclos {

 function peticionACiclos(){

  
$client1 = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client1->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     
   
    $result1 = $client1->call('Ciclos');
    $data1 = $result1['CiclosResult']['diffgram'];

return $data1;
}





public function getIformacionCiclos(){

  $datos1 = self::peticionACiclos();

  if ($datos1) {
    $arrayDeDatos1 = $datos1['NewDataSet']['Ciclos'];

    foreach ($arrayDeDatos1 as $key4 => $value4) {
      
    }
  }else{

    echo "se callog el sistema no devuelve nada";
  }

  return $arrayDeDatos1;
}

}

$ciclos = new Ciclos();
$infociclos = $ciclos ->getIformacionCiclos();

array_walk_recursive($infociclos, function(&$item1, $key2) {
 if(!mb_detect_encoding($item1,'utf-8', true)) {
   $item1 = utf8_encode($item1);

   
 }

});

?>
<div class="col-sm">
      <div class="form-group">
        <label   for="ciclo">Ciclo</label>
           <select class="form-control"  name="ciclo" id="ciclo" required>
          
            <option value="0" style="display:none;"><label>Seleccionar</label></option>

              <?php   
         
           $property_types1 = array();
              foreach($infociclos as $key4 => $filter_result1){

    if ( in_array($filter_result1['ciclo'], $property_types1) ) {
        continue;  
      } 
      $property_types1[] = $filter_result1['ciclo'];
                               ?>

                               
         <option value="<?php echo $filter_result1['ciclo'];?>"><?php echo $filter_result1['ciclo']?></option>
                                    <?php
            
                                  }

?>
                  </select>
            </div>
    </div>

    <div class="col-sm">
      <div class="form-group">
      <br>
      <label></label>
     <center>
    <button type="submit" name="input" id="input" class="btn btn-sm btn-success">Buscar</button>
      <!--<input type="button" class="btn btn-success" value="Buscar" name="tabla" id="tabla"/>-->
    </center>
    </div>
   </div>
  </div>
</div>
</div>
</div>
</div>
</section>
 <!--
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
           
                      Agregar usuario


                   </button>/.card-header -->

<?php

    require("conexion.php");

    if(isset($_POST['input'])){


  

       //$id = $_POST['id'];
            
 class MatriculaxCarrera {

 function peticionAMatriculaxCarrera(){
 
  
   $cuatri = $_POST['ciclo'];
   $carrera = $_POST['carrera'];
  $nivel1 = explode(',', $carrera);
  $nivel = $nivel1[1];

  
   

  
$client2 = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client2->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
      $params = array(

        'liNivel' => $nivel,
        'lsCuatrimestre' => $cuatri,
      'lsCarrera' => $carrera
    );

   
    $result2 = $client2->call('MatriculaXCarrera',$params);
    $data2 = $result2['MatriculaXCarreraResult']['diffgram'];

return $data2;
}

   # try {
     #   $mbd = new PDO($arrayDeDatos2, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    #} catch (PDOException $e) {
    #    echo 'Error de conexión: ' . $e->getMessage();
    #    exit;
    #}


public function getIformacionMatriculaxCarrera(){

  $datos2 = self::peticionAMatriculaxCarrera();

  if ($datos2) {
    $arrayDeDatos2 = $datos2['NewDataSet']['Alumnos'];

     return $arrayDeDatos2;
  }else{

    
  }
 
  


}

}

$matricula = new MatriculaxCarrera();



$infomatricula = $matricula ->getIformacionMatriculaxCarrera();
if ($infomatricula) {
array_walk_recursive($infomatricula, function(&$item2, $key3) {
 if(!mb_detect_encoding($item2,'utf-8', true)) {
   $item2 = utf8_encode($item2);

 }

});
 



?> 
<div class="card-body">   
<section class="content-header">
    <div class="container-fluid">
       <div class="row mb-1">
        <div class="col-md-6">
          <div class="form-group">
            <label   for="idVisita"> Paso N°2 Selecciona la actividad académica a asignar.</label>
             <select class="form-control"  name="idVisita" id="idVisita" required>
                <option onlyread value="0" style="display:none;"><label>Seleccionar</label></option>     
                                    <?php
                                         $insertar =$mysqli->query("SELECT idActividad, tituloActividad FROM visitas");
                                        while($personal = mysqli_fetch_array($insertar))
                                        {
                                    ?>
                                    
                                    <option value="<?php echo $personal['idActividad']?>"><?php echo $personal['tituloActividad']?></option>
                                    <?php
                                        }
                                    ?>
            </select>
          </div> 
          </div>
          <div class="col-md-3">
            <div class="form-group"><label>  Paso N°3 seleccionar alumenos y añadir.
            <h3 class="text-center mt-1">
              
               <span style="float: left;">
                 <button type="button" class="btn btn-info" id="btn_borrar">Añadir</button>
               </span> 
             
            </h3></label>
          </div>
         </div>
       </div>
      </div> 
      
    </section>
 <div><input type="checkbox"  onclick="marcar(this);" /><label > &nbsp;&nbsp; Marcar/Desmarcar Todos</label></div>
  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                     <th>
                     Marcar
                     <!-- <input type="checkbox"  id="seleccionar-todos">Seleccionar todos  -->
                     </th>
                     <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Sexo</th>
                    <th>Carrera</th>
                    <th>Grado</th>
                    <th>Correo</th>
                    
                    <!-- <th>Activar</th> -->

                  </tr>
                  </thead>
                  <tbody> 
                    <?php
    

$sql="SELECT * from alumnos";
$result=mysqli_query($mysqli,$sql);

while($mostrar=mysqli_fetch_array($result)){
   
  $matricula =  $mostrar['matricula'];
} ?>

  <form name="f1">
  
    <?php
       foreach ($infomatricula as $key => $value2) { 

    //if ( $matricula == $value2['matricula'] )continue; 
     
        ?>  
        
         </th>
          <tr id="id<?php echo $key+1; ?>">
         
          <td class="text-center">
          <?php echo  $key+1; ?>
          <input type="checkbox"  name="ids[]" value="<?php echo  ($key+1).'-'.$value2['matricula'].'-'.$value2['nombre'].'-'.$value2['apaterno'].'-'.$value2['amaterno'].'-'.$value2['sexo'].'-'.$value2['desc_carrera'].'-'.$value2['mail'].'-'.$value2['desc_grado'] ?>" class="delete_checkbox"></td>
          <td><?php echo $value2['matricula']?></td>
          <td><?php echo $value2['nombre']?></td>
          <td><?php echo $value2['apaterno']?></td>
          <td><?php echo $value2['amaterno']?></td>
          <td><?php echo $value2['sexo']?></td>   
          <td><?php echo $value2['desc_carrera']?></td>
          <td><?php echo $value2['mail']?></td>
          <td><?php echo $value2['desc_grado']?></td>
         <!--  <td><button type="button" onclick="tabLaPhp('<?php echo $value2['matricula']; ?>','<?php echo $value2['nombre']; ?>','<?php echo $value2['apaterno']; ?>','<?php echo $value2['amaterno']; ?>','<?php echo $value2['sexo'];?>','<?php echo $value2['desc_carrera']?>', '<?php echo $value2['mail']?>','<?php echo $value2['desc_grado']?>');" class="btn btn-success">Activar</button>
          </td> --> 
            </tr>
          
<?php
  }
?>  
 


                 </tbody> 
           
                 </form>
                 <tfoot>
                  <tr>
                    <th>Marcar</th>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Sexo</th>
                    <th>Carrera</th>
                    <th>Grado</th>
                    <th>Correo</th>
                    
                    <!-- <th>Activar</th> -->
                  </tr>
                  </tfoot>
                </table>
                 
<?php
}else{

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no existen valores para su consulta, ralice una nueva consulta.</div>';
}
  }
    ?>
              </div>
             
            </div>
            <!-- /.card -->
          </div>
        </div>
          <!-- /.col -->
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content 

         // BOTON MODAL AGREGAR USUARIO -->



    <div class="modal  fullscreen-modal fade" id="modalAgregarUsuario" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">


<!--  // CABECERA MODAL -->  
        <form role="form" method="post"  enctype="multipart/form-data">  

      
          <div class="modal-header" style="background: #3c8dbc; color: white;">

            <h4 class="modal-title">Agregar usuario</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

        <!--  //Modal body  -->
          <div class="modal-body">
           
              <div class="box-body">

       <!--     //nombre -->
                <div class="form-group">
                  
                   <div class="input-group">

                    <span class="input-group-addon"><?php echo $value2['nombre']?><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoNombre" value="<?php echo $value2['nombre']?>" placeholder="Ingresar nombre" required>
                     

                   </div>

                </div>

              <!--  //next -->
                 <div class="form-group">
                  
                   <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-lg"  name="nuevoUsuario" value="<?php echo $value2['apaterno']?>" placeholder="Ingresar usuario" id="nuevoUsuario" required>
                     

     

                   </div>

                </div>
             
                 <div class="form-group">
                  
                   <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                    <input type="password" class="form-control input-lg" name="nuevoPassword" value="<?php echo $value2['amaterno']?>" placeholder="Ingresar contraseña" required>
                     

                   </div>

                </div>
                
                 <div class="form-group">
                  
                   <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                   <select  class="form-control input-lg" name="nuevoPerfil">
                     
                        <option value="">Selecionar perfil</option>

                        <option value="Administrador">Administrador</option>

                        <option value="Especial">Especial</option>

                        <option value="Vendedor">Vendedor</option>

                   </select>
                     

                   </div>

                </div>
                
                <!--<div class="form-group">

                  <div class="panel">Subir foto</div>

                  <input type="file"  class="nuevaFoto" name="nuevaFoto">

                  <p class="help-block">Peso maximo dela foto 200 MB</p>

                  <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" >
                  
                   
                </div>-->
             
              </div>

          </div>

         <!-- //Modal footer -->
          <div class="modal-footer">

            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary pull-right">Agregar usuario</button>

          </div>

          </form>

        </div>

      </div>

    </div>

  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); 
</script>
<!-- <script>
    function seleccionar_todo(){
   for (i=0;i<document.f1.elements.length;i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=1
}
    </script>
<script>
    function deseleccionar_todo(){
   for (i=0;i<document.f1.elements.length;i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=0
}
    </script> -->

  <script type="text/javascript">
  function marcar(source) 
  {
    checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
    for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
    {
      if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
      {
        checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
      }
    }
  }
</script>


 <!-- <script>
      <a href="javascript:seleccionar_todo()">Marcar todos</a>
    <a href="javascript:deseleccionar_todo()">Marcar ninguno</a>

      $(function(){
        $('#seleccionar-todos').change(function() {
          $('#listado > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
    </script> -->
<!-- <script>
  document.addEventListener("click", function(event){
        if (event.target.className == "activador"){
            var checkbox = event.target,
            celda = checkbox.parentNode,
            fila = celda.parentNode,
            inputs = fila.querySelectorAll("input");
            if (checkbox.checked){
                [].forEach.call(inputs, function(input){
                    input.disabled = false;
                });
            }else{
                [].forEach.call(inputs, function(input){
                    input.disabled = true;
                });
            }    
            checkbox.disabled = false;
        }
    }, false);


</script> -->
<script type="text/javascript">
$(document).ready(function() {
$( "#btn_borrar" ).click(function() {

 
  var idVisita = document.getElementById('idVisita').value;

  console.log(idVisita);

/**OPCION 1 */
    var ids_array = [];
    var ejemplo = [];
      $("input:checkbox[class=delete_checkbox]:checked").each(function () {
       var data = $(this).val();

       //console.log(data);

       ids_array.push($(this).val());
        // console.log("valores ", $(this).val());
        // console.log(ids_array.length);
     var elementos = $(this).val().split("-");

        ejemplo.push(
          {

            id: elementos[0],
            matricula:  elementos[1],
            nombre:  elementos[2],
            apaterno:  elementos[3],
            amaterno:  elementos[4],
            sexo:  elementos[5],
            desc_carrera:  elementos[6],
            mail:  elementos[7],
            desc_grado:  elementos[8],
            visita: idVisita

          }
                     );
        
        console.log(ejemplo);

      }); 

/****OPCION 2 */
/* var ids_array = [];
$('.delete_check:checked').each(function(i){
    ids_array[i] = $(this).val();   
}); */

if (ids_array.length>0) {


 //console.log(ids_array);

 //var Datos = "idDocumento="+ejemplo;

var datos = {datos:ejemplo};



     url = "Delete.php";
$.ajax({
        url: url,
        type: 'POST',
        data: datos,
    })
    .done(function(res){
        $('#resp').html(res);        
    })

   
    }     

    }); 
});
</script>

<?php
require 'footer.php';
?>

<!--
   // url = "Delete.php";
    //     $.ajax({
    //         type: "POST",
    //         url: url,
    //         data: {ids_array: ids_array},
    //         success: function(data)
    //         {
    //     //Para recorrer todos los ids seleccionado, y desaparecerlos
    //     $.each(ids_array,function(indice,id) {
    //         console.log('Indice es ' + indice + ' y id es: ' + id);
    //         var fila = $("#id" + id).remove(); //Oculto las filas eliminadas
    //         //console.log(fila);
    //       });
            
    //         $('#resp').html(data);
    //         }
    //     }); 

  // for (var i = 0; i < ids_array.length; i++) {

        //   var dato_unico = data;

        //  var elementos = dato_unico.split("-");

        //  ejemplo.push(
        //   {

        //     id: elementos[0],
        //     matricula:  elementos[1],
        //     nombre:  elementos[2],
        //     apaterno:  elementos[3],
        //     amaterno:  elementos[4],
        //     sexo:  elementos[5],
        //     desc_carrera:  elementos[6],
        //     desc_grado:  elementos[7],
        //     mail:  elementos[8]

        //   }
        // );



        // }

        console.log("ejemplo: ",ejemplo);

       // console.log($(this).val());
       
// ids_array.push($(this).val());
        
        // }

    console.log(ids_array);

    var Datos = ids_array;
$.ajax({
        url: 'Delete.php',
        type: 'POST',
        data: Datos,
    })
    .done(function(res){
        $('#resp').html(res);        
    })







 