
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
    <link href="library/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="library/daterangepicker.css" rel="stylesheet" />
    <?php include_once 'css_style/style.php';?>
    
    <script src="library/jquery.min.js"></script>
    <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
    <script src="library/moment.min.js"></script>
    <script src="library/daterangepicker.min.js"></script>
    <script src="library/Chart.bundle.min.js"></script>
    <script src="library/jquery.dataTables.min.js"></script>
    <script src="library/dataTables.bootstrap5.min.js"></script>
    
    <title>Grafik Transaksi Penjualan</title>
</head>
<body>
    <div id="wrapper">
        <!-- nav form -->
        <?php include_once 'sidebar/nav_form.php';?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <?php include_once 'sidebar/navbar.php';?>
            <!-- end nav -->
            <div class="container-fluid">
                <h1 class="mt-2 mb-3 text-center text-primary">Data Transaksi Kedai Kopi By Filter Tanggal</h1>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-sm-9"> <h2> <b>Data Transaksi</b></h2></div>
                            <div class="col col-sm-3">
                            <label for="alamat">Pilih Tanggal:</label>
                               <input type="text" id="daterange_textbox" class="form-control" readonly />
                           </div>
                        </div>
                    </div>
                    <div class="wrapper wrapper-content">
                        <div class="titulo-tabla">
                            <div class="chart-container pie-chart">
                                <canvas id="bar_chart" height="45"> </canvas>
                            </div>
                            <table class="table table-striped table-bordered" style="width:100%" id="order_table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    
    $(document).ready(function(){
        
        fetch_data();
        
        var sale_chart;
        
        function fetch_data(start_date = '', end_date = '')
        {
            var dataTable = $('#order_table').DataTable({
                "processing" : true,
                "serverSide" : true,
                "order" : [],
                "ajax" : {
                    url:"action.php",
                    type:"POST",
                    data:{action:'fetch', start_date:start_date, end_date:end_date}
                },
                "drawCallback" : function(settings)
                {
                    var sales_date = [];
                    var sale = [];
                    
                    for(var count = 0; count < settings.aoData.length; count++)
                    {
                        sales_date.push(settings.aoData[count]._aData[2]);
                        sale.push(parseFloat(settings.aoData[count]._aData[1]));
                    }
                    
                    var chart_data = {
                        labels:sales_date,
                        datasets:[
                        {
                            label : 'Jumlah Produk Terjual',
                            backgroundColor : 'rgba(255, 0, 87, 0.2)',
                           
                            color : '#228B22',
                            data:sale
                        }
                        ]   
                    };
                    
                    var group_chart3 = $('#bar_chart');
                    
                    if(sale_chart)
                    {
                        sale_chart.destroy();
                    }
                    
                    sale_chart = new Chart(group_chart3, {
                        type:'bar',
                        data:chart_data
                    });
                }
            });
        }
        
        $('#daterange_textbox').daterangepicker({
            ranges:{
                'Hari Ini' : [moment(), moment()],
                'Kemarin' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 Hari Terakhir' : [moment().subtract(6, 'days'), moment()],
                '30 Hari Terakhir' : [moment().subtract(29, 'days'), moment()],
                'Bulan Ini' : [moment().startOf('month'), moment().endOf('month')],
                'Bulan Lalu' : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            format : 'YYYY-MM-DD'
        }, function(start, end){
            
            $('#order_table').DataTable().destroy();
            
            fetch_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
            
        });
        
    });
    
    
</script>

         