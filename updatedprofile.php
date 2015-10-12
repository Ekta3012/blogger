<?php 
	session_start();
	require 'connect.php';
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	        header('location:updatedprofile.php');
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
	//$_SESSION['imgsrc']=$target_file;
	$email=$_SESSION['mail'];
	$industry=$_POST['industry'];
	$occupation=$_POST['occupation'];
	$location=$_POST['location'];
	$abt_me=$_POST['abtme'];
	$interests=$_POST['interest'];
	$other_id=$_POST['o_email'];
	$profileimg=$target_file;
	$sql="UPDATE profileinfo SET industry='$industry', occupation='$occupation' ,location='$location' ,about_me='$abt_me' ,interest='$interests',other_id='$other_id' WHERE email='$email'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
		echo "failed";
	}
	else{
		//echo "sucessful";
		header('location:profileview.php');
	}
	
?>