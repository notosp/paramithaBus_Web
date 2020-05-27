<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT nik, nama, phone, email, alamat FROM pelanggan order by id desc limit 50");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($nik, $nama, $phone, $email, $alamat);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = array(
            'nik'=>$nik, 
            'nama'=>$nama, 
            'phone'=>$phone,
            'email'=>$email,
            'alamat'=>$alamat
            );
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
        'message'=>"Tidak ada data"
    );
    $response['meta'] = $meta; 
}
echo json_encode($response);