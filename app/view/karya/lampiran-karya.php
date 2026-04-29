<?php
include '../app/config/config.php';
if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $anggota = mysqli_real_escape_string($conn, $_POST['anggota']);

    // Konfigurasi Upload Gambar
    $filename = $_FILES['gambar_lampiran']['name'];
    $tmp_name = $_FILES['gambar_lampiran']['tmp_name'];
    $folder = "../../../public/asset/deksripsi/" . $filename;

    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($tmp_name, $folder)) {
        // Query Insert ke Database
        $query = "INSERT INTO lampiran (judul, deskripsi, kategori, anggota, jumlah_anggota, gambar) 
                    VALUES ('$judul', '$deskripsi', '$kategori', '$anggota', '1', '$filename')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil disimpan!'); window.location='deksripsi-lampiran.php';</script>";
        } else {
            echo "Gagal input data: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal upload gambar.";
    }
}

$id_lampiran = 4;
$result = mysqli_query($conn, "SELECT * FROM lampiran WHERE id = $id_lampiran");
$data['lampiran'] = mysqli_fetch_assoc($result);

// Logika Upload (Jika submit ditekan)
if (isset($_POST['submit'])) {
    // ... kode upload Anda ...
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lampiran lampiran - <?= $data['lampiran']['judul'][$id_lampiran]; ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <!-- Header -->
    <aside class="sidebar">
        <div class="nav-links">
            <div class="putar">
                <a href="#" style="display: flex; align-items: center;">
                    <img src="/asset/header/user.png" alt="User">
                    <h4>Profil</h4>
                </a>
            </div>
            <div class="putar">
                <a href="#" style="display: flex; align-items: center;">
                    <img src="/asset/header/Notif.png" alt="Notif">
                    <h4>Notifikasi</h4>
                </a>
            </div>
            <div class="putar">
                <div class="karya">
                    <a href="/deksripsi-karya" style="display: flex; align-items: center;">
                        <img src="/asset/header/Karya On.png" alt="karya">
                        <h4 style="color: white;">Karya</h4>
                    </a>
                </div>
            </div>
            <div class="putar1">
                <a href="javascript:void(0)" onclick="openModal()" style="display: flex; align-items: center;">
                    <img src="/asset/header/Upload.png" alt="Upload" style="width:30px;height:30px;">
                    <h4>Unggah</h4>
                </a>
            </div>
        </div>
        <a href="logout.php" class="logout" style="display: flex; align-items: center;">
            <img src="/asset/header/logout.png" alt="Logout">
            <h4 style="color: #d9534f;">Log out</h4>
        </a>
    </aside>

    <div class="main-content">
        <a href="/deksripsi-lampiran" class="back-btn">‹</a>

        <div class="gallery-container">
            <div class="gallery-item">
                <img src="/asset/lampiran4/<?= $data['lampiran']['gambar_lampiran1']; ?>" alt="Lampiran 1">
            </div>
            <div class="gallery-item">
                <img src="/asset/lampiran4/<?= $data['lampiran']['gambar_lampiran2']; ?>" alt="Lampiran 2">
            </div>
            <div class="gallery-item">
                <img src="/asset/lampiran4/<?= $data['lampiran']['gambar_lampiran3']; ?>" alt="Lampiran 3">
            </div>
        </div>


        <div class="detail-wrapper">
            <div class="info-column">
                <div class="title-section">
                    <h1><?= $data['lampiran']['judul']; ?></h1>
                </div>
                <p class="category-text"><?= $data['lampiran']['kategori']; ?></p>

                <div class="team-info">
                    <p><strong>Anggota Kelompok: <?= $data['lampiran']['jumlah_anggota']; ?></strong></p>
                    <div class="member-item">
                        <img src="/asset/lampiran4/user.png" width="18">
                        <span><?= $data['lampiran']['anggota']; ?></span>
                    </div>
                    <div class="member-item">
                        <img src="/asset/lampiran4/email.png" width="18">
                        <span>@Galih.id</span>
                    </div>
                </div>
                <div class="section-box">
                    <label class="section-label">Deskripsi</label>
                    <div class="text-display-box"><?= $data['lampiran']['deskripsi']; ?></div>
                </div>
            </div>
            <div class="vertical-divider"></div>
            <div class="comment-column">
                <div class="section-box">
                    <label class="section-label">Komentar</label>
                    <textarea class="text-display-box" style="width:100%; height: 100px;" placeholder="..."></textarea>
                </div>

                <div class="section-box">
                    <label class="section-label">Yanto</label>
                    <textarea class="text-display-box" style="width:100%; height: 100px;" placeholder=".."></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop Up Upload -->
    <div id="uploadModal" class="modal">
        <div class="modal-content" style="max-width: 700px; width: 60%;"> <span class="close"
                onclick="closeModal()">&times;</span>

            <form action="../app/view/karya/deksripsi-karya.php" method="POST" enctype="multipart/form-data">
                <div class="upload-top-section">
                    <h3>No Files Yet</h3>
                    <p>Select a file</p>
                    <div class="upload-buttons">
                        <label for="file-upload" class="btn-blue-icon" style="cursor:pointer;">
                            <img src="/asset/header/Upload on.png" width="16"> Upload
                        </label>
                        <input type="file" id="file-upload" name="gambar_lampiran" style="display:none;" required>

                    </div>
                </div>

                <div class="detail-panel">
                    <div class="detail-header">
                        <h3>Detail</h3>
                    </div>
                    <div class="detail-body">
                        <div class="detail-grid">
                            <div class="detail-left">
                                <div class="input-group">
                                    <label>Judul lampiran</label>
                                    <input type="text" name="judul" placeholder="Masukkan judul..." required>
                                </div>
                                <div class="input-group">
                                    <label>Description</label>
                                    <textarea name="deskripsi" placeholder="Ketik deskripsi lampiran di sini..."
                                        required></textarea>
                                </div>
                                <div class="input-group">
                                    <label>Category</label>
                                    <select name="kategori">
                                        <option value="Sejarah">Sejarah</option>
                                        <option value="Ilmu Pengetahuan">Ilmu Pengetahuan</option>
                                        <option value="Pemrograman">Pemrograman</option>
                                        <option value="Pendidikan Pancasila">Pendidikan Pancasila</option>
                                    </select>
                                </div>
                            </div>
                            <div class="detail-right">
                                <div class="input-group">
                                    <label>Note</label>
                                    <textarea name="note" placeholder="Add additional context..."></textarea>
                                </div>
                                <div class="input-group">
                                    <label>Owner / Anggota</label>
                                    <input type="text" name="anggota" placeholder="Nama pengunggah...">
                                </div>
                                <button type="submit" name="submit" class="btn-blue-icon"
                                    style="width:100%; justify-content:center; margin-top:10px;">Simpan &
                                    Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() { document.getElementById("uploadModal").style.display = "block"; }
        function closeModal() { document.getElementById("uploadModal").style.display = "none"; }
    </script>

    <script src="/panggung-kita/public/js/script.js"></script>
</body>

</html>