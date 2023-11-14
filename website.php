<!doctype html>
<?php 
 include "includes/config.php";
 $query = mysqli_query($connection, "SELECT * FROM area");
 $query2 = mysqli_query($connection, "SELECT * FROM kabupaten");
 $query3 = mysqli_query($connection, "SELECT * FROM hotel");
 $query4 = mysqli_query($connection, "SELECT * FROM berita");
 $query5 = mysqli_query($connection, "SELECT * FROM area , kabupaten WHERE area.kabupatenKODE = kabupaten.kabupatenKODE");

 $area = mysqli_query($connection, "SELECT * FROM area , kabupaten WHERE area.kabupatenKODE = kabupaten.kabupatenKODE ORDER BY areaID");
 $area2 = mysqli_query($connection, "SELECT * FROM area , kabupaten WHERE area.kabupatenKODE = kabupaten.kabupatenKODE ORDER BY areaID");
 $kabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");
 $hotel = mysqli_query($connection, "SELECT * FROM hotel , area WHERE hotel.areaID = area.areaID ORDER BY hotelID");
 $berita = mysqli_query($connection, "SELECT * FROM berita , destinasi WHERE berita.destinasiID = destinasi.destinasiID");


 $destinasi = mysqli_query ($connection, "SELECT * FROM kategori, destinasi , fotodestinasi WHERE kategori.kategoriID = destinasi.kategoriID AND destinasi.destinasiID = fotodestinasi.destinasiID");

 $sql = mysqli_query($connection, "SELECT * FROM destinasi");
 $sql2 = mysqli_query($connection, "SELECT * FROM area");
 $sql3 = mysqli_query($connection, "SELECT * FROM kabupaten");
 $sql4 = mysqli_query($connection, "SELECT * FROM hotel");
 $sql5 = mysqli_query($connection, "SELECT * FROM berita");

 $jumlah = mysqli_num_rows($sql);
 $jumlah2 = mysqli_num_rows($sql2);
 $jumlah3 = mysqli_num_rows($sql3);
 $jumlah4 = mysqli_num_rows($sql4);
 $jumlah5 = mysqli_num_rows($sql5);
 
 $count = 1;

 $foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <title>Wisata!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: sticky; top: 0; z-index: 2;">
  <a class="navbar-brand" href="#">UAS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="website.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="area.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kabupaten Wisata
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $count = 1;?>
          <?php if(mysqli_num_rows($query2) > 0) {
            while ($row = mysqli_fetch_array($query2)) { ?>
             <a class="dropdown-item" href="#headingkab<?php echo $count; $count += 1;?>"><?php echo $row['kabupatenNAMA'] ?></a>
            <?php }
          } ?>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="area.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Area Wisata
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $count = 1;?>
          <?php if(mysqli_num_rows($query) > 0) {
          	while ($row = mysqli_fetch_array($query)) { ?>
             <a class="dropdown-item" href="#heading<?php echo $count; $count += 1;?>"><?php echo $row['areaNama'] ?></a>
            <?php }
          } ?>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="area.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hotel Wisata
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $count = 1;?>
          <?php if(mysqli_num_rows($query3) > 0) {
            while ($row = mysqli_fetch_array($query3)) { ?>
             <a class="dropdown-item" href="#headinghot<?php echo $count; $count += 1;?>"><?php echo $row['hotelnama'] ?></a>
            <?php }
          } ?>

        </div>
      </li>

       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="area.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Berita Wisata
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $count = 1;?>
          <?php if(mysqli_num_rows($query4) > 0) {
            while ($row = mysqli_fetch_array($query4)) { ?>
             <a class="dropdown-item" href="#headingberita<?php echo $count; $count += 1;?>"><?php echo $row['beritajudul'] ?></a>
            <?php }
          } ?>

      <li class="nav-item active">
        <a class="nav-link" href="website2.php"> Novel <span class="sr-only"></span></a>
      </li>

   <form class="form-inline">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
    </button>
    </form>
<!-- Topbar Navbar -->
     <ul class="navbar-nav ml-auto">
<!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-search fa-fw"></i>
    </a>
   <!-- Dropdown - Messages -->
   <!-- Nav Item - User Information -->
 </li>
 </div>
                        <li class="nav-item dropdown no-arrow" style="list-style: none; margin-right: 30px;">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Rian</span>
                                <img class="img-profile rounded-circle"
                                    src="img/bocchi1.jpg" style="width:30px; height: 30px;">
                            </a>
<!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="collapse-item" href="login.php">Masuk sebagai Admin</a>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- Akhir Menu -->

<!-- Slider -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/pemandangan1.jpg" alt="First slide">

      <div class="carousel-caption d-none d-md-block">
      	<h1> Destinasi Wisata </h1>
      	<p> Destinasi Wisata Di Indonesia </p>
      </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/pemandangan2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1> Destinasi Wisata </h1>
        <p> Destinasi Wisata Di Indonesia </p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/pemandangan3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h1> Destinasi Wisata </h1>
        <p> Destinasi Wisata Di Indonesia </p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- Akhir Slider -->

  <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid" style="margin-top: 20px;">
          <div class="container">
            <h1 class="display-4"> Daftar Area Destinasi Wisata </h1>
          </div>
        </div> <!-- Penutup Jumbotron -->

        <table class="table table-hover table-danger">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Kode Area</th>
              <th>Nama Area</th>
              <th>Wilayah</th>
              <th>Keterangan Area</th>
              <th>Kode Kabupaten</th>
              <th>Nama Kabupaten</th>
            </tr>
          </thead>
          <tbody>

      <?php $nomor = 1; 
      while ($row = mysqli_fetch_array($area2)) { ?>
        <tr>
          <td> <?php echo $nomor; ?></td>
          <td> <?php echo $row['areaID']; ?></td>
          <td> <?php echo $row['areaNama']; ?></td>
          <td> <?php echo $row['areaWilayah']; ?></td>
          <td> <?php echo $row['areaKeterangan']; ?></td>
          <td> <?php echo $row['kabupatenKODE']; ?></td>
          <td> <?php echo $row['kabupatenNAMA']; ?></td>      

        </tr>
        <?php $nomor = $nomor + 1;?>
            <?php } ?>


          </tbody>
        </table>

      </div>
      <div class="col-sm-1"></div>
   </div>

<!-- Membuat Tampilan Obyek -->

<div class="container">
	<div class="row">
    <div class="col-sm-8">

<?php if(mysqli_num_rows($destinasi) > 0){
  while($row2 = mysqli_fetch_array($destinasi))
{ ?>
      <div class="media">
       <div class="media-body" style="margin-top : 40px;">
       <h4 class="mt-0 mb-1"> <?php echo $row2["destinasiNama"] ?> </h4>
       <h5><?php echo $row2["destinasiAlamat"] ?></h5>
       <p><?php echo $row2["kategoriket"]?></p>
       </div>
    <img class="ml-3" style="width: 200px; height: 100%; margin-top: 40px;" src="img/<?php echo $row2["fotofile"]?>" alt="Gambar Tidak Ada">
</div>
<?php } } ?>
    </div>
    <div class="col-sm-4">
      <ul class="list-group" style="margin-top: 40px;">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a style="color: blue;">Jumlah Obyek Wisata</a>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a href="area.php" style="text-decoration: none;"> Area </a>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah2?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a href="kabupaten.php" style="text-decoration: none;">Kabupaten </a>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah3?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a href="hotel.php" style="text-decoration: none;">Hotel </a>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah4?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a href= "berita.php" style="text-decoration: none;"> Berita </a>
    <span class="badge badge-primary badge-pill"><?php echo $jumlah5?></span>
  </li>
</ul>
  <div class="searchbar" style="margin-top: 20px;">
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color: #c0392b; color : white;">Search</button>
  </form>
</div>
    </div>
		
	</div>
</div>

<!-- End obyek -->

<!-- Galeri -->

<div class="container">
  <div class="row">
    <?php 
    while ($row3 = mysqli_fetch_array($foto)) { ?>
    <div class="col-sm-4">
  <figure class="figure" style="border-style: solid; margin-top: 70px; border-width: 2px; border-radius: 10px;background-color: #beee; border-color: darkred;">
  <img style="width : 400px; height: 200px;" src="img/<?php echo $row3["fotofile"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada.">
  <figcaption class="figure-caption" style="font-size: 18px; color: firebrick; text-align: center;"><?php echo $row3["fotonama"]?></figcaption>
</figure>
 </div>
<?php } ?>
 </div>
</div>

<!-- End Galeri -->

<!-- Awal Dropdown -->
<div class="container">
  <div class="col-sm-14">
  <div class="jumbotron jumbotron-fluid" style="background-color: skyblue; margin-top: 40px;">
  <div class="container">
    <h1 class="display-4" style="text-align: center;">Area Wisata</h1>
   </div>
  </div>
</div>
</div>


<div class="container" style="margin-top: 40px;">
  <div class="row">
      <?php $count = 1;?>
<?php if(mysqli_num_rows($area) > 0){
  while($row4 = mysqli_fetch_array($area))
   { ?>
    <div class="col-sm-12">
   <div id="accordion"> 
     <div class="card">
      <div class="card-header" id="heading<?php echo $count?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $count?>" aria-expanded="true" aria-controls="collapse<?php echo $count?>">
          <?php echo $row4["areaNama"] ?>
        </button>
      </h5>
  </div>
    </div>

    <div id="collapse<?php echo $count?>" class="collapse" aria-labelledby="heading<?php echo $count?>" data-parent="#accordion">
      <div class="card-body">
        <p><?php echo $row4["areaKeterangan"]?></p>
        <p><?php echo $row4["kabupatenNAMA"]?></p>
      </div>
    </div>
     </div>
  </div>
         <?php $count += 1;?>
       <?php } } ?>
</div>
</div>
 
<!-- Akhir DropDown -->

<div class="container">
  <div class="col-sm-14">
  <div class="jumbotron jumbotron-fluid" style="background-color: skyblue; margin-top: 40px;">
  <div class="container">
    <h1 class="display-4" style="text-align: center;">Kabupaten Wisata</h1>
   </div>
  </div>
</div>
</div>

    <?php $count = 1?>
<?php if(mysqli_num_rows($kabupaten) > 0){
  while($row2 = mysqli_fetch_array($kabupaten))
{ ?>

  <div class="container">
    <div class="row">
   <div class="col-sm-8">
      <div class="media" id="headingkab<?php echo $count ?>">
       <div class="media-body" style="margin-top : 40px;">
       <h4 class="mt-0 mb-1"> <?php echo $row2["kabupatenNAMA"] ?> </h4>
       <h5><?php echo $row2["kabupatenALAMAT"] ?></h5>
       <p><?php echo $row2["kabupatenKET"]?></p>
       </div>
    <img class="ml-3" style="width: 200px; height: 100%; margin-top: 40px;" src="img/<?php echo $row2["kabupatenFOTOICON"]?>" alt="Gambar Tidak Ada">
</div>
   </div>
    <div class="col-sm-4" style="margin-top: 40px;">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56211042157!2d107.64315755!3d-6.90344945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1670410757410!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>
<?php $count += 1 ?>
<?php } } ?>   

<div class="container">
  <div class="col-sm-14">
  <div class="jumbotron jumbotron-fluid" style="background-color: skyblue; margin-top: 40px;">
  <div class="container">
    <h1 class="display-4" style="text-align: center;"> Hotel Wisata </h1>
   </div>
  </div>
</div>
</div>

<?php $count = 1;?>
<?php if(mysqli_num_rows($hotel) > 0){
  while($row2 = mysqli_fetch_array($hotel))
{ ?>
<div class="container">
  <div class="row">
    <div class="col-sm-8">

      <div class="media" id="headinghot<?php echo $count;?>">
       <div class="media-body" style="margin-top : 40px;">
       <h4 class="mt-0 mb-1"> <?php echo $row2["hotelnama"] ?> </h4>
       <h5><?php echo $row2["hotelalamat"] ?></h5>
       <p><?php echo $row2["hotelketerangan"]?></p>
       </div>
</div>
    </div>

    <div class="col-sm-4" style="text-align: right; margin-top: 40px;">
      <img class="ml-3" style="width: 200px; height: 100%;" src="img/<?php echo $row2["hotelfoto"]?>" alt="Gambar Tidak Ada">
    </div>
  </div>
</div>
    <?php $count += 1;?>
    <?php } } ?>

    <div class="container">
  <div class="col-sm-14">
  <div class="jumbotron jumbotron-fluid" style="background-color: skyblue; margin-top: 40px;">
  <div class="container">
    <h1 class="display-4" style="text-align: center;"> Berita Wisata </h1>
   </div>
  </div>
</div>
</div>


<div class="container" style="margin-top: 50px;">
    <div class="row">
      <?php $count = 1;?>
   <?php if(mysqli_num_rows($berita) > 0){
  while($row2 = mysqli_fetch_array($berita))
{ ?>
  <div class="col-sm-4">
    <div class="card" id="headingberita<?php echo $count;?>" style="background-color: sandybrown; margin-top: 20px;">
      <div class="card-body">
        <h3 class="card-title"><?php echo $row2["beritajudul"]?></h3>
        <h5 class="card-title"><?php echo $row2["destinasiNama"]?></h5>
        <p class="card-text"><?php echo $row2["beritainti"] ?></p>
        <p class="card-text" style="text-align: right;"><?php echo $row2["penulis"]?> , <?php echo $row2["penerbit"] ?></p>
        <p class="card-text" style="text-align: right;"><?php echo $row2["tanggalterbit"] ?></p>

      </div>
    </div>
  </div>
  <?php $count += 1;?>
<?php } } ?>
</div>
</div>

<section class="footer" style="margin-top: 50px; background-color: #beee;">
      <div class="social">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-snapchat"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
      </div>

      <ul class="list">
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a href="#">Services</a>
        </li>
        <li>
          <a href="#">About</a>
        </li>
        <li>
          <a href="#">Terms</a>
        </li>
        <li>
          <a href="#">Privacy Policy</a>
        </li>
      </ul>
      <p class="copyright">Wisata UAS @ 2022</p>
    </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>