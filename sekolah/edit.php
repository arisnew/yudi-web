<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
</head>
<body bgcolor="#CCCCCC">
<h2>
<p align="center">EDIT DATA
<?php
	include('../koneksi.php');
	if(isset($_GET['nis'])){
		$nis		= $_GET['nis'];
		$query	= mysql_query('select * from siswa where nis = "'.$nis.'"');
		$data  	= mysql_fetch_array($query);
		$nama	= $data['nama'];
		$alamat	= $data['alamat'];
		$kelas	= $data['kelas'];
	} else{
	$nama = '';
	$alamat = '';
	$kelas = '';
	}
?>
</p></h2>
<form method="post" name="frm" action="aksi.php">
<table width="546" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td width="189" height="20"> </td>
    <td width="26"> </td>
    <td width="331"> </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">NIS</td>
    <td align="center" valign="top">:</td>
    <td valign="middle">
      <input type="text" name="nis" value="<?php echo $nis; ?>" readonly="readonly"> 
    </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Nama</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input type="text" name="nama" value="<?php echo $nama; ?>">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Alamat</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="alamat" type="text" size="50" value="<?php echo $alamat; ?>">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Kelas</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
		<input name="kelas" type="text" size="50" value="<?php echo $kelas; ?>">
    </label></td>
  </tr>
  <tr>
    <td height="42"> </td>
    <td> </td>
    <input type="hidden" name="edit" value="abc">
    <td><input type="submit" name="tedit" value="EDIT"></td>
  </tr>
</table>
</form>
</html>