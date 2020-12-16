<?php
	$title = "User section";
	require_once "./template/header.php";
?>
 <p class="lead text-center text-muted">User Registration</p>
	<form class="form-horizontal" method="post" action="verifypass.php">
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-md-4">
				<input type="text" name="name" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Email</label>
			<div class="col-md-4">
				<input type="text" name="name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="pas" class="control-label col-md-4">Password</label>
			<div class="col-md-4">
				<input type="password" name="pas" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="rpas" class="control-label col-md-4">Re-Password</label>
			<div class="col-md-4">
				<input type="password" name="rpas" class="form-control">
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary">
	</form>

