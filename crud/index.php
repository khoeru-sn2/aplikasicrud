<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<head>
    <title>Aplikasi CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
<div class="container mt-3">
<a href="add.php" class="btn btn-primary btn-md mb-3"><i class="bi bi-plus-lg"></i>Tambah Data</a>
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Edit</th>
            <th>Hapus</th>
        </thead>
        <?php
        $sqlGet = "SELECT * FROM siswa";
        $query = mysqli_query($koneksi, $sqlGet);

        while ($data = mysqli_fetch_array($query)) {
            echo "
            <tbody>
            <tr>
                <td>$data[nim]</td>
                <td>$data[nama]</td>
                <td>$data[jurusan]</td>
                <td>$data[alamat]</td>
                <td>$data[telp]</td>
                <td><a href='update.php?nim=$data[nim]' class='btn btn-sm btn-warning'><i class='bi bi-pencil-square'></i>Edit</a></td>
                <td><a href='hapus.php?nim=$data[nim]' class='btn btn-sm btn-danger'>
                <i class='bi bi-trash'></i>Hapus</a></td>
            </tr>
        </tbody>
            ";
        }
        ?>
    </table>
    </div> 
</body>
</html>