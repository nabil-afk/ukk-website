<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/Logon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Margarine&family=Montaga&display=swap" rel="stylesheet">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <title>Nbl Lbry | Edit</title>
</head>

<body style="font-family: 'Bebas Neue', cursive;">
  <nav class="navbar navbar-expand-lg navbar-light shadow-lg sticky-top" style="background-color: #FFC300;">
    <div class="container">
      <ul class="navbar-nav ms-6">
        <li>
          <a class="navbar-brand" style="font-family: 'Margarine', cursive;" href="daftar.php">
            <img src="img/Logon.png" height="50" class="d-inline-block align-text-center"> Nbl Lbry
          </a>
        </li>
      </ul>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
        </ul>
      </div>
    </div>
  </nav>

  <?php

  include 'koneksi.php';

  if (isset($_GET['id_buku'])) {
    
    $id = ($_GET["id_buku"]);

    $query = "SELECT * FROM buku WHERE id_buku='$id'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
      die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
    }
    
    $data = mysqli_fetch_assoc($result);
    
    if (!count($data)) {
      echo "<script>alert('Data tidak ditemukan pada database');window.location='daftar.php';</script>";
    }
  } else {
    
    echo "<script>alert('Masukkan Data ID.');window.location='daftar.php';</script>";
  }
  ?>

  <div class="container" style= "margin-top: 70px; width: 85%; justify-content: center">
    <div class="card">
      <div class="card-header text-muted">Edit Buku</div>
      <div class="card-body">

        <form enctype="multipart/form-data" action="p_edit.php" method="post">

          <input name="id_buku" value="<?php echo $data['id_buku']; ?>" hidden />

          <div class="mb-3 mt-1">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>">
          </div>

          <div class="mb-3 mt-3">
            <label>Pengarang</label>
            <input type="text" class="form-control" name="pengarang" value="<?php echo $data['pengarang']; ?>" />
          </div>

          <div class="mb-3 mt-3">
            <label>Penerbit</label>
            <input type="text" class="form-control" name="penerbit" required="" value="<?php echo $data['penerbit']; ?>" />
          </div>

          <div class="mb-3 mt-3">
            <label>Persediaan</label>
            <input type="text" class="form-control" name="persediaan" required="" value="<?php echo $data['persediaan']; ?>" />
          </div>

          <div class="mb-3 mt-3">
            <label>Sinopsis</label>
            <textarea type="text" style="height:150px;" class="form-control" name="sinopsis" required=""><?php echo $data['sinopsis']; ?></textarea>
          </div>

          <div class="mt-3">
            <label>Gambar</label>
            <input class="form-control" type="file" name="gambar">
            <i class="" style="font-size: 11px;color: red">Abaikan Jika Tidak Merubah Gambar</i>
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-success mt-3" type="submit">Update</button>
          </div>

      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>