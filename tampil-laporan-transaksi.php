<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Penjualan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="master/css/bootstrap.min.css">  
    <!-- style css php -->
    <?php include_once 'css_style/style.php';?>
    <!-- library css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
    <!-- end style css php -->
</head> 
<body>
    <!-- nav -->
    <?php include_once 'sidebar/nav_form.php';?>
    <!-- end nav -->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!-- navbar -->
        <?php include_once 'sidebar/navbar.php';?>
        
        <!-- end navbar -->
        
        <div class="container-xxl">
            <h2>Laporan Transaksi</h2>
            <div class="row">
                <div class="col-sm-12 p-3">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Grafik Horizontal Transaksi Perproduk</div>
                            <div class="panel-body"><iframe src="grafiklaporan/laporan-grafikdate-transaksi.php" width="100%" height="500"></iframe></div>
                        </div>
                    </div>
                </div>
                
<br> <br>
                <div class="col-sm-6 px-3">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Grafik Pengeluaran Pernama</div>
                            <div class="panel-body"><iframe src="grafiklaporan/laporan-chart-pengeluaran.php" width="100%" height="700"></iframe></div>
                        </div>
                    </div>
                </div>
            
            
          
                <div class="col-sm-6 px-3">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Grafik Pie Transaksi Perproduk</div>
                            <div class="panel-body"><iframe src="grafiklaporan/laporan-chart-transaksi.php" width="100%" height="700"></iframe></div>
                        </div>
                    </div>
                </div>
                </div>
                
                <!-- <div class="col-sm-6">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Contoh Grafik Lingkaran Donat</div>
                            <div class="panel-body"><iframe src="laporan/laporan-grafikdate-biaya.php" width="100%" height="300"></iframe></div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        
        
        
        
        <!-- <script> js php import</script> -->
        <?php include_once 'script/js.php';?>
        <!-- <script> import</script> -->
    </body>
    </html>
    