<?php
require_once "DBConnect.php";

$response = array();
if(isTheseParametersAvailable(array('id_pesan', 'jumlah_bayar','metode_bayar','label','nik_user'))){
					
    //getting the values 
    $id_pesan = $_POST['id_pesan']; 
    $jumlah_bayar = $_POST['jumlah_bayar']; 
    $metode_bayar = $_POST['metode_bayar']; 
    $label = $_POST['label'];
    $nik_user = $_POST['nik_user'];
    
    //if user is new creating an insert query 
    $stmt = $conn->prepare("INSERT INTO pembayaran (id_pesan, jumlah_bayar, metode_bayar, label, nik_user) VALUES ('$id_pesan', '$jumlah_bayar', '$metode_bayar', '$label', '$nik_user')");
    // $stmt->bind_param("ssssssssssssss", $id_pesan, $no_pesan, $tgl_pesan, $id_pelanggan, $acara, $tempat_tujuan, $lokasi_penjemputan, $order_dari, $tgl_berangkat, $tgl_pulang, $jam_penjemputan, $lama_sewa, $jumlah_bus, $total_biaya);
    //if the user is successfully added to the database 
    if($stmt->execute()){
        $stmt->close();
        //adding the user data in response 
        $meta = array(
            'code'=>200,
            'message'=>"Pembayaran berhasil"
        );
        $response['meta'] = $meta; 
    }else{
        $meta = array(
            'code'=>400,
            'message'=>"Pembayaran gagal"
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