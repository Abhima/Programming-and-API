<?php include('header.php'); ?>
		<div class="form-group" id="div_a">
			<div id="logoutdiv" align="right">
				<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">Logout</a>
			</div>
			<div id="div_d">
				<h3>Please enter following details: </h3>
				<br>
				<?php echo form_open('home/transfer_detail', ['class'=>'form-horizontal']); ?>
					<div hidden>
						<label for="customerid">Customer ID:</label>
						<?php echo form_input(['name'=>'customerid', 'class'=>'form-control', 'value'=>set_value('customerid', $this->session->userdata('user_id')),'required autofocus']); ?>
					</div>
					<div hidden>
						<label for="bankid">Bank ID:</label>
						<?php echo form_input(['name'=>'bankid', 'class'=>'form-control', 'value'=>set_value('bankid', $this->session->userdata('bankid')),'required autofocus']); ?>
					</div>
					<div>
						<label for="accountno">Recipient account no: </label>
						<?php echo form_input(['name'=>'accountno', 'class'=>'form-control', 'placeholder'=>'Please enter account number', 'value'=>set_value('accountno'), 'required autofocus']); ?>
					</div>
					<div>
		                  <?php echo form_error('accountno'); ?>
		            </div>
		            <br>
					<div>
						<label for="amount">Transfer amount:</label>
						<?php echo form_input(['name'=>'amount', 'class'=>'form-control', 'placeholder'=>'Please enter the amount', 'value'=>set_value('amount'),'required autofocus']); ?>
						<span id="email_result"></span>
	                    <br />
					</div>
					<div>
		                  <?php echo form_error('amount'); ?>
		            </div>
		    </div>
		    <div class="btn-group-vertical" id="buttondiv1">
				<a href="<?php echo base_url('home/bank_list');?>" class="btn btn-outline-light btn-lg">Return</a>
			</div>
			<div class="btn-group-vertical" id="buttondiv2">
				<?php echo form_submit(['name'=>'Submit', 'value'=>'Continue', 'class'=>'btn btn-outline-light btn-lg']); ?>
			</div>
				</form>
		</div>
<?php include('footer.php'); ?>
