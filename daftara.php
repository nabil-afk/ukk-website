<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
    $statusPsn = $sesiData['status']['msg'];
    $jenisStatusPsn = $sesiData['status']['type'];
    unset($_SESSION['sesiData']['status']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Nbl Lbry || Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/Logon.png" type="image">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">
    <style>
        body {
            background: url(https://data.1freewallpapers.com/download/books-library-shelves-lighting-3840x2160.jpg) no-repeat fixed;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
        }
    </style>
</head>

<body style="margin-top: 100px;">
    <div class="row mt-5 mx-auto justify-content-center">
        <div class="col-lg-4 p-4 text-center" style="background: rgba(4, 29, 23, 0.5);">
            <h3 class="text-white text-center">Create A New Account</h3>
            <?php echo !empty($statusPsn) ? '<p class="' . $jenisStatusPsn . '">' . $statusPsn . '</p>' : ''; ?>
            <form action="akunuser.php" method="post">
                <div class="form-floating">
                    <input style="font-weight: 500;" type="text" class="form-control mt-3" name="username" placeholder="Username" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input style="font-weight: 500;" type="email" class="form-control mt-3" name="email" placeholder="Email" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="email">Email Address</label>
                </div>
                <div class="form-floating">
                    <input style="font-weight: 500;" type="text" class="form-control mt-3" name="telp" placeholder="Phone Number" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="telp">Phone Number</label>
                </div>
                <div class="form-floating">
                    <input style="font-weight: 500;" type="password" class="form-control mt-3" name="password" placeholder="Password" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="password">Password</label>
                </div>
                <div class="form-floating">
                    <input style="font-weight: 500;" type="password" class="form-control mt-3" name="confirm_password" placeholder="Confirm Password" style="font-family: 'Margarine', cursive;" required="">
                    <label style="font-weight: 500;" for="confirm_password">Confirm Password</label>
                </div>
                <input class="w-100 btn-lg btn btn-primary mt-3" type="submit" name="daftarSubmit" value="Create Account"><br><br>
                <p class="text-white">Have a Registered Account? <a href="indexa.php">Login</a></p>
                <p class="mt-3 mb-3 text-white">Nabil Dzakwan &copy; 2021</p>
            </form>
        </div>
    </div>
</body>

</html>
