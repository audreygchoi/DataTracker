<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">

    <title>Audrey Grace Choi</title>
    <link rel="stylesheet" href="stylesheets/main.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=actor">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

    <script>
  $(function() {
    $( "#date" ).datepicker();
  });
</script>

    <script>
$(document).ready(function() {
  $("#submit").click(function() {
      
      $.ajax({
          url: 'insert.php',
          data: {name: $( "#name" ).val(), date: $("#date").val(), amount: $("#amount").val()},
          success: function(data){
              $('#dataresults').html(data);  
              $.ajax({
              url: 'getUsers.php',
              data: {},
              success: function(data){
                  $('#usertable').html(data);   
              }
     		 });  
          }
      });
  });
});
</script>

    <script>
 
 $(document).ready(function() {          
          $.ajax({
              url: 'getUsers.php',
              data: {},
              success: function(data){
                  $('#usertable').html(data);   
              }
          });
  });
</script>

    <script>
$(document).ready(function() {
  $("#submitcell").click(function() {
      
      $.ajax({
          url: 'updateUsers.php',
          data: {name: $("#cellname").val(), cellno: $("#cellno").val(), celltype: $("#celltype").val()},
          success: function(data){
              $('#cellresults').html(data);  
              $.ajax({
              url: 'getUsers.php',
              data: {},
              success: function(data){
                  $('#usertable').html(data);   
              }
     		 }); 
          }
      });
      
  });
});
</script>

</head>

<body>
<div id="header">
<h1> AUDREY GRACE CHOI</h1>
<br />
<h2> A Computer Science Student</h2>
</div>
<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="aboutme.html">About Me</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="aboutsite.html">The Site</a></li>
        <li><a href="datatracker.php">DataTrack</a></li>
        <li><a href="http://agc3szguestbook.appspot.com/?guestbook_name=default_guestbook">Guestbook</a></li>

    </ul>
</nav>
<div id="container">
    <div id="content">

        <h3>Data Tracker</h3>

        <h4> Add Data Usage </h4>

        <div class="smart-green">
            <h1> Add Data Usage </h1>

            <label for="name">Name</label>
            <select id="name" name="name">

                <?php
			$con=mysqli_connect("stardock.cs.virginia.edu","cs4720agc3sz","fall2014","cs4720agc3sz");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM users");

			while($row = mysqli_fetch_array($result)) {
			  $name = $row['first_name'] . " " . $row['last_name'];
			  echo "<option> $name </option>";
                }

                mysqli_close($con);
                ?>
            </select>
            <br />
            <label for="date">Date</label>
            <input type="text" id="date" >
            <br />
            <label for="amount">Amount of Data Used</label>
            <input type="text" id="amount">
            <br />
            <button type="button" class="btn btn-default" id="submit">Submit</button>
            <div id="dataresults"></div>
        </div>




        <h4> User Information </h4>
        <div id="usertable"></div>
        <h4> Update User Cellphone Information </h4>

        <div class="smart-green">
            <h1> Update User Cellphone Information </h1>

            <label for="cellname">Name</label>
            <select id="cellname" name="cellname">

                <?php
			$con=mysqli_connect("stardock.cs.virginia.edu","cs4720agc3sz","fall2014","cs4720agc3sz");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM users");

			while($row = mysqli_fetch_array($result)) {
			  $name = $row['first_name'] . " " . $row['last_name'];
			  echo "<option> $name </option>";
                }

                mysqli_close($con);
                ?>
            </select>
            <br />
            <label for="cellno">Cellphone Number</label>
            <input type="text" id="cellno" >
            <br />
            <label for="celltype">Cellphone Type</label>
            <input type="text" id="celltype">
            <br />

            <button type="button" class="btn btn-default" id="submitcell">Submit</button>
            <div id="cellresults"></div>

        </div>



    </div>
    <div id="sidebar">
        <aside>
            <a href = "#"><img src="images/profile_photo.jpg" alt="Audrey Choi" class ="centered"></a>
            <br />
            <h3> Audrey Grace Choi</h3>
            <p> Attending University of Virginia, Majoring in CS, Loves Food and Travel
            </p>
            <h3> Contact </h3>
            <p> agc3sz@virginia.edu </p>

        </aside>

    </div>
</div>
</body>
</html>