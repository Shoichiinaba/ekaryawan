<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin eCARfix</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
  <link rel="shortcut icon" type="image" href="<?php echo base_url('deslog/images/img-01.png'); ?>"/>
  
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('deslog/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('deslog/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('deslog/vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('deslog/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('deslog/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('deslog/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('deslog/css/main.css')?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="deslog/images/img-01.png" alt="IMG">
				</div>

				<form action="<?php echo site_url('Auth/login'); ?>" method="post" class="login100-form validate-form">
						<?php
							if (validation_errors() || $this->session->flashdata('result_login')) {
								?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong style= 'color: red';>>Warning!</strong>
									<?php echo validation_errors(); ?>
									<?php echo $this->session->flashdata('result_login'); ?>
								</div>    
							<?php } ?>

						<div><?php 
									$data=$this->session->flashdata('sukses');
									if($data!=""){ ?>
									<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
							<?php } ?>
					
					<span class="login100-form-title">
						Silahkan Masukan <h6><i>Email anda!!</i></h6>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							<i class="fa fa-sign-in"> Login</i>
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
            <strong>Copyright <?= date('Y')?> <a href="https://shoichiinaba.github.io/">eKARYAWAN CARfix Semarang</a>.</strong> <i class="txt2">All rights </i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
  <script src="<?= base_url('deslog/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('deslog/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?= base_url('deslog/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('deslog/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('deslog/vendor/tilt/tilt.jquery.min.js')?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url('deslog/js/main.js')?>"></script>

</body>
</html>