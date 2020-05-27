<?php
require_once "DBConnect.php";
$year = $_GET['tahun'];
$bulan = $_GET['bulan'];
$idCabang = $_GET['id_cabang'];

$response = array();
$stmt = $conn->prepare("SELECT DISTINCT 
a.id_pesan, a.no_pesan, a.acara, a.lokasi_tujuan, 
a.tgl_berangkat, a.tgl_pulang, a.jumlah_bus, a.tarif_sewa, (a.jumlah_bus*a.tarif_sewa) as total_sewa,
 b.nama, b.phone, (SELECT COALESCE(sum(total_ops),0) FROM operasional 
 WHERE id_pesan=a.id_pesan) as total_ops, (SELECT COALESCE(sum(margin),0) FROM operasional 
 WHERE id_pesan=a.id_pesan) as margin, a.nik_user FROM pesanan a, pelanggan b, operasional c 
 WHERE a.id_pelanggan=b.nik AND a.id_pesan=c.id_pesan AND a.tgl_berangkat<=CURRENT_DATE() 
 and a.jumlah_bus*a.tarif_sewa=(select COALESCE(sum(jumlah_bayar),0) 
 FROM pembayaran where id_pesan = a.id_pesan ) AND YEAR(a.tgl_berangkat)='$year' 
 AND MONTH(a.tgl_berangkat)='$bulan' AND a.id_cabang=$idCabang ORDER BY `a`.`tgl_berangkat` DESC LIMIT 50");

$stmt->execute();
$stmt->store_result();
$status = "Belum lunas";
$sisa = 0;

if($stmt->num_rows > 0){
    $stmt->bind_result($id_pesan, $no_pesan, $acara, $lokasi_tujuan, $tgl_pelaksanaan, 
                       $tgl_pulang, $jumlah_bus, $tarif_sewa, $total_sewa, 
                       $nama, $phone, $total_ops, $margin, $nik_user);
    $results = array();
    while ($stmt->fetch()) {
    $results[] = array(
        // 'id_pesan'=>$id_pesan, 
        'no_pesan'=>$no_pesan, 
        'tgl_pelaksanaan'=>$tgl_pelaksanaan,
        'nama'=>$nama,
        // 'phone'=>$phone,
        'lokasi_tujuan'=>$lokasi_tujuan,
        'acara'=>$acara,
        // 'tgl_pulang'=>$tgl_pulang,
        'jumlah_bus'=>$jumlah_bus,
        // 'lama_sewa'=>$lama_sewa,
        'tarif_sewa'=>$tarif_sewa,
        'total_sewa'=>$total_sewa,
        'total_ops'=>$total_ops,
        'margin'=>$margin
        // 'pendapatan_bersih'=>$pendapatan_bersih,
        // 'nik_user'=>$nik_user
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