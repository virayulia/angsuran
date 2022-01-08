<?php
session_start();
$db = new mysqli('localhost', 'root','','angsuran');

if($db->connect_errno > 0){
	die('Koneksi gagal');
}
?>