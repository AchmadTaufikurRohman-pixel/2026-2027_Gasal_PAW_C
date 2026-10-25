<!DOCTYPE html>
<html>
<head>
    <title>Form Data</title>
    <style>
        body {
            font-family: Arial;
            background-color: #e0ffff;
        }
        .form-box {
            width: 420px;
            margin: 50px auto;
            padding: 25px;
            background-color: #20b2aa;
            border-radius: 10px;
        }
        .field {
            margin-bottom: 10px;
        }
        .field label {
            display: block;
            color: white;
            margin-bottom: 5px;
        }
        .field input[type="text"],
        .field input[type="email"],
        .field input[type="password"],
        .field textarea,
        .field select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
        }
        .button input {
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="form-box">

<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'Tugas-21.inc';

    validateForm($errors, $_POST);

    if (empty($errors)) {
        echo '<h2>Form berhasil dikirim!</h2>';
        echo '<p>Semua data sudah valid.</p>';
    } else {
        echo '<h2>Periksa kembali data berikut:</h2>';
        include 'Tugas-22.inc';
    }
} else {
    include 'Tugas-22.inc';
}
?>

</div>

</body>
</html>