<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Aplikasi Manajemen Event Komunitas</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Manajemen Event Komunitas</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a type="button" class="btn btn-light nav-link text-primary" href="create.php">Tambah Event Baru</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
      <h2 class="mb-4">Daftar Event Komunitas</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Event</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include "connection.php";
            $sql = "SELECT * FROM events ORDER BY tanggal ASC";
            $result = $conn->query($sql);
            if(!$result){
              die("Invalid query: " . $conn->error);
            }
            while($row = $result->fetch_assoc()){
              echo "
          <tr>
            <td>{$row['id']}</td>
            <td>{$row['nama_event']}</td>
            <td>{$row['tanggal']}</td>
            <td>{$row['waktu']}</td>
            <td>{$row['lokasi']}</td>
            <td>{$row['deskripsi']}</td>
            <td>
              <a class='btn btn-primary btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
              <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Hapus</a>
            </td>
          </tr>
          ";
            }
          ?>
        </tbody>
      </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>