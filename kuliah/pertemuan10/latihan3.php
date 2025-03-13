<?php
require 'function.php';

$mahasiswa = query("SELECT * FROM mahasiswa");




?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Daftar Mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="0">
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
                <td><a href="detail.php?id=<?= $mhs['id'] ?>">lihat detail</a>
            </tr>
        <?php endforeach; ?>


    </table>
</body>

</html>