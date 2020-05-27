<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT a.id_pesan, a.no_pesan, a.id_pelanggan, b.nama, b.phone, b.email, b.alamat, a.acara, a.penjemputan, a.lokasi_tujuan, a.order_dari, a.tgl_pesan, a.tgl_berangkat, a.jam_penjemputan, a.tgl_pulang, a.jumlah_bus, a.lama_sewa, a.tarif_sewa, a.biaya_tambahan, a.fee_marketing, a.opr, a.nik_user, (select COALESCE(sum(jumlah_bayar),0) as jumlah_bayar FROM pembayaran where id_pesan = a.id_pesan ) FROM pesanan a, pelanggan b where a.id_pelanggan = b.nik and a.tgl_berangkat>=CURRENT_DATE() ORDER BY a.tgl_berangkat  DESC LIMIT 50");
$stmt->execute();
$stmt->store_result();
$status = "Belum lunas";
$sisa = 0;

if($stmt->num_rows > 0){
    $stmt->bind_result($id_pesan, $no_pesan, $id_pelanggan, $nama, $phone, $email, $alamat, $acara, $penjemputan, $lokasi_tujuan, $order_dari, $tgl_pesan, $tgl_pelaksanaan, $jam_penjemputan, $tgl_pulang, $jumlah_bus, $lama_sewa, $tarif_sewa, $biaya_tambahan, $fee_marketing, $opr, $nik_user, $jumlah_bayar);
    $results = array();
    while ($stmt->fetch()) {
        $totalCost = $tarif_sewa*$jumlah_bus;
        if($totalCost==$jumlah_bayar){
            $status = "Lunas";
            $sisa = 0;
        }else if($jumlah_bayar>$tarif_sewa){
            $status = "Lunas, pembayaran berlebih";
            $sisa = $totalCost-$jumlah_bayar;
        }else{
            $status = "Belum lunas";
            $sisa = $totalCost-$jumlah_bayar;
        }
    $results[] = array(
        'id_pesan'=>$id_pesan, 
        'no_pesan'=>$no_pesan, 
        'id_pelanggan'=>$id_pelanggan,
        'nama'=>$nama,
        'phone'=>$phone,
        'email'=>$email,
        'alamat'=>$alamat,
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
        'is_history'=>false
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