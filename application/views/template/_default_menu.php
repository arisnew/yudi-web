<li class="treeview">
	<a href="<?php echo base_url();?>">
		<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?php echo base_url();?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li><a href="#" onclick="loadContent(base_url + 'view/_table_user')"><i class="fa fa-user"></i> User</a></li>
		<li><a href="#" onclick="loadContent(base_url + 'view/_table_guru')"><i class="fa fa-user-secret"></i> Guru</a></li>
		<li><a href="#" onclick="loadContent(base_url + 'view/_siswa_form')"><i class="fa fa-users"></i> Siswa</a></li>

	</ul>
</li>