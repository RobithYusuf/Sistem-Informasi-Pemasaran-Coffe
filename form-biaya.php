	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Data Pengeluaran</title>
        <!-- style css php -->
        <?php include_once 'css_style/style.php';?>

         <!-- library css -->
    
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
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
                <div class="col-12">
                <br>
                <h3 class="titulo-tabla">Tabel Pengeluaran</h3>
                <hr>
                    <?php
                        // Include config file
                        include('config.php');
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM biaya";
                    ?>
                    
                    <?php
                    if($result = mysqli_query($conection_db, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                    ?>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengeluaran</th>
                                        <th>Nominal</th>
                                        <th>Tanggal Pengeluaran</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                        while($row = mysqli_fetch_array($result))
                                        
                                        {
                                        ?>
                                        <tr>
                                           <td><?php echo $no++ ?></td>
                                            <td><?= $row['namabiaya'] ;?></td>
                                            <td><?= $row['nominal']; ?></td>
                                            <td><?= $row['tanggal'] ;?></td>
                                            <td><?= $row['ket'] ;?></td>
                                            <td>
                                                <?php
                                                echo "<a href='proses-lihat-biaya.php?id=". $row['id'] ."' title='Lihat Data' data-toggle='tooltip'> <i class='fa fa-eye' aria-hidden='true' style='color:black'></i></a>";
                                                echo "<a href='proses-update-biaya.php?id=". $row['id'] ."' title='Update Data' data-toggle='tooltip'> <i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                                                echo "<a href='proses-delete-biaya.php?id=". $row['id'] ."' title='Hapus Data' data-toggle='tooltip'> <i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a>";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>                          
                            </table>
                        <?php
                            // Free result set
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<p class='lead'><em>Tidak ada data yang tercatat.</em></p>";
                        }
                    }
                    else
                    {
                        echo "KESALAHAN: Tidak dapat mengeksekusi $sql. " . mysqli_error($conection_db);
                    }
                    // Close conection_db
                    mysqli_close($conection_db);
                    ?>
                <a href="proses-add-biaya.php" class="btn btn-success pull-left">Tambah Pengeluaran Baru</a>
            </div>	
		</div>         
	</div>     
</div>
        <!-- <script> js php import</script> -->
        <?php
        include_once 'js1.php';
        ?>

        <!-- library js -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
        
        <!-- internal script -->
        <script src="js/export.js"></script>
		<!-- <script> import</script> -->

         <!-- <script> js php import</script> -->
    
		<!-- <script> import</script> -->
	</body>
</html>