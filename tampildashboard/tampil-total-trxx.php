<?php
 require_once "config.php";


 //get data transaksi
 $get_trxx= mysqli_query($conection_db, "SELECT SUM(nominal) AS nominal FROM biaya");
 $count_trxx = mysqli_num_rows($get_trxx);

?>