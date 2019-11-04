<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>REGISTER</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		*{
			font-family: 'roboto light';
		}
		.ico{
			outline: none !important;
		}
		.fixed-top{
            background: #140b0b !important;
        }
		 .outer-div{
            width: 40%;
            margin: 2em auto auto auto;
        }

		@media(max-width: 800px){
			.outer-div{
				width: 85% !important;
			}
			.outer-div form{
				margin-top: 2.2em;
			}
 		}
	</style>
</head>
<body>
<div class="container-fluid">
	<!-- Start Nagigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <a href="index.php" class="navbar-brand">LoginSystem</a>
    <button type="button" class="navbar-toggler ico" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-3 custom-nav">
        <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About us</a></li>
      </ul>
    </div>
  </nav> <!-- End Navigation -->
</div>

<section class="container">
<div class="pt-5 outer-div">
	<!-- Register Form -->
	<?php
		if(isset($_GET['un'])){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Unavailable Username!</strong>   
                pls Choose another one.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
	?>
	<form action="register.php" method="POST" class="shadow-lg p-4 mt-md-5">
		<h3 class="text-center mb-3">REGISTER HERE</h3>
		<div class="form-group">
			<i class="fas fa-user"></i>
			<label  class="pl-2 font-weight-bold" for="username">Username: </label>
			<input type="text" id="username" name="username" class="form-control"
			placeholder="Username" required>  
		</div>

		<div class="form-group">
			<i class="fas fa-lock"></i>
			<label  class="pl-2 font-weight-bold" for="password">Password: </label>
			<input type="password" id="password" name="password" class="form-control" 
			placeholder="Password" autocomplete='off' required>  
		</div>

		<div class="form-group">
			<i class="fas fa-lock"></i>
			<label  class="pl-2 font-weight-bold" for="cpassword">Confirm Password: </label>
			<input type="password" id="cpassword" name="cpassword" class="form-control"
			placeholder="Confirm Password" autocomplete='off' required>  
		</div>

		<input type="submit" name="btn-save" class="btn btn-primary mt-4 btn-block mb-3"	
		value="Register">
		<span class="mt-3">
			<span>Already a user? </span><a href="login.php"> Sign in</a><br>
		</span>
		<small style="font-size: .7em">Note: By Clicking you agree to our Terms,
		Data Policy, Cookie Policy</small>
	</form>
</div>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>