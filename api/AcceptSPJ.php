<?php
require_once "DBConnect.php";

$response = array();
if(isTheseParametersAvailable(array('id_pesan', 'is_accept','accepted_by', 'alasan'))){
					
    //getting the values 
    $id_pesan = $_POST['id_pesan']; 
    $id_detail_pesan = $_POST['id_detail_pesan']; 
    $is_accept = $_POST['is_accept']; 
    $accepted_by = $_POST['accepted_by']; 
    $alasan = $_POST['alasan']; 
    
    //if user is new creating an insert query 
    $stmt = $conn->prepare("UPDATE operasional SET is_accept='$is_accept', accepted_by='$accepted_by', alasan='$alasan' WHERE id_pesan='$id_pesan' AND id_detail_pesan='$id_detail_pesan'");
    // $stmt->bind_param("ssssssssssssss", $id_pesan, $no_pesan, $tgl_pesan, $id_pelanggan, $acara, $tempat_tujuan, $lokasi_penjemputan, $order_dari, $tgl_berangkat, $tgl_pulang, $jam_penjemputan, $lama_sewa, $jumlah_bus, $total_biaya);
    //if the user is successfully added to the database 
    if($stmt->execute()){
        $stmt->close();
        //adding the user data in response 
        $meta = array(
            'code'=>200,
            'message'=>"Konfirmasi berhasil"
        );
        $response['meta'] = $meta; 
    }else{
        $meta = array(
            'code'=>400,
            'message'=>"Konfirmasi gagal"
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