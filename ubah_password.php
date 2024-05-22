<?php
session_start();
require "config.php";
$ubahPassword = ubahPassword();
if (!isset($_SESSION['login_pelanggan'])) {
  header("location:login.php");
}
include "header.php";
?>

<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 mx-auto text-center">
        <h1 class="text-white mb-4 mt-5">Ubah Password</h1>
        <div class="row d-flex justify-content-center">
          <div class="col-lg-7">
            <form action="" method="post">
              <div class="mb-4">
                <input type="password" class="form-control bg-light" placeholder="Password Lama" name="password_lama" required>
              </div>
              <div class="mb-4">
                <input type="password" class="form-control bg-light" placeholder="Password Baru" name="password_baru" required>
              </div>
              <div class="mb-4">
                <input type="password" class="form-control bg-light" placeholder="Ulang Password Baru" name="ulang_password" required>
              </div>
              <div class="mb-4">
                <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Ubah Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>