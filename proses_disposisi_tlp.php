<?php
include "include/config.php";
$no_telepon = $_POST['no_telepon'];
$skpd_ukpd = $_POST['skpd_ukpd'];
$tgl_telepon = $_POST['tgl_telepon'];
$perihal = $_POST['perihal'];
$kepada = $_POST['kepada'];
$keterangan = $_POST['keterangan'];



if (empty($no_telepon)){
echo "<script>alert('Nomor Telepon belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else
if (empty($skpd_ukpd)){
echo "<script>alert('SKPD/UKPD belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if(empty($tgl_telepon)){
echo "<script>alert('Tanggal Telepon belum diisi')</script>";
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
$sql ="INSERT INTO tbl_disposisitlp (no_telepon, skpd_ukpd, tgl_telepon, perihal, kepada, keterangan, status) values ('$no_telepon', '$skpd_ukpd', '$tgl_telepon', '$perihal', '$kepada', '$keterangan', 'Dalam proses')";
$daftar = mysqli_query($config,$sql); 
if ($daftar){
echo "<script>alert('Berhasil Disposisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=tambah_diposisi_telepon.php'>";
}else{
echo "<script>alert('Gagal Disposisi')</script>";
echo "<meta http-equiv='refresh' content='5 url=tambah_diposisi_telepon.php'>";
}
}

?>