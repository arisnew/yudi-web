SELECT `si`.`nis`           AS `nis`,
       `si`.`nama`          AS `nama`,
       `si`.`alamat`        AS `alamat`,
       `si`.`tempat_lahir`  AS `tempat_lahir`,
       `si`.`tgl_lahir`     AS `tgl_lahir`,
       `si`.`jenis_kelamin` AS `jenis_kelamin`,
       `si`.`agama`         AS `agama`,
       `si`.`thn_masuk`     AS `thn_masuk`,
       `si`.`email`         AS `email`,
       `si`.`no_telp`       AS `no_telp`,
       `si`.`foto`          AS `foto`,
       `si`.`username`      AS `username`,
       `si`.`password`      AS `password`,
       `si`.`level`         AS `level`,
       `si`.`kelas`         AS `kelas`,
       `ke`.`nama_kelas`    AS `nama_kelas`,
       `si`.`jurusan`       AS `jurusan`,
       `ju`.`nama_jurusan`  AS `nama_jurusan`,
       `si`.`status`        AS `status`
FROM   ((`elearning`.`siswa` `si`
         JOIN `elearning`.`kelas` `ke`
           ON(( `si`.`kelas` = `ke`.`kode_kelas` )))
        JOIN `elearning`.`jurusan` `ju`
          ON(( `si`.`jurusan` = `ju`.`kode_jurusan` ))) 