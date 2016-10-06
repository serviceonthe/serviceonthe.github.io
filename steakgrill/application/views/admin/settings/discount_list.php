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
                    <h3 class="panel-title">Discount List</h3>
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


                    <?php if($this->session->flashdata('message')) { ?>
                        <div class="alert alert-success" id="mydiv">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <span><?php if($this->session->flashdata('message')) {
                        echo '<div class="message"> ';
                        echo ''.$this->session->flashdata('message').'';
                        //$this->session->keep_flashdata('message');
                        echo'</div>';
                        }?></span> 
                        </div>    
                        <script>
                        setTimeout(function() {
                        $('#mydiv').fadeOut('fast');
                        }, 2000); // <-- time in milliseconds
                        </script>

                        <?php } ?>

                    <a href="<?php echo site_url('admin/settings/add_discount'); ?>"><button type="button" class="btn btn-success">Add Discount </button></a>
                    <br>
                    <br>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Discount Id</th>
                                            <th>Title</th>
                                            <th>Discount Type</th>
                                            <th>Discount Value</th>
                                            <th>Value Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                        foreach ($all_discount as $row):
                                            ?> 
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['discount_type']; ?></td>
                                                <td><?php echo $row['discount']; ?></td>
                                                <td><?php echo $row['type']; ?></td>
                                                <td>
                                                    <?php echo anchor('admin/settings/discount_edit/' . $row['id'], '<button type="button" class="btn-info">Edit</button>'); ?> 
                                                    <?php echo anchor('admin/settings/delete_discount/' . $row['id'], '<button type="button" class="btn-danger">Delete</button>', array("onclick" => "return confirm('Are you sure ?')")); ?>
                                                </td>
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
