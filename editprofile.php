<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger | Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		.style,select{
			margin-top: 10px;
			width: 250px;
			height: 30px;
			float: right;
			margin-right: 200px;
			font-size: 20px;
			color: #03a9f4;
			padding-left: 5px;
		}
		button{
			text-decoration:bold; 
			font-size:25px; 
			float:right;
			margin-right:0px;
		}
		textarea{
			margin-top: 5px;
			float: right;
			font-size: 25px;
			color: #03a9f4;			
		}
		#sideleft{
					float:left;
					margin-left:100px; 
					width:50%; 
					margin-top:50px; 
					font-size:20px;
					font-size: 20px;
					margin-top: 30px;
					height: 600px;
				}
				#sideright{
					float:right; 
					margin-right:50px; 
					width:30%; 
					margin-top:350px; 
					font-size:20px;
					
				}
				#content{
					background-color: #FFF0F5;
					width: 1155px;
					height: 900px;
					margin-left: 190px;
					opacity: 0.7;
					font-size: 25px;
					color: #03a9f4;
				}
</style>
</head>
<body>
	<?php 
			require 'connect.php';
			$sql="SELECT * FROM profileinfo";
			//$sql_date="SELECT d_o_register FROM forminfo";
			$result=mysqli_query($conn,$sql);
			if(!$result)
			{
				echo "failed";
			}
			else{
				//echo "sucessful";
			}
			$mysql_run=mysqli_query($conn,$sql);
			if(isset($_SESSION['user_name']) && isset($_SESSION['mail']))
			{
				if(mysqli_num_rows($mysql_run)>0)
				{
					while($sql_row = mysqli_fetch_assoc($mysql_run))
					{	
						//$user = $sql_row['username'];
						$mail_id=$sql_row['email'];
						if($_SESSION['mail']==$mail_id)
						{
							$_SESSION['industry'] = $sql_row['industry'];
							$_SESSION['occupation'] = $sql_row['occupation'];
							$_SESSION['location'] = $sql_row['location'];
							$_SESSION['abt_me'] = $sql_row['about_me'];
							$_SESSION['interest'] = $sql_row['interest'];
							$_SESSION['other_id'] = $sql_row['other_id'];
							$profileimg=$sql_row['profile_img'];
							$gender=$sql_row['gender'];
						}
					}
				}
			}
		?>
	<div id="header">
		<p style="display:inline; font-size:60px; color:#03a9f4; text-decoration:bold; margin-left:30px; font-family:Broadway;">
		Blogger - Edit Profile</p>
		<img src="<?php echo $profileimg;?>" style="border-radius:20px; width:40px; margin-top:10px; height:40px; float:right; margin-right:100px;">
		<a href="dashboard.php"><p style="float:right; margin-right:20px; display:inline; font-size:30px;">
		<?php 
			echo $_SESSION['user_name'];
		?></p></a>
		<a href="logout.php">
		<p style="float:right; margin-right:100px; font-size:30px; color:black;">Log out</p></a>
	</div>
	<div id="content">
	   <div id="sideleft"> 
		   <img src="<?php echo $profileimg;?>" width="200px" height="200px" style="border:1px solid black;" alt="profile pic">
			<br><input type="file" name="fileToUpload" id="fileToUpload"><br><br>
		    <form action="updatedprofile.php" method="post" enctype="multipart/form-data">
		    <input type="submit" value="Upload Image" name="submit"><br><br>
		       Email-id : <?php echo $_SESSION['mail'];?><br><br>
			    Gender<input type="radio" style="margin-left:10px;" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked"; else if($gender=="male") echo "checked";?>> Male <input type="radio" style="margin-left:10px;" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked"; else if($gender=="female") echo "checked"; ?>> Female<br><br>
			    Industry <select name="industry">
			    			  <option value="<?php echo $_SESSION['industry'];?>"><?php echo $_SESSION['industry'];?></option>
			    			  <option value="----">------</option>
							  <option value="Bussiness">Bussiness</option>
							  <option value="Education">Education</option>
							  <option value="Social">Social</option>
						</select><br><br><br>
						Occupation :<input type="text" name="occupation" class="style" value="<?php echo $_SESSION['occupation'];?>"><br><br><br>
						Location: <input type="text" name="location" class="style" value="<?php echo $_SESSION['location'];?>"><br><br><br>
						Other mail id: <input type="text" name="o_email" class="style" value="<?php echo $_SESSION['other_id'];?>"><br><br><br><br>
						<br><br><button style="margin-right:65px; margin-top:45px;">Done</button>
						</div>
						<div id="sideright">
				Few lines about me : <textarea rows="3" cols="26" name="abtme" style="margin-top:20px; margin-bottom:20px;" ><?php echo $_SESSION['abt_me'];?></textarea><br><br><br><br>
				Interests : <textarea rows="2" cols="26" name="interest" style="margin-top:20px;"><?php echo $_SESSION['interest'];?></textarea>
		</div>	
		
	</form>
	
</div>
<?php
	//echo "you are loged in";
	//echo $_SESSION['user']; 
?>

</body>
</html>