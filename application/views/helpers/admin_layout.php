<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a href="<?php echo site_url('/'); ?>" class="brand">
				<small>
					<i class="icon-building"></i>
					Immobilier
				</small>
			</a><!--/.brand-->

			<ul class="nav ace-nav pull-right">			

				<li class="purple">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-bell-alt icon-animated-bell"></i>								
					</a>

					<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
						<li class="nav-header">
							<i class="icon-warning-sign"></i>
							No Notifications
						</li>

					</ul>
				</li>

				<li class="green">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-envelope icon-animated-vertical"></i>
					</a>

					<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
						<li class="nav-header">
							<i class="icon-envelope-alt"></i>
							0 Messages
						</li>
						
					</ul>
				</li>

				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<i class="icon-user"></i> 
						<span class="user-info">
							<small>Welcome, </small>
							<?php echo display_name(); ?>
						</span>

						<i class="icon-caret-down"></i>
					</a>

					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
						<li>
							<a href="<?php echo site_url('user/logout');?>">
								<i class="icon-off"></i>
								Sign Out
							</a>
						</li>
					</ul>
				</li>
			</ul><!--/.ace-nav-->
		</div><!--/.container-fluid-->
	</div><!--/.navbar-inner-->
</div><!--/.navbar  -->
<div class="main-container container-fluid">
	<a class="menu-toggler" id="menu-toggler" href="#">
		<span class="menu-text"></span>
	</a>
	
	<div class="sidebar" id="sidebar">
		<div class="sidebar-shortcuts" id="sidebar-shortcuts">
			<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
				<button class="btn btn-small btn-success">
					<i class="icon-signal"></i>
				</button>

				<button class="btn btn-small btn-info">
					<i class="icon-pencil"></i>
				</button>

				<button class="btn btn-small btn-warning">
					<i class="icon-group"></i>
				</button>

				<button class="btn btn-small btn-danger">
					<i class="icon-cogs"></i>
				</button>
			</div>

			<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
				<span class="btn btn-success"></span>

				<span class="btn btn-info"></span>

				<span class="btn btn-warning"></span>

				<span class="btn btn-danger"></span>
			</div>
		</div><!--#sidebar-shortcuts-->

		<ul class="nav nav-list">
			<li>
				<a href="<?php echo site_url('admin'); ?>">
					<i class="icon-dashboard"></i>
					<span class="menu-text"> Dashboard </span>
				</a>
			</li>
			<?php if (has_role('admin')) { ?>
			<li>
				<a href="#" class="dropdown-toggle">
					<i class="icon-book "></i>
					<span class="menu-text"> Agences </span>

					<b class="arrow icon-angle-down"></b>
				</a>

				<ul class="submenu">
					<li>
						<a href="<?php echo site_url('agence/add'); ?>">
							<i class="icon-double-angle-right"></i>
							Create agence
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('admin/agence/list'); ?>">
							<i class="icon-double-angle-right"></i>
							List agence
						</a>
					</li>
					
				</ul>
			</li>
			<?php } ?>
			<li>
				<a href="#" class="dropdown-toggle">
					<i class="icon-building"></i>
					<span class="menu-text"> Immobiliers </span>

					<b class="arrow icon-angle-down"></b>
				</a>

				<ul class="submenu">
					<li>
						<a href="<?php echo site_url('admin/immobilier/add'); ?>">
							<i class="icon-double-angle-right"></i>
							Create immo
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('admin/immobilier/list'); ?>">
							<i class="icon-double-angle-right"></i>
							List immo
						</a>
					</li>
					
				</ul>
			</li>
            <?php if (has_role('admin')) { ?>
			<li>
				<a href="#" class="dropdown-toggle">
					<i class="icon-user"></i>
					<span class="menu-text"> Users </span>

					<b class="arrow icon-angle-down"></b>
				</a>

				<ul class="submenu">
					<li>
						<a href="<?php echo site_url('admin/user/add') ?>">
							<i class="icon-double-angle-right"></i>
							Create user
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('admin/user/list'); ?>">
							<i class="icon-double-angle-right"></i>
							List user
						</a>
					</li>
					
				</ul>
			</li>
            <?php } ?>
		</ul><!--/.nav-list-->

		<div class="sidebar-collapse" id="sidebar-collapse">
			<i class="icon-double-angle-left"></i>
		</div>
	</div><!--/.sidebar  -->
	
	<div class="main-content">
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home home-icon"></i>
					<a href="#">Home</a>
		
					<span class="divider">
						<i class="icon-angle-right arrow-icon"></i>
					</span>
				</li>
				<li class="active">Dashboard</li>
			</ul><!--.breadcrumb-->
		
			<div class="nav-search" id="nav-search">
				<form class="form-search" />
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="icon-search nav-search-icon"></i>
					</span>
				</form>
			</div><!--#nav-search-->
		</div>
		
		<div class="page-content">
			<?php echo $content; ?>				
		</div><!--/.page-content-->
	</div><!--/.main-content  -->
</div><!--/.main-container  -->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
	<i class="icon-double-angle-up icon-only bigger-110"></i>
</a>