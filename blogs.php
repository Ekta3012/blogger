<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		.comment{
			margin-left: 100px;
			margin-top: 5px;
			font-size: 20px;
		}
		#content{
			background-color:#FFF0F5; 
			opacity:0.7; 
			width:92%; 
			height:100%;
			margin-left:180px;
			padding-bottom:20px;
		}
		select{
		width: 200px;
		height:50px;
		font-size: 25px;
		color: #B22222;
		margin-left: 50px;
		margin-top:10px;
	}
	</style>
</head>
<body>
	<div id="header">
		<p style="display:inline; font-size:60px; color:#fff; text-decoration:bold; margin-left:30px; font-family:Broadway;">Blogger - blogs</p>
		<?php if(isset($_SESSION['user_name']))
				{
					echo '<p style="font-size:30px; color:black; text-decoration:bold; margin-right:80px; float:right;">'.$_SESSION["user_name"].'</p>';
					echo '<a href="logout.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:20px; float:right;">Log out</p></a>';
				}
				else{
					echo'<a href="login.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:20px; float:right;">Log in</p></a>';
				}
		?>
		<a href="home.php"><p style="float:right; margin-right:50px; font-size:30px; color:black;">Home</p></a>
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
		<?php 
			require 'connect.php';
			$sql="SELECT * FROM bloginfo ORDER BY d_o_blog DESC";
			$sql1="SELECT * FROM comment";
			$query=mysqli_query($conn,$sql);
			$query1=mysqli_query($conn,$sql1);
			if(!$query){
				echo "failed";
			}
			else{
				//echo "sucess";
				echo'<br>';
			}
			$sql_run=mysqli_query($conn,$sql);
			if(mysqli_num_rows($sql_run)>0){
				while($sql_row=mysqli_fetch_assoc($sql_run)){
					$username=$sql_row['username'];				//from bloginfo
					$blogtitle=$sql_row['blogtitle'];
					$flag=$sql_row['flag'];
					$dob=$sql_row['d_o_blog'];
					$address=$sql_row['address'];
					if($flag==0){
						//echo'username:'.$username.'<br>'.'blogtitle:'.$blogtitle.'<br>';
						echo'<div id="blogs">
								<p style="margin-left:100px; font-size:25px;">'.$username.'<br>'.$blogtitle.'&nbsp &nbsp'.$dob.'</p></div>';
						$mysql="SELECT blogtitle,posttitle,post,blog_id,d_o_post FROM postinfo";
						$myquery=mysqli_query($conn,$mysql);
						if(!$myquery){
							echo "failed";
						}
						else{
							//echo"sucess";
						$mysql_run=mysqli_query($conn,$mysql);
						if(mysqli_num_rows($mysql_run)>0){
							while($mysql_row=mysqli_fetch_assoc($mysql_run)){
								$blog_title=$mysql_row['blogtitle'];
								$posttitle=$mysql_row['posttitle'];				//from postinfo
								$post=$mysql_row['post'];
								$dateofpost=$mysql_row['d_o_post'];
								$blogid=$sql_row['blog_id'];
								if($blogtitle==$blog_title){												
									echo'<p style="margin-left:150px; font-size:20px; color:blue;">'. $posttitle.'&nbsp &nbsp'.$dateofpost.'<br>'.$post.'</p>';
									if(isset($_SESSION['user_name']))
									{
									echo '	<button onclick="likes();" id="like" name="likes" style="margin-left:100px; width:90px; height:30px; line-height:20px; font-size:20px;">Like</button>
											<form method="post" action="likecommentinsert.php" style="display:inline;">
											<button value="'.$posttitle.'" name="id2" style="width:100px; height:30px; line-height:20px; font-size:20px;">Comment</button>
											<div class="comment">
												<textarea placeholder="Enter your comment...." rows="5" cols="50" id="'.$posttitle.'" name="comment">
												</textarea>
												</div>
											</form>';
										}
								if(mysqli_num_rows($query1)>0)
									{
										while($sql1_row=mysqli_fetch_assoc($query1))
										{
											$comment=$sql1_row['comments'];
											$b_id=$sql1_row['blog_id'];
											if($b_id==$blogid){							//check for blog id of posts and comment existence
												echo '<div class="comment" font-size:30px; margin-right:500px; float:right;>'.$comment.'</div>';
											}												
											
										}
									}

									}
								}
							}
							
						}
					}
				}
			}
			if(!isset($_SESSION['user_name'])){
				echo'<script>
				window.onload=alert("You need to login to add comment and like the post");
				</script>';
			}
			
		?>
	</div>
	<script>
		var i=0;
		function likes(){
			i++;
			document.getElementById("like").innerHTML="unLike";
			var numoflikes=i;
		}
		</script>
</body>
</html>