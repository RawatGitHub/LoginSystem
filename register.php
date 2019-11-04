<?php 
	include_once 'config/User.php';
	$userObj = new User();
	$username_err = $password_err = $cpassword_err = "";
	if(isset($_POST['btn-save'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
		$cpassword = trim($_POST['cpassword']);
		/**************** SOME SECURITY CHECKS *****************/
		if(strlen($password) < 8) {
			$password_err = "Password Should be greater than 8 Characters";
			echo "<script>
				alert('password should be greater than 8 chars');
			</script>";		
			echo "<script>window.location='http://localhost/loginSystem'</script>";
	
		}
		if($password != $cpassword){
			$cpassword_err ="passowrd should match";
			echo "<script>
				alert('Password should match');
			</script>";
			echo "<script>window.location='http://localhost/loginSystem'</script>";

		}else{
			// Check all error variables whether there are some errors or not
		if(empty($username_err) && empty($password_err) && empty($cpassword_err)) {
			// if not any errors then go ahead and insert them into database;
			try {
				$sql = "SELECT * FROM users WHERE username = :username";
				$stmt = $userObj->runQuery($sql);
				if ($stmt) {
					$stmt->bindParam(":username", $username, PDO::PARAM_STR);
					$username = trim($_POST['username']);
					if($stmt->execute()){
						// Check if username is taken or not
						if($stmt->rowCount() > 0){
						// if username is taken
							echo "<script>alert('This username has been taken');</script>";
							echo "<script>window.location='http://localhost/loginSystem/index.php?un'</script>";
							
						}
						
						else{
							// else username is not taken
							$username  = trim($_POST['username']);
							$password  = trim($_POST['password']);
							$hashed_password = password_hash($password, PASSWORD_DEFAULT);
							if($userObj->insert($username, $hashed_password))
								echo "<script>alert('Inserted!');</script>";
								echo "<script>window.location='http://localhost/loginSystem/login.php?inserted'</script>";
							
						}


					}else{
						echo "did not executed";
					}
					
				}
				else{
					echo "something went wrong";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		}


        


	}else{
        //if user opens register.php without registering
        $userObj->redirect("index.php");
    }
 ?>