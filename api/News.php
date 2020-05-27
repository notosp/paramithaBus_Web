<?php
require_once "DBConnect.php";

$response = array();
$stmt = $conn->prepare("SELECT judul_berita, tanggal_berita, gambar_berita, author_berita, slug_berita FROM berita order by tanggal_berita desc limit 10");
$stmt->execute();
$stmt->store_result();
$baseUrl = "http://192.168.43.161/paramitha-web/blog/";
$baseUrlImage = "http://192.168.43.161/paramitha-web/assets/images/";

if($stmt->num_rows > 0){
    $stmt->bind_result($judul_berita, $tanggal_berita, $gambar_berita, $author_berita, $slug_berita);
    $results = array();
    while ($stmt->fetch()) {
        $results[] = array(
            'judul_berita'=>$judul_berita,
            'tanggal_berita'=>$tanggal_berita,
            'gambar_berita'=>$baseUrlImage.$gambar_berita,
            'author_berita'=>$author_berita,
            'slug_berita'=>$baseUrl.$slug_berita
            );
    }
    $meta = array(
        'code'=>200,
        'message'=>"Data order tersedia"
    );
    $response['meta'] = $meta; 
    $response['data'] = $results;
}else{
    $meta = array(
        'code'=>404,
        'message'=>"Tidak ada data"
    );
    $response['meta'] = $meta; 
}
echo json_encode($response);