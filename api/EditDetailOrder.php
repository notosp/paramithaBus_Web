<?php
require_once "DBConnect.php";

$response = array();
if(isTheseParametersAvailable(array('id', 'kode_bus','id_driver','id_co_driver'))){
					
    //getting the values 
    $id = $_POST['id'];
    $kode_bus = $_POST['kode_bus']; 
    $id_driver = $_POST['id_driver']; 
    $id_co_driver = $_POST['id_co_driver']; 
    
    //if user is new creating an insert query 
    $stmt = $conn->prepare("UPDATE detail_pesan SET 
    kode_bus = '$kode_bus',
    id_driver = '$id_driver',
    id_co_driver = '$id_co_driver'
    WHERE id = '$id'");
    // $stmt->bind_param("ssssssssssssss", $id_pesan, $no_pesan, $tgl_pesan, $id_pelanggan, $acara, $tempat_tujuan, $lokasi_penjemputan, $order_dari, $tgl_berangkat, $tgl_pulang, $jam_penjemputan, $lama_sewa, $jumlah_bus, $total_biaya);
    //if the user is successfully added to the database 
    if($stmt->execute()){
        $stmt->close();
        //adding the user data in response 
        $meta = array(
            'code'=>200,
            'message'=>"Data bus berhasil diubah"
        );
        $response['meta'] = $meta; 
    }else{
        $meta = array(
            'code'=>400,
            'message'=>"Data bus gagal diubah"
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