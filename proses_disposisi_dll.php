<?php
include "include/config.php";

$skpd_ukpd = $_POST['skpd_ukpd'];
$tgl_lain = $_POST['tgl_lain'];
$perihal = $_POST['perihal'];
$kepada = $_POST['kepada'];
$keterangan = $_POST['keterangan'];




if (empty($skpd_ukpd)){
echo "<script>alert('SKPD/UKPD belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if(empty($tgl_lain)){
echo "<script>alert('Tanggal Surat belum diisi')</script>";
echo "<meta http-equiv='refresh' content='5 url=daftar.php'>";
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
$sql ="INSERT INTO tbl_disposisilain (skpd_ukpd, tgl_lain, perihal, kepada, keterangan, status) values ( '$skpd_ukpd', '$tgl_lain', '$perihal', '$kepada', '$keterangan', 'Dalam proses')";
$daftar = mysqli_query($config,$sql); 
if ($daftar){
echo "<script>alert('Berhasil Disposisi')</script>";
echo "<meta http-equiv='refresh' content='5 url=tambah_disposisi_lainlain.php'>";
}else{
echo "<script>alert('Gagal Disposisi')</script>";
echo "<meta http-equiv='refresh' content='5 url=tambah_disposisi_lainlain.php'>";
}
}

?>