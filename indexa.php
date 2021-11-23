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
  <title>Nbl Lbry || Login</title>
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

<body style="margin-top: 200px;">
  <div class="row mt-5 mx-auto justify-content-center">
    <div class="col-lg-4 p-4 text-center" style="background: rgba(4, 29, 23, 0.5);">
      <?php
      if (!empty($sesiData['userLoggedIn']) && !empty($sesiData['userID'])) {
        include 'user.php';
        $user = new User();
        $kondisi['where'] = array(
          'id' => $sesiData['userID'],
        );
        $kondisi['return_type'] = 'single';
        $userData = $user->getRows($kondisi);
        if ($userData['level'] == 'user') {
          header("Location:index.php");
        } else if ($userData['level'] == 'admin') {
          header("Location:daftar.php");
        }
      ?>
      <?php } else { ?>
        <h3 class="text-center text-black text-white">Login To Your Account</h3><br>
        <?php echo !empty($statusPsn) ? '<p class="text-white"' . $jenisStatusPsn . '">' . $statusPsn . '</p>' : ''; ?>
        <div class="form-signin">
          <form action="akunuser.php" method="post">
            <div class="form-floating">
              <input style="font-weight: 500;" type="email" class="form-control" name="email" placeholder="Email" style="font-family: 'Margarine', cursive;" required="">
              <label style="font-weight: 500;" for="email">Email Address</label>
            </div>
            <div class="form-floating">
              <input style="font-weight: 500;" type="password" class="form-control mt-3" name="password" placeholder="Password" style="font-family: 'Margarine', cursive;" required="">
              <label style="font-weight: 500;" for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg mt-3 btn-primary" value="Login" name="loginSubmit" type="submit">Login</button>
          </form>
          <div class="small mt-3 text-white">Not Registered ? <a href="daftara.php">Register Now!!</a></div>
          <p class="mt-3 mb-3 text-white">&copy; Nabil Dzakwan</p>
        </div>
    </div>
  </div>
<?php } ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>