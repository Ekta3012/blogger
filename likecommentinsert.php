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
	$comment=$_POST['comment'];
	$p_title=$_POST['id2'];
	$mysql="SELECT * FROM postinfo";
	$result=mysqli_query($conn,$mysql);
	if(!$result){
		echo"failed";
	}
	else{
			$myresult=mysqli_query($conn,$mysql);
			if(mysqli_num_rows($myresult)>0)
			{	
				while($mysql_row=mysqli_fetch_assoc($myresult))
				{
					$posttitle=$mysql_row['posttitle'];
					if($p_title==$posttitle)
					{   
						$blog_id=$mysql_row['blog_id'];
						$userid=$_SESSION['userid'];
						$postid=$mysql_row['post_id'];
						$sql="INSERT INTO comment (posttitle,comments,blog_id,user_id,post_id) VALUES ('$posttitle','$comment','$blog_id','$userid','$postid')";
						$query=mysqli_query($conn,$sql);
						if(!$query){
						echo "failed";
						}
						else {
						//echo "sucessful";
							header('location:blogs.php');
						}
					}
				}
			}
		}
		$likes=$_POST['likes'];
		/*$sql="SELECT * FROM postinfo";
		$query=mysqli_query($conn,$sql);
		if(mysqli_num_rows($query)>0)
		{
			while($sql_row=mysqli_fetch_assoc($query))
			{
				$postid=$sql_row['post_id'];
				if($postid==$likes)
				{*/
					$userid=$_SESSION['userid'];
					$sql1="INSERT INTO postlikes (post_id,user_id,n_o_likes) VALUES ('$likes','$userid','1')";
							$query=mysqli_query($conn,$sql1);
							if(!$query){
								echo "<script>alert('sorry! you are not allowed');
								location.href='blogs.php';</script>";
							}
							else{
								header('location:blogs.php');
							}
						
					
					
				//}
			//}
		//}
		
?>
</body>
</html>