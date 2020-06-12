<?php
session_start();
include 'proses/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD PDO</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/datatables/datatables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="assets/js/jquery-3.3.1.slim.min.js"></script> -->
</head>

<body>
    <div class="header mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Add New User</button>
                    <p>
                        <h3> Data Users </h3>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="pesan text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if (isset($_SESSION['pesan'])) {
                        echo "<div class='alert alert-success'>" . $_SESSION['pesan'] . "</div>";
                        unset($_SESSION['pesan']);
                    }
                    if (isset($_SESSION['pesann'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['pesann'] . "</div>";
                        unset($_SESSION['pesann']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="bg-primary">
                    <thead>
                        <tr>
                            <th>Nim</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Access</th>
                            <th>Number Phone</th>
                            <th>Photo</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM user";
                        $stmt = $pdo->query($query);
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?= $row['nim'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['level'] ?></td>
                                <td><?= $row['no_hp'] ?></td>
                                <td>
                                    <img class="rounded-circle" src="assets/gbr/<?= $row['gbr'] ?>" alt="" width="50px" height="50px">
                                </td>
                                <td>
                                    <button class="detail btn btn-primary" value="<?= $row['nim']; ?>">Detail</button>
                                    <button class="edit btn btn-warning" value="<?= $row['nim']; ?>">Edit</button>
                                    <button type="submit" class="delete btn btn-danger" value="<?= $row['nim']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- add modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add new user</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form_simpan" class="form_simpan" method="post" action="proses/regis.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="nim">Nim</label>
                                <input type="text" class="nim form-control" name="nim" id="nim" value="" placeholder="Ex : 1610307057004" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="nama">Name</label>
                                <input type="text" class="nama form-control" name="nama" id="nama" placeholder="Ex : Budi Setiawan" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="addemail">Email</label>
                                <input type="text" class="email form-control" name="email" id="email" placeholder="Ex : Bangunpsb@gmail.com" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="password">Password</label>
                                <input type="password" class="password form-control" name="password" id="password" placeholder="Ex : ##############" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">Access</label>
                            <select name="level" id="level" class="level form-control show-tick" data-live-search="true" required>
                                <option value="" disabled selected>Choose access</option>
                                <option value="admin">admin</option>
                                <option value="karyawan">karywan</option>
                                <option value="user">user</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="no_hp">Number Phone</label>
                                <input type="text" class="no_hp form-control" name="no_hp" id="no_hp" placeholder="Ex : 081232323" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="gbr">Choose your photo</label>
                                <input type="file" class="file form-control" name="file" id="file" accept="image/*" value="" onchange="return viewimg()">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="simpan_data btn btn-success waves-effect" id="simpan_data" value="save" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- detail modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form_edit">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Detail Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="result_detail">


                    </div>
                    <div class="modal-footer">
                        <div class="form-group">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- detail modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form_edit">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Detail Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="result_edit">


                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" name="edit_data" class="edit_data btn btn-success waves-effect" data-dismiss="modal">Edit Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="assets/js/custom.js"></script>
    <script src="assets/datatables/datatables.min.js"></script>
    <!-- <script src="assets/js/popper.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>