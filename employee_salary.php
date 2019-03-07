<?php include "template/miniheader.php";
unset ($_SESSION['nav']);
$_SESSION['nav'] = 5 ; ?>
<?php include "signin_checker.php" ?>

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
	<!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
	<script>
	    
		function payment(id){
			
			$.ajax({
				type:'POST',
				data:{pay_id:id},
				url:"ajax_insertion.php",
				success : function(){
					 swal({
                          title: "Salary Paid Successfully",
                          type: "success",
                          confirmButtonClass: "btn-primary",
                          confirmButtonText: "OK",
                        }, function() {
                            window.location.href = "http://localhost/bfms/employee_salary.php";
                          });
				}
			});
		}
		
			
		
		
	</script>
</head>
<?php include "template/mininavbar.php" ?> 
<?php


	include_once 'dbCon.php';
    $conn= connect();
	$comID=$_SESSION['com_id'];
	$sql= "SELECT * FROM employee_details where com_id = '$comID' ";
    $resultData=$conn->query($sql);
	foreach($resultData as $items){
		
		$id = $items['emp_id'];
		$empid= (date("my"))+$id ;
		$salary=$items['emp_salary'];
		$today = date("d/m/y");
		
	$sql = "INSERT INTO employee_payment (`emp_pay_id`,`emp_id`,`date`,`salary`,`status`) 
	values('$empid','$id','$today','$salary','unpaid')"; 
	$conn->query($sql);
	}
	

?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 <h2>
                                EMPLOYEE SALARY DETAILS
                 </h2>
            </div>
			
			<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Mobile</th>
                                            <th>Gmail</th>
                                            <th>Designation</th>
                                            <th>SALARY </th>
                                            <th>DATE</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
									<?php 
												include_once 'dbCon.php';
												$conn= connect();
												$comID=$_SESSION['com_id'];
												$sql= "SELECT * FROM employee_details as e , employee_payment as p WHERE e.emp_id=p.emp_id AND com_id = '$comID' ORDER BY `status` DESC";
												$resultData=$conn->query($sql);
											    foreach ($resultData as $row){
												
										?>
                                        <tr>
                                            <td><?=$row['emp_name']?></td>
                                            <td><?=$row['emp_phone']?></td>
                                            <td><?=$row['emp_email']?></td>
                                            <td><?=$row['emp_des']?></td>
                                            <td><?=$row['salary']?></td>
                                            <td><?=$row['date']?></td>
											<?php if ($row['status']=='unpaid'){ ?>
											<td><a name="edit" onclick="payment(<?=$row['emp_pay_id']?>)" class="btn btn-primary waves-effect waves-float">Pay Now</a></td>
											<?php } else { ?>
											<td><b class="text-primary">Salary Paid</b></td>
											<?php } ?>
                                        </tr>
												<?php } ?>
                                    </tbody>
									
									<tbody id="ajaxtable">
                                        
										     </tbody>
                                </table>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>
	<!-- Multi Select Plugin Js -->
    <script src="plugins/multi-select/js/jquery.multi-select.js"></script>
    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    
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
	
	<!-- Sweet Alert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
	
    

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
