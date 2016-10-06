<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">
  <link href="<?php echo base_url(); ?>assets_admin/css/templatemo_main.css" rel="stylesheet" type="text/css">
</head>
<body>
	
    <script src="<?php echo base_url(); ?>assets_admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/templatemo_script.js"></script> 
    
    
    <script src="<?php echo base_url(); ?>fassets/js/site.js"></script>

    
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/datatable/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets_admin/datatable/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets_admin/datatable/jquery.dataTables.min.js"></script>
    
    
    
    
    
    
    
    <!-- gallery script -->  
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?> assets/image_crud/css/fineuploader.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/image_crud/css/photogallery.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/image_crud/css/colorbox.css" />
    <script src="<?php echo base_url(); ?>assets/image_crud/js/jquery-ui-1.9.0.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/image_crud/js/jquery.fineuploader-3.5.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/image_crud/js/jquery.colorbox-min.js"></script>

    
    
    
    <script type="text/javascript">
      // Line chart
      var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
      var lineChartData = {
        labels : ["January","February","March","April","May","June","July"],
        datasets : [
        {
          label: "My First dataset",
          fillColor : "rgba(220,220,220,0.2)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
          data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        },
        {
          label: "My Second dataset",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        }
        ]

      } // lineChartData

      var pieChartData = [
      {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
      },
      {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
      },
      {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
      }
      ] // pie chart data

      // radar chart
      var radarChartData = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
        {
          label: "My First dataset",
          fillColor: "rgba(220,220,220,0.2)",
          strokeColor: "rgba(220,220,220,1)",
          pointColor: "rgba(220,220,220,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
          label: "My Second dataset",
          fillColor: "rgba(151,187,205,0.2)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(151,187,205,1)",
          data: [28, 48, 40, 19, 96, 27, 100]
        }
        ]
      }; // radar chart

      // polar area chart
      var polarAreaChartData = [
      {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
      },
      {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
      },
      {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
      },
      {
        value: 40,
        color: "#949FB1",
        highlight: "#A8B3C5",
        label: "Grey"
      },
      {
        value: 120,
        color: "#4D5360",
        highlight: "#616774",
        label: "Dark Grey"
      }

      ];

      window.onload = function(){
        var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
        var ctx_bar = document.getElementById("templatemo-bar-chart").getContext("2d");
        var ctx_pie = document.getElementById("templatemo-pie-chart").getContext("2d");
        var ctx_doughnut = document.getElementById("templatemo-doughnut-chart").getContext("2d");
        var ctxRadar = document.getElementById("templatemo-radar-chart").getContext("2d");
        var ctxPolar = document.getElementById("templatemo-polar-chart").getContext("2d");

        window.myLine = new Chart(ctx_line).Line(lineChartData, {
          responsive: true
        });
        window.myBar = new Chart(ctx_bar).Bar(lineChartData, {
          responsive: true
        });
        window.myPieChart = new Chart(ctx_pie).Pie(pieChartData,{
          responsive: true
        });
        window.myDoughnutChart = new Chart(ctx_doughnut).Doughnut(pieChartData,{
          responsive: true
        });
        var myRadarChart = new Chart(ctxRadar).Radar(radarChartData, {
          responsive: true
        });
        var myPolarAreaChart = new Chart(ctxPolar).PolarArea(polarAreaChartData, {
          responsive: true
        });
      }
    </script>
</body>
</html>