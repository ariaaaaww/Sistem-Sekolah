<?php
// --- 1. KONFIGURASI DATABASE ---
// Mendefinisikan konstanta untuk koneksi ke MySQL
define('DB_HOST', 'localhost');          // Alamat server (biasanya localhost)
define('DB_NAME', 'panggung_kita'); // Nama database yang digunakan
define('DB_USER', 'root');               // Username database (default XAMPP adalah root)
define('DB_PASS', '');                   // Password database (default XAMPP adalah kosong)

try {
    // Membuat koneksi database menggunakan driver PDO
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    
    // Mengatur agar PDO menampilkan error jika terjadi kesalahan (Exception)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Mengatur agar hasil query otomatis berbentuk Array Asosiatif (nama kolom sebagai key)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Jika koneksi gagal, hentikan aplikasi dan tampilkan pesan error
    die("Koneksi gagal: " . $e->getMessage());
}

// --- 2. MANAJEMEN SESI ---
// Memulai session untuk melacak data user (seperti login) jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// --- 3. FUNGSI PEMBANTU (HELPER FUNCTIONS) ---

/**
 * Mengecek apakah user sudah login
 * @return bool true jika sudah login, false jika belum
 */
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

/**
 * Mengecek apakah user yang login memiliki role 'admin'
 * @return bool true jika admin
 */
function isAdmin()
{
    return isLoggedIn() && $_SESSION['role'] === 'admin';
}

/**
 * Memproteksi halaman agar hanya bisa diakses user yang sudah login
 * Jika belum login, user akan dilempar ke halaman login
 */
function requireLogin($redirect_to = 'login.php')
{
    if (!isLoggedIn()) {
        header('Location: ' . $redirect_to);
        exit; // Menghentikan eksekusi script selanjutnya
    }
}

/**
 * Memproteksi halaman khusus admin
 * Jika bukan admin, user akan dilempar ke halaman utama (index)
 */
function requireAdmin()
{
    if (!isAdmin()) {
        header('Location: index.php');
        exit;
    }
}

/**
 * Membersihkan input user dari karakter berbahaya (Anti XSS/Injeksi)
 * @param string $data Data mentah dari input
 * @return string Data yang sudah bersih
 */
function sanitize($data)
{
    // trim: hapus spasi di awal/akhir, strip_tags: hapus tag HTML, htmlspecialchars: ubah karakter khusus
    return htmlspecialchars(strip_tags(trim($data)));
}

/**
 * Fungsi ringkas untuk pindah halaman (redirect)
 */
function redirect($url)
{
    header("Location: $url");
    exit;
}
?>