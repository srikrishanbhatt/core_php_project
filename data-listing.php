
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
  <body>
  
  <!--<div id="delete-confirmation-modal" style="display:none;">
  <div>
     <h4>Are you sure to delete data ?</h4>
	 <button type="button" id="delete-confirmation-btn">yes</button>
	 <button type="button">No</button>
  </div>
  </div>
  -->
  
  <div>
	<button><a href="add.php">Add</a></button>
   </div>
   
	<input id="power-search" type="text" placeholder="power search">
	<select id="sort-by">
	 <option value="">Select Item For Sorting</option>
	 <option value="name">Name</option>
	 <option value="email_address">Email Address</option>
	 <option value="gender">Gender</option>
	 <option value="contact_no">Contact No</option>
	</select>
	
	<label>Order By</label>
	<select id="order-by">
	 <option value="asc" selected>Accending</option>
	 <option value="desc">Decending</option>
	</select>
<button id="click-btn" type="button">Search</button>


<?php

require "db-connection.php";


$sql = "select employee_info.*, department.name as departmentName, employee_info.name as name, employee_info.id as id  FROM employee_info left join department on employee_info.department_id = department.id ";
$result = $conn->query($sql);

 
 //while($dataArray[]= mysqli_fetch_array($result));
 
 //echo '<pre>'; print_r($dataArray); exit;
 

 if ($result->num_rows > 0) {
	 $tableHtml = '<div id="table-main-wrapper"><table> <thead><tr><td>Photo</td><td>Name</td><td>Email</td><td>DOB</td><td>Department</td><td>Edit</td><td>Delete</td></tr></thead><tbody>';
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo '<pre>'; print_r($row);
	$tableHtml .= '<tr><td><img src="'.$row['photo_path'].'" style="wdith:50px; height:50px;"></img></td><td>'.$row['name'].'</td><td>'.$row['email_address'].'</td><td>'.date('d-m-Y',strtotime($row["dob"])).'</td><td>'.$row['departmentName'].'</td><td><a href="edit-data.php?id='.$row['id'].'">Edit</a></td><td><a href="delete-data.php?id='.$row['id'].'">Delete</a></td> </tr>';
  }
  $tableHtml .= '</tbody></table></div>' ;
  
  echo $tableHtml;
}

?>
	
	
  </body>
  <script>
 
  
  $('#click-btn').click(function(){
     console.log('workingGGGGG');
   var searchValue = $('#power-search').val();
	var sortColumn = $('#sort-by').val();
	var orderBy = $('#order-by').val();
	
	//return false;
	$.ajax({
        url: "get-filterd-data.php",
        type: 'POST',
		 datatype: 'html',
		data: {'saerch_val': searchValue, 'sort_col': sortColumn, 'order_by': orderBy},
        success: function (data)
        {
//console.log(data);
$('#table-main-wrapper').html(data);
        },
        error: function (xhr, desc, err)
        {
            console.log("error");
        }
    });
	
	
	
	 
  });
  
  /**
  var recordId= '';
  
  $('.delete-record-btn').click(function(){
	  console.log('click working');
	  
	  recordId = $(this).data('id');
	  
	  $('#delete-confirmation-modal').show();
  });
  
  $('#delete-confirmation-modal #delete-confirmation-btn').click(function(){
	  console.log(parseInt(recordId));
	  
	  
	  $.ajax({
        url: "delete-data.php",
        type: 'POST',
		 datatype: 'html',
		data: {'id': recordId},
        success: function (data)
        {
console.log(data);
$('#table-main-wrapper').html(data);
        },
        error: function (xhr, desc, err)
        {
            console.log("error");
        }
    });
	  
	  
	  
  });
  
  **/
  

</script>
</html>
