<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'barang_kuis';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die('koneksi gagal :' . mysqli_connect_error());
}

// Handle form simpan
if (isset($_POST['simpan'])) {
    // Ambil nilai dari form
    $kodebarang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_modal = $_POST['harga_modal'];
    $harga_jual = $_POST['harga_jual'];

    // Query untuk insert data baru
    $query = "INSERT INTO barang (kode_barang, nama_barang, stok, harga_modal, harga_jual) 
              VALUES ('$kodebarang' , '$nama_barang' , '$stok','$harga_modal','$harga_jual' )";

    // Eksekusi query
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }
    // Redirect kembali ke halaman index.php setelah berhasil
    header("location: index.php");
}

// Handle form update
if (isset($_POST['update'])) {
    // Ambil nilai dari form
    $kodebarang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_modal = $_POST['harga_modal'];
    $harga_jual = $_POST['harga_jual'];

    // Query untuk update data
    $query = "UPDATE barang 
              SET nama_barang='$nama_barang', stok='$stok', harga_modal='$harga_modal', harga_jual='$harga_jual' 
              WHERE kode_barang='$kodebarang'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Error updating record: ' . mysqli_error($conn));
    }
    // Redirect kembali ke halaman index.php setelah berhasil
    header("location: index.php");
}

// Handle delete menggunakan GET
if (isset($_GET['delete'])) {
    // Ambil kode barang dari parameter GET
    $kode_barang = $_GET['delete'];

    // Query untuk delete data
    $query = "DELETE FROM barang WHERE kode_barang='$kode_barang'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Error deleting record: ' . mysqli_error($conn));
    }
    // Redirect kembali ke halaman index.php setelah berhasil
    header("location: index.php");
}
