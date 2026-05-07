<?php
include 'koneksi.php';

$id = "";
$nim = "";
$nama = "";
$jurusan = "";
$foto = "";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");

    $data = mysqli_fetch_assoc($query);

    $nim = $data['nim'];
    $nama = $data['nama_lengkap'];
    $jurusan = $data['jurusan'];
    $foto = $data['foto'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Form Mahasiswa</h2>

<form action="simpan.php"
method="POST"
enctype="multipart/form-data"
onsubmit="return validasiForm()">

<input type="hidden" name="id" value="<?= $id; ?>">
<input type="hidden" name="foto_lama" value="<?= $foto; ?>">

<input type="text"
name="nim"
id="nim"
placeholder="NIM"
value="<?= $nim; ?>">

<br><br>

<input type="text"
name="nama_lengkap"
id="nama"
placeholder="Nama Lengkap"
value="<?= $nama; ?>">

<br><br>

<input type="text"
name="jurusan"
id="jurusan"
placeholder="Jurusan"
value="<?= $jurusan; ?>">

<br><br>

<input type="file" name="foto" id="foto">

<br><br>

<button type="submit">Simpan</button>

</form>

<script>

function validasiForm(){

    let nim = document.getElementById("nim").value;
    let nama = document.getElementById("nama").value;
    let jurusan = document.getElementById("jurusan").value;
    let foto = document.getElementById("foto").files[0];

    if(nim == "" || nama == "" || jurusan == ""){
        alert("Semua field wajib diisi!");
        return false;
    }

    if(foto){

        let ekstensi = ['image/jpeg','image/png','image/jpg'];

        if(!ekstensi.includes(foto.type)){
            alert("File harus gambar!");
            return false;
        }

        if(foto.size > 2 * 1024 * 1024){
            alert("Ukuran foto maksimal 2MB!");
            return false;
        }
    }

    return true;
}

</script>

</body>
</html>