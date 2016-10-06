<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Dashboard</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">
  <!--<link rel="stylesheet" href="css/templatemo_main.css">-->
  <link href="<?php echo base_url(); ?>assets_admin/css/templatemo_main.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	if($this->session->userdata('user_email')==false)
	{
		redirect('admin/dashboard');
	}
?>
<?php
	
	/*--*************************************menu start**************************-------*/
	$this->load->view('admin/data_operator_dashboard/header');
	/*--*************************************menu start**************************-------*/
	$this->load->view('admin/data_operator_dashboard/menu');
	
	/*--*************************************changable main content start**************************-------*/
	$this->load->view('admin/data_operator_dashboard/content');
	
		
	/*--*************************************footer start**************************-------*/
	$this->load->view('admin/data_operator_dashboard/footer');
	

?>   
	
	<script src="<?php echo base_url(); ?>assets_admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_admin/js/templatemo_script.js"></script>
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
    }

    window.onload = function(){
      var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
      window.myLine = new Chart(ctx_line).Line(lineChartData, {
        responsive: true
      });
    };

    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function () {
      var btn = $(this);
      btn.button('loading');
      // $.ajax(...).always(function () {
      //   btn.button('reset');
      // });
  });
  </script>
</body>
</html>