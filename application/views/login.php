<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->

<head>
	<!-- Meta-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="description" content="Tenant Management System">
	<meta name="keywords" content="tenant, bill, management, building, bed, room, staff, payroll, rent, expense, utility, account, profession, id">
	<meta name="author" content="TPS">
	<title><?php echo $this->db->get_where('setting', array('name' => 'system_name'))->row()->content; ?> | Login</title>
	<link rel="icon" type="image/*" href="<?php echo base_url(); ?>uploads/website/<?php echo $this->db->get_where('setting', array('name' => 'favicon'))->row()->content; ?>">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/bootstrap.css">
	<!-- Vendor CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/animo/animate+animo.css">
	<!-- App CSS-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/app.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/common.css">
	<!-- Modernizr JS Script-->
	<script src="<?php echo base_url(); ?>assets/vendor/modernizr/modernizr.js" type="application/javascript"></script>
	<!-- FastClick for mobiles-->
	<script src="<?php echo base_url(); ?>assets/vendor/fastclick/fastclick.js" type="application/javascript"></script>
</head>

<body>
	<!-- START wrapper-->
	<div class="row row-table page-wrapper">
		<div class="col-lg-3 col-md-6 col-sm-8 col-xs-12 align-middle">
			<!-- START panel-->
			<div data-toggle="play-animation" data-play="fadeIn" data-offset="0" class="panel panel-dark panel-flat">
				<div class="panel-heading text-center">
					<a href="login.html#">
						<img src="<?php echo base_url(); ?>uploads/website/<?php echo $this->db->get_where('setting', array('name' => 'logo'))->row()->content; ?>" alt="Image" class="block-center img-rounded">
					</a>
					<p class="text-center mt-lg">
						<strong><?php echo html_escape($this->db->get_where('setting', array('name' => 'tagline'))->row()->content); ?></strong>
					</p>
				</div>
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" align="center" style="margin-bottom: 0">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<?php if ($this->session->flashdata('warning')): ?>
				<div class="alert alert-warning" align="center" style="margin-bottom: 0">
					<?php echo $this->session->flashdata('warning'); ?>
				</div>
				<?php endif; ?>
				<div class="panel-body">
					<?php echo form_open('auth/signin', array('class' => 'mb-lg', 'method' => 'post', 'data-parsley-validate' => '')); ?>
						<div class="form-group has-feedback">
							<input name="username" type="text" placeholder="Enter username" class="form-control" required>
							<span class="fa fa-user form-control-feedback text-muted"></span>
						</div>
						<div class="form-group has-feedback">
							<input name="password" type="password" placeholder="Password" class="form-control" required>
							<span class="fa fa-lock form-control-feedback text-muted"></span>
						</div>
						<button type="submit" class="btn btn-block btn-primary">Login</button>
					<?php echo form_close(); ?>
				</div>
			</div>
        <!-- END panel-->
		</div>
	</div>
	<!-- END wrapper-->
	<!-- START Scripts-->
	<!-- Main vendor Scripts-->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Animo-->
	<script src="<?php echo base_url(); ?>assets/vendor/animo/animo.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/parsley/parsley.min.js"></script>
	<!-- Custom script for pages-->
	<script src="<?php echo base_url(); ?>assets/app/js/pages.js"></script>
	<!-- END Scripts-->
	
	<script type="text/javascript">
		$(document).ready(function () { 
			window.setTimeout(function() {
			    $(".alert").slideUp(500, function(){
			        $(this).remove(); 
			    });
			}, 5000); 
		});
	</script>
</body>

</html>
