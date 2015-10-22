<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	require 'connect.php';
	date_default_timezone_set('Asia/Calcutta');
	$post=mysqli_real_escape_string($conn,$_POST['post']);
	$post_title=mysqli_real_escape_string($conn,$_POST['posttitle']);
	$blog_title=mysqli_real_escape_string($conn,$_POST['b_title']);
	$dateofpost=date('Y-m-d');
	//$username=$_SESSION['username'];
	$time=date('h:i:sa');
	$mysql="SELECT blog_id,blogtitle,username FROM bloginfo";
	$myquery=mysqli_query($conn,$mysql);
	if(!$myquery){
		echo "failed";
	}
	$mysql_run=mysqli_query($conn,$mysql);
	if(mysqli_num_rows($mysql_run)>0)
	{
		while($sql_row=mysqli_fetch_assoc($mysql_run))
		{
			$blogtitle=mysqli_real_escape_string($conn,$sql_row['blogtitle']);
			if($blog_title==$blogtitle)
			{	
				$username=$sql_row['username'];
				$blog_id=$sql_row['blog_id'];
				$sql="INSERT INTO postinfo (username,blog_id,blogtitle,posttitle,post,d_o_post,time) VALUES ('$username','$blog_id','$blogtitle','$post_title','$post','$dateofpost','$time')";
				$query=mysqli_query($conn,$sql);
				if(!$query){
						echo "Blog Doesn't exist please create a <a href='newblog.php'>blog</a> ";
					}
				else{
				header("location:dashboard.php");
				//echo "Your Post have been sucessfully inserted";
				}
			}
		}
	}
?>
</body>
</html>