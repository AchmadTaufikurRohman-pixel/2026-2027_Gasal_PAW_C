<?php
function validateForm(&$errors, $data)
{

    if (empty(trim($data['surname'] ?? ''))) {
        $errors['surname'] = 'Username wajib diisi.';
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $data['surname'])) {
        $errors['surname'] = 'Username hanya boleh berisi huruf, tanda petik satu, atau tanda hubung.';
    }

    if (empty(trim($data['email'] ?? ''))) {
        $errors['email'] = 'Email wajib diisi.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid.';
    }

    if (empty($data['password'] ?? '')) {
        $errors['password'] = 'Password wajib diisi.';
    } elseif (strlen($data['password']) < 8) {
        $errors['password'] = 'Password minimal 8 karakter.';
    }

    if (empty(trim($data['address'] ?? ''))) {
        $errors['address'] = 'Address wajib diisi.';
    }

    if (empty($data['country'] ?? '')) {
        $errors['country'] = 'Country wajib dipilih.';
    }

    if (empty($data['gender'] ?? '')) {
        $errors['gender'] = 'Gender wajib dipilih.';
    }
}
?>