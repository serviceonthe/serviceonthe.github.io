<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
</head>
<body style="background: #eee;">
		<div class="container" style="width: 650px;background: #fff;margin: 0 auto;padding: 15px;">

		<h2 style="margin: 0px;padding-bottom: 5px;text-align: center;text-transform: uppercase;">Bedford Reservation Confirmation</h2>
			
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				
				<table width="100%">

                    <tr>
	                    <td>Title:</td>
						<td><?php echo $title;?></td>
                    </tr>
                    <tr>
	                    <td>Name:</td>
						<td><?php echo $name;?></td>
                    </tr>
                    <tr>
	                    <td>Email:</td>
						<td><?php echo $email;?></td>
                    </tr>
					<tr>
						<td>Mobile</td>
						<td><?php echo $mobile;?></td> 
					</tr>
					<tr>
	                    <td>Reservation Date:</td>
						<td><?php echo $newFormatedDate;?></td>
                    </tr>
                    <tr>
	                    <td>Reservation Time:</td>
						<td><?php echo $reservation_time;?></td>
                    </tr>
					<tr>
						<td>Number of Guest</td>
						<td><?php echo $num_of_guest;?></td> 
					</tr>
					<tr>
						<td>Special Note</td>
						<td><?php echo $special_note;?></td> 
					</tr>
				</table>

			</div>
			
			<div class="box" style="margin-bottom: 10px;border: 1px solid #eee;padding: 10px;">
				<table width="100%" cellpadding="10">
					<tr>
						<td valign="top">
							<strong> Address</strong><br>
							Radhuni The Embankment Bedford<br>
							38 The Embankment Bedford<br>
							Bedfordshire, MK40 3PF<br>
						</td>
						<td valign="top">
							<strong>Telephone:</strong><br>
							Reservation: 01234 272227<br>
							Contact: 01234 272227
						</td>
					</tr>
				</table>
			</div>
		</div>
</body>
</html>