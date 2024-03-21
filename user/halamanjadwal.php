<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
        hr{
            border: none;
            height: 7px;
            background-color: #333;
        }
        

    </style>
</head>
<title>
    Sistem Informasi
</title>
<body>
<hr>
<div class="container">
    <br>
    <h4><center>DAFTAR KUNJUNGAN</center></h4>
    <h5><center>Perpustakaan Provinsi Jawa Tengah</center></h5>
<?php

    include "../admin/dataadmin/koneksi.php";
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Instansi</th>
            <th>Keperluan</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>

        </tr>
        </thead>

        <?php
        include "../admin/dataadmin/koneksi.php";
        $sql="select * from schedule_list order by id desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["title"];   ?></td>
                <td><?php echo $data["description"];   ?></td>
                <td><?php echo $data["start_datetime"];   ?></td>
                <td><?php echo $data["end_datetime"];   ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>


</div>
<br>
<br>
<hr>
<div class="container">
    <br>
    <h4><center>DAFTAR JADWAL KEGIATAN</center></h4>
    <h5><center>Perpustakaan Provinsi Jawa Tengah</center></h5>
<?php

    include "../admin/datakegiatan/koneksi.php";

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
    include "../admin/datakegiatan/koneksi.php";
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
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Deskripsi
                        </button>
                        
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <center>Deskripsi Kegiatan :<br><img src="../images.png" width="450" height="450" alt=""><br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque itaque maxime voluptatibus ut tempore quae eius quas iste et impedit exercitationem ipsa, alias perferendis nisi similique asperiores aliquam inventore delectus sit, suscipit distinctio temporibus ipsam adipisci. Dolor voluptate alias accusamus laboriosam fugiat enim molestiae dolorum velit. Laborum odit ex quis?</center>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="popup" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div></td>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>

</div>
</body>
</html>

