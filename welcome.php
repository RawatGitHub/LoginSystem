<?php
    session_start();
    include_once 'config/User.php';
    $userObj = new User();
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        $userObj->redirect("login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WELCOME</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		*{
			font-family: 'roboto light';
		}
		.ico{
			outline: none !important;
		}
		.header nav{
            background: #140b0b !important;
        }
		 .outer-div{
            width: 40%;
            margin: 2.5em auto auto auto;
        }
      .log{
        padding-left: 45em !important;
      }
		@media(max-width: 800px){
			.outer-div{
				width: 85% !important;
			}
      .log{
        padding-left: 0em !important;
      }
			.outer-div form{
				margin-top: 2.2em;
			}
 		}
	</style>
</head>
<body>
<div class="header">
	<!-- Start Nagigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a href="welcome.php" class="navbar-brand">LoginSystem</a>
    <button type="button" class="navbar-toggler ico" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-3 custom-nav">
        <li class="nav-item"><a href="#" class="nav-link text-white">
          Welcome <?php echo $username; ?></a></li>
        <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About us</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link log">Logout</a></li>
        
      </ul>
    </div>
  </nav> <!-- End Navigation -->
</div>
<div class="container mt-3">
    <h3 class="text-success">CONGRATULATIONS, for first time logging in.</h3>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>