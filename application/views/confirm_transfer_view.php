<?php include('header.php'); ?>
		<div class="container" id="div_a">
			<div id="logoutdiv" align="right">
				<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">Logout</a>
			</div>
			<div id="div_d">
				<h3>Please Confirm Transfer: </h3>
				<br>
					<?php echo form_open('home/confirm_transfer', ['class'=>'form-horizontal']); ?>
					    <table class="table table-borderless">
					    	<tr style="display:none;">
					    		<td width="30%">Customer ID:</td>
					    		<td width="70%">
					    			<?php echo form_input(['name'=>'customerid','value'=>set_value('customerid', $this->session->userdata('user_id')), 'readonly'=>'readonly']); ?>
					    		</td>
					    	</tr>
					    	<tr style="display:none;">
					    		<td width="30%">Bank ID:</td>
					    		<td width="70%">
					    			<?php echo form_input(['name'=>'bankid', 'value'=>set_value('bankid', $this->session->userdata('bankid')), 'readonly'=>'readonly']); ?>
					    		</td>
					    	</tr>
					    	<tr>
					    		<td width="30%">Account number: </td>
					    		<td width="70%">
									<?php echo form_input(['name'=>'accountno', 'placeholder'=>'Please enter account number', 'value'=>set_value('accountno'), 'readonly'=>'readonly']); ?>
					    		</td>
					    	</tr>
					    	<tr>
					    		<td width="30%">Amount to transfer: </td>
					    		<td width="70%">
									<?php echo form_input(['name'=>'amount', 'placeholder'=>'Please enter the amount', 'value'=>set_value('amount'), 'readonly'=>'readonly']); ?>
					    		</td>
					    	</tr>
					    	<tr>
					    		<td width="30%"></td>
					    		<td width="70%"></td>
					    	</tr>
					    </table>
			</div>		
			<div class="btn-group-vertical" id="buttondiv1">
				<a href="<?php echo base_url('home/edit_transfer_detail');?>" class="btn btn-outline-light btn-lg">Return</a>
			</div>
			<div class="btn-group-vertical" id="buttondiv2">
				<?php echo form_submit(['name'=>'Submit', 'value'=>'Confirm Transfer', 'class'=>'btn btn-outline-light btn-lg']); ?>
			</div>
					</form>
		</div>
<?php include('footer.php'); ?>