<?php
$this->load->view('admin/data_operator_dashboard/header_link');
$this->load->view('admin/data_operator_dashboard/header');
$this->load->view('admin/data_operator_dashboard/menu');

?>
    <style type="text/css">
        /*placeholder{color:#096;}
        */
    </style>

    <div class="template-page-wrapper">
    <div class="templatemo-content">
    <!--here is start changable content -->
    <!--all code here -->
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_food/fatch_cuisine_type_category"><button type="button" class="btn btn-success">Cuisine Type Category Details</button></a>
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_food/fatch_indi_category"><button type="button" class="btn btn-success">Indian Catagories Details</button></a>




        <!--all code here -->
    <!--here is end changable content -->
    </div>
    </div>

<?php
$this->load->view('admin/data_operator_dashboard/footer');
?>
