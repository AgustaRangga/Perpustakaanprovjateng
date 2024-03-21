<?php
include ('koneksi.php');
$username =$_POST['username'];
$password =$_POST['password'];

$query = mysqli_query($kon,"SELECT * FROM tb_users WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($query)==1){
    header('Location:http://localhost/crudbooking/admin/');
}
else if($usename == '' || $password=''){
    header('Location:http://localhost/crudbooking/login.php?error=2');
}
else{
    header('Location:http://localhost/crudbooking/login.php?error=1');

}

?>