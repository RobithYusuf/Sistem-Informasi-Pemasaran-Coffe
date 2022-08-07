
<?php
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
    {
        // Include config file
        require_once "config.php";
        
        // Prepare a select statement
        $sql = "SELECT * FROM transaksi WHERE id = ?";
    
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = trim($_GET["id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
        
                if(mysqli_num_rows($result) == 1)
                {
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
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
                    // URL doesn't contain valid id parameter. Redirect to error page
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
        print_r($sql);
        exit();
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
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
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'sidebar/nav_form.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'sidebar/navbar.php';?>
                <!-- end navbar -->
				<div class="wrapper wrapper-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    <h1>Lihat Data</h1>
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk :<span class="font-weight-bold text text-success"> <?= $row["nama"]; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Produk : <span class="font-weight-bold"> <?= $row["kategori"]; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Produk : <span class="font-weight-bold"> <?= $row["jumlah"]; ?></span></label>
                                </div>
                                
                                <div class="form-group">
                                    <label>Tanggal Transaksi : <span class="font-weight-bold"> <?= $row["tanggal"]; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Total Harga : Rp.<span class="font-weight-bold text-info"> <?= $row["totalharga"]; ?></span></label>
                                </div>
                                <a  href="form-transaksi.php" class="btn btn-danger pull-left">Kembali</a>
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

