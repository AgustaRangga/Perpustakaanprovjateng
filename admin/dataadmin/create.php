<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
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
            <label>Instansi</label>
            <input type="text" name="title" class="form-control" placeholder="Masukan Judul" required/>
        </div>
       <div class="form-group">
            <label>Keperluan :</label>
            <input type="text" name="description" class="form-control" placeholder="Masukan Deskripsi" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jam Mulai:</label>
            <input type="datetime-local" name="start_datetime" class="form-control" placeholder="Masukan Jam Mulai" required/>
        </div>    
        <div class="form-group">
            <label>Jam Selesai:</label>
            <input type="datetime-local" name="end_datetime" class="form-control" placeholder="Masukan Jam Selesai" required/>
        </div>    

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button class="button1"><a href="http://localhost/crudbookingasli/admin">Kembali</a></button>

    </form>
</div>
</body>
</html>