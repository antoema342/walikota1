<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {
        if(isset($_REQUEST['submit'])){

            $no_surat = $_REQUEST['no_surat'];
            $query = mysqli_query($config, "SELECT * FROM tbl_disposisisurat WHERE no_surat='$no_surat'");
            mysqli_fetch_array($query);

        
            //validasi form kosong
            if($_REQUEST['no_surat'] == "" || $_REQUEST['skpd_ukpd'] == "" || $_REQUEST['perihal'] == "" || $_REQUEST['keterangan'] == "" || $_REQUEST['tgl_surat'] == ""|| $_REQUEST['kepada'] == "" || $_REQUEST['status'] == "" || $_REQUEST['attachment'] == ""){
                $_SESSION['errEmpty'] = 'ERROR! Semua form wajib diisi';
                echo '<script language="javascript">window.history.back();</script>';
            } else {


                $no_surat = $_REQUEST['no_surat'];
                $skpd_ukpd = $_REQUEST['skpd_ukpd'];
                $tgl_surat = $_REQUEST['tgl_surat'];
                $perihal = $_REQUEST['perihal'];
                $attachment = $_REQUEST['attachment'];
                $kepada = $_SESSION['kepada'];
                $keterangan = $_SESSION['keterangan'];
                $status = $_SESSION['status'];

                //validasi input data
                if(!preg_match("/^[a-zA-Z0-9.,()\/ -]*$/", $no_surat)){
                    $_SESSION['no_surat'] = 'Form No Surat hanya boleh mengandung karakter huruf, angka, spasi, titik(.), koma(,) minus(-). kurung() dan garis miring(/)';
                    echo '<script language="javascript">window.history.back();</script>';
                } else {

                    if(!preg_match("/^[a-zA-Z0-9.,_()%&@\/\r\n -]*$/", $skpd_ukpd)){
                        $_SESSION['skpd_ukpd'] = 'Form SKPD/UKPD hanya boleh mengandung karakter huruf, angka, spasi, titik(.), koma(,), minus(-), garis miring(/), dan(&), underscore(_), kurung(), persen(%) dan at(@)';
                        echo '<script language="javascript">window.history.back();</script>';
                    } else {

                        if(!preg_match("/^[0-9 -]*$/", $tgl_surat)){
                            $_SESSION['tgl_surat'] = 'Form tanggal surat hanya boleh mengandung karakter huruf dan minus(-)<br/>';
                            echo '<script language="javascript">window.history.back();</script>';
                        } else {

                            if(!preg_match("/^[a-zA-Z0-9.,()%@\/ -]*$/", $perihal)){
                                $_SESSION['perihal'] = 'Form perihal hanya boleh mengandung karakter huruf, angka, spasi, titik(.), koma(,), minus(-) garis miring(/), dan kurung()';
                                echo '<script language="javascript">window.history.back();</script>';
                            } else {

                                if(!preg_match("/^[a-zA-Z0 ]*$/", $attachment)){
                                    $_SESSION['attachment'] = 'Form attachment hanya boleh mengandung karakter huruf dan spasi';
                                    echo '<script language="javascript">window.history.back();</script>';
                                } else {
                                    if(!preg_match("/^[a-zA-Z0 ]*$/", $kepada)){
                                    $_SESSION['kepada'] = 'Form kepada hanya boleh mengandung karakter huruf dan spasi';
                                    echo '<script language="javascript">window.history.back();</script>';
                                } else {
                                    if(!preg_match("/^[a-zA-Z0 ]*$/", $keterangan)){
                                    $_SESSION['keterangan'] = 'Form keterangan hanya boleh mengandung karakter huruf dan spasi';
                                    echo '<script language="javascript">window.history.back();</script>';
                                } else {
                                    if(!preg_match("/^[a-zA-Z0 ]*$/", $status)){
                                    $_SESSION['status'] = 'Form status hanya boleh mengandung karakter huruf dan spasi';
                                    echo '<script language="javascript">window.history.back();</script>';
                                } else {

                                    $query = mysqli_query($config, "INSERT INTO tbl_disposisisurat(no_surat,skpd_ukpd,tgl_surat,perihal,attachment,kepada,keterangan,status)
                                        VALUES('$no_surat','$skpd_ukpd','$tgl_surat','$perihal','$attachment','$kepada','$keterangan', '$status')");

                                    if($query == true){
                                        $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                        echo '<script language="javascript">
                                                window.location.href="./admin.php?page=tsm&act=disp&id_surat='.$id_surat.'";
                                              </script>';
                                    } else {
                                        $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                        echo '<script language="javascript">window.history.back();</script>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } {?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">description</i> Tambah Disposisi Surat</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Secondary Nav END -->
            </div>
            <!-- Row END -->

            <?php
                if(isset($_SESSION['errQ'])){
                    $errQ = $_SESSION['errQ'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card red lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title red-text"><i class="material-icons md-36">clear</i> '.$errQ.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['errQ']);
                }
                if(isset($_SESSION['errEmpty'])){
                    $errEmpty = $_SESSION['errEmpty'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card red lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title red-text"><i class="material-icons md-36">clear</i> '.$errEmpty.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['errEmpty']);
                }
            ?>

            <!-- Row form Start -->
            <div class="row jarak-form">

                <!-- Form START -->
                <form class="col s12" method="post" action="">

                    <!-- Row in form START -->
                    <div class="row">
                         <div class="input-field col s6">
                            
                            <input id="no_surat" type="text" class="validate" name="no_surat" required>
                                <?php
                                    if(isset($_SESSION['no_surat'])){
                                        $no_surat = $_SESSION['no_surat'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$no_surat.'</div>';
                                        unset($_SESSION['no_surat']);
                                    }
                                ?>

                            <label for="no_surat">No Surat</label>
                        </div>
                  

                      <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix"></i>
                            <input id="tgl_surat" type="text" name="tgl_surat" class="datepicker" required>
                                <?php
                                    if(isset($_SESSION['tgl_surat'])){
                                        $tgl_surat = $_SESSION['tgl_surat'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$tgl_surat.'</div>';
                                        unset($_SESSION['tgl_surat']);
                                    }
                                ?>
                            <label for="tgl_surat">Tanggal Surat</label>
                        </div>

                       
                        <div class="input-field col s6">
                           <label>SKPD/UKPD </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="skpd_ukpd" id="skpd_ukpd" required>
                                     <option value="PUSKESMAS">PUSKESMAS KEBON JERUK</option>
                                    <option value="KELURAHAN KEMBANGAN">KELURAHAN KEMBANGAN</option>
                                   

                                </select>
                            </div>
                            </div>

                        <div class="input-field col s6">
                            
                            <input id="perihal" type="text" class="validate" name="perihal" required>
                                <?php
                                    if(isset($_SESSION['perihal'])){
                                        $perihal = $_SESSION['perihal'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$perihal.'</div>';
                                        unset($_SESSION['perihal']);
                                    }
                                ?>

                            <label for="perihal">Perihal</label>

                        </div>

                         
                            
                        <div class="input-field col s6">
                            
                            <input id="keterangan" type="text" class="validate" name="keterangan" required>
                                <?php
                                    if(isset($_SESSION['keterangan'])){
                                        $tujuan = $_SESSION['keterangan'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$keterangan.'</div>';
                                        unset($_SESSION['keterangan']);
                                    }
                                ?>

                            <label for="keterangan">Keterangan</label>

                        </div>



                            <div class="input-field col s6">
                            <label>Disposisi</label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="kepada" id="kepada" required>
                                     <option value="Staf">Staf Iti 1</option>
                                    <option value="Staf">Staf Iti 2</option>
                                    <option value="Staf">Staf Iti 3</option>
                                    
                                    
                                </select>
                            </div>
                            </div>

                            <div class="input-field col s6">
                            <div class="file-field input-field tooltipped" data-position="top" data-tooltip="Jika tidak ada file/scan gambar surat, biarkan kosong">
                                <div class="btn light-green darken-1">
                                    <span>File</span>
                                    <input type="file" id="attachment" name="attachment">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload file/scan gambar surat masuk">
                                        <?php
                                            if(isset($_SESSION['errSize'])){
                                                $errSize = $_SESSION['errSize'];
                                                echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$errSize.'</div>';
                                                unset($_SESSION['errSize']);
                                            }
                                            if(isset($_SESSION['errFormat'])){
                                                $errFormat = $_SESSION['errFormat'];
                                                echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$errFormat.'</div>';
                                                unset($_SESSION['errFormat']);
                                            }
                                        ?>
                                    <small class="red-text">*Format file yang diperbolehkan *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal file 2 MB!</small>
                                </div>
                            </div>
                        </div>
                    </div>

                            <?php
                                if(isset($_SESSION['sifat'])){
                                    $sifat = $_SESSION['sifat'];
                                    echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$sifat.'</div>';
                                    unset($_SESSION['sifat']);
                                }
                            ?>
                        </div>
                    </div>
                    <!-- Row in form END -->



                    <div class="row">
                        <div class="col 6">
                            <button type="submit" name ="submit" class="btn-large blue waves-effect waves-light">SIMPAN <i class="material-icons">done</i></button>
                        </div>
                        <div class="col 6">
                            <button type="reset" onclick="window.history.back();" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></button>
                        </div>
                    </div>

                </form>
                <!-- Form END -->

            </div>
            <!-- Row form END -->

<?php
        }
    }
?>
<?php
}
?>