SELECT ja.id_jadwal    AS id_jadwal,
       ja.kode_mapel   AS kode_mapel,
       mp.nama_mapel   AS nama_mapel,
       ja.nip          AS nip,
       g.nama          AS nama,
       ja.kode_kelas   AS kode_kelas,
       ke.nama_kelas   AS nama_kelas,
       ja.kode_jurusan AS kode_jurusan,
       ju.nama_jurusan AS nama_jurusan,
       ja.hari         AS hari,
       ja.status       AS status,
       ja.jam          AS jam
FROM  jadwal ja
       JOIN mata_pelajaran mp ON ja.kode_mapel = mp.kode_mapel
       JOIN guru g ON ja.nip = g.nip
       JOIN kelas ke ON ja.kode_kelas = ke.kode_kelas
       JOIN jurusan ju ON ja.kode_jurusan = ju.kode_jurusan  