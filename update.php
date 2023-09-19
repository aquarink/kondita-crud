<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi input
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $tanggal = $_POST["tanggal"];
        $bulan = $_POST["bulan"];
        $tahun = $_POST["tahun"];

        if (empty($id) || empty($nama) || empty($alamat) || empty($tanggal) || empty($bulan) || empty($tahun)) {
            header("Location: edit.php?id=".$id."&error=Semua kolom harus diisi!");
        } else {
            // Koneksi ke database
            include "db.php";

            // Query untuk melakukan update data tamu
            $query = "UPDATE tamu SET nama=?, alamat=?, tanggal=?, bulan=?, tahun=? WHERE id=?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("sssssi", $nama, $alamat, $tanggal, $bulan, $tahun, $id);

            if ($stmt->execute()) {
                header("Location: edit.php?id=".$id."&success=Data berhasil diupdate!");
            } else {
                header("Location: edit.php?id=".$id."&error=Gagal menyimpan data: " . $mysqli->error ."");
            }

            // Tutup koneksi database
            $stmt->close();
            $mysqli->close();
        }
    } else {
        header("Location: index.php?error=Metode yang digunakan adalah POST!");
    }
?>