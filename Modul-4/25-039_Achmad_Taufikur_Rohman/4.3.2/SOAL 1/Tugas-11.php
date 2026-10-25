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

if (isset($_POST['surname'])) {
    require 'Tugas-13.inc';

    validateName($errors, $_POST, 'surname');

    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';

        foreach ($errors as $field => $error) {
            echo "$field: $error<br>";
        }

        include 'Tugas-14.inc';
    } else {
        echo 'Form submitted successfully with no errors';
    }
} else {
    include 'Tugas-14.inc';
}
?>

</div>

</body>
</html>