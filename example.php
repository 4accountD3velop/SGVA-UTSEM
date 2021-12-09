<?php
require_once('./lib/nusoap.php');
//$matricula = $_POST['matricula'];


$client = new nusoap_client("http://www.mi-escuelamx.com/ws/wsUTSEM/Datos.asmx?wsdl", 'wsdl', '', '', '', '');
	$err = $client->getError();
	if ($err) {
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	}
	$params = array(
		'lsMatricula' => 'TI2018S041',
		
	);
	$result = $client->call('CalificacionesAlumno', $params);
	if ($result) {
		$data = $result['CalificacionesAlumnoResult']['diffgram'];
	
		//$nombre =$data[NewDataSet][Calificaciones][56][nombre];
		$descripcion =$data[NewDataSet][Calificaciones][56][descripcion];
		//$nivel =$data[NewDataSet][Calificaciones][56][nivel];
		//$ciclo =$data[NewDataSet][Calificaciones][56][ciclo];
               
               $data[NewDataSet][0]][Alumnos][matri]


               

		//echo $nombre;
		echo "<br>";
		//echo utf8_encode($descripcion);
		echo "<br>";
		//echo $nivel;
		echo "<br>";
		//echo $ciclo;
		//echo print_r($data);

	 }

?>