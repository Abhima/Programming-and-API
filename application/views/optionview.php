<?php include('header.php'); ?>
		<div class="form-group" id="div_a">
			<div id="logoutdiv" align="right">
				<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">Logout</a>
			</div>
			<div id="div_b" class="btn-group-vertical">
				<div>
					<a href="#" class="btn btn-outline-light btn-lg">Fast Cash</a>
				</div>
				<br>
				<div>
					<a href="#" class="btn btn-outline-light btn-lg">Balance Inquiry</a>
				</div>
				<br>
				<div>
					<a href="#" class="btn btn-outline-light btn-lg">Cash Withdrawal</a>
				</div>
			</div>
			<div id="div_c" class="btn-group-vertical" align="right">
				<div>
					<a href="<?php echo base_url('home/billing');?>" class="btn btn-outline-light btn-lg">Pay a bill</a>
				</div>
				<br>
				<div>
				 	<a href="<?php echo base_url('home/transfer');?>" class="btn btn-outline-light btn-lg">Transfer Amount</a>
				</div>
				<br>
				<div>
				 	<a href="#" class="btn btn-outline-light btn-lg">Change PIN</a>
				</div>
			</div>
		</div>
	</body>
</html>