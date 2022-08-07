<?php 
//buat variabel

$servername = "localhost";
$username = "root";
$password = "";
$database = "login_system";

//buat variabel
$conection_db = new mysqli($servername, $username, $password, $database);

//periksa koneksi
if ($conection_db->connect_error){
  #code..
  die("Koneksi gagal : " . $conection_db->connect_error); 
}

?>