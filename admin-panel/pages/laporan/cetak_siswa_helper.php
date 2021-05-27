<?php
include "../../../conf/koneksi.php";

function get_siswa($no_daftar) {
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM pendaftar_siswa WHERE no_daftar = '$no_daftar'");
    $result = mysqli_fetch_assoc($query);
    return $result;
}

function get_pendaftaran($id) {
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE id_pendaftaran = $id");
    $result = mysqli_fetch_assoc($query);
    return $result;
}
