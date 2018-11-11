<?php include('header.php'); ?>
		<div id="div_a">
			<div id="logoutdiv" align="right">
				<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">Logout</a>
			</div>
			<div class="btn-group-vertical" id="div_c">
				<a href="#" class="btn btn-outline-light btn-lg">Internal Bank Account</a>
				<br><br><br>
				<a href="<?php echo base_url('home/bank_list');?>" class="btn btn-outline-light btn-lg">Other Bank Account</a>
			</div>
		</div>
	</body>
</html>