<script>
    $(document).ready(function () {
        $('#myTable').dataTable();
    });
</script>
<style>
    .pad-mar{
        padding-left: 50px;
    }
</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h3 class="panel-title"> All Loyalty Discount List</h3>
                </div>
                <div class="form-panel">
                    <!--Delete success massage-->
                    <?php
                    if ($this->session->flashdata('success') || $this->session->flashdata('danger')) {
                        ?>    
                        <div class="alert alert-<?php echo ($this->session->flashdata('success')) ? 'success' : 'danger'; ?> alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo ($this->session->flashdata('success')) ? $this->session->flashdata('success') : $this->session->flashdata('danger'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <a href="<?php echo site_url('admin/settings/add_voucher'); ?>"><button type="button" class="btn btn-success">Add Loyalty Discount </button></a>
                    <a href="<?php echo site_url('admin/settings/voucher_list'); ?>"><button type="button" class="btn btn-success">List Loyalty Discount </button></a>
                    <a href="<?php echo site_url('admin/settings/coupon_use_history'); ?>"><button type="button" class="btn btn-success">Loyalty Usage History</button></a>
                     <br>
                    <br>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Loyalty Id</th>
                                            <th>Loyalty Type</th>
                                            <th>Loyalty Use Date</th>
                                            <th>Loyalty Expiry date</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                        foreach ($coupon_use_history as $row):
                                            ?> 
                                            <tr> 
                                                <td><?php echo $row['coupon_id']; ?></td>
                                                <td><?php echo $row['coupon_type']; ?></td>
                                                <td><?php echo $row['coupon_use_date']; ?></td>
                                                <td><?php echo $row['coupon_expire_date']; ?></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </section>
</section>
