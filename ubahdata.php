<?php
require("koneksi.php");

if (!isset($_GET["idMhs"])) {
    echo "<script>alert('ID Mahasiswa tidak ditemukan'); window.location.href='tampildata.php';</script>";
    exit;
}

$idMhs = (int)$_GET["idMhs"];

$query = "SELECT * FROM tbl_pusing WHERE idMhs = $idMhs";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan'); window.location.href='tampildata.php';</script>";
    exit;
}

// Form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm   = $_POST["npm"];
    $nama  = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];

    $update = "UPDATE tbl_pusing SET 
                npm='$npm', 
                nama='$nama', 
                prodi='$prodi', 
                email='$email', 
                alamat='$alamat' 
              WHERE idMhs=$idMhs";

    if (mysqli_query($koneksi, $update)) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='tampildata.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f3;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: white;
            max-width: 500px;
            margin: 30px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<h2>Ubah Data Mahasiswa</h2>
<form method="post">
    <label>NPM:</label>
    <input type="text" name="npm" value="<?= $data['npm']; ?>" required>

    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

    <label>Program Studi:</label>
    <input type="text" name="prodi" value="<?= $data['prodi']; ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $data['email']; ?>" required>

    <label>Alamat:</label>
    <textarea name="alamat" required><?= $data['alamat']; ?></textarea>

    <input type="submit" value="Simpan Perubahan">
</form>

</body>
</html>
ubahdata.php