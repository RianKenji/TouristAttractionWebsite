<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
 if (isset($_GET['hapus'])){
 	$kodearea = $_GET['hapus'];
 	mysqli_query($connection, "DELETE FROM area WHERE areaID = '$kodearea'");
 	echo "<script>alert('DATA BERHASIL DIHAPUS'); 
 	document.location= 'area.php'</script>";
 }
?>

</div>
 </div> <!--penutup container fluid-->

 <?php include "footer.php" ?>

 <?php 
 mysqli_close($connection);
 ob_end_flush();
?>
