<?php
include_once("koneksi.php");

// Periksa apakah ID buku tersedia di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus buku berdasarkan ID
    $query = "DELETE FROM tb_buku WHERE id_buku = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Buku berhasil dihapus!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus buku!'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('ID buku tidak ditemukan!'); window.location.href='index.php';</script>";
}
?>
