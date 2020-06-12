<?php
if (isset($_POST['kirim'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    print_r($_POST);
    exit();
}
