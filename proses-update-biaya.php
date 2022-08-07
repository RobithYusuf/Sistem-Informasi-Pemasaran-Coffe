<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$namabiaya     = $nominal     = $tanggal     = $ket     = "";
$namabiaya_err = $nominal_err = $tanggal_err = $ket_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_namabiaya = trim($_POST["namabiaya"]);
    if(empty($input_namabiaya))
    {
        $namabiaya_err = "Masukan nama biaya.";
    }
    elseif(!filter_var($input_namabiaya, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $namabiaya_err = "Masukan nama biaya dengan benar.";
    }
    else
    {
        $namabiaya = $input_namabiaya;
    }
 // Validate nominal
 $input_nominal = trim($_POST["nominal"]);
 if(empty($input_nominal))
 {
     $nominal_err = "Masukan nominal biaya.";
 }
 elseif(!ctype_digit($input_nominal))
 {
     $nominal_err = "Masukan nominal dengan benar.";
 }
 else
 {
     $nominal = $input_nominal;
 }
 
 
 // Validate date
 $input_tanggal = trim($_POST["tanggal"]);
 if(empty($input_tanggal))
 {
     $tanggal_err = "Masukan tanggal pengeluaran.";     
 } 
 elseif(!($input_tanggal))
 {
     $tanggal_err = "Masukan tanggal dengan benar.";
 }
 else
 {
     $tanggal = $input_tanggal;
 }
 
 
 // Validate Keterangan
 $input_ket = trim($_POST["ket"]);
 if(empty($input_ket))
 {
     $ket_err= "Masukan keterangan biaya.";     
 } 
 elseif(!($input_ket))
 {
     $ket_err = "Masukan Keterangan dengan benar.";
 }
 else
 {
     $ket = $input_ket;
 }


 // Check input errors before inserting in database
 if(empty($namabiaya_err) && empty($nominal_err) && empty($tanggal_err) && empty($ket_err))
 {
     // Prepare an update statement
     $sql = "UPDATE biaya SET namabiaya=?, nominal=?, tanggal=?, ket=? WHERE id=?";

     if($stmt = mysqli_prepare($conection_db, $sql))
     {
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "ssssi", $namabiaya, $nominal, $tanggal, $ket, $param_id);

         // Set parameters
         $namabiaya= $namabiaya;
         $nominal=$nominal;
         $tanggal=$tanggal;
         $ket=$ket;
         $param_id=$id;
       
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt))
         {
             // Records updated successfully. Redirect to landing page
             header("location: form-biaya.php");
             exit();
         }
         else
         {
             echo "Something went wrong. Please try again later.";
         }
     }
      
     // Close statement
     mysqli_stmt_close($stmt);
 }
 
 // Close conection_db
 mysqli_close($conection_db);
}
else
{
 // Check existence of id parameter before processing further
 if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
 {
     // Get URL parameter
     $id =  trim($_GET["id"]);
     
     // Prepare a select statement
     $sql = "SELECT * FROM biaya WHERE id = ?";
     if($stmt = mysqli_prepare($conection_db, $sql))
     {
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "i", $param_id);
         
         // Set parameters
         $param_id = $id;
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt))
         {
             $result = mysqli_stmt_get_result($stmt);
 
             if(mysqli_num_rows($result) == 1)
             {
                 /* Fetch result row as an associative array. Since the result set
                 contains only one row, we don't need to use while loop */
                 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                 
                 // Retrieve individual field value
                 $namabiaya       = $row["namabiaya"];
                 $nominal   = $row["nominal"];
                 $tanggal = $row["tanggal"];
                 $ket     = $row["ket"];

             }
             else
             {
                 // URL doesn't contain valid id. Redirect to error page
                 header("location: error.php");
                 exit();
             }
         }
         else
         {
             echo "Ups! Ada yang salah. Silakan coba lagi nanti.";
         }
     }
     
     // Close statement
     mysqli_stmt_close($stmt);
     
     // Close conection_db
     mysqli_close($conection_db);
 }
 else
 {
     // URL doesn't contain id parameter. Redirect to error page
     header("location: error.php");
     exit();
 }
}

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Menu Update</title>
<!-- style css php -->
<?php include_once 'css_style/style.php';?>
<!-- add style css -->
<!-- end style css php -->
	<body>
    <style>
        .help-block{
            color:red;
        }
    </style>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'sidebar/nav_form.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'sidebar/navbar.php';?>
                <!-- end navbar -->
				<div class="wrapper wrapper-content">
                    <div class="signup-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    <h2>Update Data</h2>
                                </div>
                                <p>Silakan isi formulir ini & submit untuk menambahkan data ini ke database.</p>
                                <form action="<?= htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                                    <div class="form-group <?= (!empty($namabiaya_err)) ? 'has-error' : ''; ?>">
                                        <label>Nama Biaya/Pengeluaran</label>
                                        <input type="text" name="namabiaya" class="form-control" value="<?= $namabiaya; ?>">
                                        <span class="help-block"><?= $namabiaya_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($nominal_err)) ? 'has-error' : ''; ?>">
                                        <label>Nominal Pengeluaran</label>
                                        <input type="text" name="nominal" class="form-control" value="<?= $nominal; ?>">
                                        <span class="help-block"><?= $nominal_err;?></span>
                                    </div>
                                    
                                    <div class="form-group<?= (!empty($tanggal_err)) ? 'has-error' : ''; ?>">
                                        <label>Tanggal Pengeluaran</label>
                                        <input type="text" name="tanggal" class="form-control" value="<?= $tanggal; ?>">
                                        <span class="help-block"><?= $tanggal_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($ket_err)) ? 'has-error' : ''; ?>">
                                        <label>Keterangan</label>
                                        <input type="text" name="ket" class="form-control" value="<?= $ket; ?>">
                                        <span class="help-block"><?= $ket_err;?></span>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $id; ?>"/>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="form-biaya.php" class="btn btn-danger" style="color:white;">Cancel</a>
                                </form>
                            </div>
                    </div>        
                </div>
                </div>
            </div>
                <!-- foodter -->
                
				<!-- end foodter -->
			</div>
            
		</div>
        <!-- <script> js php import</script> -->
        <?php include_once 'script/js.php';?>
           <!-- <script> import</script> -->
	</body>
</html>


