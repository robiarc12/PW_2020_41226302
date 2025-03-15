<?php
require 'function.php';
$id = $_GET["id"];

$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// var_dump($mahasiswa);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <style>
        .card {
            margin: auto;
            width: 500px !important;
            margin-bottom: 50px !important;

        }
    </style>
</head>

<body>
    <h3 class="mb-10 mt-10">
        Detail mahasiswa
    </h3>
    <!-- <ul>
        <li><img src="img/<?= $mahasiswa['gambar'] ?>" alt="" srcset="" width="500"></li>
        <li></li>
        <li>></li>
        <li>email : <?= $mahasiswa['email'] ?></li>
        <li>jurusan : <?= $mahasiswa['jurusan'] ?></li>
        <li><a href="">ubah</a> | <a href="">hapus</a></li>
    </ul> -->

    <div class="card mt-10 mb-100" style="width: 18rem;">
        <img src="img/<?= $mahasiswa['gambar'] ?>" alt="" srcset="" width="500" class="card-img-top" alt="...">
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>Muda Kaya Raya, Tua Foya-foya, Mati masuk Sorga.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Cirebon</cite>
                </footer>
            </blockquote>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nrp : <?= $mahasiswa['nrp'] ?></li>
            <li class="list-group-item">Nama : <?= $mahasiswa['nama'] ?></li>
            <li class="list-group-item">Nama : <?= $mahasiswa['email'] ?></li>
            <li class="list-group-item">Nama : <?= $mahasiswa['jurusan'] ?></li>
        </ul>
    </div>
</body>

</html>