<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" >
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://wvega.github.io/timepicker/resources/jquery-timepicker/jquery.timepicker.min.css">
<script type="text/javascript" src="http://wvega.github.io/timepicker/resources/jquery-timepicker/jquery.timepicker.min.js"></script>
<div id="business_hours_sat" style="display:none;"><?php echo $business_houres['sat']; ?></div>
<div id="business_hours_sun" style="display:none;"><?php echo $business_houres['sun']; ?></div>
<div id="business_hours_mon" style="display:none;"><?php echo $business_houres['mon']; ?></div>
<div id="business_hours_tue" style="display:none;"><?php echo $business_houres['tue']; ?></div>
<div id="business_hours_wed" style="display:none;"><?php echo $business_houres['wed']; ?></div>
<div id="business_hours_thus" style="display:none;"><?php echo $business_houres['thus']; ?></div>
<div id="business_hours_fri" style="display:none;"><?php echo $business_houres['fri']; ?></div>


<?php 
//     echo $edit_status;
//     echo '<pre>';
//     print_r($order_details);
//     echo '</pre>';

if($edit_status == 1){
?>
    <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <p style="color:red">You have performed order modification, To commit changes please click below to confirm</p>
                        <?php echo anchor('admin/Dashboard/modify_confirmation_and_send_email/' . $order_details['order_id'], '<button type="button" class="btn btn-success">Modify Confirmation</button>'); ?>
                    
                    <?php
                        if($this->session->flashdata('success') || $this->session->flashdata('danger')){
                    ?>    
                        <div class="alert alert-<?php echo ($this->session->flashdata('success'))?'success':'danger';?> alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <?php echo ($this->session->flashdata('success'))?$this->session->flashdata('success'):$this->session->flashdata('danger');?>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </section>
    </section>
<?php } ?>
  

  


<script>
    $(document).ready(function () {
        $("#allocate_status").click(function () {

        });
        $('#extend_day').change(function(){
           var booking_id=$('#booking_id').val();
           var room_category_id=$('#room_category_id').val();
           var extend_day=$('#extend_day').val();
           //alert(room_category_id);
           if(room_category_id==0){
               $('#room_type_alart').html('Please Select Room Category.');  
               console.log('sdfs');
           }
           else{
               $('#room_type_alart').html('');
               //console.log('kfjkshdfjs fsfhs afjksahf');
               //console.log(extend_day);
               $('#number_of_rooms').html('<option value="">Select No Of Rooms</option>');
               $.ajax({
                    url: "<?php echo base_url(); ?>Auth/reservation/modify_add_room_price_manipulation_avg_nor",
                    type: "POST",
                    data: {
                        booking_id: booking_id,
                        room_category_id:room_category_id,
                        extend_day:extend_day
                        },
                    async: false,
                    //dataType: "json",
                    success: function (data) {
                        console.log('Available : '+data);
                        for(i=1;i<=data;i++){
                            $('#number_of_rooms').append('<option value="'+i+'">'+i+'</option>');
                        }
                        
                        if(data==0){
                            $('#room_available_msg').html('Room Not Available.');
                        }else{
                             $('#room_available_msg').html('');
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('Error');
                    }
                });    
           }
        });
    });

      // function timeExtendConfirm(){
      //   prompt('Are you sure to Extend your delivery time ?');
      // }
</script>

<script>
    $(document).ready(function () {
        $('#myTable').dataTable();











      var dateToday = new Date(); 
      console.log(new Date(2013, 0, 1));
      console.log(dateToday);
      
      

      var minutes = dateToday.getMinutes();
      var hour    = dateToday.getHours()+1;

      if(minutes.toString().length<2){
          minutes='00';
      }else if(minutes<45){
          minutes=30;
      }else{
          hour=hour+1;
          minutes='00';
      }
      var deliveryTime =hour+':'+minutes;
      console.log(deliveryTime);
      var year = dateToday.getFullYear();
      var month = dateToday.getMonth()+1; // beware: January = 0; February = 1, etc.
      var day = dateToday.getDate();
      var compdate=month+'/'+day+'/'+year;
      timepick();
       
            //alert(regularDiscount); 


            //$("#datepicker").datepicker("setDate", new Date());

            //$("#datepicker").datepicker().datepicker("setDate", new Date());

            //$("#datepicker" ).datepicker({ defaultDate: new Date() });



            $("#datepicker").datepicker({

              changeMonth: true,//this option for allowing user to select month
              changeYear: true, //this option for allowing user to select from year range
              timepicker: true,
              defaultDate: dateToday,
              format:'d.m.Y H:i',
              beforeShow: function(input, inst) {       
              $('#ui-datepicker-div').removeClass("hide_year");
              },
              minDate: dateToday
            });

             $("#datepicker").change(function(){

                var selecteddate=$(this).val();

                // calculateSpecialDiscount(selecteddate);  

                var data=selecteddate.split('/');
                var newdate= new Date(data[2], data[0]-1, data[1]);
                var syear = newdate.getFullYear();
                var smonth = newdate.getMonth()+1; // beware: January = 0; February = 1, etc.
                var sday = newdate.getDate();
                var sdate=smonth+'/'+sday+'/'+syear;

                var SelectedDateFormat=new Date(selecteddate);
                var weekday=new Array("sun", "mon", "tue", "wed", "thus", "fri", "sat");
               
                console.log(weekday);
                console.log(SelectedDateFormat);
                console.log(weekday[newdate.getDay()]);
                var dayofweek=weekday[newdate.getDay()];
                var business_houres=JSON.parse($("#business_hours_"+dayofweek).html());
                // var to1=dayofweek+'_to1';
                console.log(business_houres.from1);
                console.log(business_houres.to1);
                console.log(business_houres.from2);
                console.log(business_houres.to2);

                var from1_24=convertTo24Hour(business_houres.from1);
                var from1=(business_houres.from1);
                var to1=convertTo24Hour(business_houres.to1);
                var from2=convertTo24Hour(business_houres.from2);
                var to2_24=convertTo24Hour(business_houres.to2);
                var to2=(business_houres.to2);
                var ff=addMinutes(from1_24,'30');
                var tt=addMinutes(to2_24,'00');
                console.log(ff);
                // console.log('Time - '+ff.setMinutes(ff.getMinutes() + 30));
                var f=ff.split(":");
                if(!f[1]){
                  f[1]=0;
                }
                var t=tt.split(":");
                if(!t[1]){
                  t[1]=0;
                }

                if(compdate!==sdate){
                  $('#timepeaker').html('<input id="tp1" class="timepicker1 form-control"  value="'+tConvert(ff)+'" name="delivery_time" />');
                   // $('#timepeaker').html('<input id="tp1" class="timepicker1" style="padding-left:2px; height:28px; width: 220px;" value="05:30 AM" name="delivery_time" />');
                    var timepicker1 = $('input.timepicker1').timepicker({
                        timeFormat: 'hh:mm p',
                        // year, month, day and seconds are not important
                        minTime: new Date(0, 0, 0, f[0],f[1],0),
                        maxTime: new Date(0, 0, 0, t[0],t[1],0),
                        // items in the dropdown are separated by at interval minutes
                        interval: 30,
                    });
                }
                else{
                    $('#timepeaker').html('<input id="tp1" value="'+tConvert(deliveryTime)+'" class="timepicker2 form-control" name="delivery_time" />');
                    var timepicker = $('input.timepicker2').timepicker({
                        timeFormat: 'hh:mm p',
                        // year, month, day and seconds are not important
                        minTime: new Date(0, 0, 0, hour, minutes, 0),
                        maxTime: new Date(0, 0, 0, t[0],t[1], 0),
                        // items in the dropdown are separated by at interval minutes
                        interval: 30,
                    });                 
                }
            });

          function timepick(){
            $('#timepeaker').html('<input id="tp1" value="'+tConvert(deliveryTime)+'" class="timepicker2 form-control" disabled name="delivery_time" />');
            var timepicker = $('input.timepicker2').timepicker({
                timeFormat: 'hh:mm p',
                // year, month, day and seconds are not important
                minTime: new Date(0, 0, 0, hour, minutes, 0),
                maxTime: new Date(0, 0, 0, 22,30, 0),
                // items in the dropdown are separated by at interval minutes
                interval: 30,
            });
          }

          function convertTo24Hour(time) {
              var hours = parseInt(time.substr(0, 2));
              if(time.indexOf('am') != -1 && hours == 12) {
                  time = time.replace('12', '0');
              }
              if(time.indexOf('pm')  != -1 && hours < 12) {
                  time = time.replace(hours, (hours + 12));
              }
              return time.replace(/(am|pm)/, '');
          }

          function addMinutes(time/*"hh:mm"*/, minsToAdd/*"N"*/) {
            function z(n){
              return (n<10? '0':'') + n;
            }
            var bits = time.split(':');
            var mins = bits[0]*60 + (+bits[1]) + (+minsToAdd);

            return z(mins%(24*60)/60 | 0) + ':' + z(mins%60);  
          }

            function tConvert (time) {
             // Check correct time format and split into components
                 time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

                 if (time.length > 1) { // If time format correct
                   time = time.slice (1);  // Remove full string match value
                   time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
                   time[0] = +time[0] % 12 || 12; // Adjust hours
                 }
                 return time.join (''); // return adjusted time or original string
            }


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
                <div class="form-panel row">
                    <div class="col-lg-7">
                        <h3 class="panel-title"> Modify your Order </h3>
                    </div>
                    <?php echo form_open('admin/Dashboard/changeDeleveryStatus'); ?>
                    <div class="col-lg-3">
                      <input type="hidden" name="order_id" value="<?php echo $order_details['order_id']; ?>">
                        <select class="form-control" name="order_type">
                            <option value="<?php echo $order_details['order_type']; ?>" selected><?php echo ucfirst($order_details['order_type']); ?></option>
                            <option value="collection"> Collection </option>
                            <option value="delivery"> Delivery </option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" name="submit_button" class="btn btn-success pull-right" value="Update Delivery type" />
                    </div>
                    <?php echo form_close(); ?>
                </div>

               

                <div class="form-panel">
                <h4>Delevery time Update</h4>
                    <?php echo form_open('admin/Dashboard/delivery_time_extend'); ?>
                    <fieldset class="scheduler-border"><br>
                        <table class="table table-responsive">
                            <tr>
                                <input type="hidden" name="order_id" value="<?php echo $order_details['order_id']?>" />
                                <td valign="middle">
                                    <label>Delivery Date</label>
                                </td>
                                <!-- <td>
                                    <input class="form-control" id="datepicker" disabled type="text" name="delivery_date" value="<?php echo $order_history[0]['delivery_date']?>" />
                                </td> -->
                                <td>
                                    <input class="form-control" type="text" readonly="" name="delivery_date" value="<?php echo $order_details['delivery_date']?>" />
                                </td>
                                <td valign="middle">
                                    <label>Delievery Time</label>
                                </td>
                                <!-- <td id="timepeaker">
                                </td> -->
                                <td>
                                    <input class="form-control" type="text" readonly="" name="delivery_time" value="<?php echo $order_details['delivery_time']?>" />
                                </td>
                                <td valign="middle">
                                    <label>Extend Time</label>
                                </td>
                                <td>
                                    <select class="form-control" name="extend_time" required>
                                      <option value="">Minutes</option>
                                      <?php for($i=10; $i <= 90; $i +=10){?>
                                        <option value="<?php echo $i;?>"><?php echo $i .' min'; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" name="submit_button" class="btn btn-success pull-right"  value="Update date time" />
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>

                 <div class="form-panel">
                <h4>New Items Add Here</h4>
                    <?php echo form_open('admin/Dashboard/add_new_item'); ?>
                    <fieldset class="scheduler-border"><br>
                        <table class="table table-responsive">
                            <tr>
                                <input type="hidden" name="order_id" value="<?php echo $order_details['order_id']?>" />
                                <td valign="middle">
                                    <label>Item name</label>
                                </td>
                                <td>
                                    <select class="form-control" name="item_id" required>
                                        <option value="">Select Item</option>
                                        <?php foreach ($all_item as $key=>$value) { ?>
                                            <option value="<?php echo $value['item_id']; ?>"> <?php echo $value['item_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td valign="middle">
                                    <label>Item quantity</label>
                                </td>
                                <td>
                                    <input class="form-control" type="number" min="0" name="item_quantity" placeholder="Item Quantity" required>
                                </td>
                                <td>
                                    <input type="submit" name="submit_button" class="btn btn-success pull-right" value="Add new item here" />
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>

                <div class="form-panel">
                    <?php
                    if ($this->session->flashdata('success_edit') || $this->session->flashdata('danger_edit')) {
                        ?>    
                        <div class="alert alert-<?php echo ($this->session->flashdata('success_edit')) ? 'success' : 'danger'; ?> alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo ($this->session->flashdata('success_edit')) ? $this->session->flashdata('success_edit') : $this->session->flashdata('danger_edit'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <h4><b>Item Information:</b></h4>
                            <table class="table table-striped table-bordered table-hover" id="myTable1">
                                <thead>                                
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Item Price</th>
                                        <th>Item Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php if($order_history){?>
                                    <?php foreach ($order_history as $key) {?>
                                        <tr>
                                            <td><?php echo $key['item_name'];?></td>    
                                            <td><?php echo $key['item_quantity'];?></td>  
                                            <td><?php echo $key['item_price'];?></td> 
                                            <td><?php echo $key['item_total_price'];?></td> 
                                            <td> 
                                                <?php echo anchor('admin/dashboard/order_modify_delete/'. $key['item_total_price'].'/'. $key['order_history_id'].'/'.$key['order_id'], '<button type="button" class="btn btn-danger pull-right">Delete</button>', array("onclick" => "return confirm('Are you sure?')")); ?>
                                                <?php echo anchor('admin/dashboard/order_edit/'. $key['order_history_id'].'/'.$key['order_id'], '<button type="button" class="btn btn-info pull-right">Edit</button>'); ?>
                                            </td>
                                        </tr>  
                                    <?php }
                                    }else{ echo '<p align="center" ><b>Here is no Menu List</b></p>';} ?>
                                </tbody>       
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</section>
<?php
    if($edit_status == 1){
?>
    <script>
        history.pushState(null, null, null);
        window.addEventListener('popstate', function (event) {
            history.pushState(null, null, null);
        });
    </script>
<?php
  }


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

