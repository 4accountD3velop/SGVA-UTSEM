<?php
require_once('./lib/nusoap.php');
class Ciclos {

 function peticionACiclos(){

  
$client1 = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
    $err = $client1->getError();
    if ($err) {
        echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    } 
     
   
    $result1 = $client1->call('Ciclos');
    $data1 = $result1['CiclosResult']['diffgram'];

        //print_r($data1);

 // return $data1;

return $data1;
}





public function getIformacionCiclos(){

  $datos1 = self::peticionACiclos();

  if ($datos1) {
    $arrayDeDatos1 = $datos1['NewDataSet']['Ciclos'];

    foreach ($arrayDeDatos1 as $key4 => $value4) {
     // print_r($value);
      echo "<br>";
    }
  }else{

    echo "se callog el sistema no devuelve nada";
  }

  return $arrayDeDatos1;
}

}

$ciclos = new Ciclos();
$infociclos = $ciclos ->getIformacionCiclos();

//print_r($infociclos);
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
           $property_types = array();
           $property_types1 = array();
              foreach($infociclos as $key => $filter_result){
    if ( in_array($filter_result['ciclo'], $property_types) ) {
        continue;  
      }
       $property_types[] = $filter_result['ciclo'];
      if ( in_array($filter_result['ciclo'], $property_types1) ) {
        continue;  
      }
       
      $property_types1[] = $filter_result['ciclo'];
     
   
                               ?>

                               
         <option value="<?php echo $filter_result['ciclo'];?>"><?php echo $filter_result['ciclo']?></option>
                                    <?php
            
                                  }