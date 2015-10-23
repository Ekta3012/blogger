<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<div id="header">
		<span id="head">Blogger</span>
	</div>
	<div id="content">
	<h1>Sign Up</h1>
		<div id="sideleft">
			<ul>
				<a href="https://www.facebook.com">
					<li style="background-color:#483D8B;">f &nbsp; Sign Up</li>
				</a>
				<a href="https://www.gmail.com">
					<li style="background-color:#FF0000;">g+ &nbsp; Sign Up</li>
				</a>
			</ul>
		</div>
		<div id="sideright">
			<?php
			 $nameErr=$emailErr=$passwordErr=" ";
			$name=$email=$password=$c_password=" "; 
			$passwordMatch=" ";
			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				$password=test_input($_POST["password"]);
				$c_password=test_input($_POST["c_password"]);
				if(empty($_POST["name"]))
				{
					$nameErr="name is required";
				}
				else 
					if(!preg_match("/^[a-zA-Z]*$/",$name))
					{
					$nameErr="Only letters and white spaces allowed";
				}
				else {
					$name=test_input($_POST["name"]);
				}
				if(empty($_POST["email"])){
					$emailErr="email is required";
				}
				else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
					$emailErr="Invalid email";
				}
				else {
					$email=test_input($_POST["email"]);
				}
				if(!strcmp($password,$c_password)==0)
				{
					$passwordMatch="Password doesn't match";
				}
				else {
					$passwordMatch="Password match";
				}
			}
			function test_input($input)
			{
				$input=trim($input);
				$input=stripslashes($input);
				$input=htmlspecialchars($input);
				return $input;
			} ?>
			<form action="registersucess.php" method="post">
				<input type="text" name="name" placeholder="Full Name">
				<span class="error"> <?php echo $nameErr; ?></span>
				<br><br>
				<input type="text" name="email" placeholder="Email">
				<span id="error"> <?php echo $emailErr; ?></span>
				<br><br>
				<input type="password" name="password" placeholder="Password"><br><br>
				<input type="password" name="c_password" placeholder="Confirm Password">
				<span id="match"> <?php echo $passwordMatch; ?></span>
				<br><br>
				<a href="registersucess.php"><button>Sign Up Free</button></a>
			</form>
			
		</div>
	</div>
</body>
</html>