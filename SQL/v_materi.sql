SELECT 
	m.id_materi, 
	m.id_jadwal, 
	j.kode_mapel, 
	j.nama_mapel, 
	j.kode_kelas, 
	j.nama_kelas, 
	m.judul,
    m.isi, 
    m.nip, 
    g.nama, 
    m.tgl_posting, 
    m.publish,
    (SELECT COUNT(s.id_soal) FROM soal s WHERE s.id_materi =  m.id_materi) AS jml_soal,
    (SELECT COALESCE(SUM(r.durasi), 0) FROM soal r WHERE r.id_materi =  m.id_materi) AS total_durasi
FROM materi m
LEFT JOIN guru g ON m.nip = g.nip
LEFT JOIN v_jadwal j ON m.id_jadwal = j.id_jadwal