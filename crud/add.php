<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<head>
    <title>Aplikasi CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="w-50 mx-auto border p-3 mt-3">
    <a href="index.php">Kembali Ke Home</a>
        <form action="add.php" method="post">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" class="form-control" required>

            <label for="nim">Nama Mahasiswa</label>
            <input type="text" id="nama" name="nama" class="form-control" required>

            <label for="nim">Jurusan</label>
            <select name="jurusan" id="jurusan" name="jurusan" class="form-select" required>
                <option>Pilih Jurusan</option>
                <option value="informatika">Teknik Informatika</option>
                <option value="arsitek">Teknik Arsitek</option>
                <option value="sipil">Teknik Sipil</option>
                <option value="mesin">Teknik Mesin</option>
                <option value="elektro">Teknik Elektro</option>
            </select>

            <label for="nim">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" required>

            <label for="nim">No.Telepon</label>
            <input type="text" id="telp" name="telp" class="form-control" required>

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>

    <?php
    if (isset($_POST['tambah'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];

        $jurusanSelect = $_POST['jurusan'];
        if ($jurusanSelect = 'informatika') {
            $jurusan = 'Teknik Informatika';
        } if ($jurusanSelect = 'arsitek') {
            $jurusan = 'Teknik Arsitek';
        } if ($jurusanSelect = 'sipil') {
            $jurusan = 'Teknik Sipil';
        } if ($jurusanSelect = 'mesin') {
            $jurusan = 'Teknik Mesin';
        } if ($jurusanSelect = 'elektro') {
            $jurusan = 'Teknik Elektro';
        }

        $sqlGet = "SELECT * FROM siswa WHERE nim='$nim'";
        $queryGet = mysqli_query($koneksi, $sqlGet);
        $cek = mysqli_num_rows($queryGet);

        $sqlInsert = "INSERT INTO siswa(nim,nama,jurusan,alamat,telp)
                        VALUES ('$nim','$nama','$jurusan','$alamat','$telp')";

        $queryInsert = mysqli_query($koneksi, $sqlInsert);

        if (isset($sqlInsert) && $cek <= 0 ){
            echo "
            <div class='alert alert-success'>Data berhasil ditambahkan <a href='index.php'>Lihat Data</a></div>";
        } else if ($cek > 0 ){
            echo "
            <div class='alert alert-danger'>Data gagal ditambahkan <a href='index.php'>Lihat Data</a></div>";
        }
        
    }
    ?>

</body>
</html>