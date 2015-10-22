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
			width:86%; 
			margin-left:185px;
			padding-bottom:20px;
		}
		#blogs{
			background-color: #fff;
			width:80%;
			padding: 20px;
			margin-left: 30px;
			margin-bottom: 10px;
		}
		select{
		width: 200px;
		height:50px;
		font-size: 25px;
		color: #B22222;
		margin-left: 50px;
		margin-top:10px;
	}
	.comment,.posts{
		font-size: 25px;
		margin-left: 100px;
		margin-top: 10px;

	}
	hr{
		width:100%;
		border-color: #03a9f4;	
		height:2px;	
		background-color: #03a9f4;
	}
	#search{
		background:-webkit-linear-gradient(#00CED1,#03a9f4,#1E90FF); 
		width:100px;
		height:35px; 
		color:#cddc39; 
		text-decoration:bold;
		font-size:20px;
		border-radius: 5px;
	}
	#search:hover{
		background:-webkit-linear-gradient(#cddc39,#6B8E23);
		color:#4169E1; 
	}
	</style>
	<script type="text/javascript "src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/javascript">
		
	</script>
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
		<p style="font-size:25px; margin-left:30px; display:inline; margin-top:10px; color: #B22222; text-decoration:bold;">View Blogs By month :</p>
		 <form method="post" action="monthwise.php" style="display:inline;">
		 <select name="month">
			<option>January</option>
			<option>February</option>
			<option>March</option>
			<option>April</option>
			<option>May</option>
			<option>June</option>
			<option>July</option>
			<option>August</option>
			<option>September</option>
			<option>October</option>
			<option>November</option>
			<option>December</option>
		</select> &nbsp		
		<button style="width:100px;">view</button> <!--sends the name of the month -->
		</form>
		<form method="post" action="userwise.php" style="margin-left:20px; margin-top:10px; "> View Blogs by Person: &nbsp
		<input type="text" name="person" id="person" style="width:200px; height:20px; display:inline; margin-right:10px;">
		<input type="submit" id="search" value="View"></form>
		<div id="result"></div>
		<?php 
			echo '<div id="blogs" style="margin-top:50px;">';
			require 'connect.php';
			$u_name=$_SESSION['user_name'];
			$sql="SELECT * FROM bloginfo ORDER BY d_o_blog DESC";
			$query=mysqli_query($conn,$sql);
			if(!$query){
				echo "failed";
			}
			else{
				//echo "sucess";
				echo'<br>';
			}
			$sql_run=mysqli_query($conn,$sql);
			if(mysqli_num_rows($sql_run)>0){
				while($sql_row=mysqli_fetch_assoc($sql_run))
				{
					$username=$sql_row['username'];				//from bloginfo
					$blogtitle=$sql_row['blogtitle'];
					$flag=$sql_row['flag'];
					$dob=$sql_row['d_o_blog'];
					$blogid=$sql_row['blog_id'];
					$time=$sql_row['time'];
					if($flag==0)
					{
						//echo'username:'.$username.'<br>'.'blogtitle:'.$blogtitle.'<br>';
						echo'<p style="font-size:25px; margin-left:100px; display:inline; margin-top:10px;">'.$blogtitle.'</p><p style="font-size:15px; margin-left:50px; display:inline;">'.$username.'&nbsp &nbsp'.$time.'&nbsp &nbsp'.$dob.'</p><br>';
						
						$sqli="SELECT * FROM follow WHERE follower='$u_name'";
						$run=mysqli_query($conn,$sqli);
						if(mysqli_num_rows($run)>0){
							while ($row=mysqli_fetch_assoc($run)) {
									$id=$row['blog_id'];
							if($id==$blogid){
									echo '<form method="post" action="followinsert.php" style="display:inline;">
										<button value="'.$blogid.'" name="id5" style="width:100px; height:30px; line-height:20px; font-size:20px; margin-right:20px; float:right;">unfollow</button></form><br>';
									
								}
								/*else{
									echo '<form method="post" action="followinsert.php" style="display:inline;">
										<button value="'.$blogid.'" name="id5" style="width:100px; height:30px; line-height:20px; font-size:20px; margin-left:70px;">follow</button></form></div>';
									}*/
						
								}
							}						
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
									echo'<p class="posts" style="color:blue;">'. $posttitle.'&nbsp &nbsp <font size="3px">'.$dateofpost.'&nbsp &nbsp'.$time.'</font><br><br>'.$post.'</p>';
									echo $postid;
									if(isset($_SESSION['user_name']))
									{
										
										echo'<form method="post" action="likecommentinsert.php" style="display:inline;">
											<button name="likes" value="'.$postid.'" style="margin-left:100px; width:90px; height:30px; line-height:20px; font-size:20px;">
											Like</button>';
											$sql2="SELECT * FROM postlikes";
											$query2=mysqli_query($conn,$sql2);
											if(mysqli_num_rows($query2)>0){
											while($sql2_row=mysqli_fetch_assoc($query2)){
												@$p_id=$sql2_row['post_id'];
																					
												if($p_id == $postid)
												{												
													@$numoflikes=$sql2_row['n_o_likes'];
													echo '&nbsp &nbsp'.$numoflikes.'likes';
												}
																
											}
										}											
											echo'<div class="comment">
												<textarea placeholder="Enter your comment...." rows="5" cols="50" id="'.$posttitle.'" name="comment">
												</textarea><br>
												<button value="'.$posttitle.'" name="id2" style="width:100px; height:30px; line-height:20px; font-size:20px; margin-left:250px;">Comment</button>
												</div>
												</form>';
										
									//}
										
								$sql1="SELECT * FROM comment";
								$query1=mysqli_query($conn,$sql1);
								if(mysqli_num_rows($query1)>0)
									{
										while($sql1_row=mysqli_fetch_assoc($query1))
										{	
											$comment=$sql1_row['comments'];
											$p_id=$sql1_row['post_id'];
											$comment_id=$sql1_row['comment_id'];									
											if($p_id==$postid){	
												//check for blog id of posts and comment existence
												echo '<div class="comment" style="font-size:30px; margin-left:100px; display:inline; color:#cddc39;">'.$comment.'</div>';
												echo '<form method="post" action="delete.php" style="display:inline;">
														<button style="background:-webkit-linear-gradient(#FFF,#FFF); margin-left:180px; border:0px; margin-top:10px;" name="delete" value="'.$comment_id.'"><img src="close.png"></button>
													 </form><br>';
											}
										}			
									}
								}
							}
						}echo'<br><hr><br>';
					}
				}
			}
		}echo'</div>';
	}

			if(!isset($_SESSION['user_name'])){
				echo'<script>
				window.onload=alert("You need to login to add comment and like the post");
				</script>';
			}
			
		?>
	</div>
	
</body>
</html>