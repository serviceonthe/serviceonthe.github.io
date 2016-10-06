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
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/menu_manage"><button type="button" class="btn btn-success">Indian Menus Selection</button></a>
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/add_signature_item"><button type="button" class="btn btn-success">Add Signature Item</button></a>
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/view_signature_item"><button type="button" class="btn btn-success">view Signature Item</button></a>

        <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
    <thead>
    <tr>
        <th>Item Name</th>
        <th>item_short_description</th>
        <th>alergy_notice</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php/* echo form_open('admin/restaurent/restaurent_menu_setting_complate');*/?>
    <?php foreach( $signature as $key){?>
        <tr>
            <td><?php echo $key['item_name'];?></td>
            <td><?php echo $key['item_short_description'];?></td>
            <td><?php echo $key['alergy_notice'];?></td>
            <td><?php echo $key['item_price'];?></td>
            <td><?php echo anchor('admin/data_operator_restaurent/signature_item_edit?d_edit='.$key['signature_item_id'],'Edit');?> &nbsp; &nbsp;<?php echo anchor('admin/data_operator_restaurent/signature_item_delete/'.$key['signature_item_id'],'Delete',array("onclick"=>"return confirm('Are you sure?')"));?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
$this->load->view('admin/data_operator_dashboard/footer');
?>