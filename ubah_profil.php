<?php
session_start();
require "config.php";
if (isset($_POST["submit"])) {
  $ubahProfil = ubahProfil();
}
if (!isset($_SESSION['login_pelanggan'])) {
  header("location:login.php");
}
include "header.php";
?>

<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 mx-auto text-center">
        <h1 class="text-white mb-4 mt-5">Edit Profil</h1>
        <div class="row d-flex justify-content-center">
          <div class="col-lg-7">
            <form action="#" method="post">
              <div class="mb-4">
                <input type="text" class="form-control bg-light text-white" placeholder="Nama" name="nama_user" value="<?= $user['nama_user']; ?>" required>
              </div>
              <div class="mb-4">
                <input type="text" class="form-control bg-light text-white" placeholder="Nomor Handphone" name="nomor_hp" value="<?= $user['nomor_hp']; ?>" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
              </div>
              <div class="mb-4">
                <input type="text" class="form-control bg-light text-white" placeholder="Email" name="email" value="<?= $user['email']; ?>" disabled>
              </div>
              <div class="mb-4">
                <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Ubah Profil</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>