<?php
require_once "DBConnect.php";

$key = $_GET['key'];

$response = array();
$stmt = $conn->prepare("SELECT nik, nama FROM pelanggan where nama like '%$key%' order by nama asc limit 50");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($nik, $nama);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = $nama."#".$nik;
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data karyawan tersedia"
    );
    $response['meta'] = $meta; 
    $response['data'] = $results;
}else{
    $meta = array(
        'code'=>404,
        'message'=>"Data pelanggan tidak ditemukan, silahkan tambahkan data penyewa dengan klik tombol sebelah kanan."
    );
    $response['meta'] = $meta; 
}
echo json_encode($response);