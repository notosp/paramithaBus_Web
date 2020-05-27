<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT DISTINCT MONTH(tgl_berangkat) as bulan FROM pesanan WHERE YEAR(tgl_berangkat)=YEAR(CURRENT_DATE()) ORDER BY YEAR(tgl_berangkat) ASC");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($bulan);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = $bulan;
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