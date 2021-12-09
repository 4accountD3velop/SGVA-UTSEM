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
          
   print_r($data);

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