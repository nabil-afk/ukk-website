<?php
require "koneksi.php";
if (isset($_POST["id_buku"])) {
  $id_buku = $_POST["id_buku"];
  $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
  $result = mysqli_query($conn, $query);
  foreach ($result as $hasil) { ?>
    <div class="modal-header">
      <h4 class="modal-title border-0"><?php echo $hasil['judul']; ?></h4>
    </div>
    <div class="modal-body text-center">
      <img height="350px" src="img/<?php echo $hasil['gambar']; ?>" class="rounded mx-auto d-block">
      <h5 class="mt-3"><b><?php echo $hasil['pengarang']; ?></b></h5>
      <h5 class="mt-3"><i><?php echo $hasil['penerbit']; ?></i></h5>
      <h6 style="text-align: justify;" class="mt-3"><?php echo $hasil['sinopsis']; ?></h6>
    </div>
    <div class="modal-footer">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <a href="print.php?id_buku=<?php echo $hasil['id_buku']; ?>" type="btn" class="btn btn-danger">Print</a>
          </div>
          <div class="col-6 text-end">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<?php }
} ?>