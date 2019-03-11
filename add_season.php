<head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
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
<body>
	<div tabindex="-1" role="dialog">
		<div role="document">
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
										<input type="text" name="start" id="from" class="form-control" >
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
										<input type="text" name="end" id="to" class="form-control"  >
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
	</body>	