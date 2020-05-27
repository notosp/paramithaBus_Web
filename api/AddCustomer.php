<?php
require_once "DBConnect.php";

$response = array();
if(isTheseParametersAvailable(array('nik', 'nama','phone','email','alamat'))){
					
    //getting the values 
    $nik = $_POST['nik']; 
    $nama = $_POST['nama']; 
    $phone = $_POST['phone']; 
    $email = $_POST['email'];
    $alamat = $_POST['alamat']; 

    $query = $conn->prepare("SELECT nik, nama, phone, email, alamat FROM pelanggan WHERE nik = '$nik'");
    // $stmt->bind_param("ss",$username, $password);
    
    $query->execute();
    
    $query->store_result();
    
    if($query->num_rows > 0){
        $query->bind_result($nik, $nama, $phone, $email, $alamat);
        $query->fetch();

        $meta = array(
            'code'=>200,
            'message'=>"Data pelanggan dengan nik ".$nik." sudah ada."
        );
        
        $user = array(
            'nik'=>$nik, 
            'nama'=>$nama, 
            'phone'=>$phone,
            'email'=>$email,
            'alamat'=>$alamat
        );
        
        $response['meta'] = $meta; 
        $response['data'] = $user; 
    }else{
       //if user is new creating an insert query 
        $stmt = $conn->prepare("INSERT INTO pelanggan (nik, nama, phone, email, alamat) VALUES ('$nik', '$nama', '$phone', '$email', '$alamat')");
        // $stmt->bind_param("sssss", $nik, $nama, $phone, $email, $alamat);
        //if the user is successfully added to the database 
        if($stmt->execute()){
            $stmt->close();
        //adding the user data in response 
            $meta = array(
                'code'=>201,
                'message'=>"Data pelanggan berhasil ditambahkan"
            );
            $response['meta'] = $meta; 
        }else{
            $meta = array(
                'code'=>400,
                'message'=>"Data pelanggan gagal ditambahkan"
            );
            $response['meta'] = $meta; 
        }
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