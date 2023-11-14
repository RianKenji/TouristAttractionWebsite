 <?php 
 include "includes/config.php";
 if (isset($_GET['hapus'])){
 	$kodeln = $_GET['hapus'];
 	mysqli_query($connection, "DELETE FROM lightnovel WHERE lnID = '$kodeln'");
 	echo "<script>alert('DATA BERHASIL DIHAPUS'); 
 	document.location= 'lightnovel.php'</script>";
 }
?>
