<?php
require_once "DBConnect.php";
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "db_paramitha";
 
// $conn = new mysqli($servername, $username, $password, $database);
// if (mysqli_connect_error()) {
//     die("Database connection failed: " . mysqli_connect_error());
// }
$baseUrlImage = "http://192.168.43.161/paramitha-web/assets/images/";
$response = array();
if(isTheseParametersAvailable(array('username', 'password'))){
					
    $username = $_GET['username'];
    $password = md5($_GET['password']); 
    
    $stmt = $conn->prepare("SELECT nik, nama, username, email, nohp, status, karyawan_level, photo FROM karyawan WHERE username = '$username' AND pass = '$password'");
    // $stmt->bind_param("ss",$username, $password);
    
    $stmt->execute();
    
    $stmt->store_result();
    
    if($stmt->num_rows > 0){
        
        $stmt->bind_result($nik, $nama, $username, $email, $nohp, $status, $karyawan_level, $photo);
        $stmt->fetch();

        $meta = array(
            'code'=>200,
            'message'=>"Login successfull"
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
            'message'=>"Invalid username or password"
        );
        $response['meta'] = $meta; 
    }
}

echo json_encode($response);
	
function isTheseParametersAvailable($params){
		
	foreach($params as $param){
		if(!isset($_GET[$param])){
			return false; 
		}
	}
	return true; 
}