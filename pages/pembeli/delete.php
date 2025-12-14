<?php
include "../../config/db.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pembeli WHERE id='$id'");

echo "<script>
alert('Data berhasil dihapus!');
location='index.php';
</script>";
?>
