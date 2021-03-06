<?php
//cek session
if(empty($_SESSION['admin'])){
    $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
    header("Location: ./");
    die();
} else {

    if($_SESSION['admin'] != 1){
        echo '<script language="javascript">
                    window.alert("ERROR! Anda tidak memiliki hak akses untuk membuka halaman ini");
                    window.location.href="./logout.php";
                  </script>';
    } else {

        if(isset($_REQUEST['act'])){
            $act = $_REQUEST['act'];
            switch ($act) {
                case 'add':
                    include "tambah_surat_masuk.php";
                    break;
                case 'edit':
                    include "edit_surat_masuk.php";
                    break;
                case 'disp':
                    include "tambah_disposisi.php";
                    break;
                case 'print':
                    include "cetak_disposisi.php";
                    break;
                case 'del':
                    include "hapus_surat_masuk.php";
                    break;
            }
        } else {

            $query = mysqli_query($config, "SELECT surat_masuk FROM tbl_sett");
            list($surat_masuk) = mysqli_fetch_array($query);

            //pagging
            $limit = $surat_masuk;
            $pg = @$_GET['pg'];
            if(empty($pg)){
                $curr = 0;
                $pg = 1;
            } else {
                $curr = ($pg - 1) * $limit;
            }

            $status = "Selesai";
            if(isset($_GET['status']) && $_GET['status']=="Dalam proses")
            {
                $status = 'Dalam proses';
            }
            ?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <div class="z-depth-1">
                        <nav class="secondary-nav">
                            <div class="nav-wrapper blue-grey darken-1">
                                <div class="col m7">
                                    <ul class="left">
                                        <li class="waves-effect waves-light hide-on-small-only"><a href="?page=tsm" class="judul"> Rekap Laporan Selesai</a></li>

                                    </ul>
                                </div>
                                <div class="col m5 hide-on-med-and-down">
                                    <form method="get" action="">
                                        <div class="input-field round-in-box">
                                            <input id="search" type="search" name="cari" placeholder="Ketik dan tekan enter mencari data..." required>
                                            <label for="search"><i class="material-icons">search</i></label>
                                            <input type="hidden" name="page" value="lap" class="hidden">
                                            <input type="hidden" name="status" value="<?php echo $status; ?>" class="hidden">
                                            <button type="submit" class="hidden"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Secondary Nav END -->
            </div>
            <!-- Row END -->

            <?php
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
            ?>

            <!-- Row form Start -->

            <!-- Row form END -->
            <?php
            echo '
                        <div class="col m12" id="colres">
                            <table class="bordered" id="tbl">
                                <thead class="blue lighten-4" id="head">
                                    <tr>
                                        <th width="10%">No.</th>
                                        <th width="20%">Tanggal</th>
                                        <th width="14%">SKPD/UKPD</th>
                                        <th width="18%">Perihal</th>
                                        <th widht="10"> Tanggal TL</th>
                                        <th width="18%">Keterangan </th>
                                        <th width="18%">Sumber </th>
                                        <th width="10%">Status</th>
                                        <span class="right tooltipped" data-position="left" data-tooltip="Atur jumlah data yang ditampilkan"><a class="modal-trigger" href="#modal"><i class="material-icons" style="color: #333;">settings</i></a></span></th>

                                            <div id="modal" class="modal">
                                                <div class="modal-content white">
                                                    <h5>Jumlah data yang ditampilkan per halaman</h5>';
            $query = mysqli_query($config, "SELECT id_sett,surat_masuk FROM tbl_sett");
            list($id_sett,$surat_masuk) = mysqli_fetch_array($query);
            echo '
                                                    <div class="row">
                                                        <form method="post" action="">
                                                            <div class="input-field col s12">
                                                                <input type="hidden" value="'.$id_sett.'" name="id_sett">
                                                                <div class="input-field col s1" style="float: left;">
                                                                    <i class="material-icons prefix md-prefix">looks_one</i>
                                                                </div>
                                                                <div class="input-field col s11 right" style="margin: -5px 0 20px;">
                                                                    <select class="browser-default validate" name="surat_masuk" required>
                                                                        <option value="'.$surat_masuk.'">'.$surat_masuk.'</option>
                                                                        <option value="5">5</option>
                                                                        <option value="10">10</option>
                                                                        <option value="10">10</option>
                                                                        <option value="20">20</option>
                                                                        <option value="40">40</option>
                                                                        <option value="100">100</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer white">
                                                                    <button type="submit" class="modal-action waves-effect waves-green btn-flat" name="simpan">Simpan</button>';
            if(isset($_REQUEST['simpan'])){
                $id_sett = "1";
                $surat_masuk = $_REQUEST['surat_masuk'];
                $id_user = $_SESSION['id_user'];

                $query = mysqli_query($config, "UPDATE tbl_sett SET surat_masuk='$surat_masuk',id_user='$id_user' WHERE id_sett='$id_sett'");
                if($query == true){
                    header("Location: ./admin.php?page=tsm");
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

            $search = "";
            if(isset($_GET['cari']) )
            {
                $search = "AND perihal LIKE '%".$_GET['cari']."%'";
            }


            //script untuk menampilkan data
            $query = mysqli_query($config,  "SELECT * FROM tbl_disposisisurat 
                                             LEFT JOIN tbl_tl ON tbl_tl.id_disposisi = tbl_disposisisurat.id_disposisi 
                                             LEFT JOIN tbl_user ON tbl_disposisisurat.kepada = tbl_user.id_user 
                                             Where `status`='$status' $search ORDER by tbl_disposisisurat.id_disposisi DESC LIMIT $curr, $limit");
            $query1 = mysqli_query($config, "SELECT * FROM tbl_disposisitlp 
                                             LEFT JOIN tbl_tl_tlp ON tbl_tl_tlp.id_disposisitlp = tbl_disposisitlp.id_disposisitlp 
                                             LEFT JOIN tbl_user ON tbl_disposisitlp.kepada = tbl_user.id_user                                             
                                             Where `status`='$status' $search ORDER by tbl_disposisitlp.id_disposisitlp DESC LIMIT $curr, $limit");
            $query2 = mysqli_query($config, "SELECT * FROM tbl_disposisilain 
                                             LEFT JOIN tbl_tl_lain ON tbl_tl_lain.id_disposisilain = tbl_disposisilain.id_disposisilain 
                                             LEFT JOIN tbl_user ON tbl_disposisilain.kepada = tbl_user.id_user 
                                             Where `status`='$status' $search ORDER by tbl_disposisilain.id_disposisilain DESC LIMIT $curr, $limit");
            $no = 1;
            if(mysqli_num_rows($query) > 0 || mysqli_num_rows($query1) > 0 || mysqli_num_rows($query2) > 0){
                if(mysqli_num_rows($query) > 0)
                    while($row = mysqli_fetch_array($query)){
                        echo '
                                        <td>'.$no++. '</td>';

                        $y = substr($row['tgl_surat'],0,4);
                        $m = substr($row['tgl_surat'],5,2);
                        $d = substr($row['tgl_surat'],8,2);

                        $ytl = substr($row['tgl'],0,4);
                        $mtl = substr($row['tgl'],5,2);
                        $dtl = substr($row['tgl'],8,2);

                        echo'
                                        <td>'.$d." ".monthToIndonesia($m)." ".$y.'</td>';

                        echo '<td>'.$row['skpd_ukpd'].'<br/><hr/>'.$row['nama'].'</td>';

                        echo '  
                                        <td>'.substr($row['perihal'],0,200).'</td>';

                        echo'
                                        <td>'.$dtl." ".monthToIndonesia($mtl)." ".$ytl.'</td>
                                        <td>'.$row['keterangan'].'</td>
                                        <td>Surat</td>
                                        <td>'.$row['status'].'</td>
                                        ';

                        echo '
                                        </td>
                                    </tr>';
                    }

                if(mysqli_num_rows($query1) > 0)
                    while($row = mysqli_fetch_array($query1)){
                        echo '
                                        <td>'.$no++. '</td>';

                        $y = substr($row['tgl_telepon'],0,4);
                        $m = substr($row['tgl_telepon'],5,2);
                        $d = substr($row['tgl_telepon'],8,2);

                        $ytl = substr($row['tgl'],0,4);
                        $mtl = substr($row['tgl'],5,2);
                        $dtl = substr($row['tgl'],8,2);

                        echo'
                                        <td>'.$d." ".monthToIndonesia($m)." ".$y.'</td>';

                        echo '<td>'.$row['skpd_ukpd'].'<br/><hr/>'.$row['nama'].'</td>';

                        echo '  
                                        <td>'.substr($row['perihal'],0,200).'</td>';

                        echo'
                                        <td>'.$dtl." ".monthToIndonesia($mtl)." ".$ytl.'</td>
                                        <td>'.$row['keterangan'].'</td>
                                        <td>Telepon</td>
                                        <td>'.$row['status'].'</td>
                                        ';

                        echo '
                                        </td>
                                    </tr>';
                    }

                if(mysqli_num_rows($query2) > 0)
                    while($row = mysqli_fetch_array($query2)){
                        echo '
                                        <td>'.$no++. '</td>';

                        $y = substr($row['tgl_lain'],0,4);
                        $m = substr($row['tgl_lain'],5,2);
                        $d = substr($row['tgl_lain'],8,2);

                        $ytl = substr($row['tgl'],0,4);
                        $mtl = substr($row['tgl'],5,2);
                        $dtl = substr($row['tgl'],8,2);

                        echo'
                                        <td>'.$d." ".monthToIndonesia($m)." ".$y.'</td>';

                        echo '<td>'.$row['skpd_ukpd'].'<br/><hr/>'.$row['nama'].'</td>';

                        echo '  
                                        <td>'.substr($row['perihal'],0,200).'</td>';

                        echo'
                                        <td>'.$dtl." ".monthToIndonesia($mtl)." ".$ytl.'</td>
                                        <td>'.$row['keterangan'].'</td>
                                        <td>Lain-lain</td>
                                        <td>'.$row['status'].'</td>
                                        ';

                        echo '
                                        </td>
                                    </tr>';
                    }
            } else {
                echo '<tr><td colspan="5"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?page=tsm&act=add">Tambah data baru</a></u></p></center></td></tr>';
            }
            echo '</tbody></table>
                        </div>
                    </div>
                    <!-- Row form END -->';
        }
    }
}


?>
