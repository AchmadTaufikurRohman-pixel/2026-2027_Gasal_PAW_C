<?php

include "koneksi.php";
include "config.php";

$tabel = $_GET['tabel'] ?? '';
$id = $_GET['id'] ?? '';

if (!isset($masterTables[$tabel])) {
    die("Tabel tidak ditemukan!");
}

$config = $masterTables[$tabel];
$primary = $config['primary'];

try {

    mysqli_begin_transaction($koneksi);


    if ($tabel == "supplier") {

        $sql = "DELETE FROM transaksi_detail
                WHERE barang_id IN (
                    SELECT id FROM barang
                    WHERE supplier_id = ?
                )";

        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $sql = "DELETE FROM barang
                WHERE supplier_id = ?";

        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    }

    $sql = "DELETE FROM `$tabel`
            WHERE `$primary` = ?";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    mysqli_commit($koneksi);

    echo "<script>
            alert('Supplier dan barang terkait berhasil dihapus!');
            window.location='index.php';
        </script>";

} catch (mysqli_sql_exception $e) {

    mysqli_rollback($koneksi);

    echo "<script>
            alert('Data gagal dihapus: masih memiliki relasi dengan tabel lain!');
            window.location='index.php';
        </script>";

}

?>