<?php
require_once "DBConnect.php";

$cabangId = $_GET['id_cabang'];
$baseUrlImage = "http://192.168.43.161/paramitha-web/assets/images/";
$response = array();
$stmt = $conn->prepare("SELECT a.nik,a.nama,a.jk,a.email,a.nohp,a.alamat,b.levell,a.status,c.cabang,a.photo FROM karyawan a, levell b, cabang c where a.id_cabang='$cabangId' and a.karyawan_level=b.id and a.id_cabang=c.id");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($nik, $nama, $jk, $email, $nohp, $alamat, $levell, $status, $cabang, $photo);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = array(
            'nik'=>$nik, 
            'nama'=>$nama,
            'jk'=>$jk,
            'email'=>$email,
            'nohp'=>$nohp,
            'alamat'=>$alamat,
            'posisi'=>$levell,
            'status'=>$status,
            'cabang'=>$cabang,
            'photo'=>$baseUrlImage.$photo
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