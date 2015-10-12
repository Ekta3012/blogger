<?php 
	session_start();
	require'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger|Dashboard</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		#sideleft{
			float: left;
			background-color:#FFA07A;
			opacity:0.7;
			width:200px; 
			margin-left:70px;
			height:630px;
			padding-left:30px;
			padding-top: 30px;
			padding-right: 30px;
			font-size: 30px;
			
		}
		#sideright{
			float: right;
			font-size: 35px;
			background-color: #FFF0F5;
			opacity: 0.7;
			width:74%;
			height:95%;
			padding-top: 10px;
			padding-left:20px;
			padding-bottom:20px; 
		}		
		a{
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
	<div id="header">
	<?php 
		$mysql="SELECT * FROM profileinfo";
		$mysql_run=mysqli_query($conn,$mysql);
		if(mysqli_num_rows($mysql_run)>0){
			while ($mysql_row=mysqli_fetch_assoc($mysql_run)) {
				$username=$mysql_row['email'];
				if($_SESSION['mail']==$username){
				$_SESSION['imgsrc']=$mysql_row['profile_img'];
				}
			}
		}
	?>
		<p style="display:inline; font-size:60px; color:#fff; text-decoration:bold; margin-left:30px; font-family:Broadway;">
		Blogger - Dashboard</p>
		<a href="logout.php">
		<p style="float:right; margin-right:50px; font-size:30px; color:black;">Log out</p></a>
		<a href="home.php">
		<p style="float:right; margin-right:50px; font-size:30px; color:black;">Home</p></a>
		<img src="<?php echo $_SESSION['imgsrc']; ?>" class="header_img">
		<p style="float:right; margin-right:10px; display:inline; font-size:30px;">
		<?php 
			echo $_SESSION['user_name'];
		?></p>
	</div>
	<div id="sideleft">
		<header><?php echo $_SESSION['user_name'];?>'s Blogs</header><br><br>
			<a href="profileview.php"><button>View Profile</button></a><br><br>
			<a href="newblog.php"><button>New Blog</button></a><br><br>
			Reading List | All Blogs <br><br>
			<button>Add</button>
		</div>
		<div id="sideright">
			<?php 
				
				$sql="SELECT blogtitle,username,blog_id FROM bloginfo";
				$result=mysqli_query($conn,$sql);
				if(!$result){
					echo "failed";
				}
				if(mysqli_num_rows($result)>0)
				{
					while($sql_row=mysqli_fetch_assoc($result))
					{	
						//displaying blogs by user
						$username=$sql_row['username'];
						$blogtitle=$sql_row['blogtitle'];
						$blogid=$sql_row['blog_id'];
						if($username==$_SESSION['user_name']) // check for username and its blog in bloginfo table.
						{
						echo '<p id="blogtitle">';
						echo'<a href="blogsview.php" name="link">'.$blogs=$sql_row['blogtitle'].'</a>';
						echo'</p>';
						echo '<form method="post" action="createpost.php" style="display:inline;"><button value="'.$blogtitle.'" name="b_title">Create post</button></form>
									<form method="post" action="viewpost.php" style="display:inline;"><button style="margin-left:5px;" name="id1" value="'.$blogid.'">View post</button></form> ';
						// createpost ,viewpost, view blog.
						//in view blog we can like, comment, see blog with post, date of post.
						}
						
					}
				}
			?>
		</div> 
	</div>
	</body>
</html>