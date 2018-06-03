<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['act'])){
            $act = $_REQUEST['act'];
            switch ($act) {
                case 'print':
                    include "tambah_klasifikasi.php";
                    break;
                case 'edit':
                    include "edit_klasifikasi.php";
                    break;
                case 'del':
                    include "hapus_klasifikasi.php";
                    break;
                case 'imp':
                    include "upload_referensi.php";
                    break;
            }
        } else {

            $query = mysqli_query($config, "SELECT referensi FROM tbl_sett");
            list($referensi) = mysqli_fetch_array($query);

            //pagging
            $limit = $referensi;
            $pg = @$_GET['pg'];
                if(empty($pg)){
                    $curr = 0;
                    $pg = 1;
                } else {
                    $curr = ($pg - 1) * $limit;
                }

                echo '<!-- Row Start -->
                <div class="row">
                    <!-- Secondary Nav START -->
                    <div class="col s12">
                        <div class="z-depth-1">
                            <nav class="secondary-nav">
                                <div class="nav-wrapper blue-grey darken-1">
                                    <div class="col m7">
                                        <ul class="left">
                                            <li class="waves-effect waves-light hide-on-small-only"><a href="?page=ref" class="judul"><i class="material-icons">class</i> Rekap Laporan</a></li>';
                                            
                                            } echo '
                                        </ul>
                                    </div>
                                    <div class="col m5 hide-on-med-and-down">
                                        <form method="post" action="?page=ref">
                                            <div class="input-field round-in-box">
                                                <input id="search" type="search" name="cari" placeholder="Ketik dan tekan enter mencari data..." required>
                                                <label for="search"><i class="material-icons">search</i></label>
                                                <input type="submit" name="submit" class="hidden">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- Secondary Nav END -->
                </div>
                <!-- Row END -->';

                if(isset($_SESSION['succAdd'])){
                    $succAdd = $_SESSION['succAdd'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card green lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succAdd.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['succAdd']);
                }
                if(isset($_SESSION['succEdit'])){
                    $succEdit = $_SESSION['succEdit'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card green lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succEdit.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['succEdit']);
                }
                if(isset($_SESSION['succDel'])){
                    $succDel = $_SESSION['succDel'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card green lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succDel.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['succDel']);
                }
                if(isset($_SESSION['succUpload'])){
                    $succUpload = $_SESSION['succUpload'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card green lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succUpload.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['succUpload']);
                }

                echo '
                <!-- Row form Start -->
                <div class="row jarak-form">';

                if(isset($_REQUEST['submit'])){
                $cari = mysqli_real_escape_string($config, $_REQUEST['cari']);
                    echo '
                    <div class="col s12" style="margin-top: -18px;">
                        <div class="card blue lighten-5">
                            <div class="card-content">
                                <p class="description">Hasil pencarian untuk kata kunci <strong>"'.stripslashes($cari).'"</strong><span class="right"><a href="?page=ref"><i class="material-icons md-36" style="color: #333;">clear</i></a></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col m12" id="colres">
                        <table class="bordered" id="tbl">
                            <thead class="blue lighten-4" id="head">
                                <tr>
                                    <th width="10%">Kode</th>
                                    <th width="30%">Nama</th>
                                    <th width="42%">Uraian</th>
                                    <th width="18%">Tindakan <span class="right"><i class="material-icons" style="color: #333;">settings</i></span></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>';

                            //script untuk menampilkan data
                            $query = mysqli_query($config, "SELECT * FROM tbl_klasifikasi WHERE uraian LIKE '%$cari%' ORDER BY id_klasifikasi DESC LIMIT $curr, $limit");
                            if(mysqli_num_rows($query) > 0){
                                while($row = mysqli_fetch_array($query)){
                                    echo '
                                        <td>'.$row['kode'].'</td>
                                        <td>'.$row['nama'].'</td>
                                        <td>'.$row['uraian'].'</td>
                                        <td>';

                                        if($_SESSION['admin'] != 1 AND $_SESSION['admin'] != 2){
                                            echo '<a class="btn small blue-grey waves-effect waves-light"><i class="material-icons">error</i> NO ACTION</a>';
                                        } else {
                                          echo '<a class="btn small blue waves-effect waves-light" href="?page=ref&act=edit&id_klasifikasi='.$row['id_klasifikasi'].'">
                                                    <i class="material-icons">edit</i> EDIT</a>
                                                <a class="btn small deep-orange waves-effect waves-light" href="?page=ref&act=del&id_klasifikasi='.$row['id_klasifikasi'].'">
                                                    <i class="material-icons">delete</i> DEL</a>';
                                                
                                        } echo '
                                        </td>
                                    </tr>
                                </tbody>';
                                }
                            } else {
                                echo '<tr><td colspan="5"><center><p class="add">Tidak ada data yang ditemukan</p></center></td></tr>';
                            }
                          echo '</table><br/><br/>
                            </div>
                        </div>
                        <!-- Row form END -->';

                        $query = mysqli_query($config, "SELECT * FROM tbl_klasifikasi");
                        $cdata = mysqli_num_rows($query);
                        $cpg = ceil($cdata/$limit);

                        echo '<!-- Pagination START -->
                              <ul class="pagination">';

                        if($cdata > $limit ){

                            //first and previous pagging
                            if($pg > 1){
                                $prev = $pg - 1;
                                echo '<li><a href="?page=ref&pg=1"><i class="material-icons md-48">first_page</i></a></li>
                                      <li><a href="?page=ref&pg='.$prev.'"><i class="material-icons md-48">chevron_left</i></a></li>';
                            } else {
                                echo '<li class="disabled"><a href=""><i class="material-icons md-48">first_page</i></a></li>
                                      <li class="disabled"><a href=""><i class="material-icons md-48">chevron_left</i></a></li>';
                            }

                            //looping pagging
                            for($i=1; $i <= $cpg; $i++)
                            if($i != $pg){
                                echo '<li class="waves-effect waves-dark"><a href="?page=ref&pg='.$i.'"> '.$i.' </a></li>';
                            } else {
                                echo '<li class="active waves-effect waves-dark"><a href="?page=ref&pg='.$i.'"> '.$i.' </a></li>';
                            }

                            //last and next pagging
                            if($pg < $cpg){
                                $next = $pg + 1;
                                echo '<li><a href="?page=ref&pg='.$next.'"><i class="material-icons md-48">chevron_right</i></a></li>
                                      <li><a href="?page=ref&pg='.$cpg.'"><i class="material-icons md-48">last_page</i></a></li>';
                            } else {
                                echo '<li class="disabled"><a href=""><i class="material-icons md-48">chevron_right</i></a></li>
                                      <li class="disabled"><a href=""><i class="material-icons md-48">last_page</i></a></li>';
                            }
                                echo '
                                </ul>
                                <!-- Pagination END -->';
                        } else {
                            echo '';
                        }

                    } else {

                        echo '<div class="col m12" id="colres">
                                <table class="bordered" id="tbl">
                                    <thead class="blue lighten-4" id="head">
                                        <tr>
                                            <th width="10%">No.</th>
                                            <th width="30%">Keterangan<br/>Disposisi</th>
                                            <th width="24%">SKPD/UKPD<br/>Sumber</th>
                                            <th width="18%">No. Surat<br/>Tgl Disposisi</th>
                                            <th width="18%">Tindakan <span class="right tooltipped" data-position="left" data-tooltip="Atur jumlah data yang ditampilkan"><a class="modal-trigger" href="#modal"><i class="material-icons" style="color: #333;">settings</i></a></span></th>

                                                <div id="modal" class="modal">
                                                    <div class="modal-content white">
                                                        <h5>Jumlah data yang ditampilkan per halaman</h5>';
                                                        $query = mysqli_query($config, "SELECT id_sett,referensi FROM tbl_sett");
                                                        list($id_sett,$referensi) = mysqli_fetch_array($query);
                                                        echo '
                                                        <div class="row">
                                                            <form method="post" action="">
                                                                <div class="input-field col s12">
                                                                    <input type="hidden" value="'.$id_sett.'" name="id_sett">
                                                                    <div class="input-field col s1" style="float: left;">
                                                                        <i class="material-icons prefix md-prefix">looks_one</i>
                                                                    </div>
                                                                    <div class="input-field col s11 right" style="margin: -5px 0 20px;">
                                                                        <select class="browser-default validate" name="referensi" required>
                                                                            <option value="'.$referensi.'">'.$referensi.'</option>
                                                                            <option value="5">5</option>
                                                                            <option value="10">10</option>
                                                                            <option value="20">20</option>
                                                                            <option value="50">50</option>
                                                                            <option value="100">100</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="modal-footer white">
                                                                        <button type="submit" class="modal-action waves-effect waves-green btn-flat" name="simpan">Simpan</button>';
                                                                        if(isset($_REQUEST['simpan'])){
                                                                            $id_sett = "1";
                                                                            $referensi = $_REQUEST['referensi'];                                                                    $id_user = $_SESSION['id_user'];

                                                                            $query = mysqli_query($config, "UPDATE tbl_sett SET referensi='$referensi',id_user='$id_user' WHERE id_sett='$id_sett'");
                                                                            if($query == true){
                                                                                header("Location: ./admin.php?page=ref");
                                                                                die();
                                                                            }
                                                                        } echo '
                                                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Batal</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>';

                                    //script untuk menampilkan data
                                    $query = mysqli_query($config, "SELECT * FROM tbl_surat_masuk ORDER by id_surat DESC LIMIT $curr, $limit");
                                if(mysqli_num_rows($query) > 0){
                                    $no = 1;
                                    while($row = mysqli_fetch_array($query)){
                                      echo '
                                        <td>'.$row['no_agenda']. '</td>
                                        
                                        <td>'.$row['asal_surat'].'<br/><hr/>'.$row['sumber'].'</td>';
                                      

                                        $y = substr($row['tgl_surat'],0,4);
                                        $m = substr($row['tgl_surat'],5,2);
                                        $d = substr($row['tgl_surat'],8,2);

                                        if($m == "01"){
                                            $nm = "Januari";
                                        } elseif($m == "02"){
                                            $nm = "Februari";
                                        } elseif($m == "03"){
                                            $nm = "Maret";
                                        } elseif($m == "04"){
                                            $nm = "April";
                                        } elseif($m == "05"){
                                            $nm = "Mei";
                                        } elseif($m == "06"){
                                            $nm = "Juni";
                                        } elseif($m == "07"){
                                            $nm = "Juli";
                                        } elseif($m == "08"){
                                            $nm = "Agustus";
                                        } elseif($m == "09"){
                                            $nm = "September";
                                        } elseif($m == "10"){
                                            $nm = "Oktober";
                                        } elseif($m == "11"){
                                            $nm = "November";
                                        } elseif($m == "12"){
                                            $nm = "Desember";
                                        }
                                        echo '

                                        <td>'.$row['no_surat'].'<br/><hr/>'.$d." ".$nm." ".$y.'</td>
                                        <td>';

                                        if($_SESSION['id_user'] != $row['id_user'] AND $_SESSION['id_user'] != 1){
                                            echo '<a class="btn small yellow darken-3 waves-effect waves-light" href="?page=ctk&id_surat='.$row['id_surat'].'" target="_blank">
                                                <i class="material-icons">print</i> PRINT</a>';
                                        } else {
                                          echo '<a class="btn small yellow darken-3 waves-effect waves-light" href="?page=ctk&id_surat='.$row['id_surat'].'" target="_blank">
                                                <i class="material-icons">print</i> PRINT</a>
                                                <a class="btn small deep-orange waves-effect waves-light" href="?page=tsm&act=del&id_surat='.$row['id_surat'].'">
                                                <i class="material-icons">delete</i> DEL</a>
                                                <a class="btn small blue waves-effect waves-light" href="?page=tsm&act=edit&id_surat='.$row['id_surat'].'">
                                                <i class="material-icons">edit</i> EDIT</a>';
                                        } echo ' 
                                                  
                                        </td>
                                    </tr>
                                </tbody>';
                                }
                            } else {
                                echo '<tr><td colspan="5"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?page=tsm&act=add">Tambah data baru</a></u></p></center></td></tr>';
                            }
                          echo '</table>
                        </div>
                    </div>
                        <!-- Row form END -->';

                        $query = mysqli_query($config, "SELECT * FROM tbl_klasifikasi");
                        $cdata = mysqli_num_rows($query);
                        $cpg = ceil($cdata/$limit);

                        echo '<!-- Pagination START -->
                              <ul class="pagination">';

                        if($cdata > $limit ){

                            //first and previous pagging
                            if($pg > 1){
                                $prev = $pg - 1;
                                echo '<li><a href="?page=ref&pg=1"><i class="material-icons md-48">first_page</i></a></li>
                                      <li><a href="?page=ref&pg='.$prev.'"><i class="material-icons md-48">chevron_left</i></a></li>';
                            } else {
                                echo '<li class="disabled"><a href=""><i class="material-icons md-48">first_page</i></a></li>
                                      <li class="disabled"><a href=""><i class="material-icons md-48">chevron_left</i></a></li>';
                            }

                            //looping pagging
                            for($i=1; $i <= $cpg; $i++)
                                if($i != $pg){
                                    echo '<li class="waves-effect waves-dark"><a href="?page=ref&pg='.$i.'"> '.$i.' </a></li>';
                                } else {
                                    echo '<li class="active waves-effect waves-dark"><a href="?page=ref&pg='.$i.'"> '.$i.' </a></li>';
                                }

                            //last and next pagging
                            if($pg < $cpg){
                                $next = $pg + 1;
                                echo '<li><a href="?page=ref&pg='.$next.'"><i class="material-icons md-48">chevron_right</i></a></li>
                                      <li><a href="?page=ref&pg='.$cpg.'"><i class="material-icons md-48">last_page</i></a></li>';
                            } else {
                                echo '<li class="disabled"><a href=""><i class="material-icons md-48">chevron_right</i></a></li>
                                      <li class="disabled"><a href=""><i class="material-icons md-48">last_page</i></a></li>';
                            }
                            echo '
                            </ul>
                            <!-- Pagination END -->';
                    } else {
                        echo '';
                    }
            }
        }
    
?>
