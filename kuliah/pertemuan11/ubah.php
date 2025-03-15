<?php
require 'function.php';
$id = $_GET["id"];
if (!isset($_GET["id"])) {
    header('location: index.php');
    exit;
}
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["ubah"])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!');
        document.location.href = 'index.php';
        
        </script>>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!');
        
        </script>>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 500px;
            /* Atur lebar form */
            margin: 50px auto;
            /* Posisikan di tengah */
            padding: 20px;
            /* Tambahkan ruang di dalam form */
            background: #ffffff;
            /* Latar belakang putih agar jelas */
            border-radius: 10px;
            /* Sudut membulat */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            /* Efek bayangan */
        }

        label {
            display: block;
            /* Biar vertikal */
            font-weight: bold;
            /* Tebalkan label */
            margin-top: 10px;
            /* Beri jarak antar label */
        }

        input {
            width: 100%;
            /* Agar input sesuai dengan form */
            padding: 8px;
            /* Ruang dalam input */
            border: 1px solid #ccc;
            /* Tambahkan border */
            border-radius: 5px;
            /* Bikin sudut membulat */
            margin-top: 5px;
            /* Jarak dengan label */
        }

        input:focus {
            border-color: #007bff;
            /* Warna border saat fokus */
            outline: none;
            /* Hilangkan garis bawaan browser */
        }

        button[type='submit'] {
            margin: 20px auto;
        }


        body {
            background-image: url('img/form.jpg');
            background-size: cover;
            /* Menyesuaikan ukuran browser */
            background-position: center;
            /* Menempatkan gambar di tengah */
            background-repeat: no-repeat;
            /* Menghindari pengulangan */
            background-attachment: fixed;
            /* Background tetap saat scroll */
        }
    </style>


</head>

<body>
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
            <label width="100">
                Nama:
                <input type="text" name="nama" width="100" autofocus value="<?= $mahasiswa['nama'] ?>">
            </label>
            <label>
                Nrp :
                <input type="text" name="nrp" value="<?= $mahasiswa['nrp'] ?>">
            </label>
            <label>
                Email :
                <input type="email" name="email" value="<?= $mahasiswa['email'] ?>">
            </label>
            <label>
                jurusan :
                <input type="text" name="jurusan" value="<?= $mahasiswa['jurusan'] ?>">
            </label>
            <label>
                gambar :
                <input type="text" name="gambar" value="<?= $mahasiswa['gambar'] ?>">
            </label>
            <button type="submit" class="btn btn-success" name="ubah">Ubah Data</button>
        </form>
    </div>

</body>

</html>