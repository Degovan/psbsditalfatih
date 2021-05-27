<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
include "format_tanggal.php";
include "format_hari.php";
include "conf/koneksi.php";
    date_default_timezone_set('Asia/Jakarta');
    $date = date("l, d F Y");
	$query1 = mysqli_query($connect, "SELECT * FROM pendaftar_siswa WHERE nik = '$_POST[tid]'");
	$p = mysqli_fetch_array($query1);
$html = '
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center"><img src="images/icon.png" width="90px"></div>
<h4 align="center">PENERIMAAN CALON SISWA / SISWI BARU <?php echo date("Y"); ?><br>SEKOLAH DASAR ISLAM TERPADU - AL-FATIH<br>Jl. Kav. Rawageni, Ratu Jaya, Kec. Cipayung, Kota Depok. Jawa Barat, 16439.</h4>
<p align="center">____________________________________________________________________________________</p>
<div class="col-md-12">
	<h4 align="center"><b>BUKTI PENDAFTARAN</b><BR> CALON SISWA / SISWI BARU SEKOLAH DASAR ISLAM TERPADU - AL-FATIH</h4><br>
	<table class="table table-condensed">
		<tr>
			<td width="25">1.</td>
			<th width="200">Nomor Pendaftaran:</th>
			<td>'. $p['no_daftar'] . '</td>
		</tr>
		<tr>
			<td>2.</td>
			<th>NIK:</th>
			<td>'. $p['nik'] . '</td>
		</tr>
		<tr>
			<td>3.</td>
			<th>Nama Lengkap:</th>
			<td>'. $p['nama'] . '</td>
		</tr>
		<tr>
			<td>4.</td>
			<th>Nama Panggilan:</th>
			<td>'. $p['nama2'] . '</td>
		</tr>
		<tr>
			<td>5.</td>
			<th>Jenis Kelamin:</th>
			<td>'. $p['jk'] . '</td>
		</tr>
		<tr>
			<td>6.</td>
			<th>Alamat Lahir:</th>
			<td>'. $p['alamat'] . '</td>
		</tr>
		<tr>
			<td>7.</td>
			<th>Tempat, dan Tanggal Lahir:</th>
			<td>'. $p['tempat_lahir'] .', '. indonesian_date($p['tgl_lahir']) . '</td>
		</tr>
		<tr>
			<td>8.</td>
			<th>No. Akte Lahir:</th>
			<td>'. $p['akte_lahir'] . '</td>
		</tr>
		<tr>
			<td>9.</td>
			<th>Tinggi Badan:</th>
			<td>'. $p['tinggi'] .' CM</td>
		</tr>
		<tr>
			<td>10.</td>
			<th>Berat Badan</th>
			<td>'. $p['berat'] .' KG</td>
		</tr>
		<tr>
			<td>11.</td>
			<th>Anak Ke - </th>
			<td>'. $p['anak_ke'] .' Dari '. $p['jml_saudara'] .' Bersaudara</td>
		</tr>
		<tr>
			<td>12.</td>
			<th>Penyakit Bawaan</th>
			<td>'. $p['penyakit'] . '</td>
		</tr>
		<tr>
			<td>13.</td>
			<th>Status Sekolah:</th>
			<td>'. $p['status_sekolah'] . '</td>
		</tr>
		<tr>
			<td>14.</td>
			<th>(Jika Pindahan:) Nama Sekolah:</th>
			<td>'. $p['nama_sekolah'] . '</td>
		</tr>
		<tr>
			<td>15.</td>
			<th>(Jika Pindahan:) NIS Asal Sekolah:</th>
			<td>'. $p['nis_lama'] . '</td>
		</tr>
		<tr>
			<td>16.</td>
			<th>(Jika Pindahan:) Alamat Asal Sekolah</th>
			<td>'. $p['alamat_sekolah'] . '</td>
		</tr>
		<tr>
			<td>17.</td>
			<th>(Jika Pindahan:) Tanggal Pindah Sekolah:</th>
			<td>'. $p['tgl_pindah'] . '</td>
		</tr>
		<tr>
			<td>18.</td>
			<th>(Jika Pindahan:) Tingkat Kelas Sebelumnya:</th>
			<td>'. $p['tingkat_kelas'] . '</td>
		</tr>
		<tr>
			<td>19.</td>
			<th>(Jika Pindahan:) Alasan Mengapa Ingin Pindah:</th>
			<td>'. $p['alasan_pindah'] . '</td>
		</tr>
		<tr>
			<td>20.</td>
			<th>Nomor Kartu Keluarga:</th>
			<td>'. $p['nomor_kk'] . '</td>
		</tr>
		<tr>
			<td>21.</td>
			<th>Nama Ayah:</th>
			<td>'. $p['nama_ayah'] . '</td>
		</tr>
		<tr>
			<td>22.</td>
			<th>NIK Ayah:</th>
			<td>'. $p['nama_ayah'] . '</td>
		</tr>
		<tr>
			<td>23.</td>
			<th>Pendidikan Ayah:</th>
			<td>'. $p['pen_ayah'] . '</td>
		</tr>
		<tr>
			<td>24.</td>
			<th>Pekerjaan Ayah:</th>
			<td>'. $p['pek_ayah'] . '</td>
		</tr>
		<tr>
			<td>25.</td>
			<th>Jabatan Kerja Ayah:</th>
			<td>'. $p['jab_ayah'] . '</td>
		</tr>
		<tr>
			<td>26.</td>
			<th>Alamat Kantor Ayah:</th>
			<td>'. $p['alkan_ayah'] . '</td>
		</tr>
		<tr>
			<td>27.</td>
			<th>Penghasilan Ayah (Perbulan):</th>
			<td>'. $p['gaji_ayah'] . '</td>
		</tr>
		<tr>
			<td>28.</td>
			<th>Nomor Telepon Ayah:</th>
			<td>'. $p['telp_ayah'] . '</td>
		</tr>
		<tr>
			<td>29.</td>
			<th>Nama Ibu:</th>
			<td>'. $p['nama_ibu'] . '</td>
		</tr>
		<tr>
			<td>30.</td>
			<th>NIK Ibu:</th>
			<td>'. $p['nama_ibu'] . '</td>
		</tr>
		<tr>
			<td>31.</td>
			<th>Pendidikan Ibu:</th>
			<td>'. $p['pen_ibu'] . '</td>
		</tr>
		<tr>
			<td>32.</td>
			<th>Pekerjaan Ibu:</th>
			<td>'. $p['pek_ibu'] . '</td>
		</tr>
		<tr>
			<td>33.</td>
			<th>Jabatan Kerja Ibu:</th>
			<td>'. $p['jab_ibu'] . '</td>
		</tr>
		<tr>
			<td>34.</td>
			<th>Alamat Kantor Ibu:</th>
			<td>'. $p['alkan_ibu'] . '</td>
		</tr>
		<tr>
			<td>35.</td>
			<th>Penghasilan Ibu (Perbulan):</th>
			<td>'. $p['gaji_ibu'] . '</td>
		</tr>
		<tr>
			<td>36.</td>
			<th>Nomor Telepon Ibu:</th>
			<td>'. $p['telp_ibu'] . '</td>
		</tr>
		<tr>
			<td>37.</td>
			<th>Status Jarak Dari Rumah ke Sekolah:</th>
			<td>'. $p['jarak'] . '</td>
		</tr>
		<tr>
			<td>38.</td>
			<th>Status Rumah Hunian Sekarang:</th>
			<td>'. $p['status_rumah'] . '</td>
		</tr>
		<tr>
			<td>39.</td>
			<th>Tanggal Pendaftaran:</th>
			<td>'. $p['tgl_daftar'] . '</td>
		</tr>
		<tr>
			<td>40.</td>
			<th>Status Berkas-Berkas:</th>
			<td>'. $p['keterangan'] . '</td>
		</tr>
		<tr>
			<td></td>
            <td></td>
			<td>
            <br><br>
                <p>'.  indonesian_day($date) . '</p>
				Nama Pendaftar
            <br><br><br><br>
				'. $p['nama'] . '</td>
		</tr>
	</table>
	</div>
</body>
</html>
';
$dompdf->loadHtml($html);
$dompdf->render();
ob_end_clean();
$dompdf->stream('Formulir PSB '.$p['nama'].'_'.$p['nik'].'.pdf');
?>
