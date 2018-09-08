<!-- Page Content  -->
<div id="content" class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<h1>Student Update</h1>
			<?php echo validation_errors(); ?>
			
			<?php echo form_open('student/update/'.$user_id);?>
			<?php echo form_hidden('user_id', $user_id);?>

			<div class="form-group">
				<label for="name">Name</label>
				<?php 	$data_name = array(
				        'name'          => 'Name',
				        'class'         => 'form-control',
				        'disabled'		=> 'disabled',
				        'value'         => $student_name
					);
					echo form_input($data_name);?>
			</div>

			<div class="form-group">
				<label for="DOB">Date of Birth</label>
				<?php 	$data_dob = array(
				        'name'          => 'DOB',
				        'class'         => 'form-control',
				        'value'         => array_key_exists('DOB', $student) ? $student['DOB'] : ''
					);
					echo form_input($data_dob);?>
			</div>

			<div class="form-group">
				<label for="Address">Address</label>
				<?php 	$data_address = array(
				        'name'          => 'Address',
				        'class'         => 'form-control',
				        'value'         => array_key_exists('Address', $student) ? $student['Address'] : ''
					);
					echo form_input($data_address);?>
			</div>

			<div class="form-group">
				<?php echo form_submit('submit', 'Submit');?>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>
