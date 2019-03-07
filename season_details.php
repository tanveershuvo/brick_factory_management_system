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
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
		
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
			  <h4>SEASON DETAILS <?=$_SESSION['com_id']?></h4>
			 </div>
             <div class="col-lg-8" >
			   <button type="button" style="float:right"
			   class="btn btn-primary" 
			   data-toggle="modal" data-target="#largeModal">
			   <i class="material-icons">add_to_queue</i> ADD NEW SEASON DETAILS</button>           
            
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
								<a  href="" class="btn btn-primary btn " style="float:right"><i class="material-icons">create</i></a>
                            </h2>
                        </div>
                        <div class="body">
						<label >Start Time : <?=$row['sea_start_time']?></label>
						<hr>
						<label>End Time : <?=$row['sea_end_time']?></label>
						<hr>
						<label>Budget : <?=$row['sea_budget']?> TK</label>              
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
</body>
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
	<div class="body">
	<script>
	
			var format = function (num) {
    
return (parseFloat(num).toFixed(2)).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,").replace(".00","")
}
$(function () {
    $("#principalAmtOut").blur(function (e) {
        $(this).val(format($(this).val()));
    });
});
			
	</script>
						<!-- Large Size -->
<?php 
include_once 'dbCon.php';
$conn= connect();			
   if (isset($_POST['submit'])){
	 $name = $_POST['name'];
	 $start = $_POST['start'];
	 $end = $_POST['end'];
	 $budget = $_POST['budget'];
	 $comID = $_SESSION['com_id'];
	 $sql= "INSERT INTO season (sea_name,com_id,sea_start_time,sea_end_time,sea_budget) VALUES ('$name','$comID','$start','$end','$budget')";

	  if ($conn->query($sql)){
		echo '<script>MyFn()</script>';
		} else {
		
		}
   }
   
?>
                           <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                               <div class="modal-dialog modal-lg" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h4 class="modal-title" id="largeModalLabel">Insert Season Information here :</h4>
                                       </div>
									     
                                       <div class="modal-body">
										 <form class="form-horizontal" id="insert_form"  method ="POST" >
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label">
                                                    <label >Season Name :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="name" oninput="validation()" id="name" class="form-control" placeholder="Enter Season name" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></br>
											
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label" >
                                                    <label for="password_2">Season Start Time :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="date" name="start" id="end" class="form-control" placeholder="Enter Season End Time " >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> </br>	
								            
								            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label" >
                                                    <label for="password_2">Season End Time :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="date" name="end" id="end" class="form-control" placeholder="Enter Season End Time " >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> </br>	
											<div class="row clearfix">
                                                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 form-control-label" >
                                                    <label for="password_2">Budget :</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                            <input type="text" id="principalAmtOut" name="budget" class="form-control" placeholder="Enter Budget ">
                                                    </div>
                                                </div>
                                            </div>
				
                                       </div></br>
                                       <div class="modal-footer">
											<button type="submit" name= "submit" id= "submit" class="btn btn-link waves-effect">SAVE </button>
                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                       </div>
									   </form>
                                   </div>
                               </div>
                           </div>
						   
						</div>
</body>
</html>
