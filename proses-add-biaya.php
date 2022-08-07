<?php

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$namabiaya     = $nominal     = $tanggal     = $ket     = "";
$namabiaya_err = $nominal_err = $tanggal_err = $ket_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name biaya
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
    if(empty($namabiaya_err) && empty($nominal_err) && empty($tanggal_err) && empty($ket_err) )
    {
        // Prepare an insert statement
        $sql = "INSERT INTO biaya (namabiaya, nominal, tanggal, ket) VALUES (?,?,?,?)";
        
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $namabiaya, $nominal, $tanggal, $ket);
            
            // Set parameters
       
            $namabiaya= $namabiaya;
            $nominal=$nominal;
            $tanggal=$tanggal;
            $ket=$ket;
            $param_id=$id;
          
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: form-biaya.php");
                exit();
            }
            else
            {
                echo "Ada yang salah. Silakan coba lagi nanti.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close conection_db
    mysqli_close($conection_db);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tabel Tambah Biaya</title>
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
                                    <h2>Tambah Data Biaya</h2>
                                </div>
                                <p>Silakan isi formulir ini & submit untuk menambahkan data ini ke database.</p>
                                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group <?= (!empty($namabiaya_err)) ? 'has-error' : ''; ?>">
                                        <label>Nama Biaya</label>
                                        <input type="text" name="namabiaya" class="form-control" value="<?= $namabiaya; ?>">
                                        <span class="help-block"><?= $namabiaya_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($nominal_err)) ? 'has-error' : ''; ?>">
                                        <label>Nominal Biaya</label>
                                        <input type="text" name="nominal" class="form-control" value="<?= $nominal; ?>">
                                        <span class="help-block"><?= $nominal_err;?></span>
                                    </div>
                                    <div class="form-group<?= (!empty($tanggal_err)) ? 'has-error' : ''; ?>">
                                        <label>Tanggal Pengeluaran</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= $tanggal; ?>">
                                        <span class="help-block"><?= $tanggal_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($ket_err)) ? 'has-error' : ''; ?>">
                                        <label>Keterangan</label>
                                        <input type="text" name="ket" class="form-control" value="<?= $ket; ?>">
                                        <span class="help-block"><?= $ket_err;?></span>
                                    </div>
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
        
        <?php include_once 'script/js.php';?>
        
    </div>
</body>
</html>

