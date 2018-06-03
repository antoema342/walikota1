<?php
include "include/config.php";
$nama_staf = $_POST['nama_staf'];
$tgl = $_POST['tgl'];
$skpd_ukpd = $_POST['skpd_ukpd'];
$where=$_POST['id_disposisitlp'];
$tlp = $_POST['tlp'];
$ip_address = $_POST['ip_address'];
$pengecekan_perbaikan = $_POST['pengecekan_perbaikan'];
$p_perbaikanjaringan = $_POST['p_perbaikanjaringan'];
$p_perangkatjaringan = $_POST['p_perangkatjaringan'];
$pemakaian_bphtik = $_POST['pemakaian_bphtik'];
$penjelasan_teknis = $_POST['penjelasan_teknis'];

if (empty($nama_staf)){
echo "<script>alert('Nama belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if(empty($tgl)){
echo "<script>alert('Tanggal belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else
if (empty($skpd_ukpd)){
echo "<script>alert('SKPD/UKPD belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if(empty($tlp)){
echo "<script>alert('Telepon belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($ip_address)){
echo "<script>alert('IP Address belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($pengecekan_perbaikan)){
echo "<script>alert('Pengecekan Perbaikan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($p_perbaikanjaringan)){
echo "<script>alert('Pengecekan Perbaikan Jaringan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($p_perangkatjaringan)){
echo "<script>alert('Pengecekan Perangkat Jaringan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($pemakaian_bphtik)){
echo "<script>alert('Pemakaian Bahan Pemakaian Habis TIK belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($penjelasan_teknis)){
echo "<script>alert('Penjelasan Teknis belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else{
$sql ="INSERT INTO tbl_tl_tlp (nama_staf, tgl, skpd_ukpd, tlp, ip_address, pengecekan_perbaikan, p_perbaikanjaringan, p_perangkatjaringan, pemakaian_bphtik, penjelasan_teknis,id_disposisitlp) values ('$nama_staf', '$tgl', '$skpd_ukpd', '$tlp', '$ip_address', '$pengecekan_perbaikan', '$p_perbaikanjaringan', '$p_perangkatjaringan', '$pemakaian_bphtik', '$penjelasan_teknis', '$where')";

$query = "UPDATE tbl_disposisitlp SET status='Selesai' WHERE id_disposisitlp=$where";

if ($config->query($query) === TRUE) {
    echo "<script>alert('Berhasil Tindak Lanjut')</script>";
echo "<meta http-equiv='refresh' content='1 url=tambah_tl_tlp.php'>";
} else {
    echo "Error updating record: " . $config->error;
}
$daftar = mysqli_query($config,$sql); 
if ($daftar){
echo "<script>alert('Berhasil Tindak Lanjut')</script>";
echo "<meta http-equiv='refresh' content='1 url=tambah_tl_tlp.php'>";
}else{
echo "<script>alert('Gagal Tindak Lanjut')</script>";
echo "<meta http-equiv='refresh' content='5 url=tambah_tl_tlp.php'>";
}
}

?>