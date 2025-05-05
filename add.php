<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO tbl_pusing (nama, npm, prodi, email, alamat) 
              VALUES ('$nama', '$npm', '$prodi', '$email', '$alamat')";
    mysqli_query($conn, $query);

    header("Location: tampildata.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #FFC0CB;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            background-color: #DB7093;
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input[type="submit"] {
            background-color: #E9967A;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h2>Tambah Data Mahasiswa</h2>
<form method="POST">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>

    <label for="npm">NPM:</label>
    <input type="text" name="npm" id="npm" required>

    <label for="prodi">Prodi:</label>
    <input type="text" name="prodi" id="prodi" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" id="alamat" required></textarea>

    <input type="submit" value="Simpan">
</form>

</body>
</html>
add.php