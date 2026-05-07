<?php

$conn = mysqli_connect("localhost", "root", "151105", "db_mahasiswa");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>