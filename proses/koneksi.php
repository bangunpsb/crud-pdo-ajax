<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=latihan', 'root', '');
    // echo 'Berhasil';
} catch (PDOException $error) {
    echo "Koneksi gagal" . $error->getMessage();
}
