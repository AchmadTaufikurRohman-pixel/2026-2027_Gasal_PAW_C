<?php
include "koneksi.php";
include "config.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Master Penjualan</title>

    <style>
        .header-tabel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        .tambah {
            background: #198754;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .tambah:hover {
            background: #146c43;
        }
        body {
            font-family: Arial;
            margin: 30px;
            background: #f4f4f4;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #20a4a8;
            color: white;
        }

        .edit {
            background: #ffc107;
            padding: 6px 12px;
            color: black;
            text-decoration: none;
        }

        .hapus {
            background: #dc3545;
            padding: 6px 12px;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <h1>DATA MASTER PENJUALAN</h1>

    <?php foreach ($masterTables as $tabel => $config) { ?>

        <div class="header-tabel">
            <h2>Data <?= ucfirst($tabel); ?></h2>

            <a class="tambah"
                href="tambah.php?tabel=<?= urlencode($tabel); ?>">
                + Tambah Data
            </a>
        </div>

        <table>
            <tr>
                <?php
                $kolom = array_merge(
                    [$config["primary"]],
                    $config["fields"]
                );

                foreach ($kolom as $field) {
                    echo "<th>" . htmlspecialchars($field) . "</th>";
                }
                ?>

                <th>Aksi</th>
            </tr>

            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM `$tabel`");

            while ($data = mysqli_fetch_assoc($query)) {
            ?>

                <tr>

                    <?php foreach ($kolom as $field) { ?>

                        <td>
                            <?= htmlspecialchars($data[$field] ?? ''); ?>
                        </td>

                    <?php } ?>

                    <td>
                        <a class="edit"
                            href="edit.php?tabel=<?= urlencode($tabel); ?>&id=<?= urlencode($data[$config['primary']]); ?>">
                            Edit
                        </a>

                        <a class="hapus"
                            href="hapus.php?tabel=<?= urlencode($tabel); ?>&id=<?= urlencode($data[$config['primary']]); ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </table>

    <?php } ?>

</body>

</html>