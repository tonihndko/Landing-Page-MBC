<?php
// Konfigurasi koneksi database (ganti sesuai setup XAMPP Anda)
$host = 'lna-server.mysql.database.azure.com';
$user = 'unasitaihd';
$pass = 'G2qJWI0ZhRwz6y$w';
$db   = 'mbc_laboratory';

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

// Ambil data dari form
$name    = isset($_POST['name']) ? trim($_POST['name']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validasi sederhana
if ($name == '' || $email == '' || $message == '') {
    echo '<script>alert("Nama, Email, dan Pesan wajib diisi."); window.history.back();</script>';
    exit();
}

// Siapkan query
$stmt = $conn->prepare("INSERT INTO kontak (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo '<script>alert("Pesan Anda berhasil dikirim dan disimpan. Terima kasih!"); window.location.href = "index.html#kontak";</script>';
} else {
    echo '<script>alert("Gagal menyimpan data. Silakan coba lagi."); window.history.back();</script>';
}

$stmt->close();
$conn->close();
?>
