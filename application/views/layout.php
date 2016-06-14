<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GRANJA TARAPOTO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<?php 
			include("Librerias/fuente/libcss.php"); 
			if(isset($data["stylesheets"])) {
				foreach ($data["stylesheets"] as $key => $value) {
					echo $value;
				}
			}
		?>
	</head>
	<body>
		<!-- Cabecera Del Sistema-->
		<?php include("Librerias/fuente/cabecera.php"); ?>
		
		<div class="main-container">
			<!-- Menu Del Sistema-->
			<?php include("Librerias/fuente/menu.php"); ?>

			<!-- Todo el contenido -->
			<div class="main-content">
				<div class="container">
					<?php
						if(isset($param)) {
							foreach ($param as $key => $value) {
								$data[$key] = $value;
							}
							$this->load->view($view,$data);
						}else{
							$this->load->view($view);
						}
					?>
				</div>
			</div>
		</div>
		<!-- Librerias JS -->
		<?php 
			include("Librerias/fuente/libjs.php");
			if(isset($data["scripts"])) {
				foreach ($data["scripts"] as $key => $value) {
					echo $value;
				}
			}
		?>
	</body>
</html>