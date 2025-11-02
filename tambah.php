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
            <p>TAMBAH PRODUK</p> <a href="../Pertemuan 6" class="btn btn-primary w-25">Kembali</a>
            <p>form ini digunakan untuk tambah data produk</p>
            <form action="object/produk.php" method="post" id="form">
            <table>
                <tr>
                <td><label for="">Nama Produk</label></td>
                <td><input type="text" name="nama_produk" id="nama_produk" placeholder="Nama Produk" aria-describedby="helpId"> </td>
                </tr>
                <tr>
                <td><label for="">Tipe Produk</label></td>
                <td><input type="text" name="tipe_produk" id="tipe_produk" placeholder="Tipe Produk" aria-describedby="helpId"></td>
                </tr>
                <tr>
                <td><label for="">Harga</label></td>
                <td><input type="text" name="harga" id="harga" placeholder="Harga" aria-describedby="helpId"> </td>
                </tr>
                <tr>
                <td><label for="">Stok</label></td>
                <td><input type="text" name="stok" id="stok" placeholder="Stok" aria-describedby="helpId"> </td>
                </tr>
                <tr>
                <td><button type="submit" class="btn btn-primary">Simpan</button></td>
                </tr>
            </table>
            </form>
        </div>
        <div class="row bg-primary text-center p-2">
            <h4>Tahun Ajaran 2025 - 2026</h4>
        </div>
    </div>
</body>
</html>


