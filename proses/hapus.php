<!-- Hapus Postingan -->
<?php
require 'koneksi.php';
if (isset($_POST['hapus'])) {
    $nim = $_POST['hapus'];
    $sql = "DELETE FROM user where nim=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nim]);
    return true;
}
?>