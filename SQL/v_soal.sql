SELECT
	so.id_soal,
	so.pertanyaan,
	so.opsi_a,
	so.opsi_b,
	so.opsi_c,
	so.opsi_d,
	so.jawaban,
	so.id_jadwal,
	j.kode_mapel,
	j.nama_mapel,
	so.nip,
	g.nama,
	so.tgl_posting
FROM soal so
LEFT JOIN v_jadwal j ON so.id_jadwal = j.id_jadwal
LEFT JOIN guru g ON so.nip = g.nip