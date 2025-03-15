<?php
require 'function.php';

$mahasiswa = query("SELECT * FROM mahasiswa");



// var_dump($mahasiswa);
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <style>
        .table:hover {
            cursor: pointer;
        }

        .btn {
            margin: 20px 10px !important;
        }
    </style>
</head>

<body>
    <h3 style="font-style: italic;">Daftar Mahasiswa</h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>aksi</th>
        </tr>
        <?php
        $i = 1;
        foreach ($mahasiswa as $mhs): ?>

            <tr>
                <td><?= $i++ ?></td>
                <td><img src="img/<?= $mhs['gambar'] ?>" alt="" srcset="" width="100"></td>
                <td><?= $mhs['nama'] ?></td>
                <td><a href="detail.php?id=<?= $mhs['id'] ?>">Lihat Detail</a>
            </tr>
        <?php endforeach; ?>


    </table>

    <button type="button" class="btn btn-primary"><a href="tambah.php"
            style="color: white; padding: 20px; text-decoration: none;">Tambah Data
            Mahasiswa</a></button>

</body>

</html>