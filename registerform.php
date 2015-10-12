<!DOCTYPE html>
<html>
<head>
	<title>Registeration</title>
	<style>
	header{
		font-size: 40px;
	}
	#sideleft{
		margin-left:250px;
		font-size: 25px;
		margin-top: 100px;
		float: left;
		height: 500px;
	}
	#content{
		margin-right:350px;
		font-size: 25px;
		margin-top: 50px;
		float: right;
		height: 450px;
		background-color: #FFB6C1;
		opacity: 0.7;
		width: 500px;
		padding: 20px;

	}
	input{
		width: 300px;
		height: 30px;
		color: #FF1493;
		text-decoration: bold;
		font-family: Arial;
		font-size: 25px;
	}
	form{
		margin-top: 50px;
	}
	#header{
		height: 100px;
		background-color: #00CED1;
		line-height: 100px;
		opacity: 0.8;
		text-align: center;
	}
	span{
		font-size: 15px;
		color: red;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div id="header">
	<p style="display:inline; font-size:60px; color:#fff; text-decoration:bold; margin-left:30px; font-family:Broadway;">Blogger</p>
</div>
<div id="content">
	<header>Sign Up</header>
	<form method="post" action="registerformsucess.php" onsubmit= "return validate()">
		<input type="text" placeholder="User name" name="name" id="name" onblur="validate_name()"><span id="nameerr"></span><br><br>
		<input type="text" placeholder="email" name="email" id="email" onblur="validate_email()"><span id="emailerr"></span><br><br>
		<input type="password" name="password" placeholder="*******" id="password" onblur="validate_password()"><span id="passworderr"></span><br><br>
		<input type="password" name="c_password" placeholder="********" id="c_password" onblur="validate_c_password()"><span id="c_passworderr"></span><br><br>
		<button>Submit</button>
	</form>
</div>
<script>
function validate_name()
	{
		var e1=document.getElementById("name").value;
		if((e1==null)||(e1==""))
		{
			document.getElementById("nameerr").innerHTML="* Please enter Username";
			return false;
		}
	}
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
	validate_name();
	validate_email();
	validate_password();
	validate_c_password();
    return(true);
}	
</script>	
</body>
</html>