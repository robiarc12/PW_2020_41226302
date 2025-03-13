<?php
require 'function.php';
$id = $_GET["id"];

$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id");



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>
        Detail mahasiswa
    </h3>
    <ul>
        <li><img src="img/<?= $mahasiswa['gambar'] ?>" alt="" srcset="" width="500"></li>
        <li>Nrp : <?= $mahasiswa['nrp'] ?></li>
        <li>Nama : <?= $mahasiswa['nama'] ?></li>
        <li>email : <?= $mahasiswa['email'] ?></li>
        <li>jurusan : <?= $mahasiswa['jurusan'] ?></li>
        <li><a href="">ubah</a> | <a href="">hapus</a></li>
    </ul>
</body>

</html>