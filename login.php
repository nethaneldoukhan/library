<?php require_once('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h2>Login</h2>
		</div>
			
		<form method="post" action="login.php">
			<?php require_once('message/messageAdd.php'); ?>
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
			<p>
				username: admin <br />
				password: 0000
			</p>
		</form>
  	</div>
</body>
</html>