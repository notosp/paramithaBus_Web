<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT * FROM banner");
$stmt->execute();
$stmt->store_result();
$baseUrl = "http://192.168.43.161/paramitha-web/media/banner/";

if($stmt->num_rows > 0){
    $stmt->bind_result($id, $url);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = array(
            'id'=>$id, 
            'url'=>$baseUrl.$url
            );
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data order tersedia"
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