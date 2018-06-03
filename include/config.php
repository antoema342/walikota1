<?php
    function monthToIndonesia($m){
        if($m == "01"){
            return "Januari";
        } elseif($m == "02"){
            return "Februari";
        } elseif($m == "03"){
            return "Maret";
        } elseif($m == "04"){
            return "April";
        } elseif($m == "05"){
            return "Mei";
        } elseif($m == "06"){
            return "Juni";
        } elseif($m == "07"){
            return "Juli";
        } elseif($m == "08"){
            return "Agustus";
        } elseif($m == "09"){
            return "September";
        } elseif($m == "10"){
            return "Oktober";
        } elseif($m == "11"){
            return "November";
        } elseif($m == "12"){
            return "Desember";
        }
    }

    $host = "localhost";  
    $username = "root";   
    $password = "";   
    $database = "walikota";    
    $config = mysqli_connect($host, $username, $password, $database);

    if(!$config){
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>