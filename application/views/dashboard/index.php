<!-- Page Content  -->
<div class="container">
	<div class="row">
		<div style="margin-top: 100px;" class="col-sm-12 col-md-8 offset-md-2">
			<h1 style="text-align: center;">LB Test</h1><br/>
			<form  class="form-signin" action="<?php echo $this->config->base_url();?>dashboard/index" method="post">
				<h2 class="form-signin-heading">Please sign in</h2>
				<div class="form-group">
					<label for="username" class="sr-only">Username</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
				</div>
				<div class="form-group">
					<label for="password" class="sr-only">Password</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
				</div>
				<div class="form-group">
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</div>
			</form>
		</div>
	</div>
</div> <!-- /container -->