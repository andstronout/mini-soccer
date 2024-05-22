<!DOCTYPE html>
<html lang="en">

<head>
  <title>Mini Soccer Tirta Salsabila</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">



</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!-- Navbar -->
    <header class="site-navbar py-4" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.php">
              <img src="images/logo.png" alt="Logo">
            </a>
          </div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="index.php#booking" class="nav-link">Booking</a></li>
                <?php if (!isset($_SESSION['login_pelanggan'])) { ?>
                  <li><a href="login.php" class="nav-link">Login</a></li>
                <?php } else {
                  $sql_user = sql("SELECT * FROM user WHERE id_user='$_SESSION[id_pelanggan]'");
                  $user = $sql_user->fetch_assoc();
                ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Halo <?= $user['nama_user']; ?></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="margin-left: -40px;">
                      <li><a class="dropdown-item" href="riwayat_pesanan.php">Pesanan</a></li>
                      <li><a class="dropdown-item" href="ubah_password.php">Ubah Password</a></li>
                      <li><a class="dropdown-item" href="ubah_profil.php">Ubah Profil</a></li>
                      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                  </li>
                <?php } ?>


              </ul>
            </nav>

            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span class="icon-menu h3 text-white"></span></a>
          </div>
        </div>
      </div>

    </header>