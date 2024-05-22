<?php
session_start();
require "config.php";
include "header.php";
$id_jadwal = $_GET["id_jadwal"];
$tanggal = $_GET["tanggal"];
$sql_jadwal = sql("SELECT * FROM jadwal INNER JOIN harga ON jadwal.id_harga=harga.id_harga WHERE id_jadwal='$id_jadwal'");

if (!isset($_SESSION["login_pelanggan"])) {
  header("location:login.php");
}

$jadwal = $sql_jadwal->fetch_assoc();

$tanggal_baru = date("d F Y", strtotime($tanggal));

$pemesanan = pemesanan();
?>

<div class="hero overlay" style="background-image: url('images/bg_2.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 mx-auto text-center">
        <h1 class="text-white">Detail Pesanan</h1>
      </div>
    </div>
  </div>
</div>


<!-- Booking -->
<div class="site-section bg-dark" id="booking">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="widget-next-match">
          <div class="widget-title">
            <h3>Detail Booking Lapangan</h3>
          </div>

          <div class="text-center widget-vs-contents">
            <h4 class="my-4 ">Detail Booking Lapangan</h4>
            <p>Tanggal Booking : <?= $tanggal_baru; ?></p>
            <p>Jam Booking : <?= $jadwal['jams']; ?></p>
            <p>Alamat Lapangan : Kp. Balaraja</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="widget-next-match">
          <div class="widget-title">
            <h3>Konfirmasi Pembayaran</h3>
          </div>

          <div class="text-center widget-vs-contents mt-4 mb-4">
            <h4 class="mb-4">Lakukan Pembayaran</h4>
            <p>Harga : Rp. <?= number_format($jadwal['harga']); ?>,-</p>
            <p>Silahkan melakukan transfer pada rekening dibawah ini</p>
            <p>BCA : 123123 ( Tirta Salsabila )</p>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="my-4 d-flex justify-content-center">
                <input type="file" class="form-control bg-light text-center" style="width: 50%;" name="bukti_bayar" required>
              </div>
              <div class="mb-4">
                <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Konfirmasi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- .site-section -->

<?php include "footer.php"; ?>