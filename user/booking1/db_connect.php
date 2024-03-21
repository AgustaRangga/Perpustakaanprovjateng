<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='crudbooking';

$koneksi = new mysqli($host, $username, $password, $dbname);
if(!$koneksi){
    die("Cannot connect to the database.". $koneksi->error);
}