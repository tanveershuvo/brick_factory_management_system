<?php include "template/miniheader.php"; 
unset ($_SESSION['nav']);
$_SESSION['nav'] = 4 ;
?>
<?php include "signin_checker.php"; ?>
<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<title><?php if (isset($_SESSION['com_name'])){echo $_SESSION['com_name'];};?> | Add Employee</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap Select Css -->
<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script>	
		function myFN(){
		swal({
           title: "Duplicate Entry!!",
           text: "This account has already been created",
           type: "warning",
           confirmButtonClass: "btn-primary",
           confirmButtonText: "OK!"
         },
         function(){
           window.location.href= "http://localhost/bfms/employee_details.php";
         });
		}
		<!---- ----->
		$(document).ready(function(){
              $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
		<!------->
		function myFN(){
		swal({
           title: "Duplicate Entry!!",
           text: "Employee account has already been created",
           type: "warning",
           confirmButtonClass: "btn-primary",
           confirmButtonText: "OK!"
         },
         function(){
           window.location.href= "http://localhost/bfms/employee_add.php";
         });
		}
		<!-------->
		function success(){
			swal({
           title: "Add Successful!!",
           text: "Employee Details Added Successfully",
           type: "success",
           confirmButtonClass: "btn-primary",
           confirmButtonText: "OK!"
         },
         function(){
           window.location.href= "http://localhost/bfms/employee_add.php";
         });
		}
		<!------------>
		function datasession(e_id){
			$.ajax({
				type:'POST',
				url:"ajax_retrieve.php",
				data:{eID:e_id},
				dataType:"json",
				success : function(response){
					 }
					
			});
			event.target.id == "edit_modal";
		}
</script>
<style>
a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }

</style>
</head>
<?php include "template/mininavbar.php" ?> 
<?php
	include_once 'dbCon.php';
	$conn= connect();
   if (isset($_POST['submit'])){
	   function generateRandomString()  {
			$characters = '123456789987654321';
			$length = 6;
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
       }
	
	   $eID 		= generateRandomString();
	   $emp_name 	= mysqli_real_escape_string($conn,$_POST['emp_name']);
	   $email		= mysqli_real_escape_string($conn,$_POST['email']);
	   $des 		= mysqli_real_escape_string($conn,$_POST['des']);
	   $msalary		= mysqli_real_escape_string($conn,$_POST['msalary']);
	   $mob		 	= mysqli_real_escape_string($conn,$_POST['mob']);
	   $addrs 		= mysqli_real_escape_string($conn,$_POST['addrs']);
	   $comID		=$_SESSION['com_id'];
	   $sql = "SELECT * FROM employee_details   WHERE emp_email='$email' OR emp_name='$emp_name' ";
	   $result = $conn->query($sql);
	   if($result->num_rows < 1){
			$sql	= "INSERT INTO employee_details (emp_id,emp_name,emp_email,emp_address,emp_phone,emp_des,emp_salary,com_id)
					   VALUES ('$eID','$emp_name','$email','$addrs','$mob','$des','$msalary','$comID')";
			$ssql	= "INSERT INTO login_details (log_id,email) VALUES('$eID','$email')";
			
			if ($conn->query($sql) && $conn->query($ssql)){
				echo "<script>success()</script>";
			}
	   } else {	
			echo "<script>myFN()</script>";
	   }
   }  
?>		
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 <h2>
                   <b>EMPLOYEE DETAILS AND SALARY DETAILS</b>
                 </h2>
				 <a name = "add" type="button" class="col-lg-offset-9 col-md-offset-4 col-sm-offset-4 col-xs-offset-4 btn btn-primary waves-effect m-r-30" data-toggle="modal" data-target="#largeModal"><i class="material-icons">add_to_queue</i> ADD NEW EMPLOYEE DETAILS </a>                    
            </div>	
	
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
						 
                               <div class="row clearfix">                 
                            <div class="col-lg-4 ">
                               <div class="form-line">
                                  <input type="text" name="Name"  id="myInput" class="form-control"  placeholder="Search here....." >
                               </div>
                            </div>				
                        </div> 
					</div>
                        <div class="body">	
                            <div class="table-responsive">
                                <table  class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th style='text-align:center;' >Employee Name</th>
                                            <th style='text-align:center;' >Employee Phone</th>
                                            <th style='text-align:center;' >Employee email</th>
                                            <th style='text-align:center;' >Designation</th>
                                            <th style='text-align:center;' >Address</th>
                                            <th style='text-align:center;' >Salary</th>
                                            <th style='text-align:center;' >Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody style="font-size:14px;color:black;" align="center" id="table">
									<?php 
										include_once 'dbCon.php';
										$conn= connect();
										$comID=$_SESSION['com_id'];
										$sql= "SELECT * FROM employee_details where com_id='$comID' order by emp_name";
										$resultData=$conn->query($sql);
										   foreach ($resultData as $row){				
									?>
                                        <tr>
                                            <td><?=$row['emp_name']?></td>
                                            <td><?=$row['emp_phone']?></td>
                                            <td><?=$row['emp_email']?></td>
                                            <td><?=$row['emp_des']?></td>
                                            <td><?=$row['emp_address']?></td>
                                            <td><?=$row['emp_salary']?> tk</td>
                                            <td><a  href = "#edit_modal<?=$row['emp_id']?>" class='btn btn-primary a-btn-slide-text' name = "edit" data-toggle='modal' >
											<span class='glyphicon glyphicon-plus'></span><span><strong>EDIT</strong></span></a></td>
											<?php include 'edit_employee.php'; ?>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
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
	
	<!------- MODAL------------->
						<div class="body">
                           <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                               <div class="modal-dialog modal-lg" role="document">
                                   <div class="modal-content">
                                       
									   <div class="modal-header">
                                           <h4 class="modal-title" align="center" id="largeModalLabel">Insert Employee Information Here </h4><hr>
                                       </div>
                                       <div class="modal-body">
										 <form class="form-horizontal" id="insert_form" onsubmit="return check_info();" method ="POST" >
										   <div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label">
                                                    <label >Employee Name :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="emp_name" id="emp_name"  class="form-control"   placeholder="Enter Employee name" >
                                                        </div>
														<span id ="msg1" style="font-size:12px;color:red;font-weight:bold;"></span>
                                                    </div>
                                                </div>
                                            </div></br>
											<div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label" >
                                                    <label for="password_2">Email:</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="email" id="email" class="form-control" value ="" placeholder="Enter Email " >
                                                        </div>
														<span id ="msg4" style="font-size:12px;color:red;font-weight:bold;"></span>
                                                    
                                                    </div>
                                                </div>
                                            </div>  <br>
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label">
                                                    <label for="password_2">Designation :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
														<?php if($_SESSION['access']==(2)){?>
                                                            <input name="des"  id="des"  value="Staff" >
														<?php } ?>
														<?php if($_SESSION['access']==(1)){?>
                                                            <input name="des"  id="des"  value="Manager" >
														<?php } ?>
                                                        </div>
														<span id ="msg2" style="font-size:12px;color:red;font-weight:bold;"></span>
                                                    </div>
                                                </div>
                                            </div> <br>
											<div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label">
                                                    <label for="password_2">Monthly Salary :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="msalary" oninput="validation()"  id="msalary" class="form-control" placeholder="Enter Monthly Salary" >
                                                        </div>
														<span id ="msg3" style="font-size:12px;color:red;font-weight:bold;"></span>
                                                    </div>
                                                </div>
                                            </div> <br>
								            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label" >
                                                    <label for="password_2">Phone No :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="mob"  id="mob" oninput="validation()" class="form-control" placeholder="Enter Phone No " >
														</div>
														 <span id ="msg5" style="font-size:12px;color:red;font-weight:bold;"></span>
                                                    </div>
                                                </div>
                                            </div> 	 <br>	
											  <div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label" >
                                                    <label for="password_2">Address :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="addrs" id="addrs" class="form-control" placeholder="Enter Address " >
                                                        </div>
														<span id ="msg6" style="font-size:12px;color:red;font-weight:bold;"></span>
                                                    </div>
                                                </div>
                                            </div><br>
                                       </div>
                                       <div class="modal-footer">
                                           <button type="submit" name= "submit" id= "submit" class="btn btn-primary waves-effect"> SAVE</button>
                                           <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                       </div>
									  </form>
                                   </div>
                               </div>
                           </div>
						</div>
						
<!---END MODAL-------------------->

<script>		
		function check_info(){
			var name= document.getElementById('emp_name').value;
			var des= document.getElementById('des').value;
			var salary= document.getElementById('msalary').value;
			var email= document.getElementById('email').value;
			var mob= document.getElementById('mob').value;
			var address = document.getElementById('addrs').value;
			
			if (name==""){
				document.getElementById('msg1').innerHTML = "**Please input Employee name";
				return false;
			}
			if (email==""){
				document.getElementById('msg4').innerHTML = "**Please input employee email";
				return false;
			}
			if (des==""){
				document.getElementById('msg2').innerHTML = "**Please input designation";
				return false;
			}
			if (salary==""){
				document.getElementById('msg3').innerHTML = "**Please input salary";
				return false;
			}
			
			
			if (mob==""){
				document.getElementById('msg5').innerHTML = "**Please Input Mobile Number";
				return false;
			}
			if (address==""){
				document.getElementById('msg6').innerHTML = "**Please input address";
				return false;
			}
			if(mob.length != 11){
				document.getElementById('msg').innerHTML = "**Mobile Number Must be 11 digit!!";
				document.getElementById('mob').value='';
				return false;					
			}
			
			
		}
		function validation(){
			var salary= document.getElementById('msalary').value;
			var mob= document.getElementById('mob').value;
			
			 if(isNaN(salary)){
				swal('Salary contains only numbers!!', '', 'warning')
				document.getElementById('msalary').value='';
				return false;					
			}
			else if(isNaN(mob)){
				swal('Mobile number conatins only letter!!', '', 'warning')
				document.getElementById('mob').value='';
				return false;					
			}			
		}
</script>					
</body>
</html>