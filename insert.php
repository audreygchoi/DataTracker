<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">

<title>Audrey Grace Choi</title>
</head>
<body>

<?php
$name = $_GET['name'];
$date = $_GET['date'];
$amount = $_GET['amount'];

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

$getDate = mysqli_query($con, "SELECT STR_TO_DATE('$date','%m/%d/%Y') as date") ;
while($getDate_row = mysqli_fetch_array($getDate)) {
  $formatted_date = $getDate_row['date'];
}

$sql="INSERT INTO data_used(cell_id, user_id, date_used, amount_used)
VALUES ('$cell_id', '$user_id', '$formatted_date', '$amount')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "<br />1 record added <br />";

$getAmount = mysqli_query($con,"SELECT SUM(amount_used) as total FROM data_used WHERE user_id = '$user_id'");
while($amount_row = mysqli_fetch_array($getAmount)) {
  $total_amount = $amount_row['total'];
}

echo "You have used a total of $total_amount GB in data <br />";

$getMonthAmount = mysqli_query($con,"SELECT SUM(amount_used) as month_total FROM data_used WHERE user_id = '$user_id' and MONTH(date_used) = MONTH(NOW())");
while($monthamount_row = mysqli_fetch_array($getMonthAmount)) {
  $month_amount = $monthamount_row['month_total'];
}

echo "You have used a total of $month_amount GB in data this month";


mysqli_close($con);

?>
</body>
</html>