<?php
require_once '../../../dompdf/autoload.inc.php';
include "../../../format_tanggal.php";
include "./cetak_siswa_helper.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
// Get no_daftar from GET
$no_daftar = mysqli_real_escape_string($connect, $_GET['no_daftar']);
$siswa = get_siswa($no_daftar);
// If data siswa doesn't exist, redirect the page
if(!$siswa) {
	echo "
	<script>
		alert('Maaf, data siswa tidak ditemukan');
		document.location.href = '/psbs/admin-panel/media.php?page=siswa-terverifikasi';
	</script>
	"; die;
}

$pendaftaran = get_pendaftaran(intval($siswa['id_daftar']));

$html = '

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-9">
		<div align="center"><img src="../../../images/icon.png" width="90px"></div>
	<h4 align="center">PENERIMAAN CALON SISWA / SISWI BARU <?php echo date("Y"); ?><br>SEKOLAH DASAR ISLAM TERPADU - AL-FATIH<br>Jl. Kav. Rawageni, Ratu Jaya, Kec. Cipayung, Kota Depok. Jawa Barat, 16439.</h4>
		</div>
	</div>
	<p align="center">======================================================================================</p>
	<p align="center"><b>LAPORAN PENDAFTARAN PENERIMAAN SISWA BARU (PSB)</b><br>SEKOLAH DASAR ISLAM TERPADU - AL-FATIH</p>

	<table class="table table-condensed">
		<tr>
			<th width="250px">Periode Pendaftaran</th>
			<td>'. $pendaftaran['periode'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Nama Siswa</th>
			<td>'. $siswa['nama'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Jenis Kelamin</th>
			<td>'. $siswa['jk'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Alamat</th>
			<td>'. $siswa['alamat'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tempat Lahir</th>
			<td>'. $siswa['tempat_lahir'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tanggal Lahir</th>
			<td>'. indonesian_date($siswa['tgl_lahir']) .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tinggi Badan</th>
			<td>'. $siswa['tinggi'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Berat Badan</th>
			<td>'. $siswa['berat'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Anak ke</th>
			<td>'. $siswa['anak_ke'] .' dari '. $siswa['jml_saudara'] .' saudara</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Penyakit</th>
			<td>'. $siswa['penyakit'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Jarak Rumah</th>
			<td>'. $siswa['jarak'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Status Rumah</th>
			<td>'. $siswa['status_rumah'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tanggal Daftar</th>
			<td>'. indonesian_date($siswa['tgl_daftar']) .'</td>
			<td></td>
		</tr>
	</table>
	<br/>
	<h4>Data Orang Tua</h4>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th>Nomor KK</th>
				<td>'. $siswa['nomor_kk'] .'</td>
			</tr>
			<tr>
				<th>Nama Ayah Kandung</th>
				<td>'. $siswa['nama_ayah'] .'</td>
			</tr>
			<tr>
				<th>NIK Ayah</th>
				<td>'. $siswa['nik_ayah'] .'</td>
			</tr>
			<tr>
				<th>Pendidikan Ayah</th>
				<td>'. $siswa['nik_ayah'] .'</td>
			</tr>
			<tr>
				<th>Pekerjaan Ayah</th>
				<td>'. $siswa['nik_ayah'] .'</td>
			</tr>
			<tr>
				<th>No Telp Ayah</th>
				<td>'. $siswa['telp_ayah'] .'</td>
			</tr>
			<tr>
				<th>Penghasilan Ayah Perbulan</th>
				<td>'. $siswa['gaji_ayah'] .'</td>
			</tr>
		</tbody>
	</table>
	<br/>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th>Nomor KK</th>
				<td>'. $siswa['nomor_kk'] .'</td>
			</tr>
			<tr>
				<th>Nama Ibu Kandung</th>
				<td>'. $siswa['nama_ibu'] .'</td>
			</tr>
			<tr>
				<th>NIK Ibu</th>
				<td>'. $siswa['nik_ibu'] .'</td>
			</tr>
			<tr>
				<th>Pendidikan Ibu</th>
				<td>'. $siswa['nik_ibu'] .'</td>
			</tr>
			<tr>
				<th>Pekerjaan Ibu</th>
				<td>'. $siswa['nik_ibu'] .'</td>
			</tr>
			<tr>
				<th>No Telp Ibu</th>
				<td>'. $siswa['telp_ibu'] .'</td>
			</tr>
			<tr>
				<th>Penghasilan Ibu Perbulan</th>
				<td>'. $siswa['gaji_ibu'] .'</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
';

$dompdf->loadHtml($html);


/* Render the HTML as PDF */

$dompdf->render();

ob_end_clean();

/* Output the generated PDF to Browser */

$dompdf->stream('Laporan Siswa PSB_'.$siswa['no_daftar'].'.pdf');

?>
