<?php
session_start();
require "config.php";

$sql_pesanan = sql("SELECT * FROM pesanan INNER JOIN user ON pesanan.id_pelanggan=user.id_user INNER JOIN jadwal ON jadwal.id_jadwal=pesanan.id_jadwal INNER JOIN harga ON jadwal.id_harga=harga.id_harga WHERE id_pelanggan='$_SESSION[id_pelanggan]' ORDER BY tanggal DESC");

$no = 1;
include "header.php";
?>

<div class="hero overlay" style="background-image: url('images/bg_2.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 mx-auto text-center">
        <h1 class="text-white">History Pesanan</h1>
      </div>
    </div>
  </div>
</div>


<!-- Booking -->
<div class="site-section bg-dark" id="booking">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6">
        <div class="widget-next-match">
          <table class="table custom-table">
            <thead>
              <tr>
                <th>P</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Harga</th>
                <th>Bukti Bayar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sql_pesanan as $pesanan) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><strong class="text-white"><?= $pesanan['tanggal']; ?></strong></td>
                  <td><strong class="text-white"><?= $pesanan['jams']; ?></strong></td>
                  <td><strong class="text-white">Rp. <?= number_format($pesanan['harga']); ?> ,-</strong></td>
                  <td><button type="button" class="btn btn-outline-primary text-white" data-toggle="modal" data-target="#lihatbuktiModal<?= $pesanan['id_pesanan'] ?>">
                      Lihat Bukti
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="lihatbuktiModal<?= $pesanan['id_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Bayar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="card bg-dark text-white">
                              <img src="../images/bukti_bayar/<?= $pesanan['bukti_bayar']; ?>" class="card-img" alt="...">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
          <a href="index.php" class="btn btn-outline-secondary my-3">Kembali Ke Halaman Utama</a>
        </div>
      </div>
    </div>
  </div>
</div> <!-- .site-section -->

<?php include "footer.php"; ?>