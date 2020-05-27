<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT DISTINCT a.kode_bus, COUNT(a.kode_bus) as bobot, (SELECT nama FROM karyawan WHERE nik = a.driver) as driver, a.driver as id_driver, (SELECT nama FROM karyawan WHERE nik = a.co_driver) as co_driver, a.co_driver as id_co_driver FROM bus a LEFT JOIN karyawan b ON a.driver = b.nik GROUP BY a.kode_bus ORDER BY COUNT(a.kode_bus) ASC");

$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($kode_bus, $bobot, $driver, $id_driver, $co_driver, $id_co_driver);
    $results = array();
    while ($stmt->fetch()) {
    $results[] = array(
        'kode_bus'=>$kode_bus,
        'bobot'=>$bobot,
        'driver'=>$driver,
        'id_driver'=>$id_driver,
        'co_driver'=>$co_driver,
        'id_co_driver'=>$id_co_driver
        );
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data statistik tersedia"
    );
    $response['meta'] = $meta; 
    $response['data'] = $results;
}else{
    $meta = array(
        'code'=>404,
        'message'=>"Tidak ada data"
    );
    $response['meta'] = $meta; 
}
echo json_encode($response);

function isTheseParametersAvailable($params){
		
	foreach($params as $param){
		if(!isset($_POST[$param])){
			return false; 
		}
	}
	return true; 
}