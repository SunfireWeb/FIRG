<?php
require_once("core.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>FIRGY</title>
		<meta name="description" content="description">
		<meta name="author" content="FIRG">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo THEME_URL; ?>plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="<?php echo THEME_URL; ?>plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="<?php echo THEME_URL; ?>plugins/select2/select2.css" rel="stylesheet">
		<link href="<?php echo THEME_URL; ?>css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!--<script src="http://code.jquery.com/jquery.js"></script>-->
		<script src="<?php echo THEME_URL; ?>plugins/jquery/jquery-1.8.2.min.js"></script>
		<script src="<?php echo THEME_URL; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
		<!-- Include individual files as needed -->
		<script src="<?php echo THEME_URL; ?>plugins/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo THEME_URL; ?>plugins/tinymce/tinymce.min.js"></script>
		<script src="<?php echo THEME_URL; ?>plugins/tinymce/jquery.tinymce.min.js"></script>
		<script src="<?php echo THEME_URL; ?>plugins/jquery/jquery.history.js"></script>
		<script src="<?php echo THEME_URL; ?>plugins/select2/select2.min.js"></script>

		<!-- All functions for this theme + document.ready processing -->
		<script src="<?php echo THEME_URL; ?>js/devoops.js"></script>


	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="javascript:void(0);" class="show-sidebar">
				  <i class="fa fa-bars"></i>
				</a>
				<a class='logoTitle' href="index.php">FIRGY</a>
			</div>
			<!--<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i class="fa fa-bars"></i>
						</a>
						<div id="search">
							<input type="text" placeholder="search"/>
							<i class="fa fa-search"></i>
						</div>
					</div>-->
					<!--<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="hidden-xs">
								<a href="index.php" class="modal-link">
									<i class="fa fa-bell"></i>
									<span class="badge"></span>
								</a>
							</li>
							<li class="hidden-xs">
								<a class="ajax-link" href="/theme/devoops/ajax/calendar.html">
									<i class="fa fa-calendar"></i>
									<span class="badge"></span>
								</a>
							</li>
							<li class="hidden-xs">
								<a href="/theme/devoops/ajax/page_messages.html" class="ajax-link">
									<i class="fa fa-envelope"></i>
									<span class="badge"></span>
								</a>
							</li>-->
							<!--<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="<?php echo THEME_URL; ?>img/avatar.jpg" class="img-rounded" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span>Dr Lara</span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>-->
									<!--<li>
										<a href="/theme/devoops/ajax/page_messages.html" class="ajax-link">
											<i class="fa fa-envelope"></i>
											<span>Messages</span>
										</a>
									</li>
									<li>
										<a href="/theme/devoops/ajax/gallery_simple.html" class="ajax-link">
											<i class="fa fa-picture-o"></i>
											<span>Albums</span>
										</a>
									</li>
									<li>
										<a href="/theme/devoops/ajax/calendar.html" class="ajax-link">
											<i class="fa fa-tasks"></i>
											<span>Tasks</span>
										</a>
									</li>-->
									<!--<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span>Settings</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>-->
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="index.php" class="active " title="Food InfoSheets">
						<i class="fa fa-tasks"></i>
						<span class="hidden-xs">Food InfoSheets</span>
					</a>
					<!--<ul class="dropdown-menu">
						<li><a class='' href="addeditentry.php" title="Food InfoSheets">New Food InfoSheet</a></li>
					</ul>-->
				</li>
				<li>
					<a class="" href="addeditentry.php" title="New Food InfoSheet">
						<i class="fa fa-cutlery"></i>
						<span class="hidden-xs">New Food InfoSheet</span>
					</a>
				</li>
				<li>
					<a href="generatereport.php" class="" title="Run Report">
						<i class="fa fa-bar-chart-o"></i>
						<span class="hidden-xs">Run Report</span>
					</a>
				</li>
				<!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" title="Admin Demo Content">
						<i class="fa fa-table"></i>
						 <span class="hidden-xs">Admin Demo Content</span>
					</a>
					<ul class="dropdown-menu">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-table"></i>
								 <span class="hidden-xs">Tables</span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="ajax-link" href="/theme/devoops/ajax/tables_simple.html">Simple Tables</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/tables_datatables.html">Data Tables</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/tables_beauty.html">Beauty Tables</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-pencil-square-o"></i>
								 <span class="hidden-xs">Forms</span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="ajax-link" href="/theme/devoops/ajax/forms_elements.html">Elements</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/forms_layouts.html">Layouts</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/forms_file_uploader.html">File Uploader</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-desktop"></i>
								 <span class="hidden-xs">UI Elements</span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="ajax-link" href="/theme/devoops/ajax/ui_grid.html">Grid</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/ui_buttons.html">Buttons</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/ui_progressbars.html">Progress Bars</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/ui_jquery-ui.html">Jquery UI</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/ui_icons.html">Icons</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-list"></i>
								 <span class="hidden-xs">Pages</span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="/theme/devoops/ajax/page_login.html">Login</a></li>
								<li><a href="/theme/devoops/ajax/page_register.html">Register</a></li>
								<li><a id="locked-screen" class="submenu" href="/theme/devoops/ajax/page_locked.html">Locked Screen</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/page_contacts.html">Contacts</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/page_feed.html">Feed</a></li>
								<li><a class="ajax-link add-full" href="/theme/devoops/ajax/page_messages.html">Messages</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/page_pricing.html">Pricing</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/page_invoice.html">Invoice</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/page_search.html">Search Results</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/page_404.html">Error 404</a></li>
								<li><a href="/theme/devoops/ajax/page_500.html">Error 500</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-map-marker"></i>
								<span class="hidden-xs">Maps</span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="ajax-link" href="/theme/devoops/ajax/maps.html">OpenStreetMap</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/map_fullscreen.html">Fullscreen map</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-picture-o"></i>
								 <span class="hidden-xs">Gallery</span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="ajax-link" href="/theme/devoops/ajax/gallery_simple.html">Simple Gallery</a></li>
								<li><a class="ajax-link" href="/theme/devoops/ajax/gallery_flickr.html">Flickr Gallery</a></li>
							</ul>
						</li>
						<li>
							 <a class="ajax-link" href="/theme/devoops/ajax/typography.html">
								 <i class="fa fa-font"></i>
								 <span class="hidden-xs">Typography</span>
							</a>
						</li>
						 <li>
							<a class="ajax-link" href="/theme/devoops/ajax/calendar.html">
								 <i class="fa fa-calendar"></i>
								 <span class="hidden-xs">Calendar</span>
							</a>
						 </li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-picture-o"></i>
								 <span class="hidden-xs">Multilevel menu</span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">First level menu</a></li>
								<li><a href="#">First level menu</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle">
										<i class="fa fa-plus-square"></i>
										<span class="hidden-xs">Second level menu group</span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Second level menu</a></li>
										<li><a href="#">Second level menu</a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle">
												<i class="fa fa-plus-square"></i>
												<span class="hidden-xs">Three level menu group</span>
											</a>
											<ul class="dropdown-menu">
												<li><a href="#">Three level menu</a></li>
												<li><a href="#">Three level menu</a></li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle">
														<i class="fa fa-plus-square"></i>
														<span class="hidden-xs">Four level menu group</span>
													</a>
													<ul class="dropdown-menu">
														<li><a href="#">Four level menu</a></li>
														<li><a href="#">Four level menu</a></li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle">
																<i class="fa fa-plus-square"></i>
																<span class="hidden-xs">Five level menu group</span>
															</a>
															<ul class="dropdown-menu">
																<li><a href="#">Five level menu</a></li>
																<li><a href="#">Five level menu</a></li>
																<li class="dropdown">
																	<a href="#" class="dropdown-toggle">
																		<i class="fa fa-plus-square"></i>
																		<span class="hidden-xs">Six level menu group</span>
																	</a>
																	<ul class="dropdown-menu">
																		<li><a href="#">Six level menu</a></li>
																		<li><a href="#">Six level menu</a></li>
																	</ul>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li><a href="#">Three level menu</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>-->
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div class="preloader">
				<img src="<?php echo THEME_URL; ?>img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content">