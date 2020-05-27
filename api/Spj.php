<?php
require_once "DBConnect.php";

$idPesan = $_GET['id_pesan'];
$idDetailPesan = $_GET['id_detail_pesan'];
$response = array();
$stmt = $conn->prepare("SELECT
id_opr,  
id_pesan, 
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
is_accept, 
accepted_by, (select nama from karyawan where nik=accepted_by) as nama, alasan from operasional WHERE id_pesan ='$idPesan' AND id_detail_pesan ='$idDetailPesan'");
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result(
    $id_opr,
    $id_pesan, 
    $id_detail_pesan,
    $total_sewa,
    $cas_solar,
    $cas_bongpas_jok,
    $biaya_sewa_after_cas,
    $fee_sewa,
    $biaya_sewa_after_fee,
    $ops_pros,
    $total_ops,
    $bbm,
    $total_premi_crew,
    $paguyuban,
    $premi_diterima_crew,
    $driver,
    $co_driver,
    $margin, 
    $is_accept, 
    $accepted_by,
    $nama,
    $alasan);
    $stmt->fetch();
 
    $meta = array(
        'code'=>200,
        'message'=>"Data SPJ tersedia"
    );

    $spj = array(
        'id_opr'=>$id_opr, 
        'id_pesan'=>$id_pesan, 
        'id_detail_pesan'=>$id_detail_pesan,
        'total_sewa'=>$total_sewa,
        'cas_solar'=>$cas_solar,
        'cas_bongpas_jok'=>$cas_bongpas_jok,
        'biaya_sewa_after_cas'=>$biaya_sewa_after_cas,
        'fee_sewa'=>$fee_sewa,
        'biaya_sewa_after_fee'=>$biaya_sewa_after_fee,
        'ops_pros'=>$ops_pros,
        'total_ops'=>$total_ops,
        'bbm'=>$bbm,
        'total_premi_crew'=>$total_premi_crew,
        'paguyuban'=>$paguyuban,
        'premi_diterima_crew'=>$premi_diterima_crew,
        'driver'=>$driver,
        'co_driver'=>$co_driver,
        'margin'=>$margin,
        'is_accept'=>$is_accept,
        'accepted_by'=>$accepted_by,
        'nama'=>$nama,
        'alasan'=>$alasan
        );

    $response['meta'] = $meta; 
    $response['data'] = $spj;
}else{
    $meta = array(
        'code'=>404,
        'message'=>"Tidak ada data"
    );
    $response['meta'] = $meta; 
}
echo json_encode($response);