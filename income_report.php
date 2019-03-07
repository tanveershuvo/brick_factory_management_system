<?php include "template/miniheader.php";
	unset ($_SESSION['nav']);
	$_SESSION['nav'] = 10 ;
	
?>
<?php include "signin_checker.php"; ?>
<title><?php if (isset($_SESSION['com_name'])){echo $_SESSION['com_name'];};?> | HOME</title>
<!-- Bootstrap Core Css -->
<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />
<!-- Multi Select Css -->
<link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

<!-- Bootstrap Spinner Css -->
<link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

<!-- Bootstrap Tagsinput Css -->
<link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

<!-- Bootstrap Select Css -->
<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


	<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Season','Total Income'],
				<?php
					include_once 'dbCon.php';
					$conn= connect();
					$com=$_SESSION['com_id'];
					$sql1="SELECT `sea_name`,SUM(`paid`) FROM `order_details` as o , `season` as s, company as c 
					WHERE o.sea_id=s.sea_id AND c.com_id=s.com_id And c.com_id = '$com' GROUP BY o.sea_id";
					$results = $conn->query($sql1);
					while($row=mysqli_fetch_array($results))
					{
						echo "['".$row["sea_name"]."',".$row["SUM(`paid`)"]."],";
					}
				?>
				]);

        var options = {
          title: 'Income report',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Total Income from Each Season' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'BDT TAKA'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('piechart'));
        chart.draw(data, options);
      };
    </script>
	
    </script>
		
	
</head>
<?php include "template/mininavbar.php" ?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>INCOME REPORT</h2>
		</div>
		
		<!-- Basic Alerts -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div  id ="piechart" style="width: 900px; height: 500px;">
					</div>
				</div>
			</div>

		</div>
		
		
		
		
		
	</div>
</div>

</section>

<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Jquery Validation Plugin Css -->
<script src="plugins/jquery-validation/jquery.validate.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="plugins/jquery-steps/jquery.steps.js"></script>

<!-- Sweet Alert Plugin Js -->
<script src="plugins/sweetalert/sweetalert.min.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/forms/form-wizard.js"></script>
<!-- Demo Js -->
<script src="js/demo.js"></script>
<!-- Multi Select Plugin Js -->
<script src="plugins/multi-select/js/jquery.multi-select.js"></script>
<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

</body>
</html>