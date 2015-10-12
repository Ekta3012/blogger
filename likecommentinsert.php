<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	require 'connect.php';
	//$like=$_POST['likes'];
	$comment=$_POST['comment'];
	$p_title=$_POST['id2'];
	$mysql="SELECT posttitle,blog_id FROM postinfo";
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
					if($p_title==$posttitle)
					{
						$sql="INSERT INTO comment (posttitle,comments,blog_id) VALUES ('$posttitle','$comment','$blog_id')";
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
?>
</body>
</html>