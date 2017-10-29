SELECT 
	t.id_tes, t.nis,
    s.nama AS nama_siswa, s.nama_kelas,
    t.id_materi,
    m.kode_mapel, m.nama_mapel, m.judul, m.nip, m.nama,
    m.jml_soal, m.total_durasi, m.tgl_posting,
    t.tgl_tes, t.status_tes
FROM tes t 
JOIN v_materi m ON t.id_materi = m.id_materi
JOIN v_siswa s ON t.nis = s.nis