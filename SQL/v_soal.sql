SELECT
	so.id_soal,
	so.pertanyaan,
	so.opsi_a,
	so.opsi_b,
	so.opsi_c,
	so.opsi_d,
	so.jawaban,
	so.id_materi,
	j.kode_mapel,
	j.nama_mapel,
	so.nip,
	g.nama,
	so.tgl_posting,
	so.durasi
FROM soal so
LEFT JOIN v_materi j ON so.id_materi = j.id_materi
LEFT JOIN guru g ON so.nip = g.nip