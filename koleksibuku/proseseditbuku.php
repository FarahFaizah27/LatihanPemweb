<?php
include_once("koneksi.php");

// Cek apakah data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    // Query untuk update data
    $query = "UPDATE tb_buku SET 
                judul_buku='$judul', 
                pengarang='$pengarang', 
                tahun_terbit='$tahun_terbit', 
                kategori='$kategori' 
              WHERE id_buku='$id_buku'";

    $hasil = mysqli_query($conn, $query);

    // Cek apakah query berhasil
    if ($hasil) {
        echo "Data berhasil diperbarui!";
        header("Location: indexcreateurut.php"); // Redirect ke halaman utama
        exit();
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
} else {
    echo "Metode pengiriman tidak valid!";
}
?>
