<?php
include_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_buku'])) {
        $id = $_POST['id_buku'];

        // Query hapus buku
        $query = "DELETE FROM tb_buku WHERE id_buku = '$id'";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            echo "Data berhasil dihapus!";
            header("Location: indexcreateurut.php"); // Redirect ke halaman utama
            exit();
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
    } else {
        echo "ID buku tidak ditemukan!";
    }
} 
?>