<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nama     = $kategori     = $jumlah      = $tanggal     = $totalharga     = "";
$nama_err = $kategori_err = $jumlah_err  = $tanggal_err = $totalharga_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama))
    {
        $nama_err = "Masukan nama produk.";
    }
    elseif(!($input_nama))
    {
        $nama_err = "Masukan nama produk dengan benar.";
    }
    else
    {
        $nama = $input_nama;
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
    $input_jumlah = trim($_POST["jumlah"]);
    if(empty($input_jumlah))
    {
        $jumlah_err = "Masukan jumlah produk.";
    }
    elseif(!($input_jumlah))
    {
        $jumlah_err = "Masukan jumlah produk dengan benar.";
    }
    else
    {
        $jumlah = $input_jumlah;
    }

        // Validate date
    $input_tanggal = trim($_POST["tanggal"]);
    if(empty($input_tanggal))
    {
        $tanggal_err = "Masukan tanggal transaksi.";     
    } 
    elseif(!($input_tanggal))
    {
        $tanggal_err = "Masukan tanggal transaksi dengan benar";
    }
    else
    {
        $tanggal = $input_tanggal;
    }
    
    // Validate total harga
    $input_totalharga = trim($_POST["totalharga"]);
    if(empty($input_totalharga))
    {
        $totalharga_err = "Masukan total harga.";     
    } 
    elseif(!ctype_digit($input_totalharga))
    {
        $totalharga_err = "Masukan total harga dengan benar.";
    }
    else
    {
        $totalharga = $input_totalharga;
    }
    
    // Check input errors before inserting in database
    if(empty($nama_err) && empty($kategori_err) && empty($jumlah_err) && empty($tanggal_err) && empty($totalharga_err))
    {
        // Prepare an update statement
        $sql = "UPDATE transaksi SET nama=?, kategori=?, jumlah=?, tanggal=?, totalharga=? WHERE id=?";

        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $nama, $kategori, $jumlah, $tanggal, $totalharga, $param_id);
            
          // Set parameters
          $nama       = $nama;
          $kategori   = $kategori;
          $jumlah     = $jumlah;
          $tanggal    = $tanggal;
          $totalharga = $totalharga;
          $param_id   = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Records updated successfully. Redirect to landing page
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
else
{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
    {
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM transaksi WHERE id = ?";
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
                    $nama       = $row["nama"];
                    $kategori   = $row["kategori"];
                    $jumlah     = $row["jumlah"];
                    $tanggal = $row["tanggal"];
                    $totalharga     = $row["totalharga"];

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
                echo "Oops! Something went wrong. Please try again later.";
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
                                    <h2>Update Data</h2>
                                </div>
                                <p>Silakan isi formulir ini & submit untuk menambahkan data ini ke database.</p>
                                <form action="<?= htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                                    <div class="form-group <?= (!empty($nama_err)) ? 'has-error' : ''; ?>">
                                        <label>Nama Produk</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $nama; ?>">
                                        <span class="help-block"><?= $nama_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($kategori_err)) ? 'has-error' : ''; ?>">
                                        <label>Kategori Produk</label>
                                        <input type="text" name="kategori" class="form-control" value="<?= $kategori; ?>">
                                        <span class="help-block"><?= $kategori_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($jumlah_err)) ? 'has-error' : ''; ?>">
                                        <label>Jumlah Produk</label>
                                        <input type="text" name="jumlah" class="form-control" value="<?= $jumlah; ?>">
                                        <span class="help-block"><?= $jumlah_err;?></span>
                                    </div>
                                 
                                    <div class="form-group<?= (!empty($tanggal_err)) ? 'has-error' : ''; ?>">
                                        <label>Tanggal Transaksi</label>
                                        <input type="text" name="tanggal" class="form-control" value="<?= $tanggal; ?>">
                                        <span class="help-block"><?= $tanggal_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($totalharga_err)) ? 'has-error' : ''; ?>">
                                        <label>Total Harga</label>
                                        <input type="text" name="totalharga" class="form-control" value="<?= $totalharga; ?>">
                                        <span class="help-block"><?= $totalharga_err;?></span>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $id; ?>"/>
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
            
		</div>
        <!-- <script> js php import</script> -->
        <?php include_once 'script/js.php';?>
           <!-- <script> import</script> -->
	</body>
</html>

