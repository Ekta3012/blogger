<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger - Blogs</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		#content{
			background-color:#FFF0F5; 
			opacity:0.7; 
			width:86%; 
			height:100%;
			margin-left:155px;
			padding-bottom:20px;
			padding: 50px;
		}
		#blogs{
			background-color: #fff;
			width:80%;
			padding: 20px;
			margin-left: 30px;
			margin-bottom: 10px;
		}
		hr{
		width:100%;
		border-color: #03a9f4;	
		height:2px;	
		background-color: #03a9f4;
	}
	.comment,.posts{
		font-size: 25px;
		margin-left: 100px;
		margin-top: 10px;

	}
	</style>
</head>
<body>
	<div id="header">
		<p style="display:inline; font-size:60px; color:#03a9f4; text-decoration:bold; margin-left:30px; font-family:Broadway;">Blogger - blogs</p>
		<?php if(isset($_SESSION['user_name']))
				{
					echo '<a href="dashboard.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:80px; float:right;">'.$_SESSION["user_name"].'</p></a>';
					echo '<a href="logout.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:20px; float:right;">Log out</p></a>';
				}
				else{
					echo'<a href="home.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:20px; float:right;">Log in</p></a>';
				}
		?>
		<a href="home.php"><p style="float:right; margin-right:50px; font-size:30px; color:black;"><img src="home.png" width="50px" height="50px"></p></a>
		</div>
	<div id="content">
	<?php
	require 'connect.php';
	echo '<div id="blogs">';
	$person=$_POST['person'];
	$sql="SELECT * FROM bloginfo";
	$query=mysqli_query($conn,$sql);
	if(mysqli_num_rows($query)>0)
	{
		while($sql_row=mysqli_fetch_assoc($query))
		{
			$username=$sql_row['username'];
			if($username==$person)
					{	
						$username=$sql_row['username'];				//from bloginfo
						$blogtitle=$sql_row['blogtitle'];
						$dob=$sql_row['d_o_blog'];
						$blogid=$sql_row['blog_id'];
						$time=$sql_row['time'];
						echo'<p style="font-size:25px; margin-left:100px; display:inline; margin-top:10px;">'.$blogtitle.'</p><p style="font-size:15px; margin-left:50px; display:inline;">'.$username.'&nbsp &nbsp'.$time.'&nbsp &nbsp'.$dob.'</p>';
						echo '<form method="post" action="followinsert.php" style="display:inline;">
										<button value="'.$blogid.'" name="id5" style="width:100px; height:30px; line-height:20px; font-size:20px; margin-left:70px;">Follow</button></form>';
						$mysql="SELECT * FROM postinfo";
						$myquery=mysqli_query($conn,$mysql);
						if(!$myquery){
							echo "failed";
						}
						else{
							//echo"sucess";
						$mysql_run=mysqli_query($conn,$mysql);
						if(mysqli_num_rows($mysql_run)>0)
						{
							while($mysql_row=mysqli_fetch_assoc($mysql_run))
							{
								$blog_title=$mysql_row['blogtitle'];
								if($blog_title == $blogtitle)
								{	$posttitle=$mysql_row['posttitle'];				//from postinfo
									$post=$mysql_row['post'];
									$dateofpost=$mysql_row['d_o_post'];
									$blog_id=$mysql_row['blog_id'];	
									$time=$mysql_row['time'];	
									$postid=$mysql_row['post_id'];									
									echo'<p class="posts" style="color:blue; font-size:25px;">'. $posttitle.'&nbsp &nbsp<font size="3px">'.$dateofpost.'&nbsp &nbsp'.$time.'</font><br>'.$post.'</p>';
									if(isset($_SESSION['user_name']))
									{
										
										echo'<form method="post" action="likecommentuser.php" style="display:inline;">
											<button name="likes" value="'.$blogid.'" style="margin-left:100px; width:90px; height:30px; line-height:20px; font-size:20px;">
											Like</button>';
											$sql2="SELECT * FROM likes";
											$query2=mysqli_query($conn,$sql2);
											if(mysqli_num_rows($query2)>0){
											while($sql2_row=mysqli_fetch_assoc($query2)){
												$b_id=$sql2_row['blog_id'];
												if($blogid == $b_id){
													$numoflikes=$sql2_row['n_o_likes'];
																								
													}
													//$numoflikes+=$numoflikes;
													if($blogid == $b_id){
													echo $numoflikes.'likes';	
													}
												}
											}
											
											echo'<div class="comment">
												<textarea placeholder="Enter your comment...." rows="5" cols="50" id="'.$posttitle.'" name="comment">
												</textarea><br>
												<button value="'.$posttitle.'" name="id2" style="width:100px; height:30px; line-height:20px; font-size:20px; margin-left:250px;">Comment</button>
												</div>
												</form>';

					$sql1="SELECT * FROM comment";
					$query1=mysqli_query($conn,$sql1);
					if(mysqli_num_rows($query1)>0)
						{
							while($sql1_row=mysqli_fetch_assoc($query1))
							{	
								$comment=$sql1_row['comments'];
								$p_id=$sql1_row['post_id'];
								if($p_id==$postid){							//check for blog id of posts and comment existence
									echo '<div class="comment" style="font-size:30px; margin-left:100px; display:inline; color:#cddc39;">'.$comment.'</div>';
									echo '<form method="post" action="delete.php" style="display:inline;">
										<button style="background:-webkit-linear-gradient(#FFF,#fff); margin-left:180px; border:0px;" name="delete" value="'.$p_id.'"><img src="close.png"></button>
										</form>';
								}	
								}
								}				
							}
						}
					}
				}echo'<br><hr><br>';
			}
		}
	}echo'</div>';
}
?>
</div>
</body>
</html>
