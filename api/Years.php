<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT DISTINCT YEAR(tgl_berangkat) FROM pesanan ORDER BY tgl_berangkat desc LIMIT 20");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($tgl_berangkat);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = $tgl_berangkat;
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data tahun tersedia"
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