<?php
include "include/config.php";
//$status="Proses";
//$where="12";
$sql = "UPDATE tbl_disposisisurat SET status='Selesai' WHERE id_disposisi=12";

if ($config->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $config->error;
}
//$query=mysqli_query($config,"UPDATE tbl_disposisisurat SET status=$status where  id_disposisi=$where");
?>