<?php include "../lib/inc.session.php"; ?>
<?php
	include "../conf/koneksi.php";

    	mysqli_query($connect, "DELETE FROM pengguna WHERE nik = '$_GET[tid]'");

	echo "<script>alert('Data Telah Terhapus!');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=view-pendaftar'>";
?>
