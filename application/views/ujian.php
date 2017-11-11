<?php
if ($param != null) {
    $soal = $this->model->getRecord(array('table' => 'v_soal', 'where' => array('id_soal' => $param)));
}
if ($param != null) {
    $siswa = $this->model->getRecord(array('table' => 'v_siswa', 'where' => array('nis' => $this->session->userdata('_ID'))));
}
?>
				<div>
				<form name="form1" method="post" action="?page=jawaban">
					<input type="hidden" name="id[]" value=<?php echo $id; ?>>
					<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
					<table width="457" border="0">
						<tr>
							<td width="17"><font color="#FFFFFF"><?php echo $urut=$urut+1; ?></font></td>
							<td width="430"><font color="#FFFFFF"><?php echo $soal->pertanyaan;?></font></td>
						</tr>
						<tr>
							<td height="21">&nbsp;</td>
							<td><input name="opsi_a-input" type="radio" value="A"> <font color="#FFFFFF"><?php echo $soal->opsi_a;?></font> </td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input name="opsi_b-input" type="radio" value="B"> <font color="#FFFFFF"><?php echo $soal->opsi_b;?></font> </td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input name="opsi_c-input" type="radio" value="C"> <font color="#FFFFFF"><?php echo $soal->opsi_c;?></font> </td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input name="opsi_d-input" type="radio" value="D"> <font color="#FFFFFF"><?php echo $soal->opsi_d;?></font> </td>
						</tr>
					</table>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
				</tr>
			</form>
			</div>