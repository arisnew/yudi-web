SELECT  `ko`.`id_komentar` AS `id_komentar`,
		`ko`.`id_materi` AS `id_materi`,
		`m`.`judul` AS `judul`,
		`ko`.`komentator` AS `komentator`,
		`ko`.`level_komentator` AS `level_komentator`,
		`ko`.`isi` AS `isi`,
		`ko`.`tgl_post` AS `tgl_post` 
FROM    (`elearning`.`komentar` `ko` 
JOIN    `elearning`.`materi` `m` 
ON((	`ko`.`id_materi` = `m`.`id_materi`)))

select `ko`.`id_komentar` AS `id_komentar`,`ko`.`id_materi` AS `id_materi`,`m`.`judul` AS `judul`,`ko`.`komentator` AS `komentator`,`ko`.`level_komentator` AS `level_komentator`,`ko`.`isi` AS `isi`,`ko`.`tgl_post` AS `tgl_post` from (`elearning`.`komentar` `ko` join `elearning`.`materi` `m` on((`ko`.`id_materi` = `m`.`id_materi`)))


SELECT
	ko.id_komentar, ko.id_materi, m.judul, ko.komentator, ko.level_komentator, ko.isi, ko.tgl_post
FROM komentar ko
JOIN materi m ON ko.id_materi = m.id_materi