<?php

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$jenis     = $tanggal     = $kategori     = $ket     = "";
$jenis_err = $tanggal_err = $kategori_err = $ket_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name biaya
    $input_jenis = trim($_POST["jenis"]);
    if(empty($input_jenis))
    {
        $jenis_err = "Masukan jenis komplain.";
    }
    elseif(!($input_jenis))
    {
        $jenis_err = "Masukan jenis komplain dengan benar.";
    }
    else
    {
        $jenis = $input_jenis;
    }
    
    // Validate nominal
    $input_tanggal = trim($_POST["tanggal"]);
    if(empty($input_tanggal))
    {
        $tanggal_err = "Masukan tanggal komplain.";
    }
    elseif(!($input_tanggal))
    {
        $tanggal_err = "Masukan tanggal dengan benar.";
    }
    else
    {
        $tanggal = $input_tanggal;
    }
    
    
    // Validate date
    $ik = trim($_POST["kategori"]);
    if(empty($ik))
    {
        $kategori_err = "Masukan kategori komplain.";     
    } 
    elseif(!($ik))
    {
        $kategori_err = "Masukan kategori dengan benar.";
    }
    else
    {
        $kategori = $ik;
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
    if(empty($jenis_err) && empty($tanggal_err) && empty($kategori_err) && empty($ket_err) )
    {
        // Prepare an insert statement
        $sql = "INSERT INTO komplain (jenis, tanggal, kategori, ket) VALUES (?,?,?,?)";
        
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $jenis, $tanggal, $kategori, $ket);
            
            // Set parameters
            
            $jenis= $jenis;
            $tanggal=$tanggal;
            $kategori=$kategori;
            $ket=$ket;
            $param_id=$id;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: form-komplain.php");
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
    <title>Tambah Data Komplain</title>
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
                                    <h2>Tambah Data Komplain</h2>
                                </div>
                                <p>Silakan isi formulir ini & submit untuk menambahkan data ini ke database.</p>
                                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group <?= (!empty($jenis_err)) ? 'has-error' : ''; ?>">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Jenis Komplain</label>
                                    <select name="jenis" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option value="Makanan" <?php if($jenis == "Makanan") { echo "SELECTED"; } ?>>Makanan</option>
                                        <option value="Minuman" <?php if($jenis == "Minuman") { echo "SELECTED"; } ?>>Minuman</option>
                                        <option value="Pelayanan" <?php if($jenis == "Pelayanan") { echo "SELECTED"; } ?>>Pelayanan</option>
                                        <option value="Umum" <?php if($jenis == "Umum") { echo "SELECTED"; } ?>>Umum</option>
                                        <span class="help-block"><?= $jenis_err;?></span>
                                    </select>
                                    </div>
                                    <div class="form-group <?= (!empty($tanggal_err)) ? 'has-error' : ''; ?>">
                                        <label>Tanggal Komplain</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= $tanggal; ?>">
                                        <span class="help-block"><?= $tanggal_err;?></span>
                                    </div>

                                    <div class="form-group <?= (!empty($kategori_err)) ? 'has-error' : ''; ?>">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Kategori Komplain</label>
                                    <select name="kategori" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option value="Ringan" <?php if($kategori == "Ringan") { echo "SELECTED"; } ?>>Ringan</option>
                                        <option value="Sedang" <?php if($kategori == "Sedang") { echo "SELECTED"; } ?>>Sedang</option>
                                        <option value="Berat" <?php if($kategori == "Berat") { echo "SELECTED"; } ?>>Berat</option>
                                        <span class="help-block"><?= $kategori_err;?></span>
                                    </select>
                                    </div>

                                    <div class="form-group <?= (!empty($ket_err)) ? 'has-error' : ''; ?>">
                                        <label>Keterangan</label>
                                        <input type="text" name="ket" class="form-control" value="<?= $ket; ?>">
                                        <span class="help-block"><?= $ket_err;?></span>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="form-komplain.php" class="btn btn-danger " style="color:white;">Cancel</a>
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

