<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="Homepage.css">
	<link rel="stylesheet" type="text/css" href="Sign.css">


	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$profession = mysqli_real_escape_string($con, $_POST['profession']);


    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = " select * from registration where email='$email' ";
    $query = mysqli_query($con,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
    	echo "email already exists";
    }else{
    	if ($password === $cpassword) {

    		$insertquery = "insert into registration(Username, Password, Confirm_Password, Email, Profession) values('$username','$pass','$cpass','$email','$profession')";

    		$iquery = mysqli_query($con, $insertquery);

    		if($iquery){
	              ?>
                       <script>
       	                   alert("Inserted Successful");
                       </script>

	                <?php
                  }else{

	                 ?>
                         <script>
                           	alert("No Inserted");
                         </script>

	                  <?php
                  }

    		
    	}else{
    		?>
                    <script>
                           	alert("Password are not matching");
                         </script>

	                  <?php
    	}
    }


}


?>

<nav class="navbar navbar-inverse navbar-fixed-top">

  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Start.html"><img id="Logo" src="Logo.jpg" alt="Poornima"></a>
    </div>
    <ul class="nav navbar-nav" style="margin-left: 60px; font-size: 18px;">
      <li><a href="Home.html">HOME</a></li>
      <li><a href="Home.html#About">ABOUT</a></li>
      <li><a href="Home.html#Contact Us">CONTACT US</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" style="font-size: 18px;">
      <li class="active"><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>

</nav>
<br>

	<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">				
			</div>
			<form action="" method="POST">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="username" class="input" placeholder="Username" required="">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="password" class="input" data-type="password" placeholder="Password" required="">
				</div>
				<div class="group">
					<label for="pass" class="label">Confirm Password</label>
					<input id="pass" type="password" name="cpassword" class="input" data-type="password" placeholder="Confirm Password" required="">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="email" name="email"  class="input" placeholder="Email Address" required="">
				</div>
				<div class="group">
					<label for="pass" class="label">Select</label>
				</div>
				<div class="dropdown" >
					<select id="Select" name="profession">
					<option value="Select">Select</option>
					 <option value="Student">Student</option>
                     <option value="Teacher">Teacher</option>
                    </select>
				</div><br><br>
				<div class="group">
					<input type="submit" name="submit" class="button" value="Sign Up">
				</div>
			</div>
			</form>
		</div>
	</div>
</div> 
<br>
<br>        

</body>
</html>