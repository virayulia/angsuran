<!-- hapus peserta kelas-->
<?php

include('koneksi.php');
$id = $_GET['id'];
$sql = $db->query("DELETE from pembayaran where pembayaran_id='$id'");

header("Location: pembayaran_tampil.php");