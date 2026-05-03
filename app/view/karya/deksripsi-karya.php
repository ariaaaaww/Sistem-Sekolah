<?php
include '../app/config/config.php';

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $anggota = mysqli_real_escape_string($conn, $_POST['anggota']);

    // Konfigurasi Upload untuk Multiple Files (3 File)
    if (isset($_FILES['gambar_karya'])) {
        $files = $_FILES['gambar_karya'];
        $filenames = [];
        $upload_ok = true;

        // Cek apakah jumlah file tepat 3
        if (count($files['name']) == 3) {
            for ($i = 0; $i < 3; $i++) {
                $filename = $files['name'][$i];
                $tmp_name = $files['tmp_name'][$i];
                $file_type = $files['type'][$i];

                // Validasi tipe file hanya gambar
                if (strpos($file_type, 'image/') === false) {
                    echo "<script>alert('Hanya file berupa foto/gambar yang diperbolehkan!'); window.location='deskripsi-karya.php';</script>";
                    exit;
                }

                $folder = "../../../public/asset/deksripsi/" . basename($filename);

                // Pindahkan file ke folder tujuan
                if (move_uploaded_file($tmp_name, $folder)) {
                    $filenames[] = $filename;
                } else {
                    $upload_ok = false;
                    break;
                }
            }
            if ($upload_ok) {
                // Ambil nama file satu per satu dari array $filenames
                $nama1 = $filenames[0];
                $nama2 = $filenames[1];
                $nama3 = $filenames[2];

                // Query Insert ke tabel lampiran
                $query = "INSERT INTO lampiran (judul, deskripsi, kategori, anggota, jumlah_anggota, gambar_lampiran1, gambar_lampiran2, gambar_lampiran3) 
                          VALUES ('$judul', '$deskripsi', '$kategori', '$anggota', '3', '$nama1', '$nama2', '$nama3')";

                if (mysqli_query($conn, $query)) {
                    echo "<script>alert('Data berhasil disimpan!'); window.location='deskripsi-karya.php';</script>";
                } else {
                    echo "Gagal input data: " . mysqli_error($conn);
                }
            } else {
                echo "Gagal upload gambar.";
            }
        } else {
            echo "<script>alert('Harap pilih tepat 3 foto.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="/css/style.css">
    <title>Deskripsi Karya</title>
    <style>
        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #f8f6f0;
            margin: auto;
            padding: 20px;
            border: 2px solid #5D87A6;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="nav-links">
            <div class="putar">
                <a href="profile.php" style="display: flex; align-items: center;">
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
                    <a href="/deksripsi-karya/" style="display: flex; align-items: center;">
                        <img src="/asset/header/Karya On.png" alt="Karya">
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
        <h2>Berikut ini adalah hasil karya yang telah dibuat</h2>
        <div class="grid-container">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM karya");
            while ($row = mysqli_fetch_assoc($query)):
                // Mengambil gambar pertama dari list nama file yang digabung koma
                $gambar_array = explode(',', $row['gambar']);
                $gambar_utama = $gambar_array[0];
                ?>
                <div class="card">
                    <img src="/asset/deksripsi/<?php echo $gambar_utama; ?>" width="100%">
                    <div class="card-body">
                        <span class="badge-title"><?php echo $row['judul']; ?></span>
                        <div class="desc-box">
                            <strong>Deskripsi Karya</strong>
                            <p><?php echo $row['deskripsi']; ?></p>
                        </div>
                        <div class="footer-card">
                            <span class="cat"><?php echo $row['kategori']; ?></span>
                            <span class="count">Jumlah Anggota: <?php echo $row['jumlah_anggota']; ?></span>
                        </div>
                        <a href="/lampiran-karya/<?= $row['id']; ?>" class="btn-detail">Lihat Lebih Detail</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div id="uploadModal" class="modal"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content"
            style="max-width: 700px; width: 60%; margin: 30px auto; background: #fff; border-radius: 8px; padding: 20px; position: relative;">
            <span class="close" onclick="closeModal()"
                style="position: absolute; right: 20px; top: 15px; font-size: 24px; cursor: pointer;">&times;</span>

            <form action="/proses-upload/" method="POST" enctype="multipart/form-data">
                <div class="upload-top-section"
                    style="text-align: center; background: #fdfaf6; border: 2px dashed #999; padding: 30px; border-radius: 12px; margin-bottom: 20px;">
                    <h3>No Files Yet</h3>
                    <p id="upload-instruction">Select a file to upload</p>
                    <div class="upload-buttons"
                        style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                        <label for="file-upload" class="btn-blue-icon"
                            style="cursor:pointer; background-color: #5D87A6; color: white; padding: 10px 24px; border-radius: 6px; display: inline-flex; align-items: center; gap: 8px; font-weight: 500;">
                            <img src="/asset/header/Upload on.png" width="16"> Upload
                        </label>

                        <input type="file" id="file-upload" name="gambar_karya[]" accept="image/*" multiple required
                            style="display:none;" onchange="validateFiles(this)">

                        <span id="file-name-display"
                            style="display:block; font-size: 13px; color: #555; margin-top: 5px;"></span>
                        <p style="color: #666; font-size: 14px; margin: 5px 0 0;">Please upload exactly 3 photos.</p>
                    </div>
                </div>

                <div class="detail-panel">
                    <div class="detail-header"
                        style="background-color: #cddff1; padding: 10px; border-radius: 6px 6px 0 0;">
                        <h3 style="margin: 0; color: #102A43;">Detail Karya</h3>
                    </div>
                    <div class="detail-body"
                        style="padding: 15px; background: #fff; border: 1px solid #cddff1; border-radius: 0 0 6px 6px;">
                        <div class="detail-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="detail-left">
                                <div class="input-group" style="margin-bottom: 15px;">
                                    <label style="display: block; font-weight: 600; margin-bottom: 5px;">Judul
                                        Karya</label>
                                    <input type="text" name="judul" placeholder="Masukkan judul..." required
                                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                </div>
                                <div class="input-group" style="margin-bottom: 15px;">
                                    <label
                                        style="display: block; font-weight: 600; margin-bottom: 5px;">Deskripsi</label>
                                    <textarea name="deskripsi" placeholder="Ketik deskripsi karya di sini...." required
                                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; height: 80px;"></textarea>
                                </div>
                                <div class="input-group" style="margin-bottom: 15px;">
                                    <label
                                        style="display: block; font-weight: 600; margin-bottom: 5px;">Kategori</label>
                                    <input type="text" name="kategori" placeholder="Masukkan kategori..." required
                                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                </div>
                            </div>
                            <div class="detail-right">
                                <div class="input-group" style="margin-bottom: 25px;">
                                    <label style="display: block; font-weight: 600; margin-bottom: 5px;">Owner /
                                        Anggota</label>
                                    <input type="text" name="anggota" placeholder="Nama pengunggah..."
                                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                </div>
                                <button type="submit" name="submit" class="btn-blue-icon"
                                    style="width:100%; justify-content:center; margin-top:10px; background-color: #5D87A6; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">
                                    Simpan dan Unggah Karya Anda
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/script.js"></script>
</body>

</html>