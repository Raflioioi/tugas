<?php 
  require_once("koneksi.php");
  if (!isset($_SESSION)) {
      session_start();
  }

  if (!isset($_SESSION['username'])) {
      header('location:Login.php');
  } else {
      $username=$_SESSION['username'];    
  }

  $username=$_SESSION['username'];
  $status = mysqli_query($connection, "SELECT * FROM admin WHERE username='$username'");
  $ada = mysqli_num_rows($status);
  $hasil = mysqli_fetch_array($status);
?>
<html lang="en">
<head>
  <title>ADMIN-NEWS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this tsidebaremplate -->
  <link href="css/navigasi.css" rel="stylesheet">
</head>
<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right nav-guru" id="sidebar-wrapper">
      <div class="sidebar-heading">KATEGORI</div>
      <div class="list-group list-group-flush">
        <a href="Beranda.php" class="list-group-item list-group-item-action bg-light">Beranda</a>
        <a href="VIRAL.php" class="list-group-item list-group-item-action bg-light">VIRAL</a>
        <a href="TEKNOLOGI.php" class="list-group-item list-group-item-action bg-light">TEKNOLOGI</a>
        <a href="KULINER.php" class="list-group-item list-group-item-action bg-light">KULINER</a>
        <a href="HIBURAN.php" class="list-group-item list-group-item-action bg-light">HIBURAN</a>
        <a href="OLAHRAGA.php" class="list-group-item list-group-item-action bg-light">OLAHRAGA</a>
        <a href="css/navigasi.css" rel="stylesheet">
        <!-- <a href="?view=UPLOAD BERITA" class="list-group-item list-group-item-action bg-light">UPLOAD BERITA</a> -->
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Jenis Berita</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="proses_logout.php">
                <!-- <?php echo $_SESSION['username']; ?> -->
                LOGIN
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Ganti Foto</a>
                <a class="dropdown-item" href="#">Ganti Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../proses_logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <?php
                            // if (isset($_GET['view'])) {
                            //     $view = $_GET['view'];
                            //     include 'admin/' . $view . '.php';
                            // } else {
                            //     $_GET['view'] = 'UPLOAD_BERITA';
                            // }
      include "fungsi.php";
$page=defineget('page');

if ($page=="undefined") {
    include "Beranda.php";
}elseif ($page=="materi1") {
    include "materi1.php";
}
                            ?>
<!-- <div class="container-fluid">
    <h1 class="mt-4">Simple Sidebar</h1>
    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
</div> -->
    </div>
    <!-- /#page-content-wrapper -->



  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>