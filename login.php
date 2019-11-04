<?php
    session_start();
    include_once 'config/User.php';
    $userObj = new User();
    $invalid_credentials = FALSE;
    if(isset($_POST['btn_login'])){
        try{
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $userObj->runQuery($sql);
            $stmt->bindParam(":username", $username);
            $username = trim($_POST['username']);
            $stmt->execute();
           if($stmt->rowCount() > 0){
                #A Record Found
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $param_password = $_POST['password'];
                $db_password = $row['password'];
                if(password_verify($param_password, $db_password)){
                    #If passwords matches
                    $_SESSION['username'] = $_POST['username'];
                    $userObj->redirect("welcome.php");
                }else{
                    #Else Password is wrong.
                    $invalid_credentials = TRUE;
                }

                
           }else{
               #No Record Found
               $invalid_credentials = TRUE;
           }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Login Page</title>
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
            width: 35%;
            margin: 4em auto auto auto;
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
    <a href="login.php" class="navbar-brand">LoginSystem</a>
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
        if(isset($_GET['inserted'])){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Inserted Successfully!</strong>   
                You Can Login Now
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
        if($invalid_credentials){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Wrong Credentials!</strong>   
                Record not found
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    ?>
	<form action="" method="POST" class="shadow-lg p-4">
		<h3 class="text-center mb-3">LOGIN HERE</h3>
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

		<input type="submit" name="btn_login" class="btn btn-primary btn-block mt-4 mb-4"	
		value="Login">
            <span>Don't have Account? </span><a href="index.php?Register">Register Here</a><br>
   	</form>
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>