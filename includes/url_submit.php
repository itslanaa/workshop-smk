<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php

$echo = '';
if (isset($_POST['submit'])) 
{
    // Panggil $_POST['url']
    $url = mysqli_real_escape_string($conn, $_POST['url']);
    $echo .= '<hr/>';
    
    // Validasi karakter inputan URL
    if (!preg_match('#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i', $url)) 
    {
        $echo .= '<div class="alert alert-danger">Link yang Anda masukan tidak benar! Silahkan masukan kembali.</div>';
    }
    else if (mb_strlen($url) > 500) // Batas maksimal karakter URL -> 500 karakter
    {
        $echo .= '<div class="alert alert-danger">Panjang URL maksimal 500 karakter!</div>';
    }
    else 
    {
        // Buat random karakter URL Shortenernya
        $random_karakter = 'abcdefghijklmnopqrstuvwxyz';
        $kode_random = substr(str_shuffle($random_karakter.strtoupper($random_karakter).'0123456789'), 0, 8);
        $tanggal_buat = date("Y-m-d H:i:s");

        // Insert ke tabel `shortener`
        $insert = mysqli_query($conn, "INSERT INTO tb_shortener SET ts_url = '$url', ts_kode = '$kode_random', ts_tanggal_buat = '$tanggal_buat'");

        // Cek apakah berhasil atau terjadi error pas insert
        if ($insert) 
        {
            setcookie('berhasil', 1, time() + 3600, '/');
            header('location: ?kode='.$kode_random.'#results');
        }
        else 
        {
            $echo .='<div class="alert alert-danger">Terjadi kesalahan saat memperpendek link.</div>';
        }
    }
}

if (isset($_POST['submit']) || isset($_GET['kode'])) 
{
    echo '<div class="output">';
    echo $echo; // Pesan err

    // Deteksi kalau ada cookie berhasil, maka tampilin pesan berhasil
    if (isset($_COOKIE['berhasil'])) 
    {
        setcookie('berhasil', null, time() - 3600, '/');
        echo "<script>alert('Berhasil Memperpendek URL!');</script>";
    }

    if (!empty($_GET['kode']) && !isset($_POST['submit']) )
    {
        // Panggil $_GET['kode]
        $kode = mysqli_real_escape_string($conn, $_GET['kode']);

        $cek_kode = mysqli_query($conn, "SELECT ts_url, ts_kode, ts_tanggal_buat FROM tb_shortener WHERE ts_kode='$kode'");

        // Cek apakah data $_GET['kode'] ada?
        if (mysqli_num_rows($cek_kode) == 0)
        {
            echo '<div class="alert alert-danger">Tidak dapat menemukan link yang Anda minta!</div>';
        }
        else
        {
            $fetch_kode = mysqli_fetch_object($cek_kode);
            $url_short = $url_ori.$fetch_kode->ts_kode;

            echo '<br/>';
            echo '<div class="row">
                    <div class="col-md-2">
                        <div class="pd">
                            <b>URL Created</b>:
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="pd">
                            '.$fetch_kode->ts_tanggal_buat.'
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="pd">
                            <b>Original URL :</b>:
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="pd">
                            '.$fetch_kode->ts_url.'
                        </div>
                    </div>
                    <b>Short URL :</b>
                            <a href="'.$url_short.'" target="_blank" class="url"><span id="text">'.$url_short.'</span></a> 
                            <button type="button" id="copy" class="copy-new-url btn btn-sm scale-effect">
         Copy
        </button><br><br><br>
                      ';
        }
    }

    echo '</div>';
}

?>
    
</body>
<script>
        const textElement = document.getElementById("text");
        const copyButton = document.getElementById("copy");

        const copyText = (e) => {
        window.getSelection().selectAllChildren(textElement);
        document.execCommand("copy");
        e.target.setAttribute("tooltip", "Copied! ✅");
        alert("URL Copied ✅");
        };

        const resetTooltip = (e) => {
        e.target.setAttribute("tooltip", "Copy to clipboard");
    
        };

        copyButton.addEventListener("click", (e) => copyText(e));
        copyButton.addEventListener("mouseover", (e) => resetTooltip(e));

</script>
</html>