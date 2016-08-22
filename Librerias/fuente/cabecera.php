<!-- Cabecera Del Sistema-->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
					<span class="clip-list-2"></span>
				</button>
				<a class="navbar-brand" href="index.html">
					SYS -<span> GRANJA </span>
				</a>
			</div>
			<div class="navbar-tools">
				<ul class="nav navbar-right">
					<li class="dropdown">
						<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
							<i class="fa fa-cog"></i>
							<span class="badge"> 10</span>
						</a>
						<ul class="dropdown-menu notifications">
							<li>
								<span class="dropdown-menu-title"> You have 11 notifications</span>
							</li>
							<li>
								<div class="drop-down-wrapper">
									<ul>
										<li>
											<a href="javascript:void(0)">
												<span class="label label-primary"><i class="fa fa-user"></i></span>
												<span class="message"> New user registration</span>
												<span class="time"> yesterday</span>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<span class="label label-success"><i class="fa fa-comment"></i></span>
												<span class="message"> New comment</span>
												<span class="time"> yesterday</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="view-all">
								<a href="javascript:void(0)">
									See all notifications <i class="fa fa-arrow-circle-o-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
							<i class="clip-notification-2"></i>
							<span class="badge"> 10</span>
						</a>
						<ul class="dropdown-menu notifications">
							<li>
								<span class="dropdown-menu-title"> You have 11 notifications</span>
							</li>
							<li>
								<div class="drop-down-wrapper">
									<ul>
										<li>
											<a href="javascript:void(0)">
												<span class="label label-primary"><i class="fa fa-user"></i></span>
												<span class="message"> New user registration</span>
												<span class="time"> yesterday</span>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<span class="label label-success"><i class="fa fa-comment"></i></span>
												<span class="message"> New comment</span>
												<span class="time"> yesterday</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="view-all">
								<a href="javascript:void(0)">
									See all notifications <i class="fa fa-arrow-circle-o-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
							<i class="fa fa-spin fa-spinner"></i>
							<span class="badge"> 10</span>
						</a>
						<ul class="dropdown-menu notifications">
							<li>
								<span class="dropdown-menu-title"> You have 11 notifications</span>
							</li>
							<li>
								<div class="drop-down-wrapper">
									<ul>
										<li>
											<a href="javascript:void(0)">
												<span class="label label-primary"><i class="fa fa-user"></i></span>
												<span class="message"> New user registration</span>
												<span class="time"> yesterday</span>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<span class="label label-success"><i class="fa fa-comment"></i></span>
												<span class="message"> New comment</span>
												<span class="time"> yesterday</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="view-all">
								<a href="javascript:void(0)">
									See all notifications <i class="fa fa-arrow-circle-o-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="dropdown current-user">
						<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" >
							<img src="<?php echo base_url()?>/Librerias/assets/images/avatar-1-small.jpg" class="circle-img">
							<span class="username">
								<?php 
									if (isset($_SESSION["usuario"])) {
										echo $_SESSION["usuario"]; 
									}else{
										header('Location:'.base_url());
									}									
								?>
							</span>
							<i class="clip-chevron-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="pages_user_profile.html">
									<i class="clip-user-2"></i>
									&nbsp;Mi Perfil
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="utility_lock_screen.html"><i class="clip-locked"></i>
									&nbsp;Suspender Session </a>
							</li>
							<li>
								<a href="<?php echo base_url();?>login/cerrarsession">
									<i class="clip-exit"></i>
									&nbsp;Cerrar Session
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
<!-- Fin Cabecera Del Sistema-->