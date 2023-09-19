<?php 

if(isset($_GET['id'])) { 
	include "db.php";

    // Query untuk mengambil data dari tabel tamu
    $query = "SELECT * FROM tamu WHERE id = ".$_GET['id']." LIMIT 1";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {

    	$query_delete = "DELETE FROM tamu WHERE id = ".$_GET['id']."";
    	$mysqli->query($query_delete);

    	header("Location: index.php?error=Data berhasil di hapus!");
    } else {
    	header("Location: index.php?error=Data tidak ditemukan!");
    }
} else {
	header("Location: index.php?error=Data tidak valid!");
}
?>