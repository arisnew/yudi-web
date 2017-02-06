SELECT
	so.id_soal, so.pertanyaan, so.opsi_a, so.opsi_b, so.opsi_c, so.opsi_d, so.jawaban, so.kode_mapel, mp.nama_mapel, so.nip, g.nama, so.tgl_posting
FROM soal so
JOIN mata_pelajaran mp ON so.kode_mapel = mp.kode_mapel 
JOIN guru g ON so.nip = g.nip

select `so`.`id_soal` AS `id_soal`,`so`.`pertanyaan` AS `pertanyaan`,`so`.`opsi_a` AS `opsi_a`,`so`.`opsi_b` AS `opsi_b`,`so`.`opsi_c` AS `opsi_c`,`so`.`opsi_d` AS `opsi_d`,`so`.`jawaban` AS `jawaban`,`so`.`kode_mapel` AS `kode_mapel`,`mp`.`nama_mapel` AS `nama_mapel`,`so`.`nip` AS `nip`,`g`.`nama` AS `nama`,`so`.`tgl_posting` AS `tgl_posting` from ((`elearning`.`soal` `so` join `elearning`.`mata_pelajaran` `mp` on((`so`.`kode_mapel` = `mp`.`kode_mapel`))) join `elearning`.`guru` `g` on((`so`.`nip` = `g`.`nip`)))