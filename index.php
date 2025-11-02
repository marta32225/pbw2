<?php

function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/pbw2/Pertemuan%206/produk");
$data = json_decode($data, TRUE); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>PBW2 - Pertemuan 6</title>
    <link rel="stylesheet" type="text/css" href="assets\css\bootstrap\bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row bg-primary text-center p-4">
            <h3>Pemrograman Berbasis Web 2</h3>
        </div>
        <div class="row">
            <h3>CRUD API OOP</h3>
            <p>DATA PRODUK</p> <a href="tambah.php" class="btn btn-primary w-25">Tambah Data</a>
            <table class="table table-striped">
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Tipe Produk</th>
                    <th>Aksi</th>
                </tr>
                <?php  
                    $i = 1;
                    foreach ($data as $data) {
                    ?>
                    <form method="GET" action="object/produk.php">
                    <tr>
                        <td>
                            <?= $i++ ?>
                        </td>
                        <td>
                            <?= $data["nama_produk"] ?>
                        </td>
                        <td>
                            <?= $data["tipe_produk"] ?>
                        </td>
                        <td colspan="2"> 
                            <a href="../Pertemuan 6/edit.php?id=<?= $data['id'] ?>" class="btn btn-primary">Edit</a> 
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Hapus</button> 
                        </td>
                    </tr>
                    </form>
                    <?php } ?>
            </table>
        </div>
        <div class="row bg-primary text-center p-2">
            <h4>Tahun Ajaran 2025 - 2026</h4>
        </div>
    </div>
</body>
</html>


