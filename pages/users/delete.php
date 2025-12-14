<?php
include "../../config/db.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

echo "<script>
alert('User berhasil dihapus!');
location='index.php';
</script>";
?>
