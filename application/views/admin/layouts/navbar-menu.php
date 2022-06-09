<ul class="sidebar-menu" data-widget="tree">
	<li class="header">MAIN NAVIGATION</li>
	<li>
		<a href="<?= base_url() . 'admin/dashboard' ?>">
			<i class="fa fa-dashboard"></i> <span>Dashboard</span>
		</a>
	</li>
	<li>
		<a href="<?= base_url() . 'admin/user' ?>">
			<i class="fa fa-user"></i> <span>User</span>
		</a>
	</li>
	<li class="header">NEWS</li>
	<li class="treeview">
		<a href="#">
			<i class="fa fa-users"></i>
			<span>News Management</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li>
				<a href="<?= base_url() . 'admin/news/category' ?>">
					<i class="fa fa-puzzle-piece"></i>
					News Category
				</a>
			</li>
			<li>
				<a href="<?= base_url() . 'admin/news' ?>">
					<i class="fa fa-puzzle-piece"></i>
					News
				</a>
			</li>
		</ul>
	</li>
</ul>
