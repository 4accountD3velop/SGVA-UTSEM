<?php
/**
* Codigo para consumir un servicio web (Web Service) por medio de NuSoap
* La distribucion del codigo es totalmente gratuita y no tiene ningun tipo de restriccion.
* Se agradece que mantengan la fuente del mismo.

// Le indicamos a PHP que no muestre los Notices (por si el servicio no retorna datos)
// (esto se puede evitar preguntando si hay datos antes de mostrarlos)
error_reporting(1);
// Inclusion de la libreria nusoap (la que contendra toda la conexión con el servidor
require_once('lib/nusoap.php');
$oSoapClient = new soapclient("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", true);
if ($sError = $oSoapClient->getError()) {
 echo "No se pudo realizar la operación [" . $sError . "]";
 die();
}
// Viene de un POST => Selecciono una ciudad
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $aParametros = array("code" => $_POST["codLocalidad"]);
 $aRespuesta = $oSoapClient->call("getWeatherReport", $aParametros);
}
 // Existe alguna falla en el servicio? 15Manual de Web Services en PHP
 if ($oSoapClient->fault) { // Si
 echo 'No se pudo completar la operación';
 die();
 } else { // No
 $sError = $oSoapClient->getError();
 // Hay algun error ?
 if ($sError) { // Si
 echo 'Error:' . $sError;
 }
}
?><html>
 <body>
 <table width="367" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td colspan="2"><div align="center">Datos del tiempo</div></td>
 </tr>
 <tr>
 <td width="147"> </td>
 <td width="220"> </td>
 </tr>
 <tr>
 <td>Nombre:</td>
 <td><?=$aRespuesta["station"]["name"];?></td>
 </tr>
 <tr>
 <td>Elevación:</td>
 <td><?=$aRespuesta["station"]["elevation"]; ?></td>
 </tr>
 <tr>
 <td>Fecha y Hora:</td>
 <td><?=$aRespuesta["timestamp"];?></td>
 </tr>
 <tr>
 <td>País:</td>
 <td><?=$aRespuesta["station"]["country"];?></td>
 </tr>
 <tr>
 <td>Latitud:</td>
 <td><?=$aRespuesta["station"]["latitude"];?></td>
 </tr>
 <tr>
 <td>Longitud:</td>
 <td><?=$aRespuesta["station"]["longitude"];?></td>
 </tr>
 <tr>
 <td>Presión:</td>
 <td><?=$aRespuesta["pressure"]["string"];?></td>
 </tr>
 <tr>
 <td>Temperatura:</td>
 <td><?=$aRespuesta["temperature"]["string"];?></td>
 < /tr>
 <tr>
 <td>Visibilidad:</td>
 <td><?=$aRespuesta["visibility"]["distance"];?> mts.</td>
 </tr>
 </table>
 </body>
*/

/**
  * 
  */
 
           
require_once('./lib/nusoap.php');




class MatriculaxCarrera {

 function peticionAMatriculaxCarrera(){

 $nivel = 6 ;
      $cuatri = "SEP-DIC 21";
      $carrera = "IEV";
     

  
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





public function getIformacionMatriculaxCarrera(){

  $datos2 = self::peticionAMatriculaxCarrera();

  if ($datos2) {
    $arrayDeDatos2 = $datos2['NewDataSet']['Alumnos'];
 
    foreach ($arrayDeDatos2 as $key5 => $value5) {
      
    }
  }else{

    echo "se callog el sistema no devuelve nada";
  }

  return $arrayDeDatos2;
}

}

$matricula = new MatriculaxCarrera();
$infomatricula = $matricula ->getIformacionMatriculaxCarrera();

array_walk_recursive($infomatricula, function(&$item2, $key3) {
 if(!mb_detect_encoding($item2,'utf-8', true)) {
   $item2 = utf8_encode($item2);

 }

});

?> 
<?php


       foreach ($infomatricula as $key => $value2) { 

        ?>
      <tr>

                   
                     

          <td><?php echo $value2['matricula']?></td>
          <td><?php echo $value2['nombre']?></td>
          <td><?php echo $value2['apaterno']?></td>
          <td><?php echo $value2['amaterno']?></td>
          <td><?php echo $value2['sexo']?></td>   
          <td><?php echo $value2['desc_carrera']?></td>
          <td><?php echo $value2['mail']?></td>
          <td><?php echo $value2['desc_grado']?></td>
          <td><button type="button" onclick="tabLaPhp('<?php echo $value2['matricula']; ?>','<?php echo $value2['nombre']; ?>','<?php echo $value2['apaterno']; ?>','<?php echo $value2['amaterno']; ?>','<?php echo $value2['sexo'];?>','<?php echo $value2['desc_carrera']?>', '<?php echo $value2['mail']?>','<?php echo $value2['desc_grado']?>');" class="btn btn-success">Activar</button></td> 
        </tr>

 
<?php
        }  

      
  ?>     




 
?>
