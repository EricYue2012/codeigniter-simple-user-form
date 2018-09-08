<!-- Page Content  -->
<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<h1>User Edit</h1>
				<!-- validation result -->
				<?php echo validation_errors(); ?>

				<?php echo form_open('user/create');?>
				<?php echo form_hidden('id', "");?>
				<div class="form-group">
					<label for="name">Name</label>
					<?php 	$data_name = array(
					        'name'          => 'name',
					        'class'         => 'form-control',
					        'value'         => ''
						);
						echo form_input($data_name);?>
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					<?php $status_options = array(
				                  'active'  	=> 'Active',
				                  'inactive'    => 'Inactive',
				                );
						echo form_dropdown('status', $status_options, 'inactive', 'class="form-control"');?>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<?php 	$data_desc = array(
					        'name'          => 'description',
					        'class'         => 'form-control',
					        'value'         => ''
						);
						echo form_input($data_desc);?>
				</div>
				<div class="form-group">
					<label for="field_type">Field Type</label>
					<?php $field_type_options = array(
			                  'Numeric'	=> 'Numeric',
			                  'String' 	=> 'String',
			                  'Date'    => 'Date',
			                );
					echo form_dropdown('field_type', $field_type_options, 'Numeric', 'class="form-control"');?>
				</div>
				<div class="form-group">
					<label for="mandatory">Mandatory</label>
					<?php $mandatory_options = array(
			                  '0'	=> 'Not Required',
			                  '1' 	=> 'Required',
			                );
					echo form_dropdown('mandatory', $mandatory_options, 'Required', 'class="form-control"');?>
				</div>

				<div class="form-group">
					<?php echo form_submit('submit', 'Submit');?>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
