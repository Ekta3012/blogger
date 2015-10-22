<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		#content{
			background-color:#FFF0F5; 
			opacity:0.7; 
			width:92%; 
			margin-left:108px;
			padding:20px;
			}
			.comment{
			margin-left: 100px;
			margin-top: 5px;
			font-size: 20px;
		}
	</style>
</head>
<body>
<div id="header">
		<p style="display:inline; font-size:60px; color:#fff; text-decoration:bold; margin-left:30px; font-family:Broadway;">Blogger - blogs</p>
		<a href="home.php"><p style="float:right; margin-right:50px; font-size:30px; color:black;">Home</p></a>
		<?php if(isset($_SESSION['user_name'])||isset($_SESSION['mail']))
				{
					echo'<img src="$_SESSION["imgsrc"]" style="border-radius:20px; width:40px; margin-top:10px; height:40px; float:right; margin-right:50px;">';
					echo '<p style="font-size:30px; color:black; text-decoration:bold; margin-right:80px; float:right;">'.$_SESSION["user_name"].'</p>';
					echo '<a href="logout.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:20px; float:right;">Log out</p></a>';
				}
				else{
					echo'<a href="login.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:20px; float:right;">Log in</p></a>';
				}
		?>
</div>
<div id="content">
		
		<?php 
			require 'connect.php';
			$month=$_POST['month'];
			$date=date_parse($month); // converts month string into integer form.
			//var_dump($date['month']);
			$sql="SELECT blogtitle,username,m_o_blog,blog_id FROM bloginfo";
			$query=mysqli_query($conn,$sql);
			if(!$query)
			{
				echo "failed";
			}
			else
			{
				//echo "sucess";
			}
			$sql_run=mysqli_query($conn,$sql);
			if(mysqli_num_rows($sql_run)>0)
			{
				while($sql_row=mysqli_fetch_assoc($sql_run))
				{
					$blogtitle=$sql_row['blogtitle'];
					$username=$sql_row['username'];
					$monthofblog=$sql_row['m_o_blog'];
					//echo "sucess";
					$blogid=$sql_row['blog_id'];
					if($date['month'] == $monthofblog)
					{
						$mysql="SELECT blog_id,posttitle,post FROM postinfo";
						$query1=mysqli_query($conn,$mysql);
						if(!$query1)
						{
							echo "failed";
						}
						else
						{
						echo $blogtitle.'<br>'.$username.'<br>';
						$mysql_run=mysqli_query($conn,$mysql);
						if(mysqli_num_rows($mysql_run)>0)
						{
							while($mysql_row=mysqli_fetch_assoc($mysql_run))
							{
								$b_id=$mysql_row['blog_id'];
								$post=$mysql_row['post'];
								$posttitle=$mysql_row['posttitle'];
								if($b_id==$blogid)
								{
									echo '<p style="color:blue;">'.$posttitle.'<br>'.$post.'<br></p>';
									echo '<button onclick="likes();" id="like" name="likes" style="margin-left:100px; width:90px; height:30px; line-height:20px; font-size:20px;">Like</button>
											<form method="post" action="likecommentinsert.php" style="display:inline;">
											<button value="'.$posttitle.'" name="id2" style="width:100px; height:30px; line-height:20px; font-size:20px;">Comment</button>
											<div class="comment">
												<textarea placeholder="Enter your comment...." rows="5" cols="50" id="'.$posttitle.'" name="comment">
												</textarea>
												</div>
											</form>';
								}
							}
						}
					}


				}
			}
		}

	?>
</div>
</body>
</html>