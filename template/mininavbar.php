
<body class="theme-deep-purple">
	
	<!-- Top Bar -->
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
	
	
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
				
                <ul class="list">
					
					
					<li>
                        <a href="season_details">
                            <i class="material-icons">label</i>
                            <span>Season Details</span>
						</a>
					</li>
					<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==111)){ echo 'class="header"';}
					if($_SESSION['access']==(1||2)){
						?>>
                        <a href="dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
						</a>
					</li>
					<?php } ?>
					<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==14)){ echo 'class="header" ';}
						if($_SESSION['access']==(1||2)){?>>
							<a href="cost_benefit_report">
								<i class="material-icons">visibility</i>
								<span>Cost Benefit Analysis Report</span>
							</a>
						</li>
						<?php } ?>
						
					<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==10)){ echo 'class="header" ';}
						if($_SESSION['access']==(1||2)){?>>
							<a href="income_report">
								<i class="material-icons">grain</i>
								<span>Income Report</span>
							</a>
						</li>
						<?php } ?>
						<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==15)){ echo 'class="header" ';}
						if($_SESSION['access']==(1||2)){?>>
							<a href="product_sales_report">
								<i class="material-icons">visibility</i>
								<span>Product Sales Report</span>
							</a>
						</li>
						<?php } ?>
						<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==11)){ echo 'class="header" ';}
						if($_SESSION['access']==(1||2)){?>>
							<a href="sordar_report">
								<i class="material-icons">bubble_chart</i>
								<span>Sordar Details Report</span>
							</a>
						</li>
						<?php } ?>
						<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==12)){ echo 'class="header" ';}
						if($_SESSION['access']==(1||2)){?>>
							<a href="customer_due_report">
								<i class="material-icons">report</i>
								<span>Customer Due Report</span>
							</a>
						</li>
						<?php } ?>
						<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==13)){ echo 'class="header" ';}
						if($_SESSION['access']==(1||2)){?>>
							<a href="expenses_report">
								<i class="material-icons">av_timer</i>
								<span>Expense Report</span>
							</a>
						</li>
						<?php } ?>
						<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==4) || ($_SESSION['nav']==5)){ echo 'class="active" ';}
					if($_SESSION['access']==(1||2)){?>>
                        <a class="menu-toggle">
                            <i class="material-icons">person_outline</i>
                            <span>Employee Details</span>
						</a>
                        <ul class="ml-menu">
							<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==4)){ echo 'class="header" ';}?>>
								<a href="employee_add">
									<i class="material-icons">person</i>
									<span>Assign Employee
									</a>
								</li>
								<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==5)){ echo 'class="header" ';}?>>
									<a href="employee_salary">
										<i class="material-icons">attach_money</i>
										<span>Employee Salary Payment</span>
									</a>
								</li>
								
							</ul>
						</li>
					<?php } ?>
						
					<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==1)){ echo 'class="header"';}
					if($_SESSION['access']==(0)){?>>
                        <a href="home">
                            <i class="material-icons">home</i>
                            <span>Home</span>
						</a>
					</li>
					<?php } ?>
					<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==2)){ echo 'class="header" ';}?> >
                        <a href="product_availability">
                            <i class="material-icons">assessment</i>
                            <span>Available Products</span>
						</a>
					</li>
                    <li  <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==3)){ echo 'class="header" ';}?>>
                        <a href="customer_add">
                            <i class="material-icons">person</i>
                            <span>Customer Details</span>
						</a>
					</li>
					<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==8)){ echo 'class="header" ';}?>>
							<a href="sordar_add">
								<i class="material-icons">people</i>
								<span>Sordar Details</span>
							</a>
						</li>
						
					
						
						<li <?php if(isset ($_SESSION['nav'])&& ($_SESSION['nav']==7)){ echo 'class="header" ';}
						if($_SESSION['access']==(0)){?>>
							<a href="mechinaries">
								<i class="material-icons">settings</i>
								<span>Machinary Details</span>
							</a>
						</li>
						<?php }?>
						
						
						
					</div>
					
					
					
				</aside>
				<!-- #END# Left Sidebar -->
			</section>
			
			
						