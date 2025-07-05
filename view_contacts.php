<?php
// Konfigurasi koneksi database
$host = 'lna-server.mysql.database.azure.com';
$user = 'unasitaihd';
$pass = 'G2qJWI0ZhRwz6y$w';
$db   = 'mbc_laboratory';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

$sql = "SELECT id, name, email, subject, message, created_at FROM kontak ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kontak MBC Laboratory</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f6fb; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #1A237E; color: #fff; }
        tr:nth-child(even) { background: #f9f9f9; }
        h2 { color: #1A237E; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 10px; box-shadow: 0 2px 8px #0001; }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Kontak MBC Laboratory</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Pesan</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->num_rows > 0): $no = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['subject']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
        <?php endwhile; else: ?>
            <tr><td colspan="6" style="text-align:center;">Belum ada data kontak.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    <br>
    <a href="index.html">&larr; Kembali ke Landing Page</a>
</div>
</body>
</html>
<?php $conn->close(); ?>
