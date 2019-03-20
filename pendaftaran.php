<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>pendaftaran</title>
</head>

<body>
<table width="60%" align="center">
<tr>
<td height="300" bgcolor="#0000ff">
<h3>FORM PENDAFTARAN</h3>
<form action="" method="post">
<table border="0" width="90%" align="center">
<tr>
<td width="30%">id</td>
<td width="5%">:</td>
<td width="65%"><input type="text" name="id" maxlength="25"/></td>
</tr>
<tr>
<td width="20%">nama</td>
<td width="5%">:</td>
<td width="75%"><input type="text" name="nama" maxlength="15"/></td>
</tr>
<tr>
<td width="20%">Jenis Kelamin</td>
<td width="5%">:</td>
<td width="75%"><select name="jk"><option>Laki-laki</option><option>Perempuan</option></select></td>
</tr>
<tr>
<td width="30%">Tempat/Tanggal Lahir</td>
<td width="5%">:</td>
<td width="65%"><input type="text" name="tempat_lhr" maxlength="15"/><br/>
<input type="date" name="tanggal_lhr"/></td>
</tr>
<tr>
<td width="30%">Agama</td>
<td width="5%">:</td>
<td width="65%"><select name="agama">
<option> ISLAM </option>
<option>HINDU</option>
<option>BUDHA</option>
<option>KRISTEN</option>
<option>KONGHUCU</option>
<option>KHATOLIK</option>
	</select></td>
</tr>
<tr>
<td width="30%">Pilih Program Studi</td>
<td width="5%">:</td>
<td width="65%"><select name="pil_prodi"><option> Manajemen Informatika</option>
 <option>Teknik Komputer</option> 
 <option>Komputerisasi Akutansi</option>
 <option>Administrasi Bisnis</option> 
 <option>Manajemen Perusahaan </option>
 </select>                                                                                                                                                                
</tr>
<tr>
<td width="30%">Alamat</td>
<td width="5%">:</td>
<td width="65%"><input type="text" name="alamat" maxlength="30"/></td>
</tr>
<tr>
<td width="30%">Email</td>
<td width="5%">:</td>
<td width="65%"><input type="text" name="email" maxlength="30"/></td>
</tr>
<tr>
<td width="30%">No_hp</td>
<td width="5%">:</td>
<td width="65%"><input type="text" name="no_hp" maxlength="30"/></td>
</tr>
<tr>
<td width="30%"></td>
<td width="5%"></td>
<a href ="datadaftar.php"><td width="65%">
	<input type="submit" name="kirim" value="kirim"/></td></a>
</tr>
</table>
</form>
<br/><br/><br/></td>
</tr>
<tr>
<td><marquee>Jl.A.Yani No.03 Plaju Palembang</marquee></td></tr>
</table>
<?php
mysql_connect("localhost","root","") or die ("Nggak bisa koneksi");
mysql_select_db("pendaftaran");//sesuaikan dengan nama database anda
?> 

<?php
	if (isset($_POST['kirim']))
	{
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$jk=$_POST['jk'];
		$tempat_lhr=$_POST['tempat_lhr'];
		$tanggal_lhr=$_POST['tanggal_lhr'];
		$agama=$_POST['agama'];
		$pil_prodi=$_POST['pil_prodi'];
		$alamat=$_POST['alamat'];
		$email=$_POST['email'];
		$no_hp=$_POST['no_hp'];
		
		if(!$nama||!$jk||!$tempat_lhr)
			{
			echo"data tidak boleh kosong, isilah data dulu...!!!";
			}
		else
			{
			$sql=mysql_query("INSERT INTO calon_mahasiswa VALUES('$id','$nama','$jk','$tempat_lhr','$tanggal_lhr','$agama','$pil_prodi','$alamat','$email','$no_hp')") or die (mysql_error());
			if($sql)
			{
			echo"Data berhasil dikirim";
			echo"<meta http-equiv='Refresh'content='0;url=pendaftaran.php'>";
			

}else{
echo"data tidak tersimpan";
}}}			
?>		

</body>
</html>

<table width="90%"align="center">
      <tr bgcolor="#FF6699">
	     <th>no</th>
		 <th>ID</th>
		 <th>Nama</th>
		 <th>Jenis kelamin</th>
		 <th>Tempat/tanggal lahir</th>
		 <th>Agama</th>
		 <th>Pilih prodi</th>
		 <th>Alamat</th>
		 <th>Email</th>
		 <th>No Hp</th>
		 <th>opsi</th>
	   </tr>
	  <?php
	  $cari = mysql_query("select * from calon_mahasiswa");
	  $mulai = 0 ;	 
	  $no=$mulai+1; 
	  while ($hasil = mysql_fetch_array($cari)){
	  ?>
	    <tr bgcolor="#00FFFF">
		  <td align="center"><strong><?php echo $no++; ?></strong></td>
		  <td><?php echo $hasil["id"]; ?></td>
		  <td><?php echo $hasil["nama"]; ?></td>
		  <td><?php echo $hasil["jenis_kelamin"]; ?></td>
		  <td><?php echo $hasil["tempat_lhr"]; ?>, <?php echo $hasil["tanggal_lhr"]; ?></td>
		  <td><?php echo $hasil["agama"]; ?></td>
		  <td><?php echo $hasil["pil_prodi"]; ?></td>
		  <td><?php echo $hasil["alamat"]; ?></td> 
		  <td><?php echo $hasil["email"]; ?></td>
		  <td><?php echo $hasil["no_hp"]; ?></td>
		  <td align="center"><div align="center"><a href="hapusdaftar.php?id=<?php echo $hasil["id"];?>"> || <font color="#ff0000" title="delete">Delete</font></a> <a href="datadaftar.php" target="_blank">Cetak</a>
	 </tr>
	<?php } ?>
	</table>
</body>
</html>
