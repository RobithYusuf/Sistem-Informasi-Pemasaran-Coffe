<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>
</head>
<body>

<?php 
  $conection_db = new mysqli('localhost','root','','login_system');
  $query = $conection_db->query(" SELECT 
      NAMABIAYA as namabiaya,
        SUM(nominal) as nominal
    FROM biaya
    GROUP BY namabiaya
  ");

  foreach($query as $data)
  {
    $namabiaya[] = $data['namabiaya'];
    $nominal[] = $data['nominal'];
  }

?>
<!-- <style type="text/css">
            .container {
                width: 100%;
                margin: 10px auto;
            }
    </style> -->

 <div class="container">
        <canvas id="myChart" width="90px" height="90px"></canvas>
    </div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($namabiaya) ?>;
  
  const data = {
    
    labels: labels,
    datasets: [{
      label: 'Total Biaya Pengeluaran',
      data: <?php echo json_encode($nominal) ?>,
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
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        },
          barValueSpacing: 5,
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>