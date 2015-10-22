<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My profile</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		#profile{
			background-color:#FFEBCD;
			opacity: 0.7;
			float: left;
			margin-left: 100px;
			width:1247px;
			margin-top: 0px;
		}
		#blogs{
			font-size: 30px;
			/*height: 25%;*/
		}
		#sideright{
			font-size: 35px;
			float: right;
			margin-right: 35px;
			margin-top: 30px;
		}
		#sideleft{
			float: left;
			margin-left: 10px;
			margin-top: 30px;
		}
		.info{
			font-size: 30px;
			color: blue;
			display: inline;

		}
		ul{
			list-style: none;
		}
		li{
			margin-top: 10px;
			font-size: 20px;
		}
	</style>
</head>
<body>
<?php 
		require 'connect.php';
		$sql="SELECT * FROM profileinfo";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			echo "<script>alert('Unable to open your profile.');</script>";
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
							$gender=$sql_row['gender'];
							$industry = $sql_row['industry'];
							$occupation = $sql_row['occupation'];
							$location = $sql_row['location'];
							$abt_me = $sql_row['about_me'];
							$interest = $sql_row['interest'];
							$other_id = $sql_row['other_id'];
							$profileimg=$sql_row['profile_img'];
						}
					}
				}
			}
	?>
<div id="header">
	<p style="display:inline; font-size:60px; color:#03a9f4; text-decoration:bold; margin-left:30px; font-family:Broadway;">
	Blogger - Profile</p>
	<a href="logout.php">
	<p style="float:right; margin-right:50px; font-size:30px; color:black;">Log out</p></a>
	<a href="home.php">
	<p style="float:right; margin-right:100px; font-size:30px; color:black;"><img src="home.png" width="50px" height="50px"></p></a>
	<img src="<?php echo $profileimg;?>" class="header_img">
	<a href="dashboard.php"><p style="float:right; margin-right:20px; display:inline; font-size:30px; color:black;">
	<?php 
		echo $_SESSION['user_name'];
	?></p></a>
</div>
<div id="profile">
	<div id="blogging" style="margin-top:15px;">
		<a href="dashboard.php">
		<button style="width:150px; margin-left:50px; height:50px; font-size:20px; text-decoration:bold;">Start blogging</button>
		<a href="editprofile.php" style="color:black;">
		<button style="margin-right:10px; display:inline; float:right; text-decoration:bold; font-size:20px; width:150px; height:50px;">
		Edit Profile</button>
		</a>
	</div>
	
	<div id="sideleft">
		<img src="<?php echo $profileimg;?>" width="200px" height="200px" style="border:1px solid black;">
		<ul>
			<li>Contact me</li>
			<li>My Web Page</li>
			<li>On Blogger Since
				<span style="color:blue; text-decoration:bold;"><?php 
					require'connect.php';
					$sql="SELECT * FROM forminfo";
					$sql_run=mysqli_query($conn,$sql);
					if(mysqli_num_rows($sql_run)>0){
						while ($sql_row=mysqli_fetch_assoc($sql_run)) {
							$dateofregister=$sql_row['d_o_register'];
							$mail=$sql_row['email'];
							if($mail==$_SESSION['mail']){
								echo '<br>'.$dateofregister;
							}
						}
					}
				?></span>
			</li>
			<li>Profile views</li>
		</ul>
	</div>
	<div id="sideright">
		<div id="blogs"><header>My Blogs</header><br>
				<?php 
				$sql_blogs="SELECT blogtitle,username FROM bloginfo";
				$query=mysqli_query($conn,$sql_blogs);
				if(!$query){
					echo "failed";
				}
				$sql_blogs_run=mysqli_query($conn,$sql_blogs);
				if(mysqli_num_rows($sql_blogs_run)>0)
					{	
						while($sql_blogs_row=mysqli_fetch_assoc($sql_blogs_run))
						{
							$blogtitle=$sql_blogs_row['blogtitle'];
							$username=$sql_blogs_row['username'];
							if($username==$_SESSION['user_name']){
							echo '<p style="color:blue; font-size:25px; display:inline;">'.$blogtitle.'</p>';
							echo"<br>";
							}
						}
					}
				?>
		</div><br><br>
		<div id="info">
		Gender:<p class="info"><?php echo $gender; ?></p><br>
		Industry :<p class="info"><?php echo $industry; ?></p><br>
		Occupation:<p class="info"><?php echo $occupation; ?></p><br>
		Location: <p class="info"><?php echo $location; ?></p><br>
		Few lines about you: <p class="info"><?php echo $abt_me; ?></p><br>
		Interest: <p class="info"><?php echo $interest; ?></p><br>
		Other mail id: <p class="info"><?php echo $other_id; ?></p>
		</div>
	</div>
</div>
</body>
</html>