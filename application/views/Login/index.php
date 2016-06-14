<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GRANJA TARAPOTO</title>
		<meta charset="utf-8" />		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<?php include("Librerias/fuente/libcss.php"); ?>
	</head>

	<body class="login example2">
		<div class="main-login col-sm-4 col-sm-offset-4">
			<div class="logo">GRANJA <i class="clip-clip"></i> TARAPOTO
			</div>
			<!-- start: LOGIN BOX -->
			<div class="box-login">
				<h3>Iniciar Sesión con su cuenta</h3> <br>
				<form id="form_login">
					<div class="alert alert-danger" id="error" style="display: none;">
						<i class="fa fa-times-circle"></i>
						<strong> Ocurrió Un Error! </strong> ... Error De Usuario o Clave.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input type="text" class="form-control" name="usuario" placeholder="Nombre De Usuario">
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="clave" placeholder="Clave De Usuario">
								<i class="fa fa-lock"></i>
								<a class="forgot" href="#">
									No Recuerdo Mi Clave
								</a> </span>
						</div>
						<div class="form-actions">
							<label for="remember" class="checkbox-inline">
								<input type="checkbox" class="grey remember" id="remember" name="remember">
								Soy el Administrador
							</label>
							<button type="button" class="btn btn-teal pull-right" onclick="return entrar(this.form);"> 
								Entrar <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						<div class="new-account">
							<center>2016 &copy; Carlos Company.</center>
						</div>
					</fieldset>
				</form>
			</div>

			<div class="copyright">
				2016 &copy; Carlos Company.
			</div>

		</div>

		<!-- Librerias JS -->
		<?php include("Librerias/fuente/libjs.php"); ?>
		<script src="<?php echo base_url();?>Librerias/assets/js/login.js"></script>
		<script src="<?php echo base_url();?>Librerias/app/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Login.init();
			});
		</script>
	</body>
</html>