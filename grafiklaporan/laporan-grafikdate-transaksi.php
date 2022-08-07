<?php 

$conection_db = new mysqli('localhost','root','','login_system');
//Inisialisasi nilai variabel awal

$nama_jur = "";
$total = null;

//Query SQL
$sql = "SELECT nama FROM transaksi GROUP BY id";
$hasil = mysqli_query($conection_db, $sql);

while ($data = mysqli_fetch_array($hasil)) {
    //Mengambil nilai nama_jurusan dari database
    $jur = $data['nama'];
    $nama_jur .= "'$jur'" . ", ";
}

//Query SQL
$sql1 = "SELECT jumlah FROM transaksi GROUP BY id";
$hasil1 = mysqli_query($conection_db, $sql1);

while ($data = mysqli_fetch_array($hasil1)) {
    //Mengambil nilai jumlah_siswa dari database
    $jumlah = $data['jumlah'];
    $total .= "'$jumlah'" . ", ";
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jumlah Transaksi</title>

</head>

<body>
<script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 10px auto;
            }
    </style>
    <div class="chartCard">
        <div class="chartBox">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: [<?php echo $nama_jur; ?>],
            datasets: [{
                label: 'Jumlah Transaksi',
                data: [<?php echo $total; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>


</body>

</html>