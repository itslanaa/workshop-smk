<?php

include './config.php';

$kode = mysqli_real_escape_string($conn, $_GET['kode']);
$cek_kode = mysqli_query($conn, "SELECT ts_url FROM tb_shortener WHERE ts_kode='$kode'");

if (mysqli_num_rows($cek_kode) == 0)
    $url_redirect = $url_ori.'?kode='.$kode;
else
{
    $fetch_kode = mysqli_fetch_object($cek_kode);
    $url_redirect = $fetch_kode->ts_url;
}

header('location: '.$url_redirect);

?>