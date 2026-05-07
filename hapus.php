<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

unlink("uploads/" . $row['foto']);

mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");

header("Location:index.php");

?>