<?php
include 'vendors/includes/sessions_head.php';

include 'vendors/scripts/queries.php';

?>
<!DOCTYPE html>
<html>

<!-- Mirrored from themewagon.github.io/deskapp2/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Oct 2023 12:15:08 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<?php include "vendors/includes/index_head.php"; ?>

	<script type="text/javascript">
		function showdisabilities(checked){
			if(checked==true){
				$(#showdiv).style.display='block';
			}else{
				$(#showdiv).fadeOut();
			}
		}
	</script>
</head>
<body>
	<div class="pre-loader">
		<?php  include "vendors/includes/preloader.php"; ?>
	</div>

	<div class="header">
		<?php include "vendors/includes/general_header.php"; ?>
	</div>

	<div class="right-sidebar">
		<?php include "vendors/includes/right_sidebar.php"; ?>
	</div>

	<div class="left-side-bar">
		<?php include "vendors/includes/sidebar.php" ?>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Forms</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Visitors Form</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">


<form>
	<div class="form-group">
		<label>Name of Client</label>
		<input class="form-control" type="text" placeholder="Enter client's full name here" name="noc" required>
	</div>
	<div class="form-group">
		<label>Cleint is Representing an/a </label>
		<select class="form-control" enabled="" name="group" id="groupselect" >
			<option value="" tabindex="0">Choose...</option>
			<option value="ind">Individual</option>
			<option value="group">Group/Association/Organization</option>
		</select>
	</div>
	<section id="group" style="display:none;">
	<div class="form-group" >
		<label>Name of Group/Association/Organization</label>
		<input class="form-control" type="text" placeholder="Enter group/assocation/organization name here" name="nog" required>
	</div>
	<div class="form-group">
		<label>Number of members visiting</label>
		<input class="form-control" type="number" placeholder="Enter Number of members visiting here" name="nom" required>
	</div>
	</section>
	<div class="form-group">
		<label>Phone Number</label>
		<input class="form-control" placeholder="Enter client's phone number here" type="tel" name="phone">
	</div>
	<div class="form-group">
		<label>Location</label>
		<input class="form-control" placeholder="Enter the location (community) of client" type="text" name="location">
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<label class="weight-600">Gender</label>
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio4" name="gender" class="custom-control-input">
					<label class="custom-control-label" for="customRadio4">Male</label>
				</div>
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio5" name="gender" class="custom-control-input">
					<label class="custom-control-label" for="customRadio5">Female</label>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<label class="weight-600">Vulnerability</label>
				<small class="form-text text-muted">
		  Select one or more options
		</small>
				<div class="custom-control custom-checkbox mb-5">
					<input type="checkbox" class="custom-control-input" id="customCheck1-1" name="vul">
					<label class="custom-control-label" for="customCheck1-1">Aged</label>
				</div>
				<div class="custom-control custom-checkbox mb-5">
					<input type="checkbox" class="custom-control-input" onchange="showdisabilities(this.checked)" id="customCheck2-1" name="vul">
					<label class="custom-control-label" for="customCheck2-1">Disabled</label>
				</div>
				<div class="custom-control custom-checkbox mb-5">
					<input type="checkbox" class="custom-control-input" id="customCheck3-1" name="vul">
					<label class="custom-control-label" for="customCheck3-1">Not Disabled</label>
				</div>
			</div>
			
		</div>
	</div>
	<section id="showdiv" style="display:none;">
	<div class="form-group">
		<label>Disability type</label>
		<small class="form-text text-muted">
		  If disabled, select disability
		</small>
		<select class="custom-select2 form-control" multiple="multiple" style="width: 100%;">
										
										<optgroup label="Select one or more">
											<option value="CA">Vision Impairment</option>
											<option value="NV">Intellectual Disability</option>
											<option value="OR">Learning Disability</option>
											<option value="WA">Hearing Impairment</option>
											<option value="WA">Physical Disability</option>
											<option value="WA">Communication Disorders>
										</optgroup>
										<!-- <optgroup label="Mountain Time Zone">
											<option value="AZ">Arizona</option>
											<option value="CO">Colorado</option>
											<option value="ID">Idaho</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NM">New Mexico</option>
											<option value="ND">North Dakota</option>
											<option value="UT">Utah</option>
											<option value="WY">Wyoming</option>
										</optgroup> -->
									</select>
	</div>
</section>
	<div class="form-group">
		<label>Visiting Unit/Department </label>
		<select class="form-control" enabled="">
			<option selected>Choose...</option>
			<?php
                                  $query="SELECT * FROM `cs_admin_unit`";
                                  $search_result=mysqli_query($conn, $query);
                                  while($fetch = mysqli_fetch_array($search_result)){
                                  ?>
                                <option value="<?php echo $fetch['adu_id'] ?>"><?php echo $fetch['adu_name'] ?></option>
                                <?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Purpose of visit</label>
		<textarea class="form-control"></textarea>
	</div>

	<div class="form-group">
		<label>Time In</label>
		<input class="form-control time-picker-default" placeholder="time" type="text">
	</div>
<hr>
	<div class="form-group">
		<button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
	</div>
	
</form>


				</div>
			</div>
			<?php include "vendors/includes/footerscripts_index.php"; ?>
			<script src="vendors/scripts/showgroup.js"></script>
</body>

</html>