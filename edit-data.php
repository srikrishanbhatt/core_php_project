<?php

require "db-connection.php";
 //echo 'check now';
 $id = $_GET['id'];
 
$sql = "select * FROM employee_info where id=".$id;
$result = $conn->query($sql);

$row = $result->fetch_assoc();

//echo '<pre>'; print_r($row); exit;
 
?>

<html>
<style>
button{margin-top:15px;}
input, select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;

}
</style>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>

<body>
<div>
<button><a href="add.php">Add</a></button>
<button><a href="data-listing.php">listing</a></button>
</div>

<form method="post" action="update-details.php" enctype="multipart/form-data"> 

<h4>Student Form</h4>
<div class="col-md-12">
<div class="col-md-6">
<div class"margin-from-top">
<input type="hidden" value="<?= isset($row['id']) ? $row['id'] : '' ?>" name="dataId">
<input type="text" name="name" placeholder="enter name" value="<?= isset($row['name']) ? $row['name'] : '' ?>">
</div>

<div class"margin-from-top">
<input type="text" name="email" placeholder="enter email" value="<?= isset($row['email_address']) ? $row['email_address'] : '' ?>">
</div>

<div class"margin-from-top">
<select name="gender">
<option value="">Select gender<option>
<option value="male" <?= isset($row['gender']) && $row['gender'] == 'male' ? 'selected' : '' ?>>Male<option>
<option value="female" <?= isset($row['gender']) && $row['gender'] == 'female' ? 'selected' : '' ?>>Female<option>
<option value="other" <?= isset($row['gender']) && $row['gender'] == 'other' ? 'selected' : '' ?>>Other<option>
</select>
</div>

<div class"margin-from-top">
<input type="text" name="contact" placeholder="enter contact number" value="<?= isset($row['contact_no']) ? $row['contact_no'] : '' ?>">
</div>

<div class"margin-from-top">
<input type="text" name="address" placeholder="enter address" value="<?= isset($row['address']) ? $row['address'] : '' ?>">
</div>

<div class"margin-from-top">
<img height="50px" width="50px" src="<?= isset($row["photo_path"]) ? $row["photo_path"] : '' ?>"></img>
<input type="file" name="photo" placeholder="choose photo" value="<?php echo $row["photo_path"] ?>">
</div>

</div>


<div class="col-md-6">
<div class"margin-from-top">
<input type="date" name="doj" placeholder="" value="<?php echo date('Y-m-d',strtotime($row["joining_date"])) ?>">
</div>

<div class"margin-from-top">
<input type="date" name="dob" placeholder="" value="<?php echo date('Y-m-d',strtotime($row["dob"])) ?>">
</div>



<?php
$sql = "select * FROM department";
$result2 = $conn->query($sql);

 if ($result2->num_rows > 0) { ?>
	 <div class"margin-from-top">
	  <select name="department">
	   <option value="">Select Department</option>
  <?php while($rowRecords = $result2->fetch_assoc()) { ?>
	   <option <?= (isset($row['department_id']) && $row['department_id'] == $rowRecords['id']) ? 'selected' : '' ?> value="<?= $rowRecords['id'] ?>"><?= $rowRecords['name'] ?></option>
  <?php } ?>
      </select>
	 </div>
 <?php } ?>
 
 
 
 <?php
$sql = "select * FROM education";
$result3 = $conn->query($sql);

 if ($result3->num_rows > 0) { ?>
	 <div class"margin-from-top">
	  <select name="education">
	   <option value="">Select Education</option>
  <?php while($rowRecords = $result3->fetch_assoc()) { ?>
	   <option <?= isset($row['education_id']) && $row['education_id'] == $rowRecords['id'] ? 'selected' : '' ?> value="<?= $rowRecords['id'] ?>"><?= $rowRecords['course'] ?></option>
  <?php } ?>
      </select>
	 </div>
 <?php } ?>



<div class"margin-from-top">
<input type="text" name="experience" placeholder="enter experience" value="<?= isset($row['experience']) ? $row['experience'] : '' ?>">
</div>


<?php
$sql = "select * FROM hobby";
$result4 = $conn->query($sql);

 if ($result4->num_rows > 0) { ?>
	 <div class"margin-from-top">
	  <select name="hobby">
	   <option value="">Select Hobby</option>
  <?php while($rowRecords = $result4->fetch_assoc()) { ?>
	   <option <?= isset($row['hobby_id']) && $row['hobby_id'] == $rowRecords['id'] ? 'selected' : '' ?> value="<?= $rowRecords['id'] ?>"><?= $rowRecords['name'] ?></option>
  <?php } ?>
      </select>
	 </div>
 <?php } ?>



</div>
</div>

<button class"submit-btn">Submit</button>

</body>
<script>
//var newDate='07/04/2016';

//$("dob-field").datepicker('setDate', newDate);
</script>
</form>
</html>