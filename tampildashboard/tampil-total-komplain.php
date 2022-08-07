<?php
 require_once "config.php";

 //get data Komplain
 $get_komplain= mysqli_query($conection_db, "SELECT * FROM komplain");
 $count_komplain = mysqli_num_rows($get_komplain);

?>
