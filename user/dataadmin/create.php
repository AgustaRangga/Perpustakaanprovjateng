<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // $id=input($_POST["id"]);
        $title=input($_POST["title"]);
        $description=input($_POST["description"]);
        $start_datetime=input($_POST["start_datetime"]);
        $end_datetime=input($_POST["end_datetime"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into schedule_list (title,description,start_datetime,end_datetime) values
		('$title','$description','$start_datetime','$end_datetime')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <!-- <div class="form-group">
            <label>Id:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div> -->
        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Masukan Judul" required/>
        </div>
       <div class="form-group">
            <label>Description :</label>
            <input type="text" name="description" class="form-control" placeholder="Masukan Deskripsi" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Start Datetime:</label>
            <input type="datetime-local" name="start_datetime" class="form-control" placeholder="Masukan Jam Mulai" required/>
        </div>    
        <div class="form-group">
            <label>End Datetime:</label>
            <input type="datetime-local" name="end_datetime" class="form-control" placeholder="Masukan Jam Selesai" required/>
        </div>    

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>