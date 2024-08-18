<?php
session_start();
require "../config.php";
if (!isset($_SESSION["login_owner"])) {
  header("location:../login.php");
}

// $sql_sewa = sql("SELECT * FROM sewa INNER JOIN produk ON sewa.id_produk=produk.id_produk INNER JOIN jadwal ON sewa.id_jadwal=jadwal.id_jadwal");
$no = 1;

include "header.php";
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Penyewaan</h1>
  </div>

  <!-- Content Row -->
  <!-- Data Table -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form class="row g-3" action="" method="post">
        <div class="col-auto">
          <label for="">Dari Tanggal</label>
          <input type="date" class="form-control" name="t_awal" required>
        </div>
        <div class="col-auto">
          <label for="">Ke Tanggal</label>
          <input type="date" class="form-control" name="t_akhir" required>
        </div>
        <div class="col-auto mt-4">
          <button type="submit" class="btn btn-secondary btn-sm" name="simpan">Simpan</button>
          <a href="daftar_produk.php" class="btn btn-outline-secondary btn-sm">Reset</a>
        </div>
      </form>
      <?php
      if (isset($_POST['simpan'])) {
        // var_dump($_POST["t_awal"], $_POST["t_akhir"]);
        $_SESSION["awal"] = $_POST["t_awal"];
        $_SESSION["akhir"] = $_POST["t_akhir"];
        $sql_sewa = sql("SELECT * FROM sewa INNER JOIN produk ON sewa.id_produk=produk.id_produk INNER JOIN jadwal ON sewa.id_jadwal=jadwal.id_jadwal 
                WHERE sewa.tanggal BETWEEN '$_SESSION[awal]' AND '$_SESSION[akhir]'
                ORDER BY sewa.tanggal
                ");
      } else {
        $sql_sewa = sql("SELECT * FROM sewa INNER JOIN produk ON sewa.id_produk=produk.id_produk INNER JOIN jadwal ON sewa.id_jadwal=jadwal.id_jadwal ORDER BY `sewa`.`tanggal` DESC");
      }
      ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width=5%>No</th>
              <th>Item</th>
              <th>Tanggal</th>
              <th>Jam Main</th>
              <th>Harga</th>
              <th>Nama Penyewa</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sql_sewa as $sewa) : ?>
              <tr>
                <th class="text-center"><?= $no; ?></th>
                <th><?= $sewa['nama_produk']; ?></th>
                <th><?= $sewa['tanggal']; ?></th>
                <th><?= $sewa['jams']; ?></th>
                <th>Rp. <?= number_format($sewa['harga']); ?></th>
                <th><?= $sewa['nama_penyewa']; ?></th>
                <th><?= $sewa['status']; ?></th>
                <th>
                  <?php if ($sewa['status'] == 'Booking') { ?>
                    <a href="mainsewa.php?id=<?= $sewa['id_sewa']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-info btn-sm">
                      <span class="text">Main</span>
                    </a>
                  <?php } elseif ($sewa['status'] == 'Sedang Main') { ?>
                    <a href="selesaisewa.php?id=<?= $sewa['id_sewa']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-info btn-sm">
                      <span class="text">Finish</span>
                    </a>
                  <?php } else { ?>
                    Done
                  <?php } ?>
                </th>
              </tr>
            <?php
              $no++;
            endforeach ?>
          </tbody>
        </table>
      </div>
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

<!-- Datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      dom: 'Bfrtip',
      buttons: [{
          extend: 'excelHtml5',
          title: 'Data Produk',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6]
          }
        },
        {
          extend: 'pdfHtml5',
          title: 'Data Produk',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6]
          }
        }
      ]
    });
  });
</script>


</body>

</html>