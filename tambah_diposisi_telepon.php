<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
        } else ?>

         <FORM METHOD="post" NAME="daftar" action="proses_disposisi_tlp.php">

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">description</i> Tambah Disposisi Telepon</a></li>
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
                            
                            <input type="text" class="validate" name="no_telepon" required>
                                
                            <label for="tujuan">No. Telepon</label>
                        </div>

                    <div class="input-field col s6">
                            
                            <input id="tgl_surat" type="text" name="tgl_telepon" class="datepicker" required>
                              
                            <label for="tgl_surat">Tanggal Telepon</label>
                        </div>

                        <div class="input-field col s6">
                            
                           <label>SKPD/UKPD </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="skpd_ukpd"  required>
                                     <option value="PUSKESMAS KEBON JERUK">PUSKESMAS KEBON JERUK</option>
                                    <option value="KELURAHAN KEMBANGAN">KELURAHAN KEMBANGAN</option>
                                   

                                </select>
                            </div>
                        </div>

                        <div class="input-field col s6">
                            
                             <input type="text" class="validate" name="perihal" required>
                               
                            <label for="perihal">Perihal</label>
                        </div>


                       
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="keterangan" required>

                            <label for="tujuan">Keterangan</label>
                            </div>
                        

                        <div class="input-field col s6">
                         <label>Disposisi </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="kepada"  required="required">
                                    <?php
                                    global $config;
                                    $get_userstaf = "select * from tbl_user where admin=2";
                                    $run_userstaf = mysqli_query ($config, $get_userstaf);
                                    while ($row_userstaf = mysqli_fetch_array($run_userstaf)){
                                    	$id_staf = $row_userstaf['id_user'];
                                    	$nama_staf = $row_userstaf['nama'];
                                    	echo "<option value = '$id_staf'> $nama_staf </option>";
                                    }
                                    ?>
                                    </select>
                                    </div>
                            </div>
                            </div>

                            </div>
                           
                       </div>
                    </div>
                    <!-- Row in form END -->

                    <div class="row">
                        <div class="col 6">
                            <button type="submit" name ="submit" class="btn-large blue waves-effect waves-light">KIRIM <i class="material-icons">done</i></button>
                        </div>
                        <div class="col 6">
                            <button type="reset" onclick="window.history.back();" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></button>
                        </div>
                    </div>
 
                </form>
                <!-- Form END -->

            </div>
            <!-- Row form END -->


