<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger - home</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
	#sideleft{
		float: left;
		margin-left: 20px;
		width: 45%;
		font-size: 25px;
		height:0%;
		margin-top: 100px;
		padding: 25px;
		padding-bottom: 100px;
	}
	#sideright{
		float: right;
		width: 45%;
		font-size: 25px;
		height: 40%;
		margin-top: 50px;
		padding: 25px;
		padding-bottom: 100px;
	}
	#footer{
		width:100%;
		background:-webkit-linear-gradient(#fff,#FFF5EE);
		clear: both;
	}
	header{
		font-size: 40px;
		color: #03a9f4;
		text-decoration: bold;
		text-align: center;
		padding-top: 10px;
	}
	.features{
		height: 200px;
		padding: 40px;
		font-size: 30px;

	}
	input{
		width: 300px;
		height: 30px;
		float: right;
		margin-right: 100px;
		color: #03a9f4;
		font-family: Arial;
		font-size: 25px;
		padding-left: 10px;
	}
	.feature{
		font-size:20px;
		color:#A9A9A9;
	}
	
	</style>
	<script type="text/javascript">
							var slideimages = new Array()	// create new array to preload images							 								
							slideimages[0] = new Image() 	// create new instance of image object
							slideimages[0].src = "network.png" // set image src property to image path, preloading image in the process
							slideimages[1] = new Image()
							slideimages[1].src = "platform.png"
							slideimages[2] = new Image()
							slideimages[2].src = "blogging.png"
							slideimages[3] = new Image()
							slideimages[3].src = "comments.jpg"
							slideimages[4] = new Image()
							slideimages[4].src = "blog.png"
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
			countDown(5,"status");
			
				$("#img").rotate(45);
				//rotate();
			
		</script>
</head>
<body>
	<div id="header">
			<p style="font-size:60px; color:#03a9f4; text-decoration:bold; font-family:Broadway; display:inline; padding-left:20px;">Blogger</p>
			<?php 
				if(isset($_SESSION['user_name'])) 
				{
					echo '<a href="logout.php"><button style="float:right; margin-right:50px; font-size:25px; margin-top:29px;">Log out</button></a>';
					echo '<a href="dashboard.php"><p style="float:right; margin-right:50px; font-size:30px; color:black;">'.$_SESSION['user_name'].'</p></a>';
				}
				if(!isset($_SESSION['user_name'])){
					echo '<a href="registerform.php"><button style="float:right; margin-right:10px; margin-top:30px;">Sign Up</button></a>';
				}
			?>
			<a href="blogs.php"><button style="float:right; margin-right:30px; margin-top:30px;">Blogs</button></a>
			
	</div>
	<div id="sideleft"> Create a link through which you can market your dream products.<br>Create a blog or a website of your own 
	depending on what you want to be recognized for.<br>Share your experience through these media.<br>
	<img src="SI1.png" id="img" width="100px" height="100px">
	</div>
	<div id="sideright">
		<?php if(!isset($_SESSION['user_name']))
				{	
					echo '<header style="font-size:25px; margin-bottom:20px; margin-top:100px;">Already have an account? Sign in.</header>
					<form action="loginsucess.php" method="post" onsubmit= "return validate()">
					<input type="text" name="email" placeholder="Email-id" class="input" onblur="validate_email()"><br><br><span id="emailerr"></span>
					<input type="password" name="password" placeholder="********" class="input" onblur="validate_password()"><br><br><span id="passworderr"></span><br>
					<button style="float:right; margin-right:5px;">Log in</button>
					</form><br>';
				}
				else{
					echo'<img src="network.png" id="slide" width="500px;" height="300px;">
							<script type="text/javascript">
							var step=0 //variable that will increment through the images
							function slideit(){
 										if (!document.images) //if browser does not support the image object, exit.
											  return
											 document.getElementById("slide").src = slideimages[step].src
											 if (step<4)
											  step++
											 else
											  step=0
											 //call function "slideit()" every 6.5 seconds
											 setTimeout("slideit()",6500)
											}
											slideit()
											</script>';
					}
		?>
		</div>
	<div id="footer">
		<header>Blogger Features</header>
		<div class="features">
			<img src="design.png" width="200px" height="200px" style="float:right; margin-right:50px;">
			<p class="header">Design your blog</p>
			<span class="feature">Create a beautiful blog that fits your style.Choose from easy-to-use templates with flexible 
			layouts and hundreds of background images, or edit your blog's CSS and HTML to create something entirely unique. </span>
		</div>
		<div class="features">
			<img src="grow.png" width="200px" height="200px" style="float:left; margin-left:50px; padding-right:10px;">
			<p class="header">Grow your audience</p>
			<span class="feature">Share your story with more of the people by setting privacy of your blog as private.
			See comments to see what people are saying about your blog.</span>
		</div>
		<div class="features">
			<img src="post.png" width="200px" height="200px" style="float:right; margin-right:50px;">
			<p class="header">Post from anywhere</p>
			<span class="feature">Reach readers around the world from wherever you are, however you choose to reach them.Blogger
			is available in 60 languages and in countries across the globe.Use Blogger iOS and Android apps to
			post it from your phone or tablet. </span> 
		</div>
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

</body>
</html>