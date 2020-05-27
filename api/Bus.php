<?php
require_once "DBConnect.php";

$baseUrlImage = "http://192.168.43.161/paramitha-web/assets/images/";
$response = array();
$stmt = $conn->prepare("SELECT kode_bus, no_polisi, jumlah_kursi, jenis_bus, no_uji, tgl_akhir_uji, no_kps, tgl_akhir_kps, no_mesin, no_angka, merk_type, pemilik, photo_bus FROM bus");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($kode_bus, $no_polisi, $jumlah_kursi, $jenis_bus, $no_uji, $tgl_akhir_uji, 
    $no_kps, $tgl_akhir_kps, $no_mesin, $no_angka, $merk_type, $pemilik, $photo_bus);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = array(
            'kode_bus'=>$kode_bus, 
            'no_polisi'=>$no_polisi,
            // 'jumlah_kursi'=>$jumlah_kursi,
            'jenis_bus'=>$jenis_bus,
            'no_uji'=>$no_uji,
            'tgl_akhir_uji'=>$tgl_akhir_uji,
            'no_kps'=>$no_kps,
            'tgl_akhir_kps'=>$tgl_akhir_kps,
            'no_mesin'=>$no_mesin,
            'no_angka'=>$no_angka,
            'merk_type'=>$merk_type,
            'pemilik'=>$pemilik
            // 'photo_bus'=>$baseUrlImage.$photo_bus
            );
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data bus tersedia"
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