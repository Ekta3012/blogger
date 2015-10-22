<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		.style,select{
			margin-top: 5px;
			width: 200px;
			height: 20px;
			float: right;
			margin-right: 300px;
		}
		textarea{
			margin-top: 5px;
			float: right;
			
		}
		#sideleft{
			float:left; 
			margin-left:50px;
			padding-left:20px;
			width:500px; 
			font-size:20px;
			padding-top: 50px;
		}
		form{
			background-color:#FFEBCD;
			padding-left:20px;
			padding-top: 50px;
			
		}
		#content{
			background-color:#FFEBCD;
			opacity: 0.7;
			margin-left: 200px;
			padding-top: 20px;
			height:750px;
			width:1148px;

		}
		#sideright{
			float:right;
			margin-right:250px; 
			width:300px; 
			margin-top:350px; 
			font-size:20px;
			
		}
		button{

		}
</style>
</head>
<body>
	<div id="header">
	<p style="display:inline; font-size:60px; color:#03a9f4; text-decoration:bold; margin-left:30px; font-family:Broadway;">
	Blogger - Profile</p>
	<a href="logout.php">
	<p style="float:right; margin-right:30px; font-size:30px; color:black;">Log out</p></a>
	<a href="home.php">
	<p style="float:right; margin-right:30px; font-size:30px; color:black;"><img src="home.png" width="50px" height="50px"></p></a>
	<img src="<?php echo $_SESSION['imgsrc'];?>" style="border-radius:20px; width:40px; margin-top:10px; height:40px; float:right; margin-right:100px;">
	<p style="float:right; margin-right:20px; display:inline; font-size:30px;">
	<?php 
		echo $_SESSION['user_name'];
	?></p>
</div>
	<div id="content">
	<div id="sideleft" > 
   		<img src="blankprofile.jpg" width="150px" height="150px" style="border:1px solid black; margin-left:15px;" alt="profile pic">
		<form action="upload.php" method="post" enctype="multipart/form-data" >	<!-- enctype -->
				<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
			    <input type="submit" value="Upload Image" name="submit"><br><br>
				Email-id: <?php echo $_SESSION['mail'];?><br><br>
				Gender <input type="radio"  style="margin-left:10px;" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>>Male <input type="radio" style="margin-left:10px;" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>> Female<br><br>
				Industry <select name="industry">
				    		  <option value="----">------</option>
							  <option value="Bussiness">Bussiness</option>
							  <option value="Education">Education</option>
							  <option value="Social">Social</option>
						</select><br><br>
				Occupation :<input type="text" name="occupation" class="style"><br><br>
				Location: <input type="text" name="location" class="style"><br><br>
				Other mail id: <input type="text" name="o_email" class="style"><br><br><br>
				<button>Done</button>
			</div>
			<div id="sideright">
					Few lines about me : <textarea rows="3" cols="26" name="abtme"></textarea><br><br><br><br>
					Interests : <textarea rows="2" cols="26" name="interest"></textarea>
					
			</div>	
		</form>
		</div>

<?php
	//echo "you are loged in";
	//echo $_SESSION['user']; 
?>
</body>
</html>

