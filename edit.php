<?php

function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/pbw2/Pertemuan%206/produk/".$_GET["id"]);
$data = json_decode($data, TRUE); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>PBW2 - Pertemuan 6</title>
    <link rel="stylesheet" type="text/css" href="css\bootstrap\bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row bg-primary text-center p-4">
            <h3>Pemrograman Berbasis Web 2</h3>
        </div>
        <div class="row">
            <h3>CRUD API OOP</h3>
            <p>EDIT PRODUK</p> <a href="../Pertemuan 6" class="btn btn-primary w-25">Kembali</a>
            <p>form ini digunakan untuk edit produk</p>
            <form action="object/produk.php" method="GET" id="form">
            <table>
                <tr>
                <td><label for="">Kode produk</label></td>
                <td><input type="text" value="<?= $data["0"]["id"] ?>" name="id" id="id" placeholder="Kode Produk"></td>
                </tr>
                <tr>
                <td><label for="">Nama produk</label></td>
                <td><input type="text" value="<?= $data["0"]["nama_produk"] ?>" name="nama_produk" id="nama_produk" placeholder="Nama Produk"></td>
                </tr>
                <tr>
                <td><label for="">Tipe produk</label></td>
                <td><input type="text" value="<?= $data["0"]["tipe_produk"] ?>" name="tipe_produk" id="tipe_produk" placeholder="Tipe Produk"></td>
                </tr>
                <tr>
                <td><label for="">Harga</label></td>
                <td><input type="text" value="<?= $data["0"]["harga"] ?>" name="harga" id="harga" placeholder="Harga"></td>
                </tr>
                <tr>
                <td><label for="">Stok</label></td>
                <td><input type="text" value="<?= $data["0"]["stok"] ?>" name="stok" id="stok" placeholder="Stok"></td>
                </tr>
                <tr>
                <td>
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </td>
                </tr>
            </table>
        </div>
        <div class="row bg-primary text-center p-2">
            <h4>Tahun Ajaran 2025 - 2026</h4>
        </div>
    </div>
</body>
</html>


