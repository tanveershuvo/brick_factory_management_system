<?php session_start();?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>Company | BFMS </title>
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

		<!-- Custom Css -->
		<link href="css/style.css" rel="stylesheet">
		<script>

			function datasession(cid,cn,img){
				$.ajax({
					type:'POST',
					url:"ajax_retrieve.php",
					data:{c_ID:cid,com_name:cn,image:img},
					dataType:"json",
					success : function(response){
					}

				});
				window.location.href="dashboard";
			}

		</script>
	</head>

	<body class="signup-page">
		<div class="signup-box">

			<div class="card">
				<div class="body">
					<div class="msg"><b>WELCOME</b> <br></br><b class="text-success"> <?php echo $_SESSION['NAME'];?></b></div>
					<div class="msg"><strong>SELECT COMPANY NAME TO PROCEED </strong></div><br>
					<?php
						include_once 'dbCon.php';
						$conn= connect();
						$sql="select * from company";
						$resultdata=$conn->query($sql);
						foreach($resultdata as $view){
						?>
						<a onclick="datasession(<?=$view['com_id']?>,'<?=$view['company_name']?>','<?=$view['image']?>')" class="btn btn-block btn-lg bg-pink waves-effect" type="submit"><?=$view['company_name']?></a><br><br><br>

					<?php } ?>
				</div>
			</div>
		</div>

		<!-- Jquery Core Js -->
		<script src="plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core Js -->
		<script src="plugins/bootstrap/js/bootstrap.js"></script>
		<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

		<!-- Waves Effect Plugin Js -->
		<script src="plugins/node-waves/waves.js"></script>
		<script src="js/pages/forms/basic-form-elements.js"></script>

		<!-- Validation Plugin Js -->
		<script src="plugins/jquery-validation/jquery.validate.js"></script>

		<!-- Custom Js -->
		<script src="js/admin.js"></script>
		<script src="js/pages/examples/sign-up.js"></script>
	</body>

</html>
