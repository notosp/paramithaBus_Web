<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT a.id_pesan, a.no_pesan, a.id_pelanggan, a.acara, a.penjemputan, a.lokasi_tujuan, a.order_dari, a.tgl_pesan, a.tgl_berangkat, a.jam_penjemputan, a.tgl_pulang, a.jumlah_bus, a.lama_sewa, a.tarif_sewa, a.biaya_tambahan, a.fee_marketing, a.opr, a.nik_user, (select COALESCE(sum(jumlah_bayar),0) as jumlah_bayar FROM pembayaran where id_pesan = a.id_pesan ) FROM pesanan a where a.tgl_berangkat<=CURRENT_DATE() and a.tarif_sewa*a.jumlah_bus=(select COALESCE(sum(jumlah_bayar),0) FROM pembayaran where id_pesan = a.id_pesan ) ORDER BY `a`.`tgl_berangkat`  DESC LIMIT 50");
$stmt->execute();
$stmt->store_result();
$status = "Belum lunas";
$sisa = 0;

if($stmt->num_rows > 0){
    $stmt->bind_result($id_pesan, $no_pesan, $id_pelanggan, $acara, $penjemputan, $lokasi_tujuan, $order_dari, $tgl_pesan, $tgl_pelaksanaan, $jam_penjemputan, $tgl_pulang, $jumlah_bus, $lama_sewa, $tarif_sewa, $biaya_tambahan, $fee_marketing, $opr, $nik_user, $jumlah_bayar);
    $results = array();
    while ($stmt->fetch()) {
        $total_sewa = $tarif_sewa*$jumlah_bus;
        if($total_sewa==$jumlah_bayar){
            $status = "Lunas";
            $sisa = 0;
        }else if($jumlah_bayar>$total_sewa){
            $status = "Lunas, pembayaran berlebih";
            $sisa = $total_sewa-$jumlah_bayar;
        }else{
            $status = "Belum lunas";
            $sisa = $total_sewa-$jumlah_bayar;
        }
    $results[] = array(
        'id_pesan'=>$id_pesan, 
        'no_pesan'=>$no_pesan, 
        'id_pelanggan'=>$id_pelanggan,
        'acara'=>$acara,
        'penjemputan'=>$penjemputan,
        'lokasi_tujuan'=>$lokasi_tujuan,
        'order_dari'=>$order_dari,
        'tgl_pesan'=>$tgl_pesan,
        'tgl_pelaksanaan'=>$tgl_pelaksanaan,
        'jam_penjemputan'=>$jam_penjemputan,
        'tgl_pulang'=>$tgl_pulang,
        'jumlah_bus'=>$jumlah_bus,
        'lama_sewa'=>$lama_sewa,
        'tarif_sewa'=>$tarif_sewa,
        'biaya_tambahan'=>$biaya_tambahan,
        'fee_marketing'=>$fee_marketing,
        'opr'=>$opr,
        'nik_user'=>$nik_user,
        'status'=>$status,
        'sisa'=>$sisa,
        'is_history'=>true
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

function isTheseParametersAvailable($params){
		
	foreach($params as $param){
		if(!isset($_POST[$param])){
			return false; 
		}
	}
	return true; 
}