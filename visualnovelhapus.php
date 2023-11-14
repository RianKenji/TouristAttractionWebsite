 <?php 
 include "includes/config.php";
 if (isset($_GET['hapus'])){
 	$kodevn = $_GET['hapus'];
 	mysqli_query($connection, "DELETE FROM visualnovel WHERE vnID = '$kodevn'");
 	echo "<script>alert('DATA BERHASIL DIHAPUS'); 
 	document.location= 'visualnovel.php'</script>";
 }
?>
