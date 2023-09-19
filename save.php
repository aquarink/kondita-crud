<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi input
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $tanggal = $_POST["tanggal"];
        $bulan = $_POST["bulan"];
        $tahun = $_POST["tahun"];

        if (empty($nama) || empty($alamat) || empty($tanggal) || empty($bulan) || empty($tahun)) {
            header("Location: add.php?error=Semua kolom harus diisi!");
        } else {
            // Koneksi ke database
            include "db.php";

            // Query untuk menyimpan data ke tabel tamu
            $query = "INSERT INTO tamu (nama, alamat, tanggal, bulan, tahun) VALUES (?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("sssss", $nama, $alamat, $tanggal, $bulan, $tahun);

            if ($stmt->execute()) {
                header("Location: add.php?success=Data berhasil disimpan!");
            } else {
                header("Location: add.php?error=Gagal menyimpan data: " . $mysqli->error ."");
            }

            // Tutup koneksi database
            $stmt->close();
            $mysqli->close();
        }
    } else {
        header("Location: add.php?error=Metode yang digunakan adalah POST!");
    }
    ?>