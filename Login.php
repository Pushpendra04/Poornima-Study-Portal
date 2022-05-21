<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="Sign.css">
    <link rel="stylesheet" type="text/css" href="Homepage.css">

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

    if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    $email_search = " select * from registration where email='$email' ";
    $query = mysqli_query($con,$email_search);
    
    $email_count = mysqli_num_rows($query);
    echo "$email_count";
    if($email_count>0){
       $email_pass = mysqli_fetch_assoc($query);
      echo "yes";
       $db_pass = $email_pass['Password'];

       $pass_decode = password_verify($password, $db_pass);

       if($pass_decode){
           echo "login successful";
           header("location:student.html");
        }else{
        echo "password incorrect";
        }
          }else{
            echo "Invalid Email";
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
      <li><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li class="active"><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>

</nav>
<br>

	<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<form action="" method="POST">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="email" type="email" name="email" class="input" placeholder="Email">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="password" type="password" name="password" class="input" data-type="password" placeholder="Password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" name="submit" class="button" value="Log In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot" style="color: black;">Forgot Password?</a>
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