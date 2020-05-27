<?php
require_once "DBConnect.php";

$response = array();
if(isTheseParametersAvailable(array('id_pelanggan', 'acara','tempat_tujuan','lokasi_penjemputan','order_dari','tgl_berangkat','tgl_pulang','jam_penjemputan','lama_sewa','jumlah_bus','biaya_sewa','nik_user','id_cabang'))){
					
    //getting the values 
    $id_pesan = getRandomId(5);
    $no_pesan = getNoPesan(5);
    $tgl_pesan = date("Y-m-d");
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
    $id_cabang = $_POST['id_cabang']; 
    
    //if user is new creating an insert query 
    $stmt = $conn->prepare("INSERT INTO pesanan (id_pesan, no_pesan, id_pelanggan, acara, penjemputan, lokasi_tujuan, order_dari, tgl_pesan, tgl_berangkat, jam_penjemputan, tgl_pulang, jumlah_bus, lama_sewa, tarif_sewa, nik_user, id_cabang) VALUES ('$id_pesan', '$no_pesan', '$id_pelanggan', '$acara', '$lokasi_penjemputan', '$tempat_tujuan', '$order_dari', '$tgl_pesan', '$tgl_berangkat', '$jam_penjemputan', '$tgl_pulang', '$jumlah_bus', '$lama_sewa', '$biaya_sewa', '$nik_user', '$id_cabang')");
    // $stmt->bind_param("ssssssssssssss", $id_pesan, $no_pesan, $tgl_pesan, $id_pelanggan, $acara, $tempat_tujuan, $lokasi_penjemputan, $order_dari, $tgl_berangkat, $tgl_pulang, $jam_penjemputan, $lama_sewa, $jumlah_bus, $total_biaya);
    //if the user is successfully added to the database 
    if($stmt->execute()){
        $stmt->close();
        //adding the user data in response 
        $meta = array(
            'code'=>200,
            'message'=>"Order berhasil ditambahkan"
        );
        $response['meta'] = $meta; 
    }else{
        $meta = array(
            'code'=>400,
            'message'=>"Order gagal ditambahkan"
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
 
function getRandomId($length) {
    $include_chars = "0123456789abcdefghijklmnopqrstuvwxyz";
    /* Uncomment below to include symbols */
    /* $include_chars .= "[{(!@#$%^/&*_+;?\:)}]"; */
    $charLength = strlen($include_chars);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $include_chars [rand(0, $charLength - 1)];
    }
    return $randomString;
}

function getNoPesan($length) {
    $include_chars = "0123456789";
    /* Uncomment below to include symbols */
    /* $include_chars .= "[{(!@#$%^/&*_+;?\:)}]"; */
    $charLength = strlen($include_chars);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $include_chars [rand(0, $charLength - 1)];
    }
    return $randomString;
}