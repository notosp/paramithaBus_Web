<?php
require_once "DBConnect.php";

$idDriver = $_GET['id_driver'];
$response = array();
$stmt = $conn->prepare("SELECT a.id_pesan, a.no_pesan, a.acara, a.lokasi_tujuan, a.tgl_berangkat, 
a.penjemputan, a.jam_penjemputan, a.jumlah_bus, a.lama_sewa, b.nama,b.phone, a.nik_user, c.kode_bus, 
(SELECT nama FROM karyawan WHERE nik = c.id_driver) as driver, (SELECT nama FROM karyawan 
WHERE nik = c.id_co_driver) as co_driver FROM pesanan a, pelanggan b, detail_pesan c, karyawan d 
where a.id_pelanggan=b.nik AND a.id_pesan = c.id_pesan AND c.id_driver = d.nik AND 
a.tgl_berangkat>=CURRENT_DATE() AND YEAR(a.tgl_berangkat)=YEAR(CURRENT_DATE()) AND c.id_co_driver = '$idDriver' 
ORDER BY `a`.`tgl_berangkat` ASC LIMIT 50");

$stmt->execute();
$stmt->store_result();
$status = "Belum lunas";
$sisa = 0;

if($stmt->num_rows > 0){
    $stmt->bind_result($id_pesan, $no_pesan, $acara, $lokasi_tujuan, $tgl_pelaksanaan, 
                       $penjemputan, $jam_penjemputan, $jumlah_bus, $lama_sewa, 
                       $nama, $phone, $nik_user, $kode_bus, $driver, $co_driver);
    $results = array();
    while ($stmt->fetch()) {
    $results[] = array(
        // 'id_pesan'=>$id_pesan, 
        'no_pesan'=>$no_pesan, 
        'penyewa'=>$nama,
        'phone'=>$phone,
        'lokasi_tujuan'=>$lokasi_tujuan,
        'kegiatan'=>$acara,
        'tgl_pelaksanaan'=>$tgl_pelaksanaan,
        'tempat_penjemputan'=>$penjemputan,
        'jam_penjemputan'=>$jam_penjemputan,
        'jumlah_bus'=>$jumlah_bus,
        'lama_sewa'=>$lama_sewa,
        'kode_bus'=>$kode_bus,
        'driver'=>$driver,
        'co_driver'=>$co_driver
        // 'nik_user'=>$nik_user
        );
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data jadwal tersedia"
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