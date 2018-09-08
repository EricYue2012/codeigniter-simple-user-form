<!-- Page Content  -->
<div id="content" class="container">
	<div class="row">
		<div class="col-sm-12">
			<span class="h1">Users</span> <a style="margin-left: 30px; margin-top: -15px;" href="<?php echo $this->config->base_url();?>user/create" type="button" class="btn btn-primary">Add New</a><br/>

			<?php 
			 	$msg = $this->session->flashdata('msg');
				if(!is_null($msg)){?>
				<div class="message"><?php echo $msg;?></div>
			<?php }?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
				  		<th>Status</th>
				  		<th>Description</th>
				  		<th>Field Type</th>
				  		<th>Actions</th>
					</tr>
				</thead>
				<tbody>
		    <?php foreach ($users as $key => $user) {?>
				<tr>
				  <td><?php echo $user->id; ?></td>
				  <td><?php echo $user->name; ?></td>
				  <td><?php echo $user->status; ?></td>
				  <td><?php echo $user->description; ?></td>
				  <td><?php echo $user->field_type; ?></td>
				  <td><a href="<?php echo $this->config->base_url();?>user/update/<?php echo $user->id;?>" type="button" class="btn btn-info">Edit</a> <a href="<?php echo $this->config->base_url();?>user/delete/<?php echo $user->id;?>" type="button" class="btn btn-danger">Delete</a></td>
				</tr>		
		    <?php }?>
		    	</tbody>
		    </table>
		</div>
	</div>
</div>
