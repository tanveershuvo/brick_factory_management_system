<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>ADD SEASON</title>
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
		<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
		<!-- Sweet Alert Css -->
		<!-- Custom Css -->
		<link href="css/style.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<script>
			
			
			$( function() {
				var dateFormat = "mm/dd/yy",
				from = $( "#from" )
				.datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					numberOfMonths: 1
				})
				.on( "change", function() {
					to.datepicker( "option", "minDate", getDate( this ) );
				}),
				to = $( "#to" ).datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					numberOfMonths: 1
				})
				.on( "change", function() {
					from.datepicker( "option", "maxDate", getDate( this ) );
				});
				
				function getDate( element ) {
					var date;
					try {
						date = $.datepicker.parseDate( dateFormat, element.value );
						} catch( error ) {
						date = null;
					}
					
					return date;
				}
			} );
		</script>
		
	</head>
	<!-- Large Size -->
	<?php 
		session_start();
		include_once 'dbCon.php';
		$conn= connect();			
		if (isset($_POST['add'])){
			$name = $_POST['name'];
			$start = $_POST['from'];
			$end = $_POST['to'];
			$budget = $_POST['budget'];
			$comID = $_SESSION['com_id'];
			$sql= "SELECT MAX(sea_end_time) as mx from season";
			
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				foreach($result as $row){
					$id = $row['mx'];
					$dr = date('d/m/Y');
					if ($id < $dr){
						$sql= "INSERT INTO season (sea_name,com_id,sea_start_time,sea_end_time,sea_budget) VALUES ('$name','$comID','$start','$end','$budget')";
						
						$conn->query($sql);	
						header('location:season_details.php');
					}
					
					else
					{
						echo '<script>alert("Current season ends at '."$id".' . Select following date to create new season");</script>';	
					}
				}
				
			}
			
			
		}
		if (isset($_GET['id'])){
			
			$id = $_GET['id'];
			$sql = "Select * from season where sea_id='$id'";
			$result = $conn->query($sql);
			foreach($result as $row){
				$name = $row['sea_name'];
				$start = $row['sea_start_time'];
				$end = $row['sea_end_time'];
				$budget = $row['sea_budget'];
				
			}
			
			
		}
		
		if (isset($_POST['edit'])){
			$sid = $_GET['id'];
			$name = $_POST['name'];
			$start = $_POST['from'];
			$end = $_POST['to'];
			$budget = $_POST['budget'];
			$comID = $_SESSION['com_id'];
			
			$sql= "Update season SET sea_name='$name',com_id='$comID',sea_start_time='$start',sea_end_time='$end',sea_budget='$budget' Where sea_id='$sid' ";
			//echo $sql;exit;
			$conn->query($sql);	
			header('location:season_details.php');
		}
		
		
		
		
		
		
		
		
		
	?>
	<body class="login-page">
		<div class="login-box">
			<div class="card">
				<div class="body">
					<div class="msg"><b>ADD/EDIT SEASON DETAILS</b></div><hr>
					<form  method="POST" >
						
						<div class="row clearfix">
							<div class="col-lg-6 col-md-4 col-sm-8 col-xs-8 ">
								<label for="password_2">Season Name:</label>
							</div>
							<div class="col-lg-6 col-md-8 ">
								<div class="form-group">
									<div class="form-line">
										<input type="text" name="name"  id="name" class="form-control" value="<?php if (isset($name)){ echo $name; }?>" placeholder="Enter Season Name" >
										
									</div>
									
								</div>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-lg-6 col-md-4 col-sm-8 col-xs-8 ">
								<label for="password_2">Season Start Date:</label>
							</div>
							<div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" name="from"  id="from" value="<?php if (isset($start)){ echo $start; }?>" class="form-control"  >
									</div>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
							<div class="col-lg-6 col-md-4 col-sm-8 col-xs-8 ">
								<label for="password_2">Season End Date:</label>
							</div>
							<div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" name="to"  id="to" value="<?php if (isset($end)){ echo $end; }?>" class="form-control"  >
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-lg-6 col-md-4 col-sm-8 col-xs-8 ">
							<label for="password_2">Season Budget :</label>
							</div>
							<div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" name="budget"  id="pro_name" class="form-control" value="<?php if (isset($budget)){ echo $budget; }?>" placeholder="Enter Season Budget" >
									</div>
								</div>
							</div>
						</div>
						
						<?php if (!isset($_GET['id'])){ ?> 
							<button class="btn btn-block btn-lg bg-pink waves-effect"   type="submit" name="add">ADD SEASON</button>
							<?php } else { ?>
							<button class="btn btn-block btn-lg bg-pink waves-effect"   type="submit" name="edit">EDIT SEASON</button>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
		
		<script src="plugins/sweetalert/sweetalert.min.js"></script>
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