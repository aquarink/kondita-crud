<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KONDITA - CRUD</title>

    <!-- CORE -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-md">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">KONDITA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="add.php">Add</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" method="GET" accept="index.php">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="col-md-8" style="margin-top: 20px">
            <?php
            if(isset($_GET['error'])) {
                echo "<p style='color: red'>".$_GET['error']."</p>";
            }

            if(isset($_GET['success'])) {
                echo "<p style='color: blue'>".$_GET['success']."</p>";
            }
            ?>
            <form action="save.php" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis nama anda">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Tulis alamat anda"></textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Lahir</label>

                    <div class="row">
                        <div class="col">
                            <select class="form-control" id="tanggal" name="tanggal">
                                <option selected disabled>Pilih Tanggal</option>
                                <?php
                                for ($i=1; $i <= 31; $i++) { 
                                    echo "<option value='".$i."'>".$i."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col">
                            <select class="form-control" id="bulan" name="bulan">
                                <option selected disabled>Pilih Bulan</option>

                                <?php
                                include "db.php";
                                foreach ($bulanList as $nomorBulan => $namaBulan) {
                                    echo "<option value='".$nomorBulan."'>".$namaBulan."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col">
                            <select class="form-control" id="tahun" name="tahun">
                                <option selected disabled>Pilih Tahun</option>
                                <?php
                                for ($i=1980; $i <= date('Y'); $i++) { 
                                    echo "<option value='".$i."'>".$i."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-send-plus"></i> Tambah Data
                    </button>

                    <a href="index.php" class="btn btn-secondary"><i class="bi bi-card-list"></i> List Data</a>
                </div>
            </form>
        </div>

    <!-- CORE -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>