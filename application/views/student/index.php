<!-- Page Content  -->
<div id="content" class="container">
	<div class="row">
		<div class="col-sm-12">
			<span class="h1">Students</span> <br/>
			<?php 
			 	$msg = $this->session->flashdata('msg');
				if(!is_null($msg)){?>
				<div class="message"><?php echo $msg;?></div>
			<?php 
				$this->session->set_flashdata('msg', '');
			}?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
				  		<th>Name</th>
				  		<th>Date of Birth</th>
				  		<th>Address</th>
				  		<th>Actions</th>
					</tr>
				</thead>
				<tbody>
		    <?php foreach ($students as $key => $student) {?>
				<tr>
				  	<td><?php echo $student['id'];?></td>
				  	<td><?php echo $student['name'];?></td>
				  	
				  	<td><?php if (array_key_exists('DOB', $student['details'])) { echo $student['details']['DOB'];}?></td>
				  	<td><?php if (array_key_exists('Address', $student['details'])) { echo $student['details']['Address'];}?></td>
				  	<td><?php if($student['status'] == 'active'){?> 
				  		<a href="<?php echo $this->config->base_url();?>student/update/<?php echo $student['id'];?>" type="button" class="btn btn-info">Edit</a>
				  		<?php }?></td>
				</tr>		
		    <?php }?>
		    	</tbody>
		    </table>
		</div>
	</div>
</div>
