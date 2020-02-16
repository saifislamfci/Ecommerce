<?php include "../classes/adminlogin.php" ?>
<?php
$ad= new Adminlogin;
if ($_SERVER['REQUEST_METHOD']== "POST") {
	$adminuser=$_POST['username'];
	$adminpass=md5($_POST['password']);

	$checklogin=$ad->adminlogin($adminuser,$adminpass);

}

 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Log In</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<span style="color:red;background-color:yellow;">
				<?php
				if (isset($checklogin)) {
					echo $checklogin;
						}
				 ?>
			</span>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>