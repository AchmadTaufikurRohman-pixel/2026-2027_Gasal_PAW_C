<?php
include "koneksi.php";
include "config.php";

$tabel = $_GET['tabel'] ?? '';

if (!isset($masterTables[$tabel])) {
    die("Tabel tidak ditemukan!");
}

$config = $masterTables[$tabel];

if (isset($_POST['simpan'])) {

    $fields = $config['fields'];
    $values = [];

    foreach ($fields as $field) {
        $values[] = $_POST[$field] ?? '';
    }

    $kolom = implode(", ", array_map(
        fn($field) => "`$field`",
        $fields
    ));

    $tanda = implode(", ", array_fill(0, count($fields), "?"));

    $sql = "INSERT INTO `$tabel` ($kolom) VALUES ($tanda)";

    $stmt = mysqli_prepare($koneksi, $sql);

    try {
        if (mysqli_stmt_execute($stmt, $values)) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    window.location='index.php';
                </script>";
            exit;
        }
    } catch (mysqli_sql_exception $e) {
        echo "<script>
                alert('Gagal menambahkan data! Periksa kembali input Anda.');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>

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
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input, select {
            width: 95%;
            padding: 9px;
            margin-top: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #198754;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            margin-left: 10px;
        }
    </style>
</head>

<body>

<h2>Tambah Data <?= ucfirst($tabel); ?></h2>

<form method="POST">

    <?php foreach ($config['fields'] as $field) { ?>

        <label><?= ucfirst($field); ?></label>

        <?php if ($field == 'jenis_kelamin') { ?>

            <select name="<?= $field; ?>" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>

        <?php } elseif ($field == 'metode') { ?>

            <select name="<?= $field; ?>" required>
                <option value="">Pilih Metode</option>
                <option value="TUNAI">Tunai</option>
                <option value="TRANSFER">Transfer</option>
                <option value="EDC">EDC</option>
            </select>

        <?php } else { ?>

            <input
                type="text"
                name="<?= htmlspecialchars($field); ?>"
                placeholder="Masukkan <?= htmlspecialchars($field); ?>"
                required
            >

        <?php } ?>

    <?php } ?>

    <button type="submit" name="simpan">
        Simpan Data
    </button>

    <a href="index.php">Kembali</a>

</form>

</body>
</html>