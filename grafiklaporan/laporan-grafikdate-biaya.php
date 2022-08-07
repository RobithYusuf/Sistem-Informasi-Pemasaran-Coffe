<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Filter Date</title>
  
</head>
<body>
  <div class="chartCard">
    <div class="chartBox">
      <canvas id="myChart"></canvas>
    </div>
  </div>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    
    <div class="container">
        <canvas id="barchart" width="90px" height="90px"></canvas>
    </div>
 <script> 
    // setup 
    const labels = <?php echo json_encode($namabiaya) ?>;
    const data = {
    labels: labels,
    datasets: [{
      label: 'Biaya Pengeluaran NEW',
      data: <?php echo json_encode($nominal) ?>,
      backgroundColor: [
        'rgba(255, 26, 104, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
        'rgba(255, 26, 104, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };
    
    // config 
    const config = {
      type: 'horizontalBar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };
    
    // render init block
    const myChart = new Chart(
    document.getElementById('myChart'),
    config
    );
  </script>
  
</body>
</html>