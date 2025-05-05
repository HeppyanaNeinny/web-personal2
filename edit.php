<?php
include("config.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tbl_pusing WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE tbl_pusing SET nama='$nama', npm='$npm', prodi='$prodi', email='$email', alamat='$alamat' 
              WHERE id=$id";
    mysqli_query($conn, $query);

    header("Location: tampildata.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ADD8E6;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>
<form method="POST">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
    NPM: <input type="text" name="npm" value="<?= $data['npm'] ?>" required>
    Prodi: <input type="text" name="prodi" value="<?= $data['prodi'] ?>" required>
    Email: <input type="email" name="email" value="<?= $data['email'] ?>" required>
    Alamat: <textarea name="alamat" required><?= $data['alamat'] ?></textarea>
    <input type="submit" value="Update">
</form>

</body>
</html>
