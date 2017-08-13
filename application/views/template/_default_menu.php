<li class="active"><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li><a href="#" onclick="loadContent(base_url + 'view/_table_user')"><i class="fa fa-user"></i> User</a></li>
		<li><a href="#" onclick="loadContent(base_url + 'view/_table_guru')"><i class="fa fa-user-secret"></i> Guru</a></li>
		<li><a href="#" onclick="loadContent(base_url + 'view/_table_siswa')"><i class="fa fa-users"></i> Siswa</a></li>
		<li><a href="#" onclick="loadContent(base_url + 'view/_table_kelas')"><i class="fa fa-institution"></i> Kelas</a></li>
		<li><a href="#" onclick="loadContent(base_url + 'view/_table_jurusan')"><i class="fa fa-user-secret"></i> Jurusan</a></li>
		<li><a href="#" onclick="loadContent(base_url + 'view/_table_mata_pelajaran')"><i class="fa fa-user-secret"></i> Mata Pelajaran</a></li>
	</ul>
</li>
<li>
	<a href="#" onclick="loadContent(base_url + 'view/_table_jadwal')">
		<i class="fa fa-calendar"></i> <span>Jadwal</span>
	</a>
</li>
<li>
	<a href="#" onclick="loadContent(base_url + 'view/_table_materi')">
		<i class="fa fa-book"></i> <span>Materi</span>
	</a>
</li>
<li>
	<a href="#" onclick="loadContent(base_url + 'view/_table_soal')">
		<i class="fa fa-file-text"></i> <span> Soal</span>
	</a>
</li>
<li>
	<a href="#" onclick="loadContent(base_url + 'view/_table_nilai_ujian')">
		<i class="fa fa-calculator"></i> <span> Nilai Ujian</span>
	</a>
</li>
<li>
	<a href="#" onclick="loadContent(base_url + 'view/_table_lampiran')">
		<i class="fa fa-file-o"></i> <span>lampiran</span>
	</a>
</li>
<li>
	<a href="#" onclick="loadContent(base_url + 'view/_table_komentar')">
		<i class="fa fa-comments"></i> <span>Komentar</span>
	</a>
</li>
<li>
	<a href="#" onclick="loadContent(base_url + 'view/_table_pesan')">
		<i class="fa fa-comment-o"></i> <span>pesan</span>
	</a>
</li>