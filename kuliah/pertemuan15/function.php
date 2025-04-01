<?php
$conn = mysqli_connect('localhost', 'root', '', 'pw_043040023');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}
function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    $type = $_FILES['gambar']['type'];


    if ($error == 4) {
        echo
            "
        <script>
        alert(' Anda belum memasukan gambar!');
        </script>
        ";
        return false;
    }
    $daftarGambar = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    // $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $daftarGambar)) {
        echo
            "
        <script>
        alert('yang anda upload bukan gambar!');
        </script>
        ";
        return false;
    }

    if ($type != 'image/jpeg' && $type != 'image/png') {
        echo
            "
        <script>
        alert('yang anda pilih bukan gambar!');
        </script>
        ";
        return false;
    }

    if ($ukuranFile > 5000000) {
        echo
            "
        <script>
        alert('File yang anda upload terlalu besar!');
        </script>
        ";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = upload();
    $sql = "INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar)
                                VALUES
                                ('$nama','$nrp','$email','$jurusan','$gambar')";
    $query = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);


}

function hapus($id)
{
    global $conn;
    $sql = "DELETE FROM mahasiswa WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);

}

function ubah($data)
{
    global $conn;
    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $sql = "UPDATE  mahasiswa SET
    nama = '$nama',
    nrp = '$nrp',
    email = '$email',
    jurusan = '$jurusan',
    gambar = '$gambar'
    WHERE id = $id;

    
    ";
    $query = mysqli_query($conn, $sql);


    return mysqli_affected_rows($conn);

}

function cari($keyword)
{
    global $conn;
    $query = "SELECT * FROM mahasiswa WHERE 
    nama LIKE '%$keyword%' OR
    nrp LIKE  '%$keyword%' 
    ";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function login($data)
{
    global $conn;
    $username = mysqli_real_escape_string($conn, htmlspecialchars($data['username']));
    $password = htmlspecialchars($data['password']);

    // Ambil data user berdasarkan username
    if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
        if (password_verify($password, $user[0]['password'])) {
            $_SESSION['login'] = true;
            header('location:index.php');
            exit;
        }
        return [
            'error' => true,
            'pesan' => 'username/password salah'
        ];
    }
    // Jika username dan password benar, set session

}


function registrasi($data)
{
    global $conn;
    $username = mysqli_real_escape_string($conn, htmlspecialchars($data['username']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($data['password']));
    $verify = mysqli_real_escape_string($conn, htmlspecialchars($data['verify']));

    if (empty($username) || empty($password) || empty($verify)) {
        echo "<script>
        alert('Username / Password tidak boleh kosong..');
        document.location.href= 'registrasi.php';
        </script>";
        return false;
    }
    if (query("SELECT * FROM user WHERE username = '$username'")) {
        echo "
        <script>
        alert('Username / password sudah ada😓');
        document.location.href = 'registrasi.php';
        </script>
        ";
        return false;
    }
    if ($password !== $verify) {
        echo "
        <script>
        alert('Password tidak sama😓');
        document.location.href = 'registrasi.php';
        </script>
        ";
        return false;
    }
    $password_baru = password_hash($password, PASSWORD_DEFAULT);

    // insert tabel user
    $query = "INSERT INTO user VALUES
        (null, '$username', '$password_baru')";

    $sql = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>


































<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>
        a.nav-link {
            color: white !important;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #323539;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>