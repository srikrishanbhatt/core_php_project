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

<body>
<form method="post" action="add-details.php" enctype="multipart/form-data">
<?php
require "db-connection.php";
?>

<h4>Student Form</h4>
<div class="col-md-12">
<div class="col-md-6">
<div class"margin-from-top">
<input type="text" name="name" placeholder="enter name">
</div>

<div class"margin-from-top">
<input type="text" name="email" placeholder="enter email">
</div>

<div class"margin-from-top">
<select name="gender">
<option value="">Select gender<option>
<option value="male">Male<option>
<option value="female">Female<option>
<option value="other">Other<option>
</select>
</div>

<div class"margin-from-top">
<input type="text" name="contact" placeholder="enter contact number">
</div>

<div class"margin-from-top">
<input type="text" name="address" placeholder="enter address">
</div>

<div class"margin-from-top">
<input type="file" name="photo" placeholder="choose photo">
</div>

</div>


<div class="col-md-6">
<div class"margin-from-top">
<input type="date" name="doj" placeholder="">
</div>

<div class"margin-from-top">
<input type="date" name="dob" placeholder="">
</div>



<?php
$sql = "select * FROM department";
$result = $conn->query($sql);

 if ($result->num_rows > 0) { ?>
	 <div class"margin-from-top">
	  <select name="department">
	   <option value="">Select Department</option>
  <?php while($row = $result->fetch_assoc()) { ?>
	   <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
  <?php } ?>
      </select>
	 </div>
 <?php } ?>
 
 
 
 <?php
$sql = "select * FROM education";
$result = $conn->query($sql);

 if ($result->num_rows > 0) { ?>
	 <div class"margin-from-top">
	  <select name="education">
	   <option value="">Select Education</option>
  <?php while($row = $result->fetch_assoc()) { ?>
	   <option value="<?= $row['id'] ?>"><?= $row['course'] ?></option>
  <?php } ?>
      </select>
	 </div>
 <?php } ?>



<div class"margin-from-top">
<input type="text" name="experience" placeholder="enter experience">
</div>


<?php
$sql = "select * FROM hobby";
$result = $conn->query($sql);

 if ($result->num_rows > 0) { ?>
	 <div class"margin-from-top">
	  <select name="hobby">
	   <option value="">Select Hobby</option>
  <?php while($row = $result->fetch_assoc()) { ?>
	   <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
  <?php } ?>
      </select>
	 </div>
 <?php } ?>



</div>
</div>

<button class"submit-btn">Submit</button>

</body>
</form>
</html>