<?php include_once 'koneksi.php'; 
include('login_session.php'); 
 
$id = $_GET['id']; 
$sql = "DELETE FROM barang WHERE id_barang= '{$id}'"; 
$result =mysqli_query($conn, $sql); 
header('location: data_barang.php'); 
?> 
