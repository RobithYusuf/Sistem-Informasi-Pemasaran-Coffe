<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <head>
    <meta charset="utf-8">
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 75%;
                margin: 10px auto;
            }
    </style>
  </head>
  <body>

<?php
$conection_db = new mysqli('localhost','root','','login_system');
$nama         = mysqli_query($conection_db, "SELECT nama FROM transaksi order by ID asc");
$jumlah       = mysqli_query($conection_db, "SELECT jumlah FROM transaksi order by ID asc");
?>

    <div class="container">
        <canvas id="barchart" width="90px" height="90px"></canvas>
    </div>
    <!-- <div class="container" style="width: 450px;">
  <canvas id="barchart"></canvas>
</div>
  -->


  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($nama)) { echo '"' . $p['nama'] . '",';}?>],
            datasets: [
            {
              label: "Transaksi",
              data: [<?php while ($p = mysqli_fetch_array($jumlah)) { echo '"' . $p['jumlah'] . '",';}?>],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
              ],
              borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
            } ]
            };
            var myBarChart = new Chart(ctx, {
              
            type: 'pie',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 5,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>