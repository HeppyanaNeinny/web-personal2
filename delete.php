<?php
include("config.php");

// Pastikan parameter 'id' dikirim dan merupakan angka
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Menghindari SQL Injection

    // Query hapus
    $query = "DELETE FROM tbl_pusing WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Jika berhasil, kembali ke tampildata.php
    if ($result) {
        header("Location: tampildata.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak valid.";
}
?>
