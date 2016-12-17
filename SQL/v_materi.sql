SELECT 
	m.id_materi, m.kode_mapel, mp.nama_mapel, m.judul,
    m.isi, m.nip, g.nama, m.tgl_posting, m.publish
FROM materi m
JOIN guru g ON m.nip = g.nip
JOIN mata_pelajaran mp ON m.kode_mapel = mp.kode_mapel