<!DOCTYPE html>

<?php
	ob_start();
	session_start();
	if (!isset($_SESSION['emailUser'])) {
		header("location:login.php");
	}
?>

<?php
	include "includes/config.php";
	if (isset($_POST['simpan'])) {

		if (isset($_REQUEST['devkode'])) {
			$developerID = $_REQUEST['devkode'];
		}

		if(!empty($developerID)){
			$developerID = $_REQUEST['devkode'];
		}
		else{
			die("anda harus memasukan kodenya");
		}

		$developerNAMA = $_POST['devnama'];
		$rilisterbaru = $_POST['rilis'];
		$website = $_POST['web'];

		mysqli_query($connection, "insert into developer values ('$developerID','$developerNAMA','$rilisterbaru','$website')");
		header("location:developer.php");
	}

	

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Destinasi Wisata</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<?php include "header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">

<div class="row">
<div class="col-sm-1">
</div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Input Developer</h1>
		</div>
	</div>

<div class="col-sm-10">
	<form method="POST">
	<div class="form-group row">
	   	<label for="kk" class="col-sm-2 col-form-label">Developer ID</label>
	    <div class="col-sm-10">
	      	<input type="text" class="form-control" id="kk" name="devkode" placeholder="Kode Developer">
	    </div>
	</div>


	  <div class="form-group row">
	    <label for="nk" class="col-sm-2 col-form-label">Nama Developer</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nk" name="devnama" placeholder="Nama Developer">
	    </div>
	  </div>

		<div class="form-group row">
	    <label for="nk" class="col-sm-2 col-form-label">Latest Release</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nk" name="rilis" placeholder="Rilis Terbaru">
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="nk" class="col-sm-2 col-form-label">Website</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nk" name="web" placeholder="Website">
	    </div>
	  </div>


	  <div class="form-group row">
	    <div class="col-sm-2"></div>
	    <div class="col-sm-10">
	      <button type="submit" class="btn btn-primary" values="simpan" name="simpan">
	      simpan
	      </button>
		  <button type="reset" class="btn btn-secondary"values="batal" name="batal">
		  batal 
		  </button>
	    </div>
	  </div>

	</form>
</div>
</div>
</div>

	<div class="col-sm-1">
	</div>

<!-- memulai dengan memasukan data-->
	<div class="row">
		<div class="col-sm-1"></div>

		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Daftar Developer</h1>
					<h2>Hasil entri pada tabel developer</h2>
				</div>
			</div>


	<table class="table table-hover table-danger">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Developer ID</th>
				<th>Nama Developer</th>
				<th>Latest Release</th>
				<th>Website</th>
				<th colspan="2" style="text-align: center">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php $query = mysqli_query($connection, "SELECT *from developer");
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
				{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['developerID'];?></td>
					<td><?php echo $row['developerNAMA'];?></td>
					<td><?php echo $row['rilisterbaru'];?></td>
					<td><?php echo $row['website'];?></td>
					<td>
						<a href="developeredit.php?ubah=<?php echo $row["developerID"] ?>" class="btn btn-success btn-sm" title="Edit">
						<svg xmlns="http://www.w3.org/2000/svg" width="16
							 " height="16" fill="currentColor" class="bi 
									  bi-pencil-square" viewBox="0 0 16 16">
						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
						</a>
					</td>

					<td>
						<a href="developerhapus.php?hapus=<?php echo $row[
							"developerID"] ?>" class="btn btn-danger btn-sm" title="Delete">
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
</div>

	<?php include "footer.php";?>
</body>

<?php 
    mysqli_close($connection);
    ob_end_flush();
?>
</html>