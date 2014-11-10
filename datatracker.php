<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Audrey Grace Choi</title>

    <!-- Referenced Sheets -->
    <link rel="stylesheet" href="stylesheets/main.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">


    <!-- Scripts -->

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script>
    $(document).ready(function () {
    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash,
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 500, 'swing', function () {
            window.location.hash = target;
            });
        });

    });
    </script>
    <script>
    $(window).scroll(function() {
        if ($(".navbar").offset().top > 20) {
            $(".custom").addClass("custom-light");
            $(this).after('<div id="details">Loading</div>');
        } else {
            $(".custom").removeClass("custom-light");
        }
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
<header>

<div class="container">
<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="glyphicon glyphicon-align-justify"></span>
</button>

<nav class = "custom navbar navbar-collapse collapse navbar-fixed-top" role="navigation" id="top-nav">
    <ul class="navbar-nav nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="index.html#theSite">The Site</a></li>
        <li><a href="datatracker.php">DataTracker</a></li>
        <li><a href="index.html#aboutMe">About Me</a></li>
        <li><a href="index.html#contact">Contact</a></li>
    </ul>
</nav>
</div>

</header>

<div id = "introDT">
    <div class="container">
        <h1> DataTracker</h1>
        <br />
        <h2> By Audrey Grace Choi</h2>
        <a href="#userInfo"><span class="glyphicon glyphicon-chevron-down"></span></a>
    </div>
</div>

<!--The Site-->


<section id="userInfo">
    <div class="content">
            <h3> User Information</h3>
        <div id="usertable"></div>
    </div>
</section>

<section id="addUsage">
    <div class="content-grey content">
           <h3> Add Data Usage</h3>
           <div class="addData">
            <label for="name">Name</label>
            <select id="name" name="name">
                <?php $con=mysqli_connect("stardock.cs.virginia.edu","cs4720agc3sz","fall2014","cs4720agc3sz");
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
            <input type="text" id="date" placeholder="MM/DD/YYYY" >
            <br />
            <label for="amount">Amount of Data Used</label>
            <input type="text" id="amount">
            <br />
            <div id="addDataButton">
            <button type="button" class="btn" id="submit">Submit</button>
          </div>
            <div id="dataresults"></div>
        </div>
    </div>
</section>

<section id="updateUser">
    <div class="content">
        <h3> Update User Information </h3>
            <div class="addData">
            <label for="cellname">Name</label>
            <select id="cellname" name="cellname">

                <?php $con=mysqli_connect("stardock.cs.virginia.edu","cs4720agc3sz","fall2014","cs4720agc3sz");
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
            <div id="updateUserButton">
            <button type="button" class="btn" id="submitcell">Submit</button>
            </div>
            <div id="cellresults"></div>

        </div>
    </div>
</section>

</body>
</html>