SELECT  `l`.`id_lampiran`	AS `id_lampiran`,
		`l`.`id_materi` 	AS `id_materi`,
		`m`.`judul` 		AS `judul`,
		`l`.`nama_lampiran` AS `nama_lampiran`,
		`l`.`nama_file` 	AS `nama_file`
FROM    (`elearning`.`lampiran` `l` 
JOIN    `elearning`.`materi` `m` 
ON((	`l`.`id_materi` = `m`.`id_materi`)))
