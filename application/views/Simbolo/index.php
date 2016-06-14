<!-- Contenido Raza-->
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumb">
				<div style="margin-top:-9px;"></div>
				<center><h4>
					<i class="fa fa-file-text-o"></i> Simbolo De Eventos - Granja Tarapoto
				</h4></center>
			</div>
		</div>
	</div> <br><br>

	<div class="row">
		<div class="col-sm-12">
			<button type="button" class="sb-toggle btn btn-teal" onclick="nuevocancel()">
				<i class="fa fa-plus"></i> Nuevo Registro
			</button>
			<div style="margin-top:-30px;"></div>
			<table class="table table-bordered table-hover table-full-width" id="sample_1">
				<thead>
					<tr>
						<th class="center"># Codigo</th>
						<th class="center">Evento</th>
						<th class="center">Simbolo</th>
						<th class="center">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($Eventos as $value) { ?> <tr>
							<td class="center"><?php echo $value->eve_id?></td>
							<td class="center"><?php echo $value->eve_descripcion?></td>
							<td class="center"><i class="<?php echo $value->eve_simbolo?>" style="font-size: 20px;color:<?php echo $value->eve_color;?>"></i></td>
							<td class="center">
								<button class="sb-toggle btn btn-warning btn-xs" onclick="modificar(<?php echo $value->eve_id; ?>)"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger btn-xs"><i class="fa fa-times" onclick="eliminar(<?php echo $value->eve_id; ?>)"></i></button>
							</td>
						</tr> <?php }
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Mensaje Correcto-->
	<div id="Alert" class="modal fade" data-width="369" style="display: none;">
	    <div class="row" id="Mensaje">
		    <center>
		    	<h4 class="modal-title">
			        <div class="col-md-2" id="iconomensaje">
			      	</div>
			        <div class="col-md-10" id="textomensaje">
			       	</div>
			    </h4> Sistema Granja Tarapoto <br><br>
			    <button type="button" data-dismiss="modal" class="btn btn-teal" onclick="actualizar()">
			        <i class="fa fa-times"></i> Ok. Cerrar
			    </button>
			</center>
		</div>
	</div>

	<div id="iconos" class="modal fade" data-width="700" style="display: none;">
		<div class="modal-header">
	    	<center><h4 class="modal-title"><i class="fa fa-cog"></i> Click Seleccionar Icono</h4></center>
	    </div>
		<div id="icono" style="height: 300px; padding:10px; overflow-y: scroll;">
			<!-- start: FONT AWESOME -->
			<div class="widget">
				<div class="body icons">
					<div class="row">
						<div class="col-sm-3">
							<ul class="the-icons list-unstyled">
													<li>
														<i class="fa fa-check-square"></i> fa-check-square
													</li>
													<li>
														<i class="fa fa-check-square-o"></i> fa-check-square-o
													</li>
													<li>
														<i class="fa fa-circle"></i> fa-circle
													</li>
													<li>
														<i class="fa fa-adjust"></i> fa-adjust
													</li>
													<li>
														<i class="fa fa-archive"></i> fa-archive
													</li>
													<li>
														<i class="fa fa-asterisk"></i> fa-asterisk
													</li>
													<li>
														<i class="fa fa-ban"></i> fa-ban
													</li>
													<li>
														<i class="fa fa-bar-chart-o"></i> fa-bar-chart-o
													</li>
													<li>
														<i class="fa fa-barcode"></i> fa-barcode
													</li>
													<li>
														<i class="fa fa-beer"></i> fa-beer
													</li>
													<li>
														<i class="fa fa-bell"></i> fa-bell
													</li>
													<li>
														<i class="fa fa-bell-o"></i> fa-bell-o
													</li>
													<li>
														<i class="fa fa-bolt"></i> fa-bolt
													</li>
													<li>
														<i class="fa fa-book"></i> fa-book
													</li>
													<li>
														<i class="fa fa-bookmark"></i> fa-bookmark
													</li>
													<li>
														<i class="fa fa-bookmark-o"></i> fa-bookmark-o
													</li>
													<li>
														<i class="fa fa-briefcase"></i> fa-briefcase
													</li>
													<li>
														<i class="fa fa-bug"></i> fa-bug
													</li>
													<li>
														<i class="fa fa-building"></i> fa-building
													</li>
													<li>
														<i class="fa fa-bullhorn"></i> fa-bullhorn
													</li>
													<li>
														<i class="fa fa-bullseye"></i> fa-bullseye
													</li>
													<li>
														<i class="fa fa-calendar"></i> fa-calendar
													</li>
													<li>
														<i class="fa fa-calendar-o"></i> fa-calendar-o
													</li>
													<li>
														<i class="fa fa-camera"></i> fa-camera
													</li>
													<li>
														<i class="fa fa-camera-retro"></i> fa-camera-retro
													</li>
													<li>
														<i class="fa fa-caret-square-o-down"></i> fa-caret-square-o-down
													</li>
													<li>
														<i class="fa fa-caret-square-o-left"></i> fa-caret-square-o-left
													</li>
													<li>
														<i class="fa fa-caret-square-o-right"></i> fa-caret-square-o-right
													</li>
													<li>
														<i class="fa fa-caret-square-o-up"></i> fa-caret-square-o-up
													</li>
													<li>
														<i class="fa fa-certificate"></i> fa-certificate
													</li>
													<li>
														<i class="fa fa-check"></i> fa-check
													</li>
													<li>
														<i class="fa fa-check-circle"></i> fa-check-circle
													</li>
													<li>
														<i class="fa fa-check-circle-o"></i> fa-check-circle-o
													</li>
													<li>
														<i class="fa fa-check-square"></i> fa-check-square
													</li>
													<li>
														<i class="fa fa-check-square-o"></i> fa-check-square-o
													</li>
													<li>
														<i class="fa fa-circle"></i> fa-circle
													</li>
													<li>
														<i class="fa fa-circle-o"></i> fa-circle-o
													</li>
													<li>
														<i class="fa fa-clock-o"></i> fa-clock-o
													</li>
													<li>
														<i class="fa fa-cloud"></i> fa-cloud
													</li>
													<li>
														<i class="fa fa-cloud-download"></i> fa-cloud-download
													</li>
													<li>
														<i class="fa fa-cloud-upload"></i> fa-cloud-upload
													</li>
													<li>
														<i class="fa fa-code"></i> fa-code
													</li>
													<li>
														<i class="fa fa-code-fork"></i> fa-code-fork
													</li>
													<li>
														<i class="fa fa-coffee"></i> fa-coffee
													</li>
													<li>
														<i class="fa fa-cog"></i> fa-cog
													</li>
													<li>
														<i class="fa fa-cogs"></i> fa-cogs
													</li>
													<li>
														<i class="fa fa-collapse-o"></i> fa-collapse-o
													</li>
													<li>
														<i class="fa fa-comment"></i> fa-comment
													</li>
													<li>
														<i class="fa fa-comment-o"></i> fa-comment-o
													</li>
													<li>
														<i class="fa fa-comments"></i> fa-comments
													</li>
													<li>
														<i class="fa fa-comments-o"></i> fa-comments-o
													</li>
													<li>
														<i class="fa fa-compass"></i> fa-compass
													</li>
													<li>
														<i class="fa fa-credit-card"></i> fa-credit-card
													</li>
													<li>
														<i class="fa fa-crop"></i> fa-crop
													</li>
													<li>
														<i class="fa fa-crosshairs"></i> fa-crosshairs
													</li>
													<li>
														<i class="fa fa-cutlery"></i> fa-cutlery
													</li>
													<li>
														<i class="fa fa-dashboard"></i> fa-dashboard <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-desktop"></i> fa-desktop
													</li>
													<li>
														<i class="fa fa-dot-circle-o"></i> fa-dot-circle-o
													</li>
													<li>
														<i class="fa fa-download"></i> fa-download
													</li>
													<li>
														<i class="fa fa-edit"></i> fa-edit <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-ellipsis-horizontal"></i> fa-ellipsis-horizontal
													</li>
							</ul>
						</div>
						<div class="col-sm-3">
							<ul class="the-icons list-unstyled">
													<li>
														<i class="fa fa-circle-o"></i> fa-circle-o
													</li>
													<li>
														<i class="fa fa-dot-circle-o"></i> fa-dot-circle-o
													</li>
													<li>
														<i class="fa fa-envelope"></i> fa-envelope
													</li>
													<li>
														<i class="fa fa-envelope-o"></i> fa-envelope-o
													</li>
													<li>
														<i class="fa fa-eraser"></i> fa-eraser
													</li>
													<li>
														<i class="fa fa-exchange"></i> fa-exchange
													</li>
													<li>
														<i class="fa fa-exclamation"></i> fa-exclamation
													</li>
													<li>
														<i class="fa fa-exclamation-circle"></i> fa-exclamation-circle
													</li>
													<li>
														<i class="fa fa-exclamation-triangle"></i> fa-exclamation-triangle
													</li>
													<li>
														<i class="fa fa-expand-o"></i> fa-expand-o
													</li>
													<li>
														<i class="fa fa-external-link"></i> fa-external-link
													</li>
													<li>
														<i class="fa fa-external-link-square"></i> fa-external-link-square
													</li>
													<li>
														<i class="fa fa-eye"></i> fa-eye
													</li>
													<li>
														<i class="fa fa-eye-slash"></i> fa-eye-slash
													</li>
													<li>
														<i class="fa fa-female"></i> fa-female
													</li>
													<li>
														<i class="fa fa-fighter-jet"></i> fa-fighter-jet
													</li>
													<li>
														<i class="fa fa-film"></i> fa-film
													</li>
													<li>
														<i class="fa fa-filter"></i> fa-filter
													</li>
													<li>
														<i class="fa fa-fire"></i> fa-fire
													</li>
													<li>
														<i class="fa fa-fire-extinguisher"></i> fa-fire-extinguisher
													</li>
													<li>
														<i class="fa fa-flag"></i> fa-flag
													</li>
													<li>
														<i class="fa fa-flag-checkered"></i> fa-flag-checkered
													</li>
													<li>
														<i class="fa fa-flag-o"></i> fa-flag-o
													</li>
													<li>
														<i class="fa fa-flash"></i> fa-flash <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-flask"></i> fa-flask
													</li>
													<li>
														<i class="fa fa-folder"></i> fa-folder
													</li>
													<li>
														<i class="fa fa-folder-o"></i> fa-folder-o
													</li>
													<li>
														<i class="fa fa-folder-open"></i> fa-folder-open
													</li>
													<li>
														<i class="fa fa-folder-open-o"></i> fa-folder-open-o
													</li>
													<li>
														<i class="fa fa-frown-o"></i> fa-frown-o
													</li>
													<li>
														<i class="fa fa-gamepad"></i> fa-gamepad
													</li>
													<li>
														<i class="fa fa-gavel"></i> fa-gavel
													</li>
													<li>
														<i class="fa fa-gear"></i> fa-gear <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-gears"></i> fa-gears <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-gift"></i> fa-gift
													</li>
													<li>
														<i class="fa fa-glass"></i> fa-glass
													</li>
													<li>
														<i class="fa fa-globe"></i> fa-globe
													</li>
													<li>
														<i class="fa fa-group"></i> fa-group
													</li>
													<li>
														<i class="fa fa-hdd"></i> fa-hdd
													</li>
													<li>
														<i class="fa fa-headphones"></i> fa-headphones
													</li>
													<li>
														<i class="fa fa-heart"></i> fa-heart
													</li>
													<li>
														<i class="fa fa-heart-o"></i> fa-heart-o
													</li>
													<li>
														<i class="fa fa-home"></i> fa-home
													</li>
													<li>
														<i class="fa fa-inbox"></i> fa-inbox
													</li>
													<li>
														<i class="fa fa-info"></i> fa-info
													</li>
													<li>
														<i class="fa fa-info-circle"></i> fa-info-circle
													</li>
													<li>
														<i class="fa fa-key"></i> fa-key
													</li>
													<li>
														<i class="fa fa-keyboard-o"></i> fa-keyboard-o
													</li>
													<li>
														<i class="fa fa-laptop"></i> fa-laptop
													</li>
													<li>
														<i class="fa fa-leaf"></i> fa-leaf
													</li>
													<li>
														<i class="fa fa-legal"></i> fa-legal <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-lemon-o"></i> fa-lemon-o
													</li>
													<li>
														<i class="fa fa-level-down"></i> fa-level-down
													</li>
													<li>
														<i class="fa fa-level-up"></i> fa-level-up
													</li>
													<li>
														<i class="fa fa-lightbulb-o"></i> fa-lightbulb-o
													</li>
													<li>
														<i class="fa fa-location-arrow"></i> fa-location-arrow
													</li>
													<li>
														<i class="fa fa-lock"></i> fa-lock
													</li>
													<li>
														<i class="fa fa-magic"></i> fa-magic
													</li>
													<li>
														<i class="fa fa-magnet"></i> fa-magnet
													</li>
													<li>
														<i class="fa fa-mail-forward"></i> fa-mail-forward <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-mail-reply"></i> fa-mail-reply <span class="text-muted">(alias)</span>
													</li>
							</ul>
						</div>
						<div class="col-sm-3">
							<ul class="the-icons list-unstyled">
													<li>
														<i class="fa fa-minus-square"></i> fa-minus-square
													</li>
													<li>
														<i class="fa fa-minus-square-o"></i> fa-minus-square-o
													</li>
													<li>
														<i class="fa fa-mail-reply-all"></i> fa-mail-reply-all
													</li>
													<li>
														<i class="fa fa-male"></i> fa-male
													</li>
													<li>
														<i class="fa fa-map-marker"></i> fa-map-marker
													</li>
													<li>
														<i class="fa fa-meh-o"></i> fa-meh-o
													</li>
													<li>
														<i class="fa fa-microphone"></i> fa-microphone
													</li>
													<li>
														<i class="fa fa-microphone-slash"></i> fa-microphone-slash
													</li>
													<li>
														<i class="fa fa-minus"></i> fa-minus
													</li>
													<li>
														<i class="fa fa-minus-circle"></i> fa-minus-circle
													</li>
													<li>
														<i class="fa fa-minus-square"></i> fa-minus-square
													</li>
													<li>
														<i class="fa fa-minus-square-o"></i> fa-minus-square-o
													</li>
													<li>
														<i class="fa fa-mobile"></i> fa-mobile
													</li>
													<li>
														<i class="fa fa-mobile-phone"></i> fa-mobile-phone <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-money"></i> fa-money
													</li>
													<li>
														<i class="fa fa-moon-o"></i> fa-moon-o
													</li>
													<li>
														<i class="fa fa-move"></i> fa-move
													</li>
													<li>
														<i class="fa fa-music"></i> fa-music
													</li>
													<li>
														<i class="fa fa-pencil"></i> fa-pencil
													</li>
													<li>
														<i class="fa fa-pencil-square"></i> fa-pencil-square
													</li>
													<li>
														<i class="fa fa-pencil-square-o"></i> fa-pencil-square-o
													</li>
													<li>
														<i class="fa fa-phone"></i> fa-phone
													</li>
													<li>
														<i class="fa fa-phone-square"></i> fa-phone-square
													</li>
													<li>
														<i class="fa fa-picture-o"></i> fa-picture-o
													</li>
													<li>
														<i class="fa fa-plane"></i> fa-plane
													</li>
													<li>
														<i class="fa fa-plus"></i> fa-plus
													</li>
													<li>
														<i class="fa fa-plus-circle"></i> fa-plus-circle
													</li>
													<li>
														<i class="fa fa-plus-square"></i> fa-plus-square
													</li>
													<li>
														<i class="fa fa-power-off"></i> fa-power-off
													</li>
													<li>
														<i class="fa fa-print"></i> fa-print
													</li>
													<li>
														<i class="fa fa-puzzle-piece"></i> fa-puzzle-piece
													</li>
													<li>
														<i class="fa fa-qrcode"></i> fa-qrcode
													</li>
													<li>
														<i class="fa fa-question"></i> fa-question
													</li>
													<li>
														<i class="fa fa-question-circle"></i> fa-question-circle
													</li>
													<li>
														<i class="fa fa-quote-left"></i> fa-quote-left
													</li>
													<li>
														<i class="fa fa-quote-right"></i> fa-quote-right
													</li>
													<li>
														<i class="fa fa-random"></i> fa-random
													</li>
													<li>
														<i class="fa fa-refresh"></i> fa-refresh
													</li>
													<li>
														<i class="fa fa-reorder"></i> fa-reorder
													</li>
													<li>
														<i class="fa fa-reply"></i> fa-reply
													</li>
													<li>
														<i class="fa fa-reply-all"></i> fa-reply-all
													</li>
													<li>
														<i class="fa fa-resize-horizontal"></i> fa-resize-horizontal
													</li>
													<li>
														<i class="fa fa-resize-vertical"></i> fa-resize-vertical
													</li>
													<li>
														<i class="fa fa-retweet"></i> fa-retweet
													</li>
													<li>
														<i class="fa fa-road"></i> fa-road
													</li>
													<li>
														<i class="fa fa-rocket"></i> fa-rocket
													</li>
													<li>
														<i class="fa fa-rss"></i> fa-rss
													</li>
													<li>
														<i class="fa fa-rss-square"></i> fa-rss-square
													</li>
													<li>
														<i class="fa fa-search"></i> fa-search
													</li>
													<li>
														<i class="fa fa-search-minus"></i> fa-search-minus
													</li>
													<li>
														<i class="fa fa-search-plus"></i> fa-search-plus
													</li>
													<li>
														<i class="fa fa-share"></i> fa-share
													</li>
													<li>
														<i class="fa fa-share-square"></i> fa-share-square
													</li>
													<li>
														<i class="fa fa-share-square-o"></i> fa-share-square-o
													</li>
													<li>
														<i class="fa fa-shield"></i> fa-shield
													</li>
													<li>
														<i class="fa fa-shopping-cart"></i> fa-shopping-cart
													</li>
													<li>
														<i class="fa fa-sign-in"></i> fa-sign-in
													</li>
													<li>
														<i class="fa fa-sign-out"></i> fa-sign-out
													</li>
													<li>
														<i class="fa fa-signal"></i> fa-signal
													</li>
													<li>
														<i class="fa fa-sitemap"></i> fa-sitemap
													</li>
													<li>
														<i class="fa fa-smile-o"></i> fa-smile-o
													</li>
													<li>
														<i class="fa fa-sort"></i> fa-sort
													</li>
							</ul>
						</div>
						<div class="col-sm-3">
							<ul class="the-icons list-unstyled">
													<li>
														<i class="fa fa-square"></i> fa-square
													</li>
													<li>
														<i class="fa fa-square-o"></i> fa-square-o
													</li>
													<li>
														<i class="fa fa-sort-alpha-asc"></i> fa-sort-alpha-asc
													</li>
													<li>
														<i class="fa fa-sort-alpha-desc"></i> fa-sort-alpha-desc
													</li>
													<li>
														<i class="fa fa-sort-amount-asc"></i> fa-sort-amount-asc
													</li>
													<li>
														<i class="fa fa-spinner"></i> fa-spinner
													</li>
													<li>
														<i class="fa fa-square"></i> fa-square
													</li>
													<li>
														<i class="fa fa-square-o"></i> fa-square-o
													</li>
													<li>
														<i class="fa fa-star"></i> fa-star
													</li>
													<li>
														<i class="fa fa-star-half"></i> fa-star-half
													</li>
													<li>
														<i class="fa fa-star-o"></i> fa-star-o
													</li>
													<li>
														<i class="fa fa-subscript"></i> fa-subscript
													</li>
													<li>
														<i class="fa fa-suitcase"></i> fa-suitcase
													</li>
													<li>
														<i class="fa fa-sun-o"></i> fa-sun-o
													</li>
													<li>
														<i class="fa fa-superscript"></i> fa-superscript
													</li>
													<li>
														<i class="fa fa-tablet"></i> fa-tablet
													</li>
													<li>
														<i class="fa fa-tachometer"></i> fa-tachometer
													</li>
													<li>
														<i class="fa fa-tag"></i> fa-tag
													</li>
													<li>
														<i class="fa fa-tags"></i> fa-tags
													</li>
													<li>
														<i class="fa fa-tasks"></i> fa-tasks
													</li>
													<li>
														<i class="fa fa-terminal"></i> fa-terminal
													</li>
													<li>
														<i class="fa fa-thumb-tack"></i> fa-thumb-tack
													</li>
													<li>
														<i class="fa fa-thumbs-down"></i> fa-thumbs-down
													</li>
													<li>
														<i class="fa fa-thumbs-o-down"></i> fa-thumbs-o-down
													</li>
													<li>
														<i class="fa fa-thumbs-o-up"></i> fa-thumbs-o-up
													</li>
													<li>
														<i class="fa fa-thumbs-up"></i> fa-thumbs-up
													</li>
													<li>
														<i class="fa fa-ticket"></i> fa-ticket
													</li>
													<li>
														<i class="fa fa-times"></i> fa-times
													</li>
													<li>
														<i class="fa fa-times-circle"></i> fa-times-circle
													</li>
													<li>
														<i class="fa fa-times-circle-o"></i> fa-times-circle-o
													</li>
													<li>
														<i class="fa fa-tint"></i> fa-tint
													</li>
													<li>
														<i class="fa fa-toggle-down"></i> fa-toggle-down <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-toggle-left"></i> fa-toggle-left <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-toggle-right"></i> fa-toggle-right <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-toggle-up"></i> fa-toggle-up <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-trash-o"></i> fa-trash-o
													</li>
													<li>
														<i class="fa fa-trophy"></i> fa-trophy
													</li>
													<li>
														<i class="fa fa-truck"></i> fa-truck
													</li>
													<li>
														<i class="fa fa-umbrella"></i> fa-umbrella
													</li>
													<li>
														<i class="fa fa-unlock"></i> fa-unlock
													</li>
													<li>
														<i class="fa fa-unlock-o"></i> fa-unlock-o
													</li>
													<li>
														<i class="fa fa-unsorted"></i> fa-unsorted <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-upload"></i> fa-upload
													</li>
													<li>
														<i class="fa fa-user"></i> fa-user
													</li>
													<li>
														<i class="fa fa-video-camera"></i> fa-video-camera
													</li>
													<li>
														<i class="fa fa-volume-down"></i> fa-volume-down
													</li>
													<li>
														<i class="fa fa-volume-off"></i> fa-volume-off
													</li>
													<li>
														<i class="fa fa-volume-up"></i> fa-volume-up
													</li>
													<li>
														<i class="fa fa-warning"></i> fa-warning <span class="text-muted">(alias)</span>
													</li>
													<li>
														<i class="fa fa-wheelchair"></i> fa-wheelchair
													</li>
													<li>
														<i class="fa fa-wrench"></i> fa-wrench
													</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- end: FONT AWESOME -->
		</div>
		<div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div> <br>
		<center>
			<button type="button" data-dismiss="modal" class="btn btn-danger">
				<i class="fa fa-times"></i> Cancelar
			</button>
		</center> <br>
	</div>

	<div id="page-sidebar">
		<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
		<div class="sidebar-wrapper">
			<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
				<li class="active" style="font-size:18px;padding:5px;">
					<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Evento</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="users">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" id="form_simbolo"> <br>
								<input type="hidden" name="id" id="id" class="form-control">
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Descripcion
									</label>
									<div class="col-sm-9">
										<input type="text" name="eve_descripcion" id="eve_descripcion" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Simbolo Evento
									</label>
									<div class="col-sm-9">
										<input type="text" name="eve_simbolo" id="eve_simbolo" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">
										Color Simbolo
									</label>
									<div class="col-sm-9">
										<input type="color" name="eve_color" id="eve_color" class="form-control">
									</div>
								</div> <br>

								<div class="form-group"> <center>
									<button type="button" class="btn btn-teal" onclick="return guardar(this.form);"> 
										<i class="fa fa-save"></i> Guardar 
									</button>
									<button type="button" class="sb-toggle btn btn-danger" onclick="nuevocancel()"> 
										<i class="fa fa-times"></i> Cancelar 
									</button>
								</center> </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Fin Contenido Raza-->