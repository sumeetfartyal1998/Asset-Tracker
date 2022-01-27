@php
$data=session('data');
@endphp
<!doctype html>
<html lang="en">
  <head>
    @include('include.head')
    <title>Dashboard</title>
  </head>
  <body class="content-wrapper">
    @include('include.nav')
    @include('include.sidebar')
    <main class="content-wrapper row">
      <div class="col-6 mt-3">
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="piechart" style="height:400px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div>
      <div class="col-6 mt-3">
        <!-- BAR CHART -->
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <div id="top_x_div" style="height: 400px;"></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div>
    </main>


    @include('include.foot')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // PIE CHART
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php echo $pie?>
        ]);

        var options = {
          title: 'Asset Types'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      // END PIE CHART
      
      
      // BAR CHART
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Opening Move', 'Percentage'],
          <?php echo $bar?>
        ]);

        var options = {
          title: 'ACTIVE AND NON ACTIVE ASSETS',
          width: 500,
          legend: { position: 'none' },
          chart: { title: 'ACTIVE AND NON ACTIVE ASSETS',
                   subtitle: 'Ratio by percentage' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
      // END BAR CHART
    </script>
  </body>
</html>