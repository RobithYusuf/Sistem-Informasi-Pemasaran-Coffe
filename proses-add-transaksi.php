<?php

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nama     = $kategori     = $jumlah      = $tanggal     = $totalharga     = "";
$nama_err = $kategori_err = $jumlah_err  = $tanggal_err = $totalharga_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name
    $inputnama = trim($_POST["nama"]);
    if(empty($inputnama))
    {
        $nama_err = "Masukan nama produk.";
    }
    elseif(!($inputnama))
    {
        $nama_err = "Masukan nama produk dengan benar.";
    }
    else
    {
        $nama = $inputnama;
    }

    // Validate kategori
    $inputkategori = trim($_POST["kategori"]);
    if(empty($inputkategori))
    {
        $kategori_err = "Masukan kategori produk.";
    }
    elseif(!($inputkategori))
    {
        $kategori_err = "Masukan kategori produk dengan benar.";
    }
    else
    {
        $kategori = $inputkategori;
    }

    // Validate jumlah
    $inputjumlah = trim($_POST["jumlah"]);
    if(empty($inputjumlah))
    {
        $jumlah_err = "Masukan jumlah produk.";
    }
    elseif(!($inputjumlah))
    {
        $jumlah_err = "Masukan jumlah produk dengan benar.";
    }
    else
    {
        $jumlah = $inputjumlah;
    }

    // Validate age
    $inputtanggal = trim($_POST["tanggal"]);
    if(empty($inputtanggal))
    {
        $tanggal_err = "Masukan tanggal transaksi.";     
    } 
    elseif(!($inputtanggal))
    {
        $tanggal_err = "Masukan tanggal transaksi dengan benar.";
    }
    else
    {
        $tanggal = $inputtanggal;
    }

       
    // Validate salary
    $inputtotalharga = trim($_POST["totalharga"]);
    if(empty($inputtotalharga))
    {
        $totalharga_err = "Masukan total harga transaksi.";     
    } 
    elseif(!ctype_digit($inputtotalharga))
    {
        $totalharga_err = "Masukan total harga transaksi dengan benar.";
    }
    else
    {
        $totalharga = $inputtotalharga;
    }
    
    // Check input errors before inserting in database
    if(empty($nama_err) && empty($kategori_err) && empty($jumlah_err) && empty($tanggal_err) && empty($totalharga_err))
    {
        // Prepare an insert statement
        $sql = "INSERT INTO transaksi (nama, kategori, jumlah, tanggal, totalharga) VALUES (?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $nama, $kategori, $jumlah, $tanggal, $totalharga);
            
            // Set parameters
            $nama       = $nama;
            $kategori   = $kategori;
            $jumlah     = $jumlah;
            $tanggal    = $tanggal;
            $totalharga = $totalharga;
            $param_id   = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: form-transaksi.php");
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
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin Dashboard</title>
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
                                    <h2>Tambah Data</h2>
                                </div>
                                <p>Silakan isi formulir ini & submit untuk menambahkan data ini ke database.</p>
                                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group <?= (!empty($nama_err)) ? 'has-error' : ''; ?>">
                                        <label>Nama Produk</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $nama; ?>">
                                        <span class="help-block"><?= $nama_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($kategori_err)) ? 'has-error' : ''; ?>">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Kategori Produk</label>
                                    <select name="kategori" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option value="Makanan" <?php if($kategori == "Makanan") { echo "SELECTED"; } ?>>Makanan</option>
                                        <option value="Minuman" <?php if($kategori == "Minuman") { echo "SELECTED"; } ?>>Minuman</option>
                                       
                                        <span class="help-block"><?= $kategori_err;?></span>
                                    </select>
                                    </div>
                                    <div class="form-group <?= (!empty($jumlah_err)) ? 'has-error' : ''; ?>">
                                        <label>Jumlah Produk</label>
                                        <input type="text" name="jumlah" class="form-control" value="<?= $jumlah; ?>">
                                        <span class="help-block"><?= $jumlah_err;?></span>
                                    </div>
                                    
                                    <div class="form-group<?= (!empty($tanggal_err)) ? 'has-error' : ''; ?>">
                                        <label>Tanggal Transaksi</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= $tanggal; ?>">
                                        <span class="help-block"><?= $tanggal_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($totalharga_err)) ? 'has-error' : ''; ?>">
                                        <label>Total Harga</label>
                                        <input type="text" name="totalharga" class="form-control" value="<?= $totalharga; ?>">
                                        <span class="help-block"><?= $totalharga_err;?></span>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="form-transaksi.php" class="btn btn-danger" style="color:white;">Cancel</a>
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

