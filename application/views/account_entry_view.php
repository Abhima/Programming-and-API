<?php include('header.php'); ?>
		<div id="div_a">
			<div id="logoutdiv" align="right">
				<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">Logout</a>
			</div>
			<div id="div_b">
			 	<h3>Plese enter billing account number!</h3>
			 	<br>
			 	<?php echo form_open('home/billing_account', ['class'=>'form-horizontal']); ?>
			 		<?php if($this->session->flashdata('message')){ ?>
						<div style="color: #ff0000; font-weight: bold" class="alert">
							<?php echo $this->session->flashdata('message'); ?>
						</div>
	          		<?php } ?>
					<div>
						<label for="coaccountnumber">Account no:</label>
						<?php echo form_input(['name'=>'coaccountnumber', 'class'=>'form-control', 'placeholder'=>'Please enter account number', 'value'=>set_value('coaccountnumber'),'required autofocus']); ?>
					</div>
					<br>
					<div>
						<?php echo form_error('coaccountnumber'); ?>
					</div>
			</div><br><br><br>
				<div class="btn-group-vertical" id="buttondiv1">
					<a href="<?php echo base_url('home');?>" class="btn btn-outline-light btn-lg">Return</a>
				</div>
				<div class="btn-group-vertical" id="buttondiv2">
					<?php echo form_submit(['name'=>'submit', 'value'=>'Continue', 'class'=>'btn btn-outline-light btn-lg']); ?>
				</div>
			
				</form>
		</div>
<?php include('footer.php'); ?>