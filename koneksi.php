
<?php
$username="HR"; //Nama user sama dengan skema di oracle
$password="10051995"; //Password sama dengan skema di oracle
$database="localhost/XE"; //localhost bisa di isi dengan IP adress

$koneksi=oci_connect($username,$password,$database);

if($koneksi){
echo "";
}else{
$err=oci_error();
echo "Gagal tersambung ke ORACLE". $err['text'];
}
?>