<?php
include "include/config.php";
if (isset($_POST['update'])) {
$nama_staf = $_POST['nama_staf'];
$skpd_ukpd = $_POST['skpd_ukpd'];
$where=$_POST['id_disposisi'];
$tlp = $_POST['tlp'];
$ip_address = $_POST['ip_address'];
$pengecekan_perbaikan = $_POST['pengecekan_perbaikan'];
$p_perbaikanjaringan = $_POST['p_perbaikanjaringan'];
$p_perangkatjaringan = $_POST['p_perangkatjaringan'];
$pemakaian_bphtik = $_POST['pemakaian_bphtik'];
$penjelasan_teknis = $_POST['penjelasan_teknis'];

$sql = "UPDATE tbl_tl SET nama_staf='$nama_staf', skpd_ukpd='$skpd_ukpd', tlp='$tlp', ip_address='$ip_address', pengecekan_perbaikan='$pengecekan_perbaikan', p_perbaikanjaringan='$p_perbaikanjaringan', p_perangkatjaringan='$p_perangkatjaringan', pemakaian_bphtik='$pemakaian_bphtik', penjelasan_teknis='$penjelasan_teknis' where skpd_ukpd='$skpd_ukpd';";
$query = mysqli_query($config,$sql); 
if($query){
echo "Berhasil update data";  
header("location: edit_tlsurat.php");
}
else{
echo 'Gagal';
}
}
?>