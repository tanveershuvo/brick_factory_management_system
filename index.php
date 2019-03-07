<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>Sign In | BFMS </title>
		<!-- Favicon-->
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
		<!-- Bootstrap Core Css -->
		<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- Waves Effect Css -->
		<link href="plugins/node-waves/waves.css" rel="stylesheet" />
		<!-- Animation Css -->
		<link href="plugins/animate-css/animate.css" rel="stylesheet" />
		<!-- Sweet Alert Css -->
		<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
		<!-- Custom Css -->
		<link href="css/style.css" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

		<script>
			function myFN2(){
				swal({
			title: "Invalid Authentication",
			text: "Check email or password!!",
			type: "error",
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Retry!"
		});
			}
			</script>
	</head>
	<body class="login-page">
		<?php
            session_start();
            include_once 'dbCon.php';
            $conn = connect();
            if (isset($_POST['signin'])) {
                $mail 		= mysqli_real_escape_string($conn, $_POST['email']);
                $password 	= mysqli_real_escape_string($conn, md5($_POST['password']));
                $sql = "SELECT * FROM `login_details` WHERE `email`='$mail' AND `password`='$password'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $_SESSION['isLoggedIn'] = true;
                    foreach ($result as $row) {
                        if ($row['access_level']==0) {
                            $id = $row['log_id'];
                            $_SESSION['access']=$row['access_level'];
                            $sql = "select * from employee_details where emp_id='$id'";
                            $result=$conn->query($sql);
                            $result = mysqli_fetch_assoc($result);
                            $cID=$result['com_id'];
                            $_SESSION['NAME']=$result['emp_name'];
                            $sql = "select * from company where com_id='$cID'";
                            $results=$conn->query($sql);
                            $tf = mysqli_fetch_assoc($results);
                            $_SESSION['com_id']=$tf['com_id'];
                            $_SESSION['com_name']=$tf['company_name'];
                            $_SESSION['image']=$tf['image'];
                            header('location:season_details.php');
                        } elseif ($row['access_level']==2) {
                            $id = $row['log_id'];
                            $_SESSION['access']=$row['access_level'];
                            $sql = "select * from employee_details where emp_id='$id'";
                            $result=$conn->query($sql);
                            $result = mysqli_fetch_assoc($result);
                            $cID=$result['com_id'];
                            $_SESSION['NAME']=$result['emp_name'];
                            $sql = "select * from company where com_id='$cID'";
                            $results=$conn->query($sql);
                            $tf = mysqli_fetch_assoc($results);
                            $_SESSION['com_id']=$tf['com_id'];
                            $_SESSION['com_name']=$tf['company_name'];
                            header('location:dashboard.php');
                        } else {
                            $_SESSION['NAME']=$row['email'];
                            $_SESSION['access']=$row['access_level'];
                            header('location:company.php');
                        }
                    }
                } else {
                    $ssql = "SELECT * FROM `login_details` WHERE `email`='$mail' AND `OTP`='$password'";
                    $results = $conn->query($ssql);
                    if ($results->num_rows > 0) {
                        $_SESSION['isLoggedIn'] = true;
                        foreach ($results as $row) {
                            $_SESSION['email']=$row['email'];
                            header('location:new_password.php');
                        }
                    }
                }
                echo "<script>myFN2();</script>";
            }
        ?>

		<div class="login-box">
			<div class="logo">
				<a href="javascript:void(0);">Brick Ftory Management System</a>
			</div>
			<div class="card">
				<div class="body">
					<form  method="POST" onsubmit = "return myFN();">

						<div class="msg"><b>Sign in to enter the site </b></div>
						<span id ="msgs" style="font-size:12px;color:red;font-weight:bold;"></span>

						<div class="form-group form-float">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="material-icons">person</i>
							</span>
							<div class="form-line">
								<input type="text" class="form-control" name="email" id="username"  placeholder="usermails"  >
							</div>
							<span id ="msg1" style="font-size:12px;color:red;font-weight:bold;"></span>
						</div>
					</div>

					<div class="form-group form-float">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="material-icons">lock</i>
							</span>
							<div class="form-line">
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" >
							</div>
							<span id ="msg2" style="font-size:12px;color:red;font-weight:bold;"></span>
						</div>
					</div>

						<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="signin">SIGN UP</button>
						<hr>
						<div class="col-xs-12 align-right">
							<a href="forgot_password.php">Forgot Password?</a>
						</div><br>
					</form>
				</div>
			</div>
		</div>

		<script>
			function myFN(){
				var email = document.getElementById('username').value;
				var password = document.getElementById('password').value;
				if (email==""){
					document.getElementById('msg1').innerHTML = "**Please Input User Mail";
					return false;
				}
				if (password==""){
					document.getElementById('msg2').innerHTML = "**Please Input password";
					return false;
				}
			}
		</script>


		<!-- Jquery Core Js -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap Core Js -->
		<script src="plugins/bootstrap/js/bootstrap.js"></script>
		<!-- Waves Effect Plugin Js -->
		<script src="plugins/node-waves/waves.js"></script>
		<!-- Validation Plugin Js -->
		<script src="plugins/jquery-validation/jquery.validate.js"></script>
		<!-- Custom Js -->
		<script src="js/admin.js"></script>
		<script src="js/pages/examples/sign-in.js"></script>
	</body>
</html>
