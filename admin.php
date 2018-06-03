<?php
    ob_start();
    //cek session
    session_start();

    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {
?>

<!doctype html>
<html lang="en">

<!-- Include Head START -->
<?php include('include/head.php'); ?>
<!-- Include Head END -->

<!-- Body START -->
<body class="bg">

<!-- Header START -->
<header>


<?php 
if($_SESSION['admin'] == 1)
        include('include/menu.php'); 
    if($_SESSION['admin'] == 2)
        include('include/menu_staff.php');
        if($_SESSION['admin'] == 3)
            include('include/menu_SKPD.php'); ?>


</header>

<main>

    <!-- container START -->
    <div class="container">

    <?php
        if(isset($_REQUEST['page'])){
            $page = $_REQUEST['page'];
            switch ($page) {
                case 'tsm':
                    include "monitoring_surat.php";
                    break;
                case 'mtt':
                    include "monitoring_telepon.php";
                    break;
                case 'mtl':
                    include "monitoring_lainlain.php";
                    break;
                case 'skpds':
                    include "skpd_surat.php";
                    break;
                case 'skpdtlp':
                    include "skpd_telepon.php";
                    break;
                case 'skpdl':
                    include "skpd_lain.php";
                    break;
                 case 'tsm_telepon':
                    include "tambah_diposisi_telepon.php";
                    break;
                case 'tsm_dll':
                    include "tambah_disposisi_lainlain.php";
                    break;
                case 'ctk':
                    include "cetak_disposisi.php";
                    break;
                case 'tsk':
                    include "transaksi_surat_keluar.php";
                    break;
                case 'asm':
                    include "agenda_surat_masuk.php";
                    break;
                case 'ask':
                    include "agenda_surat_keluar.php";
                    break;
                case 'ref':
                    include "referensi.php";
                    break;
                case 'sett':
                    include "pengaturan.php";
                    break;
                case 'pro':
                    include "profil.php";
                    break;
                case 'gsm':
                    include "galeri_sm.php";
                    break;
                case 'gsk':
                    include "galeri_sk.php";
                    break;
                case 'tsm1':
                    include "staff.php";
                    break;
                case 'tsm1telepon':
                    include "staff_telepon.php";
                    break;
                case 'tsm1dll':
                    include "staff_dll.php";
                    break;
                case 'tl':
                    include "tambah_TL.php";
                    break;
                case 'tl_tlp':
                    include "tambah_tl_tlp.php";
                    break;
                case 'tsm2':
                    include "skpd.php";
                    break;
                case 'tfile':
                    include "file.php";
                    break;
                case 'lap':
                    include "lap.php";
                    break;
                case 'laporan':
                    include "laporan.php";
                    break;
            }
        } else {
    ?>
        <!-- Row START -->
        <div class="row">

            <!-- Include Header Instansi START -->
            <?php include('include/header_instansi.php'); ?>
            <!-- Include Header Instansi END -->

            <!-- Welcome Message START -->
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <h4>Selamat Datang <?php echo $_SESSION['nama']; ?></h4>
                        <p class="description">Anda login sebagai
                        <?php
                            if($_SESSION['admin'] == 1){
                                echo "<strong>Kasi ITI</strong>.";
                            } elseif($_SESSION['admin'] == 2){
                                echo "<strong>Staff ITI</strong>. ";
                            } elseif($_SESSION['admin'] == 3){
                                echo "<strong>SKPD</strong>. ";
                            
                            }?></p>
                    </div>
                </div>
            </div>
            <!-- Welcome Message END -->

            <?php
                //menghitung jumlah surat masuk
                $count1 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_surat_masuk"));

                //menghitung jumlah surat masuk
                $count2 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_surat_keluar"));

                //menghitung jumlah surat masuk
                $count3 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_disposisi"));

                //menghitung jumlah klasifikasi
                $count4 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_klasifikasi"));

                //menghitung jumlah pengguna
                $count5 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_user"));
            ?>

            <!-- Info Statistic START -->
           
            <!-- Info Statistic START -->
        <?php
            }
        ?>

        </div>
        <!-- Row END -->
    <?php
        }
    ?>
    </div>
    <!-- container END -->

</main>
<!-- Main END -->

<!-- Include Footer START -->
<?php include('include/footer.php'); ?>
<!-- Include Footer END -->

</body>
<!-- Body END -->

</html>

<?php
    
?>
