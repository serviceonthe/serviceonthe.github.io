<?php 
	if ($this->session->userdata('l_customer_id')=='') {
		redirect('user/login');
	}
 ?>
<div class="footer"><p align="center"><small>Copyright &copy; 2015 - Radhuni Bedford Restaurant | Design & Developed By <a href="serviceontheweb.co.uk"> Service ON</a></small></p></div>
</body>
</html>