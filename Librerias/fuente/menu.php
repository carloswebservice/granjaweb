
<!-- Menu Del Sistema -->
	<div class="navbar-content">
		<div class="main-navigation navbar-collapse collapse">
			<div class="" style="width:100px;height:105px;">
				<img src="<?php echo base_url()?>/Librerias/assets/images/granja.png" style="width:225px;height:105px;">
			</div>

			<ul class="main-navigation-menu">
				<li id="modprincipal">
					<a href="<?php echo base_url(); ?>granja"><i class="fa fa-home"></i>
						<span class="title"> Granja Tarapoto</span><span class="selected"></span>
					</a>
				</li>

				<?php
					$encontrados = array(); $i=0;
					foreach ($permisos as $value){
						if(!in_array($value->padre,$encontrados)){
							if($i>0){ ?>
								</ul> </li>
							<?php } ?>
							<li id="<?php echo $value->id_padre ?>">
							<a href="javascript:void(0)">
								<i class="<?php echo $value->icono; ?>"></i>
								<span class="title"> <?php echo $value->padre; ?>
								</span><i class="icon-arrow"></i>
							</a>
							<ul class="sub-menu">
							<?php
							$encontrados[] = $value->padre; $i++;
						} ?>
						<li id="<?php echo $value->id_hijo ?>">
							<a href="<?php echo base_url().$value->url; ?>">
								<i class="<?php echo $value->iconoh; ?>"></i>
								<span class="title"> <?php echo $value->hijo; ?> </span>
							</a>
						</li>
					<?php
				} ?>
			</ul>
		</div>
	</div>
<!-- Fin Menu Del Sistema -->

