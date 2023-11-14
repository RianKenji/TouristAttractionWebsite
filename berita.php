<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
 if(isset($_POST['simpan']))
 {
  if(isset($_REQUEST['inputkode'])){
    $beritakode = $_REQUEST['inputkode'];
  }

  if(!empty($beritakode)){
    $beritakode = $_REQUEST['inputkode'];
  }
  else {
    ?> <h1>Anda Harus mengisi data</h1> <?php 
    die ("Anda Harus Memasukkan Datanya");
  }

   $beritanama = $_POST['inputnama'];
   $beritainti = $_POST['inti'];
   $penulisberita = $_POST['penulis'];
   $penerbitberita = $_POST['penerbit'];
   $tanggalterbit = $_POST['tanggalterbit'];
   $kodedestinasi = $_POST['kodedestinasi'];

   mysqli_query($connection, "insert into berita values ('$beritakode' , '$beritanama' , '$beritainti', '$penulisberita' , '$penerbitberita', '$tanggalterbit' , '$kodedestinasi')");
   header("location:berita.php");
 }

 $datakategori = mysqli_query($connection, "select * from kategori");
 $dataarea = mysqli_query($connection, "select * from area");
 $datakabupaten = mysqli_query($connection, "select * from kabupaten");
 $datadestinasi = mysqli_query($connection, "select * from destinasi");
?>

  <div class="row"> 
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

  <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4"> Input Berita Wisata </h1>
          </div>
        </div> <!-- Penutup Jumbotron -->
  

<form method="POST">
  <div class="form-group row">
    <label for="kodeberita" class="col-sm-2 col-form-label">Kode Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodeberita" name="inputkode" placeholder="Kode Berita" maxlength="4">
    </div>
  </div>

  <div class="form-group row">
    <label for="namaberita" class="col-sm-2 col-form-label">Judul Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namaberita" name="inputnama" placeholder="Judul Berita">
    </div>
  </div>

  <div class="form-group row">
    <label for="inti" class="col-sm-2 col-form-label">Inti Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inti" name="inti" placeholder="Inti Berita">
    </div>
  </div>

    <div class="form-group row">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis Berita">
    </div>
  </div>

   <div class="form-group row">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit Berita">
    </div>
  </div>

    <div class="form-group row">
    <label for="tanggalterbit" class="col-sm-2 col-form-label">Tanggal Terbit</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="tanggalterbit" name="tanggalterbit" placeholder="Tanggal Terbit">
    </div>
  </div>

  <div class="form-group row">
    <label for="kodedestinasi" class="col-sm-2 col-form-label">Destinasi Wisata</label>
    <div class="col-sm-10">
    <select class="form-control" id="kodedestinasi" name="kodedestinasi">
        <?php while ($row = mysqli_fetch_array($datadestinasi)) { ?>
          <option value="<?php echo $row["destinasiID"]?>">
            <?php echo $row["destinasiID"];?>
            <?php echo $row["destinasiNama"];?>
          </option>
          <?php } ?>
    </select>
    </div>
  </div>

  <div class="form-group row">
      <div class="col-sm-2"></div>   
      <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" value="simpan" name="simpan"> Simpan </button>
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
            <h1 class="display-4"> Daftar Berita Wisata </h1>
            <h2>Hasil Entri Data Pada Tabel Berita</h2>
          </div>
        </div> <!-- Penutup Jumbotron -->

        <form method="POST">
          <div class="form-group row mb-2">
            <label for="Search" class="col-sm-3"> Judul Berita </label>
            <div class="col-sm-6">
              <input type="text" name="Search" class="form-control" id="Search" value="<?php if(isset($_POST['Search'])){echo $_POST['Search'];}?>" placeholder="Cari Judul Berita">
            </div>
              <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">            
          </div>
        </form>

        <table class="table table-hover table-danger">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Kode Berita</th>
              <th>Judul Berita</th>
              <th>Inti Berita</th>
              <th>Penulis</th>
              <th>Penerbit</th>
              <th>Tanggal Terbit</th>
              <th>Kode Destinasi</th>
              <th>Nama Destinasi</th>

              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>

    <?php
    if (isset($_POST['kirim'])) {
      $search = $_POST['Search'];
      $query = mysqli_query($connection, "select berita.* , destinasi.destinasiID , destinasi.destinasiNama
        from destinasi , berita
        where beritajudul like '%" .$search. "%'
        and berita.destinasiID = destinasi.destinasiID");
      //'%" .$search. "%'"
      //'$search%'"
    }else{

      $query = mysqli_query($connection, "select berita.* , destinasi.destinasiID , destinasi.destinasiNama
        from destinasi , berita
        where berita.destinasiID = destinasi.destinasiID");
  }

      $nomor = 1;
      while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
          <td> <?php echo $nomor; ?></td>
          <td> <?php echo $row['beritaID']; ?></td>
          <td> <?php echo $row['beritajudul']; ?></td>
          <td> <?php echo $row['beritainti']; ?></td>
          <td> <?php echo $row['penulis']; ?></td>
          <td> <?php echo $row['penerbit']; ?></td>
          <td> <?php echo $row['tanggalterbit']; ?></td>
          <td> <?php echo $row['destinasiID']; ?></td>
          <td> <?php echo $row['destinasiNama']; ?></td>

          <td>
           <a href="beritaedit.php?ubah=<?php echo $row["beritaID"]?>" class="btn btn-success btn-sm" title="EDIT">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
           <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
           <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
           </svg>
          </a>
         </td>

        <td>
        <a href="beritahapus.php?hapus=<?php echo $row["beritaID"]?>" class="btn btn-success btn-sm" title="DELETE">
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

<script type="text/javascript">
  $(document).ready(function(){
    $('#kodedestinasi').select2({
      allowClear : true,
      placeholder: "Pilih Destinasi Wisata"
    });
  });
</script>


 </div>
 </div> <!--penutup container fluid-->

 <?php include "footer.php" ?>

 <?php 
 mysqli_close($connection);
 ob_end_flush();
?>

</html>