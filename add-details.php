<?php

require "db-connection.php";

//echo 'comes here';
$postData = $_POST;

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
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
	
	
	
	if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo 'file uploaded';
  }else{
	  $target_file = 'images/defualt_student_img.png';
  }
	
	
  } else {
	  $target_file = 'images/defualt_student_img.png';
    echo "File is not an image.";
    $uploadOk = 0;
  }
  
  
}


$sql = "INSERT INTO employee_info (name, email_address, gender, contact_no, address, photo_path, 
joining_date, dob, department_id, education_id, experience, hobby_id) VALUES ('$name', '$email', '$gender',
'$contact', '$address', '$target_file', '$doj', '$dob', '$department', '$education',
'$experience', '$hobby')";


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