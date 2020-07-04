	<div class="col-md-2 sidebar">
  			<div class="row">
				<!-- uncomment code for absolute positioning tweek see top comment in css -->
				<div class="absolute-wrapper"> </div>
				<!-- Menu -->
				<div class="side-menu">
					<nav class="navbar navbar-default" role="navigation">
						<!-- Main Menu -->
						<div class="side-menu-container">
							<ul class="nav navbar-nav">
								<li class="<?php echo ($title == 'Dashboard' ? "active" : "")?>">
									<a href="dashboard.php?page=1"><i class="fas fa-tachometer-alt" ></i>&nbsp;Dashboard</a>
								</li>
								<li class="<?php echo ($title == 'Products CRUD' ? "active" : "")?>">
									<a href="dashboard.php?page=2"><i class="fas fa-cart-plus" ></i>&nbsp;Product</a>
								</li>
								<li class="<?php echo ($title == 'Category CRUD' ? "active" : "")?>">
									<a href="dashboard.php?page=3"><i class="fas fa-align-justify" ></i>&nbsp;Categorie</a>
								</li>
								
								<li class="<?php echo ($title == 'Sales' ? "active" : "")?>">
									<a href="dashboard.php?page=5"><i class="fas fa-chart-line" ></i>&nbsp; Sales</a>
								</li>
								
								<li class="<?php echo ($title == 'history' ? "active" : "")?>">
									<a href="dashboard.php?page=4"><i class="fas fa-history" ></i>&nbsp;Bill History</a>
								</li>
								

								<!-- Dropdown
								<li class="panel panel-default" id="dropdown">
									<a data-toggle="collapse" href="#dropdown-lvl1">
										<span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
									</a>

									
									<div id="dropdown-lvl1" class="panel-collapse collapse">
										<div class="panel-body">
											<ul class="nav navbar-nav">
												<li><a href="#">Link</a></li>
												<li><a href="#">Link</a></li>
												<li><a href="#">Link</a></li>

																								<li class="panel panel-default" id="dropdown">
													<a data-toggle="collapse" href="#dropdown-lvl2">
														<span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
													</a>
													<div id="dropdown-lvl2" class="panel-collapse collapse">
														<div class="panel-body">
															<ul class="nav navbar-nav">
																<li><a href="#">Link</a></li>
																<li><a href="#">Link</a></li>
																<li><a href="#">Link</a></li>
															</ul>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>

								<li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>-->

							</ul>
						</div><!-- /.navbar-collapse -->
					</nav>

				</div>
			</div>  	


</div>