<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
        .button1 a {
            border: none;
            color: white;
            padding: 3px 1.5px;
            margin: 2px 3px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            transition-duration: 5s;
            cursor: pointer;
            color: white;
        }
        
        .button1 {
            background-color: #0d6efd;
            border-radius: 5px;
            float: right;
            display: block;
        }
        

        .button1 {
            background-color: #fd7e14;
            color: black;
            border: 2px solid #fd7e14;
        }

        .button1:hover {
            background-color: #be5c0d;
            color: white;
            border: 2px solid #be5c0d;

        }
    </style>
</head>
<title>
    Sistem Informasi
</title>
<body>
    <!-- <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Perpustakaan Provinsi Jawa Tengah</span>
        </div>
    </nav> -->
<div class="container">
    <br>
    <h4><center>DAFTAR JADWAL KEGIATAN</center></h4>
    <h5><center>Perpustakaan Provinsi Jawa Tengah</center></h5>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="delete from tb_kegiatan where id='$id' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                // header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
      <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        // $sql="select * from tb_kegiatan order by id desc";
        $sql = "SELECT * FROM tb_kegiatan order by id desc ";


        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_kegiatan"];   ?></td>
                <td><?php echo $data["mulai"];   ?></td>
                <td><?php echo $data["selesai"];   ?></td>
                <td>
                    <a href="../admin/datakegiatan/update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Edit</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                    <!-- <button type="button btn btn-danger" data-toggle="modal" data-target="#modal-hapus"></button> -->
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="../admin/datakegiatan/create.php" class="btn btn-primary" role="button">Tambah Data</a>
    <button class="button1"><a href="http://localhost/crudbooking/admin/index2.php">Kembali</a> </button>

</div>
</body>
</html>
