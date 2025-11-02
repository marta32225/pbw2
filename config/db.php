<?php
	// Include koneksi.php file
	include_once 'koneksi.php';

	// Create a class Users
	class Database extends Koneksi {
	  // Fetch all or a single produk from database
	  public function fetch($id = 0) {
	    $sql = 'SELECT * FROM produk';
	    if ($id != 0) {
	      $sql .= ' WHERE id = :id';
	    }
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    $rows = $stmt->fetchAll();
	    return $rows;
	  }

	  // Insert an produk in the database
	  public function insert($nama, $tipe, $harga, $stok) {
	    $sql = 'INSERT INTO produk (nama_produk, tipe_produk, harga, stok) VALUES (:nama, :tipe, :harga, :stok)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['nama' => $nama, 'tipe' => $tipe, 'harga' => $harga, 'stok' => $stok]);
	    return true;
	  }

	  // Update an produk in the database
	  public function update($nama, $tipe, $harga, $stok, $id) {
	    $sql = 'UPDATE produk SET nama_produk = :nama, tipe_produk = :tipe, harga = :harga, stok = :stok WHERE id = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['nama' => $nama, 'tipe' => $tipe, 'harga' => $harga, 'stok' => $stok, 'id' => $id]);
	    return true;
	  }

	  // Delete an produk from database
	  public function delete($id) {
	    $sql = 'DELETE FROM produk WHERE id = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    return true;
	  }
	}

?>


