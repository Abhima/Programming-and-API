<?php include('header.php'); ?>
	<div class="container" id="div_a">
		<div id="div_e">
			<h1>Sorry! Insufficient account balance!</h1>
			<br>
		</div>
		<br>
		<div class="btn-group-vertical" id="buttondiv1">
			<a href="<?php echo base_url('home/edit_transfer_detail');?>" class="btn btn-outline-light btn-lg">Back</a>
		</div>
		<div class="btn-group-vertical" id="buttondiv2">
			<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">Logout</a>
		</div>
	</div>
<?php include('footer.php'); ?>