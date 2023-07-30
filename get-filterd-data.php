<?php

require "db-connection.php";
 //echo '<pre>'; print_r($_POST)
 $postData = $_POST;
 //echo json_encode($value);
 


$sql = "select employee_info.*, department.name as departmentName, employee_info.name as name, employee_info.id as id  FROM employee_info left join department on employee_info.department_id = department.id ";
$whereCondition = '1=1';
if(isset($postData['saerch_val']) && $postData['saerch_val'] != ''){
	$searchString = $postData['saerch_val'];
	//name, email_address, gender, contact_no, address, photo_path, joining_date, dob, department, education, experience, hobby
	$whereCondition = "(employee_info.name LIKE '%$searchString%'";
	$whereCondition .= " or email_address LIKE '%$searchString%'";
	$whereCondition .= " or contact_no LIKE '%$searchString%'";
	$whereCondition .= " or address LIKE '%$searchString%')";
}
$sql .= ' where '.$whereCondition;

if(isset($postData['sort_col']) && $postData['sort_col'] != ''){
	$col = $postData['sort_col'];
	$order = $postData['order_by'];

    $sql .= ' order by '.$col .' '.$order;	
	
}

//echo $sql; exit;
$result = $conn->query($sql);

 
 //while($dataArray[]= mysqli_fetch_array($result));
 
 //echo '<pre>'; print_r($dataArray); exit;
 

 if ($result->num_rows > 0) {
	 $tableHtml = '<table> <thead><tr><td>Photo</td><td>Name</td><td>Email</td><td>DOB</td><td>Department</td><td>Edit</td><td>Delete</td></tr></thead><tbody>';
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo '<pre>'; print_r($row);
	$tableHtml .= '<tr><td><img src="'.$row['photo_path'].'" style="wdith:50px; height:50px;"></img></td><td>'.$row['name'].'</td><td>'.$row['email_address'].'</td><td>'.date('d-m-Y',strtotime($row["dob"])).'</td><td>'.$row['departmentName'].'</td><td><a href="edit-data.php?id='.$row['id'].'">Edit</a></td><td><a href="delete-data.php?id='.$row['id'].'">Delete</a></td></tr>';
  }
  $tableHtml .= '</tbody></table>' ;
  
  echo $tableHtml;
}

?>