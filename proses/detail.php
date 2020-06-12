<!-- Menampilkan Detail Data ke modal -->
<?php
require 'koneksi.php';
//  ambil data detail ke modal 
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


<!-- data yang mau ditampilkan di body form detail -->
<div class="form-group">
    <div class="form-line">
        <label for="nama">Nim</label>
        <input type="text" name="detailnama" value="<?= $nim; ?>" class="detailnim form-control" id="nim" placeholder="Ex : Budi Setiawan" autofocus required>
    </div>
</div>
<div class="form-group">
    <div class="form-line">
        <label for="nama">Name</label>
        <input type="text" name="detailnama" value="<?= $nama; ?>" class="detailnama form-control" id="nama" placeholder="Ex : Budi Setiawan" autofocus required>
    </div>
</div>
<div class="form-group">
    <div class="form-line">
        <label for="detailemail">Email</label>
        <input type="text" name="detailemail" value="<?= $email; ?>" class="detailemail form-control" id="email" placeholder="Ex : Bangunpsb@gmail.com" autofocus required>
    </div>
</div>
<div class="form-group">
    <label for="detaillevel">Access</label>
    <select name="detaillevel" id="level" class="detaillevel form-control show-tick" data-live-search="true" required>
        <?php
        $sql = "SELECT DISTINCT level from user ";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <option selected value="<?= $row['level']; ?>"><?= $row['level']; ?></option>
        <?php
        }
        ?>

    </select>
</div>
<div class="form-group">
    <div class="form-line">
        <label for="detailno_hp">Number Phone</label>
        <input type="text" name="detailno_hp" value="<?= $no_hp; ?>" class="editno_hp form-control" id="no_hp" placeholder="Ex : 081232323" autofocus aria-required="">
    </div>
</div>

<!-- data yang mau ditampilkan di detail -->