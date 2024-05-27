<?php
session_start();
require "config.php";
$register = register();

if (isset($_SESSION['login_user'])) {
  header("location:index.php");
}
include "header.php";
?>

<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 mx-auto text-center">
        <h1 class="text-white mb-4 mt-5">Register</h1>
        <div class="row d-flex justify-content-center">
          <div class="col-lg-7">
            <form action="#">
              <div class="mb-4">
                <input type="text" class="form-control bg-light text-white" placeholder="Nama">
              </div>
              <div class="mb-4">
                <input type="text" class="form-control bg-light text-white" placeholder="Nomor Handphone" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
              </div>
              <div class="mb-4">
                <input type="text" class="form-control bg-light text-white" placeholder="Email">
              </div>
              <div class="mb-4">
                <input type="password" class="form-control bg-light" placeholder="Password">
              </div>
              <div class="mb-4">
                <input type="submit" class="btn btn-primary py-3 px-5" value="Login">
              </div>
            </form>
            <p>Sudah punya akun? <a href="login.php" class="text-success">Login Sekarang</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>