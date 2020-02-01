<?php require_once('core/header.php'); ?>
<body class="bg-gradient-warning">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Bienvenido al SISPFI</h1>
									</div>
									<?php if (isset($_SESSION['loginFailed']) && $_SESSION['loginFailed'] == 1) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Autenticación Fallida!</strong>  usuario o contraseña incorrectos.
                            </div>
                        <?php unset($_SESSION['loginFailed']); } ?>
									<form action="" class="user" method="post">
										<div class="form-group">
											<input type="text" name="username" class="form-control form-control-user" placeholder="Ingrese el nombre de usuario..." required="" maxlength="22" autocomplete="off">
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" required="">
										</div>
										<!-- <div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember Me</label>
											</div>
										</div> -->
										<button type="submit" name="submit" value="login" class="btn btn-primary btn-user btn-block">Ingresar</button>
										<!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
											Login
										</a> -->
										<!-- <hr>
										<a href="index.html" class="btn btn-google btn-user btn-block">
											<i class="fab fa-google fa-fw"></i> Login with Google
										</a>
										<a href="index.html" class="btn btn-facebook btn-user btn-block">
											<i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
										</a>
									</form> -->
									<hr>
									<div class="text-center">
										<a class="small" href="#">Olvido su Contraseña?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="assets/js/sb-admin-2.min.js"></script>
</body>
</html>
