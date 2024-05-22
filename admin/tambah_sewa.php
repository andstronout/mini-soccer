<?php
session_start();
require "../config.php";
if (!isset($_SESSION["login_admin"])) {
  header("location:../login.php");
}


$sql_produk = sql("SELECT * FROM produk");
$sql_jadwal = sql("SELECT * FROM jadwal");

if (isset($_POST["submit"])) {
  $id_produk = $_POST["produk"];
  $hasil_tanggal = $_POST["tanggal"];
  $hasil_jadwal = $_POST["jadwal"];
  $nama_penyewa = $_POST["nama_penyewa"];
  $status = "Booking";

  $sql_sewa = sql("SELECT * FROM sewa WHERE id_produk='$id_produk' AND tanggal='$hasil_tanggal' AND id_jadwal='$hasil_jadwal' AND nama_penyewa='$nama_penyewa'");

  if ($sql_sewa->num_rows > 0) {
    echo "
      <script>
      alert('Jadwal sudah dibooking!');
      </script>
      ";
  } else {
    $tambah = sql("INSERT INTO sewa (id_produk,tanggal,id_jadwal,nama_penyewa,`status`) VALUES ('$id_produk','$hasil_tanggal','$hasil_jadwal','$nama_penyewa','$status')");
    echo "
      <script>
      alert('Item berhasil ditambahkan');
      document.location.href='daftar_produk.php';
      </script>
      ";
  }
}

include "header.php";
?>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
  </div>

  <!-- Content Row -->
  <!-- Data Table -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="" method="post">
        <label for="tanggal">Jenis Item dan Tanggal Sewa</label>
        <div class="input-group mb-3">
          <select class="form-select" name="produk" required>
            <option selected disabled>Pilih jenis Item</option>
            <?php foreach ($sql_produk as $produk) { ?>
              <option value="<?= $produk['id_produk']; ?>"><?= $produk['nama_produk']; ?></option>
            <?php } ?>
          </select>
          <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="input-group mb-3">
          <select class="form-select" name="jadwal" required>
            <option selected disabled>Pilih Jadwal Main</option>
            <?php while ($jadwal = $sql_jadwal->fetch_assoc()) { ?>
              <option value="<?= $jadwal['id_jadwal']; ?>"><?= $jadwal['jams']; ?></option>
            <?php } ?>
          </select>
          <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" placeholder="Masukan Nama Penyewa" required>
        </div>
        <a href="daftar_produk.php" class="btn btn-outline-secondary">Kembali ke daftar</a>
        <button type="submit" name="submit" class="btn btn-primary" style="width: 150px;">Submit</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Nadia Ryan Jewelry 2023</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="../logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="../sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../sbadmin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../sbadmin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../sbadmin/js/demo/chart-area-demo.js"></script>
<script src="../sbadmin/js/demo/chart-pie-demo.js"></script>

</body>

</html>