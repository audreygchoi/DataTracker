<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">

<title>Audrey Grace Choi</title>
</head>
<body>
<?php
$name = $_GET['name'];
$cellno = $_GET['cellno'];
$celltype = $_GET['celltype'];

$con=mysqli_connect("stardock.cs.virginia.edu","cs4720agc3sz","fall2014","cs4720agc3sz");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$getUserID = mysqli_query($con,"SELECT user_id, concat(first_name,' ',last_name) as name FROM users WHERE concat(first_name,' ',last_name) = '$name'");

while($userid_row = mysqli_fetch_array($getUserID)) {
  $user_id = $userid_row['user_id'];
}
 

$getCellID = mysqli_query($con,"SELECT cell_id FROM cellphones WHERE user_id = '$user_id'");

while($cellid_row = mysqli_fetch_array($getCellID)) {
  $cell_id = $cellid_row['cell_id'];
}

$sql="UPDATE cellphones
SET cell_no = '$cellno', cell_type = '$celltype'
WHERE cell_id = '$cell_id'";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "<br />1 record updated <br />";


mysqli_close($con);

?>
</body>
</html>