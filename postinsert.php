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
	$post=$_POST['post'];
	$post_title=$_POST['posttitle'];
	//$blog_title=$_POST['blogtitle'];
	$blog_title=$_POST['b_title'];
	$dateofpost=date('Y-m-d');
	//$username=$_SESSION['username'];
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
			$blog_id=$sql_row['blog_id'];
			$blogtitle=$sql_row['blogtitle'];
			$username=$sql_row['username'];
			if($blog_title==$blogtitle)
			{	
				$sql="INSERT INTO postinfo (username,blog_id,blogtitle,posttitle,post,d_o_post) VALUES ('$username','$blog_id','$blogtitle','$post_title','$post','$dateofpost')";
				//var_dump($sql);
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