<?php
require_once "DBConnect.php";

$bulan = $_GET['bulan'];
$response = array();
$stmt = $conn->prepare("SELECT DISTINCT c.kode_bus, COUNT(c.kode_bus) as bobot, (SELECT nama FROM karyawan WHERE nik = c.id_driver) as driver, c.id_driver, (SELECT nama FROM karyawan WHERE nik = c.id_co_driver) as co_driver, c.id_co_driver FROM pesanan a, detail_pesan c, karyawan d 
where a.id_pesan = c.id_pesan AND c.id_driver = d.nik AND YEAR(a.tgl_berangkat)=YEAR(CURRENT_DATE()) AND MONTH(a.tgl_berangkat)='$bulan' GROUP BY c.kode_bus
ORDER BY COUNT(c.kode_bus) DESC");

$stmt->execute();
$stmt->store_result();
$status = "Belum lunas";
$sisa = 0;

if($stmt->num_rows > 0){
    $stmt->bind_result($kode_bus, $bobot, $driver, $id_driver, $co_driver, $id_co_driver);
    $results = array();
    while ($stmt->fetch()) {
    $results[] = array(
        'kode_bus'=>$kode_bus,
        'bobot'=>$bobot,
        'id_driver'=>$id_driver,
        'driver'=>$driver,
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