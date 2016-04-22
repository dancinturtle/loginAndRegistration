<!DOCTYPE html>
<html>
<head>
	<title>Logged in</title>
	<?php $this->load->view('partials/header') ?>
</head>
<body>
	<div class="container">
		<h2 class="right">Welcome <?=$userinfo['first_name']?></h2>
		<p class="right"><a href="/logins/destroy">Log off</a></p>
		<hr>
		<h4>User information</h4>
		<div class="infobox">
			<h5>First name: <?=$userinfo['first_name']?> </h5>
			<h5>Last name: <?=$userinfo['last_name']?></h5>
			<h5>Email address: <?=$userinfo['email']?></h5>
		</div>
	</div>
</body>
</html>