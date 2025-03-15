<?php
require 'function.php';
$id = $_GET["id"];
if (!isset($_GET["id"])) {
    header('location: index.php');
    exit;
}


if (isset($_GET["id"])) {
    if (hapus($id) > 0) {
        echo "
    <script>
    alert('Data Berhasil dihapus');
    document.location.href = 'index.php';
    </script>
    
    ";
    } else {
        echo "
    <script>
    alert('Data gagal dihapus');
    </script>
    
    ";
    }

}
?>