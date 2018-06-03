<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
        } else 
        
echo '<table width="100%" border="1" cellspacing="1" cellpadding="1">
<tr>
<td>NIM</td>
<td>NAMA</td>
<td>KELAS</td>
<td>RUPIAH</td>

</tr>';

//Buat langsung querynya tanpa menggunakan inner join, dari skrip dibawah ini anda bisa menambahkan WHERE atau LIKE

$ambil =mysql_query("SELECT * FROM tbl_disposisisurat, tbl_disposisitlp, tbl_disposisilain ORDER BY id_disposisi ");

while($d=mysql_fetch_array($ambil)){

echo '<tr>
<td>'.$d['perihal'].'</td>
<td>'.$d['skpd_ukpd'].'</td>
<td>'.$d['keterangan'].'</td>
<td>'.$d['status'].'</td>

</tr>';

}

echo "</table>";

 ?>
