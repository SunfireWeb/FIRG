<?php
session_start();
if (isset($_POST["username"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	if (strtolower($username)=="drlara" && $password=="123hhme") {
		$_SESSION['loggedin'] = true;
		header("Location: index.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Food Intolerance Report Generator</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="keyword" content="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="theme/devoops/plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="theme/devoops/css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="text-right">
				<!--<a href="page_register.html" class="txt-default">Need an account?</a>-->
			</div>
			<div class="box">
				<form action="login.php" method="post">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">FIRGY Login Page</h3>
					</div>
					<div class="form-group">
						<label class="control-label">Username</label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="text-center">
						<input type="submit" class="btn btn-primary" value="Sign in">
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
