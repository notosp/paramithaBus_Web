<?php
require_once "DBConnect.php";

$idPesan = $_GET['id_pesan'];
$response = array();
$stmt = $conn->prepare("SELECT a.id, a.id_pesan, a.kode_bus, (SELECT nama FROM karyawan WHERE nik = a.id_driver) as driver, a.id_driver, (SELECT nama FROM karyawan WHERE nik = a.id_co_driver) as co_driver, a.id_co_driver
FROM detail_pesan a, karyawan b
WHERE a.id_driver = b.nik AND a.id_pesan = '$idPesan'");

$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($id, $id_pesan, $kode_bus, $driver, $id_driver, $co_driver, $id_co_driver);
    $results = array();
    while ($stmt->fetch()) {
    $results[] = array(
        'id'=>$id,
        'id_pesan'=>$id_pesan,
        'kode_bus'=>$kode_bus,
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