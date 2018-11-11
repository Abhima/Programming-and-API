<?php include('header.php'); ?>
	<div class="form-group" id="div_a">
		<div id="logoutdiv" align="right">
			<a href="<?php echo base_url('login/logout');?>" class="btn btn-outline-light btn-lg">Logout</a>
		</div>
		<div id="div_f">
			<h3>Please select the bank for transaction! </h3>
			<!--Form validation-->
			<?php if($this->session->flashdata('error')){ ?>
				<div style="color: #ff0000; font-weight: bold" class="alert">
					<?php echo $this->session->flashdata('error'); ?>
				</div>
          	<?php } ?>
          	<!--listing of banks-->
			<div  style="color: #000000; font-weight: bold" class="row">
				<div class="col-sm-6">
					<ul class="list-group">
						<li class="list-group-item">101 OBOS</li>
						<br>
						<li class="list-group-item">102 SPAR</li>
					</ul>
				</div>
				<div class="col-sm-6">
					<ul class="list-group">
						<li class="list-group-item">103 OBOS</li>
						<br>
						<li class="list-group-item">104 SPAR</li>
					</ul>
				</div>
			</div>
			<br>
			<!--opening of form-->
			<?php echo form_open('home/bank_list', ['class'=>'form-horizontal']); ?>
				<div>
					<label for="bankid">Type Bank Code here:</label>
					<?php echo form_input(['name'=>'bankid', 'class'=>'form-control', 'placeholder'=>'Please enter the bank code', 'value'=>set_value('bankid'),'required autofocus']); ?>
				</div>
				<!--Error when wrong bank id-->
				<div>
	                <?php echo form_error('bankid'); ?>
	            </div>
		    </div>
		    <br>
		    <!--returning to previous page-->
		    <div class="btn-group-vertical" id="buttondiv1">
				<a href="<?php echo base_url('home/transfer');?>" class="btn btn-outline-light btn-lg">Return</a>
			</div>
			<!--for next page-->
			<div class="btn-group-vertical" id="buttondiv2">
				<?php echo form_submit(['name'=>'submit', 'value'=>'Continue', 'class'=>'btn btn-outline-light btn-lg']); ?>
			</div>
				</form><!--closing of form-->
		</div>
<?php include('footer.php'); ?>