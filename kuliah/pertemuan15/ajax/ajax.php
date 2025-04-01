<?php
require '../function.php';

$mahasiswa = cari($_GET['keyword']);


?>

<table class="table table-striped table-hover">
    <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>aksi</th>
    </tr>

    <?php if (empty($mahasiswa)): ?>
        <tr>
            <td colspan="4" style="color:red; font-style: italic;">Data yang kamu masukan tidak ada!</td>
        </tr>
    <?php endif; ?>
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