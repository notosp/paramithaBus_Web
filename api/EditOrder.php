<?php
require_once "DBConnect.php";

$response = array();
if(isTheseParametersAvailable(array('id_pelanggan', 'acara','tempat_tujuan','lokasi_penjemputan','order_dari','tgl_berangkat','tgl_pulang','jam_penjemputan','lama_sewa','jumlah_bus','biaya_sewa','nik_user'))){
					
    //getting the values 
    $id_pesan = $_POST['id_pesan'];
    $id_pelanggan = $_POST['id_pelanggan']; 
    $acara = $_POST['acara']; 
    $tempat_tujuan = $_POST['tempat_tujuan']; 
    $lokasi_penjemputan = $_POST['lokasi_penjemputan'];
    $order_dari = $_POST['order_dari']; 
    $tgl_berangkat = $_POST['tgl_berangkat']; 
    $tgl_pulang = $_POST['tgl_pulang']; 
    $jam_penjemputan = $_POST['jam_penjemputan']; 
    $lama_sewa = $_POST['lama_sewa']; 
    $jumlah_bus = $_POST['jumlah_bus']; 
    $biaya_sewa = $_POST['biaya_sewa']; 
    $nik_user = $_POST['nik_user'];
    
    //if user is new creating an insert query 
    $stmt = $conn->prepare("UPDATE pesanan SET 
    id_pelanggan = '$id_pelanggan',
    acara = '$acara',
    lokasi_tujuan = '$tempat_tujuan',
    penjemputan = '$lokasi_penjemputan',
    order_dari = '$order_dari',
    tgl_berangkat = '$tgl_berangkat',
    tgl_pulang = '$tgl_pulang',
    jam_penjemputan = '$jam_penjemputan',
    -- lama_sewa = '$lama_sewa',
    jumlah_bus = '$jumlah_bus',
    tarif_sewa = '$biaya_sewa',
    nik_user = '$nik_user'
    WHERE id_pesan = '$id_pesan'");
    // $stmt->bind_param("ssssssssssssss", $id_pesan, $no_pesan, $tgl_pesan, $id_pelanggan, $acara, $tempat_tujuan, $lokasi_penjemputan, $order_dari, $tgl_berangkat, $tgl_pulang, $jam_penjemputan, $lama_sewa, $jumlah_bus, $total_biaya);
    //if the user is successfully added to the database 
    if($stmt->execute()){
        $stmt->close();
        //adding the user data in response 
        $meta = array(
            'code'=>200,
            'message'=>"Order berhasil diubah"
        );
        $response['meta'] = $meta; 
    }else{
        $meta = array(
            'code'=>400,
            'message'=>"Order gagal diubah"
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