<?php
session_start();
require "config.php";

$login = login();

if (isset($_SESSION['login_pelanggan'])) {
  header("location:index.php");
}

include "header.php";
?>

<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 mx-auto text-center">
        <h1 class="text-white mb-4">Login</h1>
        <div class="row d-flex justify-content-center">
          <div class="col-lg-7">
            <form action="" method="post">
              <div class="mb-4">
                <input type="text" class="form-control bg-light text-white" placeholder="Email" name="email" required>
              </div>
              <div class="mb-4">
                <input type="password" class="form-control bg-light" placeholder="Password" name="password" required>
              </div>
              <div class="mb-4">
                <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Login</button>
              </div>
            </form>
            <p>Belum punya akun? <a href="register.php" class="text-success">Register Sekarang</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>