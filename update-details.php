<?php

require "db-connection.php";

//echo 'comes here';
//echo '<pre>'; print_r($_FILES);

$postData = $_POST;

//echo '<pre>'; print_r($postData); exit;

$dataId = $postData['dataId'];
$name = $postData['name'];
$email = $postData['email'];
$gender = $postData['gender'];
$contact = $postData['contact'];
$address = $postData['address'];
$doj = $postData['doj'];
$dob = $postData['dob'];
$department = $postData['department'];
$education = $postData['education'];
$experience = $postData['experience'];
$hobby = $postData['hobby'];


$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_FILES)) {
	
	if(isset($_FILES['photo']) && isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != ''){
	
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
	
	
	
	if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
	$sql = "update employee_info set photo_path= '$target_file' where id=".$dataId;

	if ($conn->query($sql) === TRUE) {
	} 
	
  }else{
	  $target_file = 'test/test';
  }
	
	
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  
}
}


$sql = "update employee_info set name= '$name', email_address = '$email', gender = '$gender', contact_no = '$contact', address = '$address',  
joining_date = '$doj', dob = '$dob', department_id = '$department', education_id = '$education', experience = '$experience', hobby_id = '$hobby' where id=".$dataId;


//('Krishna', 'krishnabhatt@44gmail.com', 'male', '54534', 'abcd test address', 'test/path', '2022-06-04', '1998-07-08', 'php', 'mca', '3', 'cricket')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: data-listing.php"); /* Redirect browser */
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>