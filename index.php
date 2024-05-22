<?php
session_start();
require "config.php";
include "header.php";
$sql_jam = sql("SELECT * FROM jadwal");
$no = 1;

?>


<!-- Home -->
<div class="hero overlay" style="background-image: url('images/bg_1.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 ml-auto">
        <h1 class="text-white">Tirta Salsabila</h1>
        <p>Let's play Let's Fun.</p>
        <p>
          <a href="#booking" class="btn btn-primary py-3 px-4 mr-3">Book Now</a>
        </p>
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
            <h3>Booking Lapangan</h3>
          </div>

          <div class="text-center widget-vs-contents mt-4 mb-4">
            <h4 class="mb-4">Pilih Lapangan dan Tanggal Main</h4>
            <form action="" method="post">
              <div class="my-4 d-flex justify-content-center">
                <input type="date" class="form-control bg-light text-center" style="width: 50%;" name="tanggal" value="<?= isset($_POST["tanggal"]) ? $_POST["tanggal"] : ''; ?>" required>
              </div>
              <div class="mb-4">
                <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Cari Tanggal</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="widget-next-match">
          <table class="table custom-table">
            <thead>
              <tr>
                <th>P</th>
                <th>Waktu</th>
                <th>Status</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_POST["submit"])) {
                $tanggal = $_POST["tanggal"];
                $current_datetime = new DateTime();

                // Query untuk mencari semua id_jadwal yang sudah dibooking pada tanggal tersebut
                $sql_tanggal = sql("SELECT id_jadwal FROM pesanan WHERE tanggal='$tanggal'");

                $booked_slots = [];
                while ($hasil_tanggal = $sql_tanggal->fetch_assoc()) {
                  $booked_slots[] = $hasil_tanggal['id_jadwal'];
                }

                foreach ($sql_jam as $jam) :
                  $jam_datetime = new DateTime("$tanggal {$jam['jam']}");
              ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><strong class="text-white"><?= $jam['jams']; ?></strong></td>
                    <td>
                      <?php
                      if ($jam_datetime > $current_datetime) {
                        echo in_array($jam['id_jadwal'], $booked_slots) ? 'Booked' : 'Ready';
                      } else {
                        echo 'Not Available';
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($jam_datetime > $current_datetime) {
                        if (in_array($jam['id_jadwal'], $booked_slots)) { ?>
                          <a href="#" class="btn btn-warning">Not Available</a>
                        <?php } else { ?>
                          <a href="cart.php?id_jadwal=<?= $jam['id_jadwal']; ?>&tanggal=<?= $tanggal; ?>" class="btn btn-outline-success">Booking</a>
                        <?php }
                      } else { ?>
                        <a href="#" class="btn btn-warning">Not Available</a>
                      <?php } ?>
                    </td>
                  </tr>
              <?php endforeach;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div> <!-- .site-section -->



<?php include "footer.php"; ?>