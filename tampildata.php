<?php
include("config.php");

$query = "SELECT id, nama, npm, prodi, email, alamat FROM tbl_pusing";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 30px;
            background: linear-gradient(to right, #f8b195, #f67280);
        }
        h2 {
            color: white;
            text-align: center;
        }
        a.button {
            background-color: #2980b9;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
            margin: 4px;
            display: inline-block;
            transition: background-color 0.3s;
        }
        a.button:hover {
            background-color: #1c5980;
        }
        a.button.delete {
            background-color: #c0392b;
        }
        a.button.delete:hover {
            background-color: #922b21;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #34495e;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .add-button {
            display: block;
            margin: 20px auto;
            text-align: center;
            width: 200px;
        }
    </style>
</head>
<body>

<h2>Daftar Mahasiswa</h2>

<div class="add-button">
    <a href="add.php" class="button">➕ Tambah Data</a>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Prodi</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama']}</td>
                <td>{$row['npm']}</td>
                <td>{$row['prodi']}</td>
                <td>{$row['email']}</td>
                <td>{$row['alamat']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}' class='button'>✏️ Edit</a>
                    <a href='delete.php?id={$row['id']}' class='button delete' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>🗑️ Hapus</a>
                </td>
            </tr>";
        $no++;
    }
    ?>
</table>

</body>
</html>
