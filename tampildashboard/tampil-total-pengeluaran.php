<?php
 require_once "config.php";

 //get data pengeluaran
 $get_biaya= mysqli_query($conection_db, "SELECT SUM(nominal) AS nominal FROM biaya");
 $count_biaya = mysqli_fetch_array($get_biaya);

?> 
