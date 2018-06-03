
<nav class="blue-grey darken-1">
    <div class="nav-wrapper">
       
        <ul id="slide-out" class="side-nav" data-simplebar-direction="vertical">
            <li class="no-padding">
                <div class="logo-side center blue-grey darken-3">
                    <?php
                        $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
                        while($data = mysqli_fetch_array($query)){
                            if(!empty($data['logo'])){
                                echo '<img class="logoside" src="./upload/'.$data['logo'].'"/>';
                            } else {
                                echo '<img class="logoside" src="./asset/img/logo1.jpg"/>';
                            }
                            if(!empty($data['nama'])){
                                echo '<h5 class="smk-side">'.$data['nama'].'</h5>';
                            } else {
                                echo '<h5 class="smk-side">Kantor Walikota Administrasi Jakarta Barat</h5>';
                            }
                            if(!empty($data['alamat'])){
                                echo '<p class="description-side">'.$data['alamat'].'</p>';
                            } else {
                                echo '<p class="description-side">Jalan Raya Kembangan No.2, Kembangan Selatan, Kembangan, RT.2/RW.2, Kembangan Sel., Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610</p>';
                            }
                        }
                    ?>
                </div>
            </li>
            <li class="no-padding blue-grey darken-4">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">account_circle</i><?php echo $_SESSION['nama']; ?></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=pro">Profil</a></li>
                                <li><a href="?page=pro&sub=pass">Ubah Password</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="./"><i class="material-icons middle">dashboard</i> Beranda</a></li>
            <li class="no-padding">
            </li>
               
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">repeat</i> Disposisi</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#">Surat</a></li>
                                <li><a href="#">Telepon</a></li>
                                <li><a href="#">Lain-lain</a></li>
                            </ul>
                        </div>
                   </li>
                </ul>
                
            </li>
             <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">repeat</i> Monitoring</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#">Surat</a></li>
                                <li><a href="#">Telepon</a></li>
                                <li><a href="#">Lain-lain</a></li>
                            </ul>
                        </div>
                   </li>
                </ul>
                
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">repeat</i> Notulen Rapat</a>
                        <div class="collapsible-body">
                            
                        </div>
                    </li>
                </ul>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">assignment</i> Rekap Laporan</a>
                        <div class="collapsible-body">
                            
                        </div>
                    </li>
                </ul>
            </li>
            ?>
           
            </li>
        </ul>
        <!-- Menu on medium and small screen END -->

        <!-- Menu on large screen START -->
        <ul class="center hide-on-med-and-down" id="nv">
            <li><a href="./"><i class="material-icons"></i>&nbsp; Beranda</a></li>


            <?php
                if($_SESSION['admin'] == 1  ){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi">Disposisi <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=tsm&act=disp&id_surat=">Surat</a></li>
                    <li><a href="?page=tsm_telepon">Telepon</a></li>
                    <li><a href="?page=tsm_dll">Lain-lain</a></li>
                </ul>
                <?php               }
            ?>
            <?php
                if($_SESSION['admin'] == 1  ){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi">Monitoring<i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=tsm">Surat</a></li>
                    <li><a href="?page=mtt">Telepon</a></li>
                    <li><a href="?page=mtl">Lain-lain</a></li>
                </ul>
                <?php               }
            ?>
             <li><a href="#">Notulen Rapat</a></li>  
              <?php
                if($_SESSION['admin'] == 1  ){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi">Rekap Laporan<i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=lap">Selesai</a></li>
                    <li><a href="?page=lap&status=Dalam proses">Dalam Proses</a></li>
                    
                </ul>
                <?php               }
            ?>                   
            <li class="right" style="margin-right: 10px;"><a class="dropdown-button" href="#!" data-activates="logout"><i class="material-icons">account_circle</i> <?php echo $_SESSION['nama']; ?><i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='logout' class='dropdown-content'>
                    <li><a href="?page=pro">Profil</a></li>
                    <li><a href="?page=pro&sub=pass">Ubah Password</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
                </ul>
        </ul>
        
       
        <!-- Menu on large screen END -->
        <a href="#" data-activates="slide-out" class="button-collapse" id="menu"><i class="material-icons">menu</i></a>
    </div>
</nav>


