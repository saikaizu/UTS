<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasemen Piala Asia U-23 Qatar Group A</title>
    <!-- Memasukkan link ke Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand text-white" href="#">Klasemen Piala Asia U-23 Qatar Group A per 8 Mei 7:54 | Nama Operator: Sai Pratama/211011400994</a>
</nav>

<div class="container mt-3">
<?php

// Baca data dari file data.txt
$data = file("data.txt", FILE_IGNORE_NEW_LINES);

// Inisialisasi array untuk menyimpan data klasemen
$klasemen = array();

// Pisahkan setiap baris data menjadi array
foreach ($data as $line) {
    $klasemen[] = explode(",", $line);
}

// Gabungkan data default dengan data dari file data.txt
$klasemen = array_merge($klasemen);

// Urutkan data berdasarkan jumlah poin
usort($klasemen, function($a, $b) {
    return ($b[2] * 3 + $b[3]) - ($a[2] * 3 + $a[3]);
});

// Tampilkan data dalam bentuk tabel HTML
echo "<table>
        <tr>
            <th>Posisi</th>
            <th>Negara</th>
            <th>P</th>
            <th>M</th>
            <th>S</th>
            <th>K</th>
            <th>Poin</th>
        </tr>";
$posisi = 1;
foreach ($klasemen as $team) {
    echo "<tr>
            <td>".$posisi++."</td>
            <td>".$team[0]."</td>
            <td>".$team[1]."</td>
            <td>".$team[2]."</td>
            <td>".$team[3]."</td>
            <td>".$team[4]."</td>
            <td>".($team[2] * 3 + $team[3])."</td>
        </tr>";
}
echo "</table>";

// Tombol Update Data
echo "<a href='input_data.php'><button class='btn btn-primary'>Update Data</button></a>";

// Tombol Hapus Data
echo "<form action='hapus_data.php' method='post'>";
echo "<input type='submit' class='btn btn-danger' value='Hapus Data'>";
echo "</form>";
?>
</div>

<!-- Memasukkan script Bootstrap JS (opsional, hanya diperlukan jika menggunakan fitur JavaScript Bootstrap) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
