<?php 
require_once('db_connect.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
    $koneksi->close();
    exit;
}

$delete = $koneksi->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
if($delete){
    echo "<script> alert('Event has deleted successfully.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$koneksi->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$koneksi->close();

?>