<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration</title>
	<?php $this->load->view('partials/header')?>

</head>
<body>
<?php var_dump($this->session->userdata);
 ?>
	<div class="container">
		<h3>Login</h3> <!--flashdata section-->
		<p class="red"><?=$this->session->flashdata('oops'); ?></p>
		<p class="red"><?=$this->session->flashdata('notregistered'); ?></p>
		<p class="red"><?=$this->session->flashdata('loginfail'); ?></p>
		<p class="red"><?=$this->session->flashdata('bademail'); ?></p>
		<p class="red"><?=$this->session->flashdata('badpassword'); ?></p>
		<p class="red"><?=$this->session->flashdata('destroy'); ?></p>

		<!--form to login -->
		<form role="form" action="/logins/check" method="post">
			<div class="form-group">
				<label for="email">Email: </label>
				<input type="text" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="password">Password: </label>
				<input type="password" class="form-control" name="password">
			</div>
			<button type="submit" class="btn btn-default">Login</button>
		</form>
		<hr>
		<h3>Or register</h3>
		<!--form to register-->
		<form role="form" action="/registers/add" method="post">
			<div class="form-group">
				<label for="first_name">First name: </label>
				<input type="text" class="form-control" name="first_name">
			</div>		
			<div class="form-group">
				<label for="last_name">Last name: </label>
				<input type="text" class="form-control" name="last_name">
			</div>		
			<div class="form-group">
				<label for="email">Email: </label>
				<input type="text" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="password">Password: </label>
				<input type="password" class="form-control" name="password">
			</div>
			<div class="form-group">
				<label for="conpassword">Confirm password: </label>
				<input type="password" class="form-control" name="conpassword">
			</div>
			<button type="submit" class="btn btn-default">Register</button>
		</form>
	</div>
	<a href="/logins/signin">Go to the logged in page</a>
</body>
</html>