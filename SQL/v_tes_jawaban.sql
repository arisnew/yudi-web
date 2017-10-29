SELECT
	j.id_jawaban, j.id_tes, j.id_soal,
    s.pertanyaan, s.opsi_a, s.opsi_b, s.opsi_c, s.opsi_d, s.jawaban, s.durasi,
    j.jawaban AS jawaban_siswa,
    j.status_jawaban
FROM tes_jawaban j
JOIN soal s ON j.id_soal = s.id_soal