<!-- Menampilkan Edit Data ke modal -->
<?php
require 'koneksi.php';
//  ambil datanya ke modal biar di edit 
if (isset($_POST["id_data"])) {
    $data = $_POST["id_data"];
    $sql = "SELECT * FROM user WHERE nim = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$data]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $nim = $row['nim'];
        $nama = $row['nama'];
        $email = $row['email'];
        $password = $row['password'];
        $level = $row['level'];
        $no_hp = $row['no_hp'];
    }
}
?>


<!-- data yang mau ditampilkan di body form edit -->
<input type="hidden" name="editnim" value="<?= $nim; ?>" class="editnim form-control" id="nim">

<div class="form-group">
    <div class="form-line">
        <label for="nama">Name</label>
        <input type="text" name="editnama" value="<?= $nama; ?>" class="editnama form-control" id="nama" placeholder="Ex : Budi Setiawan" autofocus required>
    </div>
</div>
<div class="form-group">
    <div class="form-line">
        <label for="email">Email</label>
        <input type="text" name="editemail" value="<?= $email; ?>" class="editemail form-control" id="email" placeholder="Ex : Bangunpsb@gmail.com" autofocus required>
    </div>
</div>
<div class="form-group">
    <label for="level">Access</label>
    <select name="editlevel" id="level" class="editlevel form-control show-tick" data-live-search="true" required>
        <?php
        $options = array("admin", "user", "karyawan");
        ?>

        <?php foreach ($options as $option) : ?>
            <option value="<?= $option; ?>" <?php if ($level == $option) : ?> selected="selected" <?php endif; ?>>
                <?= $option; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <div class="form-line">
        <label for="no_hp">Number Phone</label>
        <input type="text" name="editno_hp" value="<?= $no_hp; ?>" class="editno_hp form-control" id="no_hp" placeholder="Ex : 081232323" autofocus aria-required="">
    </div>
</div>

<!-- data yang mau ditampilkan di body form edit -->




<?php

if (isset($_POST["edit"])) {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $level = $_POST["level"];
    $nohp = $_POST["nohp"];
    $sql = "UPDATE user set nama=?,email=?,level=?,no_hp=? WHERE nim = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nama, $email, $level, $nohp, $nim]);
}
?>