<!DOCTYPE html>
<html>
<head>
	<title>Profile-home</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<?php 
		require 'connect.php';
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="SELECT * FROM forminfo";
		$result = mysqli_query($conn,$sql);
		session_start();
		$_SESSION['mail']=$_POST['email'];
		if(!$result)
		{
			echo "<script>alert('Unable to Log in.You may not be having any account.Create an account');</script>";
		}
		/*else{
			echo "sucessful";
		}*/
		$sql_run = mysqli_query($conn,$sql);
		if(mysqli_num_rows($sql_run) > 0)
		{
			while($sql_row = mysqli_fetch_assoc($sql_run))
			{
				$user = $sql_row['username'];
				$mailid = $sql_row['email'];
				$pass = $sql_row['password'];
				$userid=$sql_row['userid'];
				//echo $user .'id is'.$mailid.'<br>';
				if($email==$sql_row['email'])
				{	
					$_SESSION['userid']=$userid;
					if($email==$mailid && $password==$pass)
					{
						session_start();
						$_SESSION['user_name']=$user;
						header("location:dashboard.php");
					}
						else
						{
							echo "does not match";
						}
					}	
				}
				//else{
				//	echo"<script>alert('you are not registered.create an account');</script>";
				//}
			}
	?>
</body>
</html>