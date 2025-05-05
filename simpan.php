<?php
// Ambil data dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

// Simulasi simpan data, nanti bisa diganti dengan query MySQL
// Contoh: simpan ke session, array, atau database

// Redirect ke tampilan setelah simpan
header("Location: tampil.php");
exit;
?>
simpan.php