<?php
require_once "DBConnect.php";

$response = array();
if(isTheseParametersAvailable(array(
    'id_pesan', 
    'id_detail_pesan',
    'total_sewa',
    'cas_solar',
    'cas_bongpas_jok',
    'biaya_sewa_after_cas',
    'fee_sewa',
    'biaya_sewa_after_fee',
    'ops_pros',
    'total_ops',
    'bbm',
    'total_premi_crew',
    'paguyuban',
    'premi_diterima_crew',
    'driver',
    'co_driver',
    'margin',
    'nik_user'))){
					
    //getting the values 
    $id_pesan = $_POST['id_pesan'];
    $id_detail_pesan = $_POST['id_detail_pesan'];
    $total_sewa = $_POST['total_sewa'];
    $cas_solar = $_POST['cas_solar'];
    $cas_bongpas_jok = $_POST['cas_bongpas_jok'];
    $biaya_sewa_after_cas = $_POST['biaya_sewa_after_cas']; 
    $fee_sewa = $_POST['fee_sewa']; 
    $biaya_sewa_after_fee = $_POST['biaya_sewa_after_fee']; 
    $ops_pros = $_POST['ops_pros']; 
    $total_ops = $_POST['total_ops']; 
    $bbm = $_POST['bbm']; 
    $total_premi_crew = $_POST['total_premi_crew']; 
    $paguyuban = $_POST['paguyuban']; 
    $premi_diterima_crew = $_POST['premi_diterima_crew']; 
    $driver = $_POST['driver'];
    $co_driver = $_POST['co_driver']; 
    $margin = $_POST['margin']; 
    $nik_user = $_POST['nik_user']; 
    
    //if user is new creating an insert query 
    $stmt = $conn->prepare("INSERT INTO operasional 
    (id_pesan, 
    id_detail_pesan,
    total_sewa,
    cas_solar,
    cas_bongpas_jok,
    biaya_sewa_after_cas,
    fee_sewa,
    biaya_sewa_after_fee,
    ops_pros,
    total_ops,
    bbm,
    total_premi_crew,
    paguyuban,
    premi_diterima_crew,
    driver,
    co_driver,
    margin,
    nik_user) VALUES (
        '$id_pesan', 
        '$id_detail_pesan', 
        '$total_sewa', 
        '$cas_solar', 
        '$cas_bongpas_jok', 
        '$biaya_sewa_after_cas', 
        '$fee_sewa', 
        '$biaya_sewa_after_fee', 
        '$ops_pros', 
        '$total_ops', 
        '$bbm', 
        '$total_premi_crew', 
        '$paguyuban', 
        '$premi_diterima_crew', 
        '$driver', 
        '$co_driver', 
        '$margin', 
        '$nik_user')");
    // $stmt->bind_param("ssssssssssssss", $id_pesan, $no_pesan, $tgl_pesan, $id_pelanggan, $acara, $tempat_tujuan, $lokasi_penjemputan, $order_dari, $tgl_berangkat, $tgl_pulang, $jam_penjemputan, $lama_sewa, $jumlah_bus, $total_biaya);
    //if the user is successfully added to the database 
    if($stmt->execute()){
        $stmt->close();
        //adding the user data in response 
        $meta = array(
            'code'=>200,
            'message'=>"SPJ berhasil dibuat"
        );
        $response['meta'] = $meta; 
    }else{
        $meta = array(
            'code'=>400,
            'message'=>"SPJ gagal dibuat"
        );
        $response['meta'] = $meta; 
    }
    
}else{
    $meta = array(
        'code'=>400,
        'message'=>"Param tidak ditemukan"
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