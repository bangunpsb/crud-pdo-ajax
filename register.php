<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="mt-5 pesan text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if (isset($_SESSION['pesan'])) {
                        echo "<div class='alert alert-info'>" . $_SESSION['pesan'] . "</div>";
                        unset($_SESSION['pesan']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <h3> Add New User</h3>
                </p>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <form action="proses/regis.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input name="nim" type="nim" class="form-control" id="nim" placeholder="Your Nim" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input name="nama" type="nama" class="form-control" id="nama" placeholder="Your Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Your Password" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Acces</label> <br>
                        <select name="level" id="level" class="form-control" required>
                            <option selected disabled>Choose your access</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Number Phone</label>
                        <input name="no_hp" type="text" class="form-control" id="no_hp" placeholder="Your number phone" maxlength="12" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Choose your image</label>
                        <input type="file" class="form-control" id="file" placeholder="Your Password" name="gbr" accept="image/*" onchange="return viewimg()" required>
                    </div>
                    <button name="register" type="submit" class="btn btn-outline-success">Add New</button>
                    <a type="button" class="btn btn-primary ml-3" href="index.php">Check User</a>
                </form>

            </div>
        </div>
    </div>

    <p></p>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>