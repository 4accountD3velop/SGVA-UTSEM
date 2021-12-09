<?php

require_once('./lib/nusoap.php');



  
$client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     
   
    $result = $client->call('Carreras');
    $data = $result['CarrerasResult']['diffgram'];

  
print_r($data);




class Login {

 function peticionAlServidor(){

  
$client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     
   
    $result = $client->call('Carreras');
    $data = $result['CarrerasResult']['diffgram'];

return $data;
}





public function getIformacionCarreras(){

  $datos = self::peticionAlServidor();

  if ($datos) {
    $arrayDeDatos = $datos['NewDataSet']['Carreras'];

    foreach ($arrayDeDatos as $key => $value) {
    }
  }else{

    echo "se callog el sistema no devuelve nada";
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
       

            <div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="form-group">
        <label   for="idUsuario">Cuatrimestre</label>
           <select class="form-control" style="text-transform:uppercase;" name="idVisita" id="lugar" required>
          
            <option value="0" style="display:none;"><label>Seleccionar</label></option>

              <?php     
              foreach ($infologin as $key => $value) {    
                       
                               ?>

                                 
         <option value="<?php echo $value['cve_carrera']?>"><?php echo $value['descripcion']?></option>
                                    <?php
                                        }
                                    ?>
          </select>
        </div>


    </div>
   <div class="col-sm">
      <div class="form-group">
        <label   for="idUsuario">Cuatrimestre</label>
           <select class="form-control" style="text-transform:uppercase;" name="idVisita" id="lugar" required>
          
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


    </div>

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
        <label   for="idUsuario">Cuatrimestre</label>
           <select class="form-control" style="text-transform:uppercase;" name="idVisita" id="lugar" required>
          
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