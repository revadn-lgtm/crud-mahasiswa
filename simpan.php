<?php

include 'koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama_lengkap'];
$jurusan = $_POST['jurusan'];

$foto_lama = $_POST['foto_lama'];

$namaFile = $foto_lama;

if($_FILES['foto']['name'] != ""){

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $size = $_FILES['foto']['size'];

    $ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

    $allowed = ['jpg', 'jpeg', 'png'];

    if(!in_array($ext, $allowed)){

        echo "
        <script>
        alert('File harus jpg, jpeg, atau png');
        window.location='form.php';
        </script>
        ";

        exit;
    }

    if($size > 2 * 1024 * 1024){

        echo "
        <script>
        alert('Ukuran file maksimal 2MB');
        window.location='form.php';
        </script>
        ";

        exit;
    }

    $namaBaru = time() . "." . $ext;

    move_uploaded_file($tmp, "uploads/" . $namaBaru);

    $namaFile = $namaBaru;
}

if($id == ""){

    mysqli_query($conn, "INSERT INTO mahasiswa
    VALUES(NULL,'$nim','$nama','$jurusan','$namaFile')");

    echo "
    <script>
    alert('Data berhasil ditambah');
    window.location='index.php';
    </script>
    ";

}else{

    mysqli_query($conn, "UPDATE mahasiswa SET
    nim='$nim',
    nama_lengkap='$nama',
    jurusan='$jurusan',
    foto='$namaFile'
    WHERE id='$id'");

    echo "
    <script>
    alert('Data berhasil diupdate');
    window.location='index.php';
    </script>
    ";
}

?>