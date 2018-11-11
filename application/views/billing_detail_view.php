<?php include('header.php'); ?>
	<div id="div_a">
		<div id="logoutdiv" align="right">
			<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">Logout</a>
		</div>
		<br /><br />
		<div id="div_d">
			<h3>Plese enter the following details:</h3>
			<br>
				<!--opening of form -->
				<?php echo form_open('home/billing_detail', ['class'=>'form-horizontal']); ?>
						<?php if ($error = $this->session->flashdata('error')): ?>
		                  	<div style="width:450px;" class="alert alert-danger" role="alert">
		                      	<h3><?= $error ?></h3>
		                  	</div>
	                	<?php endif; ?>
					<div hidden>
						<label for="customerid">Customer ID:</label>
						<?php echo form_input(['name'=>'customerid', 'class'=>'form-control', 'value'=>set_value('customerid', $this->session->userdata('user_id')),'readonly'=>'readonly']); ?>
					</div>

					<div>
						<label for="coaccountnumber">Company account no:</label>
						<input type="text" class="form-control" value="<?php echo $this->session->userdata('coaccountnumber') ?>" disabled="disabled">
					</div>

					<div hidden>
						<label for="companyid">Company ID:</label>
						<?php echo form_input(['name'=>'companyid', 'class'=>'form-control','value'=>set_value('companyid', $this->session->userdata('companyid')),'readonly'=>'readonly']); ?>

					</div>

			        <div>
						<label for="invoiceno">Invoice no:</label>
						<?php echo form_input(['name'=>'invoiceno', 'class'=>'form-control', 'placeholder'=>'Please enter Invoice number', 'value'=>set_value('invoiceno'),'required autofocus']); ?>
					</div>
					<div>
						<?php echo form_error('invoiceno'); ?>
					</div>
			        <div>
						<label for="amount">Amount:</label>
						<?php echo form_input(['name'=>'amount', 'class'=>'form-control', 'placeholder'=>'Please enter the payment amount', 'value'=>set_value('amount'),'required autofocus']); ?>
					</div>
					<div>
						<?php echo form_error('amount'); ?>
					</div>
					<br>
		</div>
		<div class="btn-group-vertical" id="returndiv">
			<a href="<?php echo base_url('home/billing');?>" class="btn btn-outline-light btn-lg">Return</a>
		</div>
		<div class="btn-group-vertical" id="continuediv">
			<?php echo form_submit(['name'=>'Submit', 'value'=>'Continue', 'class'=>'btn btn-outline-light btn-lg']); ?>
		</div>
				</form>
	</div>
<?php include('footer.php'); ?>