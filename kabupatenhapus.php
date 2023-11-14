<?php 
 include "includes/config.php";
 if (isset($_GET['hapus'])){
    $kodekabupaten = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM kabupaten WHERE kabupatenKODE = '$kodekabupaten'");
    echo "<script>alert('DATA BERHASIL DIHAPUS'); 
    document.location= 'kabupaten.php'</script>";
 }
?>

