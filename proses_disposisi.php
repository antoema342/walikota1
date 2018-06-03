<?php
include "include/config.php";
$no_surat = $_POST['no_surat'];
$skpd_ukpd = $_POST['skpd_ukpd'];
$tgl_surat = $_POST['tgl_surat'];
$perihal = $_POST['perihal'];
$kepada = $_POST['kepada'];
$keterangan = $_POST['keterangan'];
$nama_foto = $_FILES['foto']['name'];
$tmp_file = $_FILES['foto']['tmp_name'];
$path =  $_SERVER['DOCUMENT_ROOT'].'/walikota/photo/'.$nama_foto;   //directory tidak mau terbaca
chown($path, 0755);


if (empty($no_surat)){
echo "<script>alert('Nama belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else
if (empty($skpd_ukpd)){
echo "<script>alert('SKPD/UKPD belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if(empty($tgl_surat)){
echo "<script>alert('Tanggal Surat belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($perihal)){
echo "<script>alert('Perihal belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($kepada)){
echo "<script>alert('Disposisi belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($keterangan)){
echo "<script>alert('Keterangan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else{
$sql ="INSERT INTO tbl_disposisisurat (no_surat, skpd_ukpd, tgl_surat, perihal, kepada, keterangan, foto, status) values ('$no_surat', '$skpd_ukpd', '$tgl_surat', '$perihal', '$kepada', '$keterangan', '$nama_foto', 'Dalam proses')";
$daftar = mysqli_query($config,$sql); 
move_uploaded_file($tmp_file, $path);
if ($daftar){
echo "<script>alert('Berhasil Disposisi')</script>";
echo "<meta http-equiv='refresh' content='5 url=tambah_disposisi.php'>";
}else{
echo "<script>alert('Gagal Disposisi')</script>";
echo "<meta http-equiv='refresh' content='5 url=tambah_disposisi.php'>";
}
}

?>