<?php

$mysqli = new mysqli("localhost", "root", "", "konditadev");

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}


$bulanList = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
];
?>