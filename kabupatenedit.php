<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wisata</title>
</head>

<?php 
 ob_start();
 session_start();
 if (!isset($_SESSION["emailUser"])) {
   header("location:login.php");
  }
?>

  <?php include "header.php"; ?>

  <div class="container-fluid"> 
  <div class="card shadow mb-4">
  

<?php 
 include "includes/config.php";
?>

<?php 
 if(isset($_POST['Edit']))
 {
  if(isset($_REQUEST['inputkode'])){
    $kabupatenkode = $_REQUEST['inputkode'];
  }

  if(!empty($kabupatenkode)){
    $kabupatenkode = $_REQUEST['inputkode'];
  }
  else {
    ?> <h1>Anda Harus mengisi data</h1> <?php 
    die ("Anda Harus Memasukkan Datanya");
  }

  $kabupatennama = $_POST['inputnama'];
  $alamat = $_POST['alamat'];
  $keterangankab = $_POST['ketkabupaten'];

  $nama = $_FILES['file']['name'];
  $file_tmp = $_FILES["file"]["tmp_name"];

  $ketfotokabupaten = $_POST['ketfoto'];

  if(empty($nama)){
    mysqli_query($connection, "update kabupaten set kabupatenKODE = '$kabupatenkode', kabupatenNAMA = '$kabupatennama', kabupatenALAMAT = '$alamat', kabupatenKET='$keterangankab', kabupatenFOTOICONKET = '$ketfotokabupaten'
      where kabupatenKODE = '$kabupatenkode' ");
    header('location:kabupaten.php');
  }else{
    $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

  //periksa ekstensi file harus jpg
  if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
  {
    move_uploaded_file($file_tmp, 'img/'.$nama); // unggah file ke folder images
    mysqli_query($connection,"update kabupaten set kabupatenKODE = '$kabupatenkode', kabupatenNAMA = '$kabupatennama', kabupatenALAMAT = '$alamat', kabupatenKET='$keterangankab' , kabupatenFOTOICON = '$nama' , kabupatenFOTOICONKET = '$ketfotokabupaten'
      where kabupatenKODE = '$kabupatenkode'");
    header("location:kabupaten.php");
  
  }
}
  
  }

 $datakategori = mysqli_query($connection, "select * from kategori");
 $dataarea = mysqli_query($connection, "select * from area");
 $datakabupaten = mysqli_query($connection, "select * from kabupaten");

 //untuk menampilkan data pada form edit

  $kodekabupaten = $_GET["ubah"];
  $editkabupaten = mysqli_query($connection, "select * from kabupaten
    where kabupatenKODE = '$kodekabupaten'");
  $rowedit = mysqli_fetch_array($editkabupaten);

?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Destinasi Wisata</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

  <div class="row"> 
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

  <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4"> Edit Kabupaten Wisata </h1>
          </div>
        </div> <!-- Penutup Jumbotron -->
  

<form method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="kodekabupaten" class="col-sm-2 col-form-label">Kode Kabupaten</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodekabupaten" name="inputkode" 
      value="<?php echo $rowedit["kabupatenKODE"]?>" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="namakabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namakabupaten" name="inputnama" 
      value="<?php echo $rowedit["kabupatenNAMA"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat Kabupaten</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="alamat" name="alamat" 
      value="<?php echo $rowedit["kabupatenALAMAT"]?>">
    </div>
  </div>

  <div class="form-group row"> 
          <label for="ketkabupaten" class="col-sm-2 col-form-label"> Keterangan Kabupaten </label>
          <div class="col-sm-10">
          	<input type="text" class="form-control" id="ketkabupaten" name="ketkabupaten"
          	value="<?php echo $rowedit["kabupatenKET"]?>">
          </div>
    </div>

	 <div class="form-group row">
		<label for="file" class="col-sm-2 col-form-label">Foto Kabupaten</label>
		<div class="col-sm-10">
			<input type="file" id="file" name="file">
			<img src="img/<?php echo $rowedit['kabupatenFOTOICON']?>" style="width: 200px; height: 100px;">
			<p class="help-block"> Masukkan foto </p>
		</div>
	</div>

	<div class="form-group row">
	    <label for="ketfoto" class="col-sm-2 col-form-label">Keterangan Photo</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="ketfoto" name="ketfoto" 
	      value="<?php echo $rowedit["kabupatenFOTOICONKET"]?>" >
	    </div>
	 </div>


  <div class="form-group row">
      <div class="col-sm-2"></div>   
      <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" value="Edit" name="Edit"> Edit </button>
      <button type="reset" class="btn btn-secondary" value="batal" name="batal"> Batal </button>    
  </div>
  </div>
 </form>
</div>

<div class="col-sm-1"></div>
</div>

<!-- memulai dengan menampilkan data -->
  <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4"> Daftar Kabupaten Wisata </h1>
            <h2>Hasil Entri Data Pada Tabel Kabupaten</h2>
          </div>
        </div> <!-- Penutup Jumbotron -->

        <form method="POST">
          <div class="form-group row mb-2">
            <label for="Search" class="col-sm-3"> Nama Kabupaten </label>
            <div class="col-sm-6">
              <input type="text" name="Search" class="form-control" id="Search" value="<?php if(isset($_POST['Search'])){echo $_POST['Search'];}?>" placeholder="Cari Nama Kabupaten">
            </div>
              <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">            
          </div>
        </form>

        <table class="table table-hover table-danger">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Kode Kabupaten</th>
              <th>Nama Kabupaten</th>
              <th>Alamat</th>
              <th>Keterangan Kabupaten</th>
              <th>Icon Foto</th>
              <th>Keterangan Foto</th>

              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>

    <?php
    if (isset($_POST['kirim'])) {
      $search = $_POST['Search'];
      $query = mysqli_query($connection, "select * from kabupaten where kabupatenNAMA like '%" .$search. "%'");
    }else{
      $query = mysqli_query($connection, "select * from kabupaten");
     }

      $nomor = 1;
      while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
          <td> <?php echo $nomor; ?></td>
          <td> <?php echo $row['kabupatenKODE']; ?></td>
          <td> <?php echo $row['kabupatenNAMA']; ?></td>
          <td> <?php echo $row['kabupatenALAMAT']; ?></td>
          <td> <?php echo $row['kabupatenKET']; ?></td>
          <td> <?php if(is_file("img/".$row['kabupatenFOTOICON']))
             { ?>
              <img src="img/<?php echo $row['kabupatenFOTOICON']?>" width="80">
        <?php } else 
         echo "<img src='img/noimage.png' width ='80'";
        ?> </td>
          <td> <?php echo $row['kabupatenFOTOICONKET']; ?></td>
          <td>
           <a href="kabupatenedit.php?ubah=<?php echo $row["kabupatenKODE"]?>" class="btn btn-success btn-sm" title="EDIT">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
           <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
           <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
           </svg>
          </a>
         </td>

        <td>
        <a href="kabupatenhapus.php?hapus=<?php echo $row["kabupatenKODE"]?>" class="btn btn-success btn-sm" title="DELETE">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg>
       </a>
       </td>

        </tr>
        <?php $nomor = $nomor + 1;?>
      <?php } ?>

          </tbody>
        </table>

      </div>
      <div class="col-sm-1"></div>
   </div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

 </div>
 </div> <!--penutup container fluid-->

 <?php include "footer.php" ?>

 <?php 
 mysqli_close($connection);
 ob_end_flush();
?>

</html>