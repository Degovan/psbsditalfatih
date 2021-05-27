<?php
    include "header.php";
    include "conf/koneksi.php";
    include "lib/inc.session.php";
?>
<link rel="stylesheet" href="js/datatables/dataTables.bootstrap.css">
<div class="header inner_banner" id="home">
<div class="top-bar">
<div class="header-nav-agileits">
    <nav class="navbar navbar-default">
    <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    <h1><a class="navbar-brand" href="index.php"><img src="images/logo-panjang.png" width="200"></a></h1>
    </div>
<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
    <nav>
    <ul class="top_nav">
        <li><a href="pembayaran.html" class="active">Pembayaran</a></li>
        <li><a href="logout.php">Keluar</a></li>
    </ul>
    </nav>
</div>
    </nav>
</div>
</div>
</div>
<div class="banner_bottom">
<div class="banner_bottom_in">
    <h3 class="headerw3">Data Pembayaran Anda di SDIT Al-Fatih:</h3>
<hr>
    <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIK:</th>
            <th>Nama Pengguna:</th>
            <th>Status Bayar:</th>
            <th>Aksi:</th>
        </tr>
    </thead>
    <tbody>
<?php
    $sesi = $_SESSION['nik'];
    $sql = mysqli_query($connect, "SELECT * FROM pengguna WHERE nik = '$sesi'");
    $no = 1;
    while ($b = mysqli_fetch_array($sql)){
?>
    <tr>
        <td><?php echo $no; ?></td>
        <form action="bayartf.php?nik=<?php echo $b['nik']; ?>" method="post" enctype="multipart/form-data">
        <td><?php echo $b['nik'] ?></td>
        <td><?php echo $b['nama_pengguna'] ?></td>
        <td><?php echo $b['status_bayar'] ?></td>
        <td>
            <?php
            if ($b['status_bayar'] == "Sudah Membayar"){
                echo '<button class="btn btn-info"><i class="icon-list icon-white"> </i> Sudah Membayar</button>';
            }else if($b['status_bayar'] == "Menunggu Verifikasi"){
                echo '<button class="btn btn-warning"><i class="icon-remove icon-white"> </i> Menunggu Verifikasi</button>';
            }else if($b['status_bayar'] == "Belum Membayar"){
            ?>
                <button class="btn btn-danger"><i class="icon-remove icon-white"><input type="file" name="struk" required="required"></i> Bayar Sekarang!</button>
            <?php
            }else{
            ?>
                <button class="btn btn-danger"><i class="icon-remove icon-white"><input type="file" name="struk" required="required"></i> Pembayaran Belum Ada atau Telah Ditolak!</button>
            <?php } ?>
        </td>
        </form>
    </tr>
<?php $no++; } ?>
</tbody>
</table>
</div>
</div>
<div class="contact-footer-w3layouts-agile">
<br>
<?php include "media.php" ?>