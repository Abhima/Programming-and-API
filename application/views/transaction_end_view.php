<?php include('header.php'); ?>
		<div id="div_a">
			<div id="div_e">
				<div>
					<h1>Transaction Completed Successfully! </h1>
					<br>
					<h3> Would you like to perform another transaction?</h3>
				</div>
			</div>
			<br>
			<div class="btn-group-vertical" id="buttondiv1">
				<a href="<?php echo base_url('home');?>" class="btn btn-outline-light btn-lg">Yes</a>
			</div>
			<div class="btn-group-vertical" id="buttondiv2">
				<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">No</a>
			</div>
		</div>
	</body>
</html>