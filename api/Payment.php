<?php
require_once "DBConnect.php";

$idPesan = $_GET['id_pesan'];
$response = array();
$stmt = $conn->prepare("SELECT a.id_bayar,a.id_pesan,a.tgl_bayar,a.jumlah_bayar,a.metode_bayar,a.nik_user,b.jumlah_bus,b.tarif_sewa FROM pembayaran a,pesanan b where a.id_pesan='$idPesan' and a.id_pesan = b.id_pesan order by a.tgl_bayar asc");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($id_bayar, $id_pesan, $tgl_bayar, $jumlah_bayar, $metode_bayar, $nik_user, $jumlah_bus, $tarif_sewa);
    $results = array();
    $totalBayar = 0;
    while ($stmt->fetch()) {
        $totalSewa = $jumlah_bus*$tarif_sewa;
        $label = "Belum lunas";
        $totalBayar = $totalBayar + $jumlah_bayar;
        if($totalBayar<$totalSewa){
            $label = "Belum lunas";
        }else{
            $label = "Lunas";
        }
        $results[] = array(
            'id_bayar'=>$id_bayar, 
            'id_pesan'=>$id_pesan, 
            'tgl_bayar'=>$tgl_bayar,
            'jumlah_bayar'=>$jumlah_bayar,
            'metode_bayar'=>$metode_bayar,
            'label'=>$label,
            'nik_user'=>$nik_user
            );
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data pembayaran tersedia"
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