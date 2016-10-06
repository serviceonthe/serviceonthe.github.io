
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
    <meta name="viewport" content="<?php
                                    
                                    foreach ($res_info As $allinfo)
                                    {
                                        echo $allinfo->res_meta_keyword;
                                    }
                                ?>">
    <meta name="description" content="<?php
                                    
                                    foreach ($res_info As $allinfo)
                                    {
                                        echo $allinfo->res_meta_desc;
                                    }
                                ?>">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>Indi Chef :: <?php
                                    
                                    foreach ($res_info As $allinfo)
                                    {
                                        echo $allinfo->res_page_title;
                                    }
                                ?></title>
    
    <!--CSS Link-->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rum+Raisin' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>/assets/css/app.css" rel="stylesheet">
    
    <script src="<?php echo base_url();?>/fassets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>fassets/js/site.js"></script>
    
    <!--HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
    
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
 <style type="text/css">
      #map {
        width:  700px;
        height: 400px;
      }
    </style>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
      /**
       * Called on the initial page load.
       */
      function init() {
        var mapCenter = new google.maps.LatLng(40.714352, -74.005973);
        var map = new google.maps.Map(document.getElementById('map'), {
          'zoom': 6,
          'center': mapCenter,
          'mapTypeId': google.maps.MapTypeId.ROADMAP
        });

        // Create a draggable marker which will later on be binded to a
        // Circle overlay.
        var marker = new google.maps.Marker({
          map: map,
          position: new google.maps.LatLng(40.714352, -74.005973),
          draggable: true,
          title: 'Drag me!'
        });

        // Add a Circle overlay to the map.
        var circle = new google.maps.Circle({
          map: map,
          radius: 300000 // 3000 km
        });

        // Since Circle and Marker both extend MVCObject, you can bind them
        // together using MVCObject's bindTo() method.  Here, we're binding
        // the Circle's center to the Marker's position.
        // http://code.google.com/apis/maps/documentation/v3/reference.html#MVCObject
        circle.bindTo('center', marker, 'position');
      }
      
      // Register an event listener to fire when the page finishes loading.
      google.maps.event.addDomListener(window, 'load', init);
    </script>
    
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "1144ff90-022a-4c6d-8c9e-91ff267987dd", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<script type="text/javascript" src="<?php echo base_url();?>/assets/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript">    
        var site_url = '<?php echo site_url(); ?>';
        var base_url = '<?php echo base_url();?>';    
</script>

</head>
<body>