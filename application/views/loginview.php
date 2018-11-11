<?php include('header.php'); ?>
		<div id="div_a">
            <div id="div_b">
                <?php echo form_open('login/verifypin', ['class'=>'form-horizontal']); ?>
					<?php if ($error = $this->session->flashdata('error')): ?>
	                  	<div style="width:450px; color: #ff0000;" class="alert" role="alert">
	                      	<h3><?= $error ?></h3>
	                  	</div>
	                <?php endif; ?>
					<div>
						<label for="cardnumber">Please enter the last four digit of your Cardnumber: </label>
						<?php echo form_input(['name'=>'cardnumber', 'class'=>'form-control', 'placeholder'=>'e.g. 1234', 'value'=>set_value('cardnumber'),'required autofocus']); ?>
					</div>
					<br>
					<div>
						<?php echo form_error('cardnumber'); ?>
					</div>
					<br>
					<div>
						<label for="pin">Please enter your pin here:</label>
						<?php echo form_password(['name'=>'pin', 'class'=>'form-control', 'placeholder'=>'*****', 'required']); ?>
					</div>
					<br>
					<div>
	                  <?php echo form_error('pin'); ?>
	                </div>
			</div>
			<br>
			<div class="btn-group-vertical" id="buttondiv2">
				<?php echo form_submit(['name'=>'submit', 'value'=>'Continue', 'class'=>'btn btn-outline-light btn-lg']); ?>
			</div>
				</form>
		</div>
	</body>
</html>