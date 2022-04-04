<?php

$conn = mysqli_connect('localhost', 'root', '', 'db_shortlink');
$url_ori = 'http://localhost/ShortlinkApp/';

if (mysqli_connect_errno())
    die('Gagal terhubung ke database: <b>'.mysqli_connect_error().'</b>');

?>