<!doctype html>
<?php 
 include "includes/config.php";
 $query = mysqli_query($connection, "SELECT * FROM area");
 $query2 = mysqli_query($connection, "SELECT * FROM kabupaten");
 $query3 = mysqli_query($connection, "SELECT * FROM hotel");
 $query4 = mysqli_query($connection, "SELECT * FROM berita");
 $query5 = mysqli_query($connection, "SELECT * FROM visualnovel");
 $query6 = mysqli_query($connection, "SELECT * FROM lightnovel");
 $query7 = mysqli_query($connection, "SELECT * FROM developer");


 $area = mysqli_query($connection, "SELECT * FROM area , kabupaten WHERE area.kabupatenKODE = kabupaten.kabupatenKODE ORDER BY areaID");
 $kabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");
 $hotel = mysqli_query($connection, "SELECT * FROM hotel , area WHERE hotel.areaID = area.areaID ORDER BY hotelID");
 $berita = mysqli_query($connection, "SELECT * FROM berita , destinasi WHERE berita.destinasiID = destinasi.destinasiID");
 $visualnovel = mysqli_query($connection, "SELECT * FROM visualnovel , developer WHERE visualnovel.developerID = developer.developerID ORDER BY vnID");
  $lightnovel = mysqli_query($connection, "SELECT * FROM lightnovel");



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
  <body style="background-color: #57606f;">
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
             <a class="dropdown-item" href="website.php #headingkab<?php echo $count; $count += 1;?>"><?php echo $row['kabupatenNAMA'] ?></a>
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
             <a class="dropdown-item" href="website.php #heading<?php echo $count; $count += 1;?>"><?php echo $row['areaNama'] ?></a>
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
             <a class="dropdown-item" href="website.php #headinghot<?php echo $count; $count += 1;?>"><?php echo $row['hotelnama'] ?></a>
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
             <a class="dropdown-item" href="website.php #headingberita<?php echo $count; $count += 1;?>"><?php echo $row['beritajudul'] ?></a>
            <?php }
          } ?>

        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="area.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Visual Novel
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $count = 1;?>
          <?php if(mysqli_num_rows($query5) > 0) {
            while ($row = mysqli_fetch_array($query5)) { ?>
             <a class="dropdown-item" href="#headingvn<?php echo $count; $count += 1;?>"><?php echo $row['vnNAMA'] ?></a>
            <?php }
          } ?>

        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="area.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Light Novel
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $count = 1;?>
          <?php if(mysqli_num_rows($query6) > 0) {
            while ($row = mysqli_fetch_array($query6)) { ?>
             <a class="dropdown-item" href="#headingln<?php echo $count; $count += 1;?>"><?php echo $row['lnJudul'] ?></a>
            <?php }
          } ?>

        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="area.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Developer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $count = 1;?>
          <?php if(mysqli_num_rows($query7) > 0) {
            while ($row = mysqli_fetch_array($query7)) { ?>
             <a class="dropdown-item" href="#headingdev<?php echo $count; $count += 1;?>"><?php echo $row['developerNAMA'] ?></a>
            <?php }
          } ?>

        </div>
      </li>
    </ul>
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
      <img class="d-block w-100" src="img/wallpaper1.jpg" alt="First slide">

      <div class="carousel-caption d-none d-md-block">
      	<h1> Novel </h1>
      </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/wallpaper2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1> Novel </h1>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/wallpaper3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h1> Novel </h1>
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

<!-- Membuat Tampilan Obyek -->

 <div class="searchbar" style="margin-top: 20px; margin-left : 40%;">
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color: #f1c40f;">Search</button>
  </form>
</div>

<div class="container">
  <div class="col-sm-14">
  <div class="jumbotron jumbotron-fluid" style="background-color: skyblue; margin-top: 40px;">
  <div class="container">
    <h1 class="display-4" style="text-align: center;">Light Novel</h1>
   </div>
  </div>
</div>
</div>

<div class="container">
	<div class="row">
    <div class="col-sm-12">

<?php $count = 1;?>
<?php if(mysqli_num_rows($lightnovel) > 0){
  while($row2 = mysqli_fetch_array($lightnovel))
{ ?>
      <div class="media" style="margin-top: 60px;" id="headingln<?php echo $count;?>">
  <img class="align-self-start mr-3" style="width: 300px; height: 100%; margin-top: 40px;" src="img/<?php echo $row2["lnIllust"]?>" alt="Gambar Tidak Ada">
  <div class="media-body" style="margin-top: 50px; color: white;">
    <h4 class="mt-0 mb-1"> Judul : <?php echo $row2["lnJudul"] ?> </h4>
    <h5> Penulis : <?php echo $row2["lnAuthor"] ?></h5>
    <p> Illustrator : <?php echo $row2["lnIllustrator"]?></p>
    <p> Synopsis : <?php echo $row2["lnSynopsis"]?></p>
    <p> Tahun Rilis : <?php echo $row2["tahunRilis"]?></p>
  </div>
</div>
<?php $count++ ?>
<?php } } ?>
    </div>
		
	</div>
</div>

<!-- End obyek -->

<div class="container">
  <div class="col-sm-14">
  <div class="jumbotron jumbotron-fluid" style="background-color: skyblue; margin-top: 40px;">
  <div class="container">
    <h1 class="display-4" style="text-align: center;">Visual Novel</h1>
   </div>
  </div>
</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-12">

<?php $count = 1;?>
<?php if(mysqli_num_rows($visualnovel) > 0){
  while($row2 = mysqli_fetch_array($visualnovel))
{ ?>
      <div class="media" style="margin-top: 60px; color: white;" id="headingvn<?php echo $count;?>">
  <img class="align-self-start mr-3" style="width: 300px; height: 100%; margin-top: 40px;" src="img/<?php echo $row2["vnfoto"]?>" alt="Gambar Tidak Ada">
  <div class="media-body" style="margin-top: 50px;">
    <h4 class="mt-0 mb-1"> Judul : <?php echo $row2["vnNAMA"] ?> </h4>
    <p> Rating : <?php echo $row2["rating"] ?></p>
    <p> Synopsis : <?php echo $row2["genre"]?></p>
    <p> Developer : <?php echo $row2["developerNAMA"]?></p>
    <p> Tahun Rilis : <?php echo $row2["tahunterbit"]?></p>
  </div>
</div>
<?php $count++ ?>
<?php } } ?>
    </div>
    
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