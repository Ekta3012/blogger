<?php 	
	session_start();	
	require 'connect.php';
	//$gender=$;
	$email=$_SESSION['mail'];
	$industry=$_POST['industry'];
	$occupation=$_POST['occupation'];
	$location=$_POST['location'];
	$abt_me=$_POST['abtme'];
	$interests=$_POST['interest'];
	$other_id=$_POST['o_email'];
	$userid=$_SESSION['userid'];
	//$sql="ALTER TABLE profileinfo ";
	//profile image upload
	$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$profile_img=$target_file;
		$_SESSION['imgsrc']=$profile_img;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

	$sql="INSERT INTO profileinfo (user_id,email,industry,occupation,location,about_me,interest,other_id,profile_img) VALUES ('$userid','$email','$industry','$occupation','$location','$abt_me','$interests','$other_id','$target_file')";
	//var_dump($sql);
	$query=mysqli_query($conn,$sql);

		if(!$query){
			echo "<script>alert('Unable to upload profile information'); location.href='logged.php';</script>";
		}
		else{
		header("location:profileview.php");

		}
		
?>