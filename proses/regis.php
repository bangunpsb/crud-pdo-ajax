<?php
session_start();
include 'koneksi.php';

if (isset($_POST['simpan_data'])) {
    // $gbr = "d.jpg";
    $gbr = $_FILES['file']['name'];
    $lokasi = $_FILES['file']['tmp_name'];
    move_uploaded_file($lokasi, "../assets/gbr/$gbr");
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO user (nim,nama,email,password,level,no_hp,gbr)values(?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([$nim, $nama, $email, $password, $level, $no_hp, $gbr]);

    if ($result === true) { 
        $_SESSION['pesan'] = 'Success add new user';
    } else { 
        $_SESSION['pesann'] = 'Failed add new user';
    }
}
