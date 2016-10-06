<?php

if(!empty($welcome))
{
    ?>
<script type="text/javascript">
alert("Online table reservation Process is Complete");
</script>

    <?php
}
?>
<?php

if(!empty($validation))
{
    ?>
<script type="text/javascript">
alert("Please Fulfill All Necessary Field to complete reservation");
</script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>Indi Chef :: </title>
    
    <!--CSS Link-->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rum+Raisin' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>/assets/css/app.css" rel="stylesheet">
    
    <!--HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
    
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>