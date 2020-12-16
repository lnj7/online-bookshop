<?php
	$title = "User section";
	require_once "./template/header.php";
?>
 <p class="lead text-center text-muted">User Login</p>
	<form class="form-horizontal" method="post" action="userverify.php">
		<div class="form-group">
			<label for="email" class="control-label col-md-4">email</label>
			<div class="col-md-4">
				<input type="text" name="email" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="passw" class="control-label col-md-4">Pass</label>
			<div class="col-md-4">
				<input type="password" name="passw" class="form-control">
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary">
	</form>

