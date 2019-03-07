
<?php include "template/miniheader.php";
	unset ($_SESSION['nav']);
	$_SESSION['nav'] = 111 ;

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
  
	google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
	
	
  function ok(){
	   
	   $.ajax({
				type:'POST',
				url:"ajax_retrieve.php",
				data:{"product_details":1},
				dataType:"json",
				success : function(response){
				console.log(response)
				drawChart(response);
				}
			});
	   
	   
   }
    window.onload = ok;
			
		function drawChart(response) {
		dataArray = [];
		dataArray.push(["Product Name", 'Available amount', { role: "style" } ]);
	
		var color = 33;
		for(v in response){
			
			dataArray.push([response[v].pro_name, response[v].available,  "#b873"+color]);
			color +=100;
			
		}
      var data = google.visualization.arrayToDataTable(dataArray);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
		  title: "Product availability",
        width: 500,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  setInterval(drawChart , 5000);
  setInterval(ok , 5000);
  </script>

</head>


<?php

 include "template/mininavbar.php" ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">bookmark_border</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Order</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">42</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Employee</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">124</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Customer</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">222</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Sordar</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">123</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
			<!-- Counter Examples -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="customer_add">
					<div class="info-box">
                        <div class="icon bg-red">
                            <i class="material-icons">bookmark_border</i>
                        </div>
                        <div class="content">
                            <div class="text">Order Details</div>
                            
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <a href="employee_add">
					<div class="info-box">
                        <div class="icon bg-indigo">
                            <i class="material-icons">person_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">Employee Details</div>
                            
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="customer_add">
						<div class="info-box">
                        <div class="icon bg-purple">
                            <i class="material-icons">people_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">Customer Details</div>
                            
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="sordar_add">
						<div class="info-box">
                        <div class="icon bg-deep-purple">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">Sorder Details</div>
                           
                        </div>
                    </div>
					</a>
                </div>
            </div>
            <!-- #END# Counter Examples -->		
			
			  <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-teal">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Salary Information</div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-green">
                            <i class="material-icons">invert_colors</i>
                        </div>
                        <div class="content">
                            <div class="text">Fuel Information</div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-light-green">
                            <i class="material-icons">settings</i>
                        </div>
                        <div class="content">
                            <div class="text">Machinary Information</div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-lime">
                            <i class="material-icons">view_list</i>
                        </div>
                        <div class="content">
                            <div class="text">Others Information</div>
                            
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">thumb_down</i>
                        </div>
                        <div class="content">
                            <div class="text">No of Due Payment</div>
                            <div class="number">12</div>
                        </div>
                    </div>

                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">done_all</i>
                        </div>
                        <div class="content">
                            <div class="text">No of Paid Payment</div>
                            <div class="number">12</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Zoom Effect -->
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