<!-- Page Content  -->
<div id="content" class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<h1>User Update</h1>
			<?php echo validation_errors(); ?>
			<?php if(sizeof($user) == 0) {?>
				<div class="">The user is not existing</div>
			<?php }else{?>
			
			<?php echo form_open('user/update/'.$user[0]->id);?>
			<?php echo form_hidden('id', $user[0]->id);?>
			<div class="form-group">
				<label for="name">Name</label>
				<?php 	$data_name = array(
				        'name'          => 'name',
				        'class'         => 'form-control',
				        'value'         => $user[0]->name
					);
					echo form_input($data_name);?>
			</div>
			<div class="form-group">
				<label for="status">Status</label><i type="button" class="fa fa-fw" data-toggle="tooltip" data-placement="top" title="student info would be editable when status is active"></i>

				<?php $status_options = array(
			                  'active'  	=> 'Active',
			                  'inactive'    => 'Inactive',
			                );
					echo form_dropdown('status', $status_options, $user[0]->status, 'class="form-control"');?>
			</div>
			<div class="form-group">
				<label for="description">Description</label><span style="color: red;">*</span>
				<?php 	$data_desc = array(
				        'name'          => 'description',
				        'class'         => 'form-control',
				        'value'         => $user[0]->description
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
				echo form_dropdown('field_type', $field_type_options, $user[0]->field_type, 'class="form-control"');?>
			</div>
			<div class="form-group">
				<label for="mandatory">Mandatory</label>
				<?php $mandatory_options = array(
		                  '0'	=> 'Not Required',
		                  '1' 	=> 'Required',
		                );
				echo form_dropdown('mandatory', $mandatory_options, $user[0]->mandatory, 'class="form-control"');?>
			</div>

			<div class="form-group">
				<?php echo form_submit('submit', 'Submit');?>
			</div>
			<?php echo form_close(); 
			
			}?>
		</div>
	</div>
</div>
