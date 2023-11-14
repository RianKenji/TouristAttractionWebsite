 <?php 
 include "includes/config.php";
 if (isset($_GET['hapus'])){
 	$kodedev = $_GET['hapus'];
 	mysqli_query($connection, "DELETE FROM developer WHERE developerID = '$kodedev'");
 	echo "<script>alert('DATA BERHASIL DIHAPUS'); 
 	document.location= 'developer.php'</script>";
 }
?>
