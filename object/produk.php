<?php
	// Include CORS headers
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Content-Type: application/json');

	// Include db.php file
	include_once '../config/db.php';
	// Create object of produk class
	$produk = new Database();

	// create a api variable to get HTTP method dynamically
	$api = $_SERVER['REQUEST_METHOD'];

	// get id from url
	$id = intval($_GET['id'] ?? '');

	// Get all or a single produk from database
	if ($api == 'GET') {
	  if ($id != 0) {
	    $data = $produk->fetch($id);
	  } else {
	    $data = $produk->fetch();
	  }
	  echo json_encode($data);
	}

	// Add a new produk into database
	if ($api == 'POST') {
	  $nama = $produk->test_input($_POST['nama_produk']);
	  $tipe = $produk->test_input($_POST['tipe_produk']);
	  $harga = $produk->test_input($_POST['harga']);
	  $stok = $produk->test_input($_POST['stok']);

	  if ($produk->insert($nama, $tipe, $harga, $stok)) {
	  	header('Location: ../');
	    echo $produk->message('Produk added successfully!',false);
	  } else {
	  	header('Location: ../tambah.php');
	    echo $produk->message('Failed to add an produk!',true);
	  }
	}

	// Update an produk in database
	if ($api == 'GET' && isset($_GET['_method']) && $_GET['_method'] == 'PUT') {

	  $nama = $produk->test_input($_GET['nama_produk']);
	  $tipe = $produk->test_input($_GET['tipe_produk']);
	  $harga = $produk->test_input($_GET['harga']);
	  $stok = $produk->test_input($_GET['stok']);

	  if ($id != null) {
	    if ($produk->update($nama, $tipe, $harga, $stok, $id)) {
	  	header('Location: ../');
	      echo $produk->message('Produk updated successfully!',false);
	    } else {
	  	header('Location: ../edit.php');
	      echo $produk->message('Failed to update an produk!',true);
	    }
	  } else {
	  	header('Location: ../');
	    echo $produk->message('Produk not found!',true);
	  }
	}

	// Delete an produk from database
	if ($api == 'GET' && isset($_GET['_method']) && $_GET['_method'] == 'DELETE') {
	  if ($id != null) {
	    if ($produk->delete($id)) {
	  	header('Location: ../');
	      echo $produk->message('Produk deleted successfully!', false);
	    } else {
	  	header('Location: ../');
	      echo $produk->message('Failed to delete an produk!', true);
	    }
	  } else {
	  	header('Location: ../');
	    echo $produk->message('Produk not found!', true);
	  }
	}

?>


