<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
        } else ?>

         <FORM METHOD="post" NAME="daftar" action="proses_tl.php">

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">description</i> Tambah Tindak Lanjut  Surat</a></li>
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
            <?php 
            $where=$_SESSION['id_user'];
             $query = mysqli_query($config, "SELECT * FROM tbl_disposisisurat where kepada = $where ORDER by id_disposisi DESC "); 
            $row = mysqli_fetch_array($query);
            ?>

            <!-- Row form Start -->
            <div class="row jarak-form">

                <!-- Form START -->
                <form class="col s12" method="post" action="">

                    <!-- Row in form START -->
                    <div class="row">

                     <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="nama_staf" required>
                               
                            <label for="tujuan">Nama</label>
                        </div>
                         <div class="input-field col s6">
                           <label>Pengecekan dan perbaikan PC </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="pengecekan_perbaikan" required>
                                     <option value=""></option>
                                    <option value="Harddisk">Harddisk</option>
                                    <option value="Power Supplay">Power Supplay</option>
                                    <option value="VGA">VGA</option>
                                    <option value="Install OS">Install Os</option>
                                    <option value="Memory">Memory</option>
                                     <option value="Ethernet">Ethernet</option>
                                     <option value="Install Hardware">Install Hardware</option>
                                     <option value="Setting Printer">Setting Printer</option>
                                     <option value="Back Up Data">Back Up Data</option>
                                     <option value="Install Software">Install Software</option>
                                     <option value="Scanning Virus">Scanning Virus</option>
                                     <option value="Lain-lain">Lain-lain</option>

                                </select>
                            </div>
                            </div>
                             <div class="input-field col s6">
                            
                            <input id="tgl_surat" type="text" name="tgl" class="datepicker" required>
                              
                            <label for="tgl_surat">Tanggal Surat</label>
                        </div>

                           
                         <div class="input-field col s6">
                            <label>Pengecekan dan perbaikan Jaringan </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="p_perbaikanjaringan" required>
                                     <option value=""></option>
                                    <option value="Setting IP">Setting IP</option>
                                    <option value="Cek Koneksi">Cek Koneksi</option>
                                    <option value="Penarikan Kabel">Penarikan Kabel</option>
                                    <option value="Pasang Perangkat Jaringan">Pasang Perangkat Jaringan</option>
                                    <option value="Crimping">Crimping</option>
                                     <option value="Lain-lain">Lain-lain</option>
                                
                                </select>
                            </div>
                            </div>
                             <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="tlp" required>

                            <label for="tujuan">Telp/HP</label>
                        </div>
                        <div class="input-field col s6">
                           <label>Pengecekan perangkatJaringan </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="p_perangkatjaringan" required>
                                    <option value=""></option>
                                    <option value="Modem">Modem</option>
                                    <option value="Perangkat Wifi">Perangkat Wifi</option>
                                    <option value="Hub/Switch">Hub/Switch</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                
                                </select>
                            </div>
                            </div>

                    <div class="input-field col s6">
                            
                            <input type="text" class="validate" value="<?php echo $row['skpd_ukpd'];?>" readonly name="skpd_ukpd" required>
                               

                            <label for="tujuan">SKPD/UKPD</label>
                        </div>

                        <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="pemakaian_bphtik" required>

                            <label for="tujuan">Pemakaian Barang Pakai Habis TIK</label>
                        </div>


                        <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="ip_address" required>

                            <label for="tujuan">Ip Address</label>
                        </div>

                        <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="penjelasan_teknis" required>
                                
                            <label for="tujuan">Penjelasan Teknis</label>
                        </div>
                       </div>
                    </div>
                    <!-- Row in form END -->

                    <div class="row">
                        <div class="col 6"><input type="hidden" name="id_disposisi" value="<?php echo $_GET['id_surat'];?>">
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

