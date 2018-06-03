<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
        } else ?>

         <FORM METHOD="post" NAME="update" action="update_tltlp.php">

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">description</i> Edit Tindak Lanjut</a></li>
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
$where=$_GET['id_surat'];
$query = mysqli_query($config, "SELECT * FROM tbl_tl_tlp where id_disposisitlp = $where");
                                if(mysqli_num_rows($query) > 0){
                                    $no = 1;
                                    while($row = mysqli_fetch_array($query)){ ?>
            <!-- Row form Start -->
            <div class="row jarak-form">

                <!-- Form START -->
                <form class="col s12" method="post" action="#">

                    <!-- Row in form START -->
                    <div class="row">

                     <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="nama_staf" value="<?php echo $row['nama_staf'];?>" required>
                               
                            <label for="tujuan">Nama</label>
                        </div>

                        <div class="input-field col s6">
                            
                            <input id="tgl_surat" type="text" name="tgl" class="datepicker" value="<?php echo $row['tgl'];?>" required>
                              
                            <label for="tgl_surat">Tanggal Surat</label>
                        </div>

                    <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="skpd_ukpd" value="<?php echo $row['skpd_ukpd'];?>" readonly>
                               

                            <label for="tujuan">SKPD/UKPD</label>
                        </div>

                        <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="tlp" value="<?php echo $row['tlp'];?>" required>

                            <label for="tujuan">Telp/HP</label>
                        </div>

                        <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="ip_address" value="<?php echo $row['ip_address'];?>" required>

                            <label for="tujuan">Ip Address</label>
                        </div>


                       
                        <div class="input-field col s6">
                           <label>Pengecekan dan perbaikan PC </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="pengecekan_perbaikan"  required>
                                <option  <?php if($row['pengecekan_perbaikan']=='Harddisk') {echo "selected"; } ?> value="Harddisk" >Harddisk</option>
                                     
                                    <option <?php if($row['pengecekan_perbaikan']=='Power Supplay') {echo "selected"; } ?> value="Power Supplay">Power Supplay</option>
                                    <option <?php if($row['pengecekan_perbaikan']=='VGA') {echo "selected"; } ?> value="VGA">VGA</option>
                                    <option <?php if($row['pengecekan_perbaikan']=='Install OS') {echo "selected"; } ?> value="Install OS">Install Os</option>
                                    <option <?php if($row['pengecekan_perbaikan']=='Memory') {echo "selected"; } ?>  value="Memory">Memory</option>
                                     <option <?php if($row['pengecekan_perbaikan']=='Ethernet') {echo "selected"; } ?>  value="Ethernet">Ethernet</option>
                                     <option <?php if($row['pengecekan_perbaikan']=='Install Hardware') {echo "selected"; } ?>  value="Install Hardware">Install Hardware</option>
                                     <option <?php if($row['pengecekan_perbaikan']=='Setting Printer') {echo "selected"; } ?>  value="Setting Printer">Setting Printer</option>
                                     <option <?php if($row['pengecekan_perbaikan']=='Back Up Data') {echo "selected"; } ?>  value="Back Up Data">Back Up Data</option>
                                     <option <?php if($row['pengecekan_perbaikan']=='Install Software') {echo "selected"; } ?> value="Install Software">Install Software</option>
                                     <option <?php if($row['pengecekan_perbaikan']=='Scanning Virus') {echo "selected"; } ?> value="Scanning Virus">Scanning Virus</option>
                                     <option <?php if($row['pengecekan_perbaikan']=='Lain-lain') {echo "selected"; } ?> value="Lain-lain">Lain-lain</option>

                                </select>
                            </div>
                            </div>

                        <div class="input-field col s6">
                            <label>Pengecekan dan perbaikan Jaringan </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="p_perbaikanjaringan" value=<?php echo $row['p_perbaikanjaringan'];?> required>
                                     
                                    <option <?php if($row['p_perbaikanjaringan']=='Setting IP') {echo "selected"; } ?> value="Setting IP">Setting IP</option>
                                    <option <?php if($row['p_perbaikanjaringan']=='Cek Koneksi') {echo "selected"; } ?> value="Cek Koneksi">Cek Koneksi</option>
                                    <option <?php if($row['p_perbaikanjaringan']=='Penarikan Kabel') {echo "selected"; } ?> value="Penarikan Kabel">Penarikan Kabel</option>
                                    <option <?php if($row['p_perbaikanjaringan']=='Pasang Perangkat Jaringan') {echo "selected"; } ?> value="Pasang Perangkat Jaringan">Pasang Perangkat Jaringan</option>
                                    <option <?php if($row['p_perbaikanjaringan']=='Crimping') {echo "selected"; } ?> value="Crimping">Crimping</option>
                                     <option <?php if($row['p_perbaikanjaringan']=='Lain-lain') {echo "selected"; } ?> value="Lain-lain">Lain-lain</option>
                                
                                </select>
                            </div>
                            </div>

                            <div class="input-field col s6">
                           <label>Pengecekan perangkatJaringan </label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="p_perangkatjaringan" v required>
                               
                                    <option  <?php if($row['p_perangkatjaringan']=='Modem') {echo "selected"; } ?> value="Modem" >Modem</option>
                                    <option <?php if($row['p_perangkatjaringan']=='Perangkatan Wifi') {echo "selected"; } ?> value="Perangkat Wifi">Perangkat Wifi</option>
                                    <option <?php if($row['p_perangkatjaringan']=='Hub/Switch') {echo "selected"; } ?> value="Hub/Switch">Hub/Switch</option>
                                    <option <?php if($row['p_perangkatjaringan']=='Lain-lain') {echo "selected"; } ?> value="Lain-lain">Lain-lain</option>';

                                
                                </select>
                            </div>
                            </div>
                            <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="pemakaian_bphtik" value="<?php echo $row['pemakaian_bphtik'];?>" required>

                            <label for="tujuan">Pemakaian Barang Pakai Habis TIK</label>
                        </div>
                        <div class="input-field col s6">
                            
                            <input type="text" class="validate" name="penjelasan_teknis" value="<?php echo $row['penjelasan_teknis'];?>" required>
                                
                            <label for="tujuan">Penjelasan Teknis</label>
                        </div>
                       </div>
                    </div>
                    <!-- Row in form END -->

                    <div class="row">
                        <div class="col 6"><input type="hidden">
                            <button type="submit" name ="update" class="btn-large blue waves-effect waves-light">UPDATE <i class="material-icons">done</i></button>
                        </div>
                        <div class="col 6">
                            <button type="reset" onclick="window.history.back();" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></button>
                        </div>
                    </div>

                </form>
                <!-- Form END -->

            </div>
            <!-- Row form END -->
            <?php } } ?>

