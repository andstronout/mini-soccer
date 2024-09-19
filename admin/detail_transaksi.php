<?php
session_start();
require "../config.php";
if (!isset($_SESSION["login_admin"])) {
  header("location:../login.php");
}
$id = $_GET["id"];
$sql_pesanan = sql("SELECT * FROM pesanan INNER JOIN user ON pesanan.id_pelanggan=user.id_user INNER JOIN jadwal ON jadwal.id_jadwal=pesanan.id_jadwal INNER JOIN harga ON jadwal.id_harga=harga.id_harga WHERE id_pesanan='$id'");
$no = 1;


$pesanan = $sql_pesanan->fetch_assoc();

if (isset($_POST["submit"])) {
  $update_transaksi = sql("UPDATE pesanan SET `status`='Finish' WHERE id_pesanan='$id'");
  echo "
        <script>
        alert('Data berhasil Ditambahkan');
        document.location.href = 'daftar_transaksi.php';
        </script>
        ";
}


include "header.php";
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Penyewaan</h1>
  </div>

  <!-- Content Row -->
  <!-- Data Table -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width=5%>No</th>
              <th>Nama Penyewa</th>
              <th>Tanggal</th>
              <th>Jam Main</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sql_pesanan as $pesanan) : ?>
              <tr>
                <th class="text-center"><?= $no; ?></th>
                <th><?= $pesanan['nama_user']; ?></th>
                <th><?= $pesanan['tanggal']; ?></th>
                <th><?= $pesanan['jams']; ?></th>
              </tr>
            <?php
              $no++;
            endforeach ?>
          </tbody>
        </table>
      </div>
      <form action="" method="post">
        <a href="daftar_transaksi.php" class="btn btn-outline-secondary">Halaman Utama</a>
        <!-- Button trigger modal -->
        <?php if ($pesanan['status'] == 'Booking') { ?>
          <button type="submit" class="btn btn-outline-primary" name="submit" onclick="return confirm('Are you sure you?')">
            Proses Pesanan
          </button>
          <a href="cancel.php?id=<?= $pesanan['id_pesanan']; ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you?')">Cancel Pesanan</a>
        <?php } ?>
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
      <span>Copyright &copy; Mini Soccer Tirta Salsabila 2024</span>
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
          title: 'Data Pesanan Barang',
          exportOptions: {
            columns: [0, 1, 2]
          }
        },
        {
          extend: 'pdfHtml5',
          title: 'Data Pesanan Barang',
          exportOptions: {
            columns: [0, 1, 2]
          }
        }
      ]
    });
  });
</script>


</body>

</html>