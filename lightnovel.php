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
    $lnkode = $_REQUEST['inputkode'];
  }

  if(!empty($lnkode)){
    $lnkode = $_REQUEST['inputkode'];
  }
  else {
    ?> <h1>Anda Harus mengisi data</h1> <?php 
    die ("Anda Harus Memasukkan Datanya");
  }

   $lnjudul = $_POST['inputnama'];
   $lnauthor = $_POST['author'];
   $lnsynopsis = $_POST['synopsis'];
   $lnillustrator = $_POST['illustrator'];
   $thnrilis = $_POST ["tahunrilis"];
  
  $nama = $_FILES['file']['name'];
  $file_tmp = $_FILES["file"]["tmp_name"];

  $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

  //periksa ekstensi file harus jpg
  if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
  {
    move_uploaded_file($file_tmp, 'img/'.$nama); // unggah file ke folder images
    mysqli_query($connection, "insert into lightnovel values ('$lnkode' , '$lnjudul' , '$lnauthor' , '$lnsynopsis', '$lnillustrator' , '$nama' , '$thnrilis')");
    header("location:lightnovel.php");
 } else {
 	mysqli_query($connection, "insert into lightnovel values ('$lnkode' , '$lnjudul' , '$lnauthor' , '$lnsynopsis', '$lnillustrator' , '$nama' , '$thnrilis')");
    header("location:lightnovel.php");
 }
}

?>

  <div class="row"> 
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

  <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4"> Input LN </h1>
          </div>
        </div> <!-- Penutup Jumbotron -->
  

<form method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="kodeln" class="col-sm-2 col-form-label">Kode LN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodeln" name="inputkode" placeholder="Kode Light Novel" maxlength="4">
    </div>
  </div>

  <div class="form-group row">
    <label for="namahotel" class="col-sm-2 col-form-label">Judul LN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namahotel" name="inputnama" placeholder="Judul Light Novel">
    </div>
  </div>

  <div class="form-group row">
    <label for="author" class="col-sm-2 col-form-label">Author LN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="author" name="author" placeholder="Author Light Novel">
    </div>
  </div>

    <div class="form-group row">
    <label for="synopsis" class="col-sm-2 col-form-label">Synopsis LN </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="synopsis" name="synopsis" placeholder="Synopsis Light Novel">
    </div>
  </div>

  <div class="form-group row">
    <label for="illustrator" class="col-sm-2 col-form-label">Illustrator LN </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="illustrator" name="illustrator" placeholder="Illustrator Light Novel">
    </div>
  </div>


    <div class="form-group row"> 
          <label for="file" class="col-sm-2 col-form-label"> Illust LN </label>
          <div class="col-sm-10">
          	<input type="file" id="file" name="file">
          	<p class="help-block">Masukkan Ilustrasi </p>
          </div>
       	</div>

   <div class="form-group row">
    <label for="tahunrilis" class="col-sm-2 col-form-label">Tahun Rilis LN </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tahunrilis" name="tahunrilis" placeholder="Tahun Rilis Light Novel">
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
            <h1 class="display-4"> Daftar LN </h1>
            <h2>Hasil Entri Data Pada Tabel Light Novel</h2>
          </div>
        </div> <!-- Penutup Jumbotron -->

        <form method="POST">
          <div class="form-group row mb-2">
            <label for="Search" class="col-sm-3"> Judul LN </label>
            <div class="col-sm-6">
              <input type="text" name="Search" class="form-control" id="Search" value="<?php if(isset($_POST['Search'])){echo $_POST['Search'];}?>" placeholder="Cari Judul LN">
            </div>
              <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">            
          </div>
        </form>

        <table class="table table-hover table-danger">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Kode LN</th>
              <th>Judul LN</th>
              <th>Author LN</th>
              <th>Synopsis LN</th>
              <th>Illustrator LN</th>
              <th>Illust LN</th>
              <th>Tahun Rilis</th>

              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>

    <?php
    if (isset($_POST['kirim'])) {
      $search = $_POST['Search'];
      $query = mysqli_query($connection, "select *
        from lightnovel
        where lnJudul like '%" .$search. "%'");
      //'%" .$search. "%'"
      //'$search%'"
    }else{
      $query = mysqli_query($connection, "select * from lightnovel");
  }

      $nomor = 1;
      while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
          <td> <?php echo $nomor; ?></td>
          <td> <?php echo $row['lnID']; ?></td>
          <td> <?php echo $row['lnJudul']; ?></td>
          <td> <?php echo $row['lnAuthor']; ?></td>
          <td> <?php echo $row['lnSynopsis']; ?></td>
          <td> <?php echo $row['lnIllustrator']; ?></td>

          <td>
             <?php if(is_file("img/".$row['lnIllust']))
             { ?>
              <img src="img/<?php echo $row['lnIllust']?>" width="80">
        <?php } else 
         echo "<img src='img/noimage.png' width ='80'";
        ?> 
           </td>          
          <td> <?php echo $row['tahunRilis']; ?></td>

          <td>
           <a href="lightnoveledit.php?ubah=<?php echo $row["lnID"]?>" class="btn btn-success btn-sm" title="EDIT">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
           <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
           <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
           </svg>
          </a>
         </td>

        <td>
        <a href="lightnovelhapus.php?hapus=<?php echo $row["lnID"]?>" class="btn btn-success btn-sm" title="DELETE">
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