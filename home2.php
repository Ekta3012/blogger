<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger - home</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style type="text/css">
		#alreadylogin{
			margin-right:50px;
			font-size: 20px;
			margin-top: 100px;
			float: right;
			height: 280px;
			background-color: #FFF0F5;
			opacity: 0.7;
			padding: 10px;
			width: 30%;
			display: none;
					
		}
		.input{
		width: 300px;
		height: 30px;
		float: right;
		margin-right: 50px;
		color: #03a9f4;
		font-family: Arial;
		font-size: 25px;
	}
	#aboutblogs{
			background-color: #FFF0F5;
			opacity: 0.7;
			float: left;
			font-size: 20px;
			margin-top: 155px;
			height: 280px;
			width: 50%;
			padding: 10px;
			margin-left: 100px;
	}
	a{
		color: #FF1493;
	}
	#header{
	height: 20%;
	background-color: #fff;
	line-height: 60px;
	width: 100%;
	padding-bottom: 10px;
	padding-top: 10px;
	padding-left: 40px;
}
	</style>
	</head>
<body>
	<div id="header">
			<p style="font-size:60px; color:#03a9f4; text-decoration:bold; font-family:Broadway; display:inline;">Blogger</p>
			<?php 
				if(isset($_SESSION['user_name'])) 
				{
					echo '<a href="logout.php"><p style="float:right; margin-right:50px; font-size:30px; color:black;">Log out</p></a>';
					echo '<a href="dashboard.php"><p style="float:right; margin-right:150px; font-size:30px; color:black;">'.$_SESSION['user_name'].'</p></a>';
				}
			?>
		</div>
		<?php 
		if(!isset($_SESSION['user_name']))
		{
			echo '<span id="login" style="float:right; margin-right:0px; margin-top:5px;">
				<button onclick="showlogin();">Log In</button>
			</span>';
		}
		?>
		<a href="blogs.php"><button style="float:right; margin-right:30px; margin-top:5px;">Blogs</button></a>
		<div id="aboutblogs">
			<p>A Blog is a easy-to-use website where you can easily post your thought, interact with people and more.All for FREE.</p>
			<p>Create a Blog in following steps :</p>
			<ul>
				<?php 
					if(!isset($_SESSION['mail']))
					{
						echo '<a href="registerform.php"><li>Create an account</a></li>';
				}
				?>
				<li>Name your Blog</li>
				<li>Start adding your Blogs</li>
			</ul>
		</div>
		<div id="alreadylogin">
				<p style="margin-top:5px; ">Already have an account? Log in.</p>
				<form action="loginsucess.php" method="post" onsubmit= "return validate()">
					<label>Email:</label>
					<input type="text" name="email" placeholder="email" class="input" onblur="validate_email()"><br><br><span id="emailerr"></span>
					<label>Password:</label>
					<input type="password" name="password" placeholder="********" class="input" onblur="validate_password()"><br><br><br><span id="passworderr"></span><br><br>
					<button style="float:right; margin-right:0px;">Log in</button>
				</form>
				<br>
		</div>
	
	<script>
	function showlogin(){
		document.getElementById('alreadylogin').style.display="inline";
		hidebutton();
	}
	function hidebutton(){
		document.getElementById('login').style.display="none";
	}
	
	 //alert ("function Reached");
	/*if((e1==null)||(e1==" ")||(!isNaN(e1)))
	{
	 alert ("Invalid FirstName");
	 
	 }
	if((e2==null)||(e2=="")||(!isNaN(e2)))
	{document.getElementById("msg").innerHTML="Incorrect Lastname";
	 alert("Invalid LastName");
	 
	 }*/
		function validate_email()
		{
			var e2=document.getElementById("email").value;
			if((e2.search(/.com/)!=e2.length-4)||(e2.search("@")==-1))
			{
				document.getElementById("emailerr").innerHTML="* Invalid Email-Id";
				return false;
			}
		}
		function validate_password()
		{
			var e3=document.getElementById("password").value;
			if(e3.length<10)
			{
				document.getElementById("passworderr").innerHTML="* Insecure Password";
				return false;	
			}
			if((e3.test([0-9])==false))
			{
				document.getElementById("passworderr").innerHTML="password must have numbers!!";
				return false;
			} 
			if(e3.test([e3.String.fromCharCode(123)-e3.String.fromCharCode(127)])==false)
			{
				document.getElementById("passworderr").innerHTML("passworderr")="Password must contain at least one special characters";
				return false; 
			}

		}
		function validate_c_password()
		{
			var e4=document.getElementById("c_password").value;
			if(e4!=e3)
			{
				document.getElementById("c_passworderr")="Password doesn't match";
				return false;
			}
		
		return true;
	} 

	function validate()
	{
		validate_email();
		validate_password();
		validate_c_password();
	    return(true);
	}	
	</script>

	<!--<?php 
		//$date=date_parse('july');
		//var_dump($date['month']);
	?>-->
</body>
</html>