<?php
require_once "DBConnect.php";

$baseUrlImage = "http://192.168.43.161/paramitha-web/assets/images/";
$response = array();
if(isTheseParametersAvailable(array('nik', 'nama','username','password'))){
					
    //getting the values 
    $nik = $_POST['nik']; 
    $nama = $_POST['nama']; 
    $username = $_POST['username']; 
    $password = md5($_POST['password']);
    
    //if user is new creating an insert query 
    $stmt = $conn->prepare("update karyawan set username='$username', pass='$password' where nik='$nik'");
    // $stmt->bind_param("sss", $nik, $username, $password);
    //if the user is successfully added to the database 
    if($stmt->execute()){
        $stmt->close();
        //adding the user data in response 

        $stmt = $conn->prepare("SELECT nik, nama, username, email, nohp, status, karyawan_level, photo FROM karyawan WHERE nik='$nik'");
        // $stmt->bind_param("ss",$username, $password);
        $stmt->execute();
    
        $stmt->store_result();
    
        if($stmt->num_rows > 0){
        
            $stmt->bind_result($nik, $nama, $username, $email, $nohp, $status, $karyawan_level, $photo);
            $stmt->fetch();

            $meta = array(
                'code'=>200,
                'message'=>"Data ".$nama." berhasil diubah."
            );
        
            $user = array(
                'nik'=>$nik, 
                'nama'=>$nama, 
                'username'=>$username,
                'email'=>$email,
                'nohp'=>$nohp,
                'status'=>$status,
                'karyawan_level'=>$karyawan_level,
                'photo'=>$baseUrlImage.$photo
            );
        
            $response['meta'] = $meta; 
            $response['data'] = $user; 
        }else{
            $meta = array(
                'code'=>404,
                'message'=>"Gagal mengambil data user!"
            );
            $response['meta'] = $meta; 
        }
    
    }else{
        $meta = array(
            'code'=>400,
            'message'=>"Ubah data gagal"
        );
        $response['meta'] = $meta; 
    }
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