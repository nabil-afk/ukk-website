<?php

include 'koneksi.php';

$id = $_POST['id_buku'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$persediaan = $_POST['persediaan'];
$gambar = $_FILES['gambar']['name'];
$sinopsis = $_POST['sinopsis'];

if ($gambar != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); 
  $x = explode('.', $gambar); 
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $gambar; 
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'img/' . $nama_gambar_baru); 
    
    $query  = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', persediaan = '$persediaan', gambar = '$nama_gambar_baru', sinopsis = '$sinopsis'";
    $query .= "WHERE id_buku = '$id'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
    } else {
      
      echo "<script>alert('Data Berhasil Diubah.');window.location='daftar.php';</script>";
    }
  } else {
    
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpeg, jpg atau png.');window.location='daftar.php';</script>";
  }
} else {
  
  $query  = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', persediaan = '$persediaan', sinopsis = '$sinopsis'";
  $query  .= "WHERE id_buku = '$id'";
  $result = mysqli_query($conn, $query);
 
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) .
      " - " . mysqli_error($conn));
  } else {

    echo "<script>alert('Data Berhasil Diubah.');window.location='daftar.php';</script>";
  }
}
