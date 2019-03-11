<?php include "template/miniheader.php";
	
?>
<title><?php if (isset($_SESSION['com_name'])){echo $_SESSION['com_name'];};?> | SEASON DETAILS</title>
<!-- Bootstrap Core Css -->
<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="plugins/animate-css/animate.css" rel="stylesheet" />

<!--WaitMe Css-->
<link href="plugins/waitme/waitMe.css" rel="stylesheet" />
<!-- Sweet Alert Css -->
<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( function() {
		var dateFormat = "mm/dd/yy",
		start = $( "#start" )
        .datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3
		})
        .on( "change", function() {
			end.datepicker( "option", "minDate", getDate( this ) );
		}),
		end = $( "#end" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3
		})
		.on( "change", function() {
			start.datepicker( "option", "maxDate", getDate( this ) );
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
<script>
	function MyFn(){
        swal({ 
			title: "Season Added Success!",
			text: "",
			type: "success" 
			
		},
		function(){
			location = 'http://localhost/bfms/season_details';
		});
	}
	
	function datasession(sid,sname){
		$.ajax({
			type:'POST',
			url:"ajax_retrieve.php",
			data:{s_ID:sid,s_name:sname},
			dataType:"json",
			success : function(response){
			}
			
		});
		window.location.href="http://localhost/bfms/home";
	}
	
</script>
</head>

<body class="theme-deep-purple">
	
	<nav class="navbar ">
        <div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href=""><?php $cn=$_SESSION['com_name']; if (isset($cn)){echo $cn;}?></a>
			</div>
			<ul class="nav navbar-nav ">
				
				<li><a><?php if (isset($_SESSION['sea_name'])){ echo 'Season Name : '; echo $_SESSION['sea_name']; }?></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><span class="glyphicon glyphicon-user"></span>  <?=$_SESSION['NAME']?></a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>
	
	<section  style="width:95%;margin-top:100px;margin-left:2.5%;margin-right:1%;" >
        <div  class="content-fluid">
            <div class="block-header">
				<div class="row clearfix">
					<div class="col-lg-4">
						<h4>SEASON DETAILS</h4>
					</div>
					<div class="col-lg-8" >
						<a type="button" href="add_edit_season.php" style="float:right"
						class="btn btn-primary" > ADD NEW SEASON DETAILS</a>           
						
					</div>
				</div>
			</div>  
			
			<div class="row ">
				<?php 
					include_once 'dbCon.php';
					$conn= connect();
					$id = $_SESSION['com_id'];
					$sql = "SELECT * FROM season where com_id='$id' order by sea_start_time DESC";
					$resultData=$conn->query($sql);
					foreach ($resultData as $row){
						
					?>
					
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="card" style="border-right-style: solid;" >
							
							<div class="header bg-purple"  >
								<h2>
									Season Title : <?=$row['sea_name']?>
									<a  href="add_edit_season?id=<?=$row['sea_id']?>" class="btn btn-primary btn " style="float:right"><i class="material-icons">create</i></a>
								</h2>
							</div>
							<div class="body">
								<label >Start Time : <?=$row['sea_start_time']?></label>
								<hr>
								<label>End Time : <?=$row['sea_end_time']?></label>
								<hr>
								<label>Budget : <?=$row['sea_budget']?> TK</label>              
								<hr>
								
								<?php 
								$day = date('m/d/Y');
								$seaDay = $row['sea_end_time'];
								
								if ($day > $seaDay){ ?>
								<label style="color:red" >Status : CLOSED </label> 
								<?php
								} else {
								?>
								  <label style="color:green;" >Status : ACTIVE </label>  
								<?php } ?>
								 
								 
								 
								<hr>
								<div class="btn-toolbar">	
									<a onclick="datasession(<?=$row['sea_id']?>,'<?=$row['sea_name']?>')" style=  "border: 1px solid black;" class="btn btn-primary btn waves-effect  waves-float col-lg-12 col-sm-6"><i class="material-icons">pageview</i>&nbsp; VIEW</a>
									
								</div> 
								
							</div>
						</div>
						
					</div>
				<?php } ?>
			</div>
			
		</div>
	</section>
	
	
	
	
</div>



<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Wait Me Plugin Js -->
<script src="plugins/waitme/waitMe.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/cards/colored.js"></script>
<!-- Demo Js -->

<script type="text/javascript" src="js/jquery.number.js"></script>

<script src="js/demo.js"></script>
<!-- Sweet Alert Plugin Js -->
<script src="plugins/sweetalert/sweetalert.min.js"></script>

</html>
