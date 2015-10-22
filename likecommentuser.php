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
					$blog_id=$mysql_row['blog_id'];
					$userid=$_SESSION['userid'];
					$postid=$mysql_row['post_id'];
					if($p_title==$posttitle)
					{   
						$sql="INSERT INTO comment (posttitle,comments,blog_id,user_id,post_id) VALUES ('$posttitle','$comment','$blog_id','$userid','$postid')";
						$query=mysqli_query($conn,$sql);
						if(!$query){
						echo "failed";
						}
						else {
						//echo "sucessful";
							header('location:userwise.php');
						}
					}
				}
			}
		}
		$likes=$_POST['likes'];
		$sql="SELECT * FROM bloginfo";
		$query=mysqli_query($conn,$sql);
		if(mysqli_num_rows($query)>0)
		{
			while($sql_row=mysqli_fetch_assoc($query))
			{
				$blogid=$sql_row['blog_id'];
				if($blogid==$likes)
				{
					$userid=$_SESSION['userid'];
					$sql1="INSERT INTO likes (blog_id,user_id,n_o_likes) VALUES ('$blogid','$userid','1')";
					$query=mysqli_query($conn,$sql1);
					if(!$query){
						echo "<script>alert('sorry! you are not allowed');
						location.href='blogs.php';</script>";
					}
					else{
						header('location:userwise.php');
					}
				}
			}
		}
		/*$sql1="SELECT * FROM likes";
		$query1=mysqli_query($conn,$sql1);
		if(mysqli_num_rows($query1)>0){
			while($sql1_row=mysqli_fetch_assoc($query1)){
				$blogid=$sql1_row['blog_id'];
				if($blogid==$likes){
					$userid=$sql1_row['user_id'];
					$numoflikes=$sql1_row['n_o_likes'];
					$numoflikes++;
					$sql2="UPDATE likes SET n_o_likes='$numoflikes'";
					$query2=mysqli_query($conn,$sql2);
					if(!$query2){
						echo'failed';
					}	
					else{
						header('location:blogs.php');
					}
				}
				
			}
		}*/
		
?>
</body>
</html>