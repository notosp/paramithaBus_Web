<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT id, cabang FROM cabang order by cabang asc");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($id, $cabang);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = array(
            'id'=>$id, 
            'cabang'=>$cabang
            );
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data cabang tersedia"
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