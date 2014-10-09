<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">

<title>Audrey Grace Choi</title>
</head>
<body>

<?php

$con=mysqli_connect("stardock.cs.virginia.edu","cs4720agc3sz","fall2014","cs4720agc3sz");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"
SELECT users.first_name as First_Name, users.last_name as Last_Name, cellphones.cell_no as Cellphone_Number, cellphones.cell_type as Cellphone_Type, user_month.Month_Total as Month_Total, SUM(data_used.amount_used) as Total
	FROM users LEFT JOIN cellphones
	ON (users.user_id =cellphones.user_id)
	LEFT JOIN data_used
	ON(cellphones.cell_id = data_used.cell_id) LEFT JOIN
	(SELECT data_used.user_id as user_id, SUM(data_used.amount_used) as Month_Total
	 FROM data_used
	 WHERE MONTH(date_used) = MONTH(NOW())
	 GROUP BY user_id
) as user_month
	ON (user_month.user_id = users.user_id)
	GROUP BY users.user_id
	");

echo "<table>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Cellphone Number</th>
<th>Cellphone Type</th>
<th>Month Total</th>
<th>Total</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['First_Name'] . "</td>";
  echo "<td>" . $row['Last_Name'] . "</td>";
  echo "<td>" . $row['Cellphone_Number'] . "</td>";
  echo "<td>" . $row['Cellphone_Type'] . "</td>";
  echo "<td>" . $row['Month_Total'] . "</td>";
  echo "<td>" . $row['Total'] . "</td>";
  echo "</tr>";
}

echo "</table>";
mysqli_close($con);

?>
<!--


	SELECT users.first_name as First_Name, users.last_name as Last_Name, cellphones.cell_no as Cellphone_Number, cellphones.cell_type as Cellphone_Type, SUM(data_used.amount_used) as Month_Total, SUM(amount_used) as Total 
	FROM users LEFT JOIN cellphones LEFT JOIN data_used
	ON users.user_id =cellphones.user_id
	AND cellphones.cell_id = data_used.cell_id
echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "</tr>";
}

echo "</table>";-->
</body>
</html>