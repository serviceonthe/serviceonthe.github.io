<!DOCTYPE html>
<html>
<head>
	<title>Mail Template</title>
</head>
<body style="background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;" >
<div style="width:90%;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >
	<header style="background-color:rgba(30, 0, 40, 1);background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;color:#fff;" >
		<h2 style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;text-align:center;" >Radhuni Bedford Restaurant Registration Confirmaton</h2> 
	</header>

	<section style="background-color:#fff;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:30px;padding-bottom:30px;padding-right:15px;padding-left:15px;" >

		<h2 style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >Hello Dear "<?php echo $first_name .' '.$last_name;?>"</h2><br>

		<p style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >Thank you for registering you account with "<a href="http://radhunihp27.co.uk/" target="_blank">http://radhunibedford.com/  </a>". Its great to have you with us and we are please to confirm your account details with you.</p><br>
		
		<p style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >Registered Email: <?php echo $email;?> </p><br>

		<p style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >Order Pin: <span style="color:rgba(30, 0, 40, 1);font-weight:bold;" >"<?php echo $order_pin;?>"</span></p><br>

		<p style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >Password: ****** </p><br>
		
		<p style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >If you have any queries than please do not hesitate to contact with us. </p><br>
		
		<br>

		<p style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >
			Sincerely
		</p>
		<br>

		<p style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;" >
			System Admin<br>
			http://radhunibedford.com/
		</p>
	</section>

	<footer style="background-color:rgba(30, 0, 40, 1);background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;color:#fff;padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;" >
		<p style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto; text-align:center;" >
			<small>Copyright &copy; 2016 - Radhuni Bedford Restaurant| <a href="http://radhunibedford.com" target="_blank" >Refund Policy & FAQ</a> | Design & Developed By <a href="http://serviceontheweb.co.uk/" target="_blank">Service ON</a></small>
		</p>
	</footer>
</div>

</body>
</html>