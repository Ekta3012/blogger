<?php 
	session_start();
	require 'connect.php';
	$follow=$_POST['id5'];
	//echo $follow .'<br>';
	$follower=$_SESSION['user_name'];
	$sql="SELECT * FROM bloginfo";
	$query=mysqli_query($conn,$sql);
		if(!$query){
			echo'failed1';
		}
		else{ 
				
				$mysql_run=mysqli_query($conn,$sql);
				if(mysqli_num_rows($mysql_run)>0){
				while($sql_row=mysqli_fetch_assoc($mysql_run))
				{
					$blog_id=$sql_row['blog_id'];
					if($follow==$blog_id)
					{	
						$user_id=$sql_row['user_id'];
						$username=$sql_row['username'];
						$mysql="INSERT INTO follow (user_id,blog_id,username,follower) VALUES ('$user_id','$follow','$username','$follower')";
						$myquery=mysqli_query($conn,$mysql);
						if(!$myquery){
						echo "<script>alert('sorry! you are not allowed');
								location.href='blogs.php';</script>";
							}
						else{
							header('location:blogs.php');
								}
						}
		
				}
			}
						}

?>