<?php
include "koneksi.php";
include "config.php";

$tabel = $_GET['tabel'] ?? '';

if (!isset($masterTables[$tabel])) {
    die("Tabel tidak ditemukan!");
}

$config = $masterTables[$tabel];
$primary = $config['primary'];
$id = $_GET['id'] ?? '';

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM `$tabel` WHERE `$primary` = ?"
);

mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan!");
}

// Proses update
if (isset($_POST['update'])) {

    $values = [];

    foreach ($config['fields'] as $field) {
        $values[] = $_POST[$field] ?? '';
    }

    $set = [];

    foreach ($config['fields'] as $field) {
        $set[] = "`$field` = ?";
    }

    $sql = "UPDATE `$tabel` SET " .
        implode(", ", $set) .
        " WHERE `$primary` = ?";

    $stmt = mysqli_prepare($koneksi, $sql);

    $values[] = $id;

    if (mysqli_stmt_execute($stmt, $values)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location='index.php';
            </script>";
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>

    <style>
        body {
            font-family: Arial;
            margin: 30px;
            background: #f4f4f4;
        }

        form {
            background: white;
            padding: 20px;
            width: 400px;
        }

        input {
            width: 95%;
            padding: 8px;
            margin: 8px 0 15px;
        }

        button {
            padding: 10px 20px;
            background: #20a4a8;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

<h2>Edit Data <?= ucfirst($tabel); ?></h2>

<form method="POST">

    <?php foreach ($config['fields'] as $field) { ?>

        <label><?= ucfirst($field); ?></label>

        <input
            type="text"
            name="<?= htmlspecialchars($field); ?>"
            value="<?= htmlspecialchars($data[$field] ?? ''); ?>"
            required
        >

    <?php } ?>

    <button type="submit" name="update">
        Simpan Perubahan
    </button>

    <a href="index.php">Kembali</a>

</form>

</body>
</html>