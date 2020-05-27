<?php
require_once "DBConnect.php";
$response = array();
			
    $idPesan = $_GET['id_pesan'];
    $stmt = $conn->prepare("DELETE FROM pesanan WHERE id_pesan='$idPesan'");
    if($stmt->execute()){
        $stmt->close();
        $delete = $conn->prepare("DELETE FROM detail_pesan WHERE id_pesan='$idPesan'");
        if($delete->execute()){
            $meta = array(
                'code'=>200,
                'message'=>"Order berhasil dibatalkan"
            );
            $response['meta'] = $meta; 
        }else{
            $meta = array(
                'code'=>400,
                'message'=>"Order gagal dibatalkan"
            );
            $response['meta'] = $meta; 
        }
    }else{
        $meta = array(
            'code'=>400,
            'message'=>"Order gagal dibatalkan"
        );
        $response['meta'] = $meta; 
    }
echo json_encode($response);