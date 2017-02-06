SELECT `ja`.`id_jadwal`    AS `id_jadwal`,
       `ja`.`kode_mapel`   AS `kode_mapel`,
       `mp`.`nama_mapel`   AS `nama_mapel`,
       `ja`.`nip`          AS `nip`,
       `g`.`nama`          AS `nama`,
       `ja`.`kode_kelas`   AS `kode_kelas`,
       `ke`.`nama_kelas`   AS `nama_kelas`,
       `ja`.`kode_jurusan` AS `kode_jurusan`,
       `ju`.`nama_jurusan` AS `nama_jurusan`,
       `ja`.`hari`         AS `hari`,
       `ja`.`status`       AS `status`,
       `ja`.`jam`          AS `jam`
FROM   ((((`elearning`.`jadwal` `ja`
JOIN `elearning`.`mata_pelajaran` `mp`
ON(( `ja`.`kode_mapel` = `mp`.`kode_mapel` )))
JOIN `elearning`.`guru` `g`
ON(( `ja`.`nip` = `g`.`nip` )))
JOIN `elearning`.`kelas` `ke`
ON(( `ja`.`kode_kelas` = `ke`.`kode_kelas` )))
JOIN `elearning`.`jurusan` `ju`
ON(( `ja`.`kode_jurusan` = `ju`.`kode_jurusan` )))  


SELECT `nu`.`id_nilai`      AS `id_nilai`,
       `nu`.`nis`           AS `nis`,
       `si`.`nama`          AS `nama`,
       `nu`.`jumlah_benar`  AS `jumlah_benar`,
       `nu`.`jumlah_salah`  AS `jumlah_salah`,
       `nu`.`tgl_ujian`     AS `tgl_ujian`,
       `nu`.`kode_mapel`    AS `kode_mapel`,
       `mp`.`nama_mapel`    AS `nama_mapel`,
       `nu`.`nilai`         AS `nilai`
FROM   ((`elearning`.`nilai_ujian` `nu`
JOIN   `elearning`.`siswa` `si` 
ON((   `nu`.`nis` = `si`.`nis`)))
JOIN   `elearning`.`mata_pelajaran` `mp`
ON((   `nu`.`kode_mapel` = `mp`.`kode_mapel`)))