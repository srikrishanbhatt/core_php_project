<?php

require "db-connection.php";

$dataId = $_GET['id'];
//echo $dataId; 
//exit;

$filepathquery = "select photo_path from employee_info where id=".$dataId;

$result = $conn->query($filepathquery);

$data = $result->fetch_assoc();

//echo '<pre>'; print_r($data); exit;

if(file_exists($data['photo_path']) && $data['photo_path'] != 'images/defualt_student_img.png'){
	unlink($data['photo_path']);
}


$sql = "delete from employee_info where id=".$dataId;


if ($conn->query($sql) === TRUE) {
  header("Location: data-listing.php"); /* Redirect browser */
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>