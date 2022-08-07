<?php
 require_once "config.php";


 //get data transaksi
 $get_trx= mysqli_query($conection_db, "SELECT * FROM transaksi");
 $count_trx = mysqli_num_rows($get_trx);

?>