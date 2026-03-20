    <?php
    include '../app/config/config.php';
    if (isset($_POST['submit'])) {
        $judul = mysqli_real_escape_string($conn, $_POST['judul']);
        $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
        $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
        $anggota = mysqli_real_escape_string($conn, $_POST['anggota']);

        // Konfigurasi Upload Gambar
        $filename = $_FILES['gambar_karya']['name'];
        $tmp_name = $_FILES['gambar_karya']['tmp_name'];
        $folder = "../../../public/asset/deksripsi/" . $filename;

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($tmp_name, $folder)) {
            // Query Insert ke Database
            $query = "INSERT INTO karya (judul, deskripsi, kategori, anggota, jumlah_anggota, gambar) 
                    VALUES ('$judul', '$deskripsi', '$kategori', '$anggota', '1', '$filename')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data berhasil disimpan!'); window.location='deksripsi-karya.php';</script>";
            } else {
                echo "Gagal input data: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal upload gambar.";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <!-- <link rel="stylesheet" href="/css/deksripsi-karya.css"> -->
        <link rel="stylesheet" href="/css/style.css">
        <title>Deskripsi Karya</title>
    </head>

    <body>
        <!-- Header -->
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
                        <a href="/deks/deksripsi-karya" style="display: flex; align-items: center;">
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
                    ?>
                    <div class="card">
                        <img src="  /asset/deksripsi/<?php echo $row['gambar']; ?>" width="100%">
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
                            <!-- <a href="lampiran-karya.php?id=<?php echo $row['id']; ?>" class="btn-detail">Lihat Lebih Detail</a> -->
                            <a href="/deks/lampiran-karya/<?= $row['id']; ?>" class="btn-detail">
                                Lihat Lebih Detail
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <!-- Pop Up Upload -->
        <div id="uploadModal" class="modal">
            <div class="modal-content" style="max-width: 700px; width: 60%;"> <span class="close"
                    onclick="closeModal()">&times;</span>

                <form action="upload_proses.php" method="POST" enctype="multipart/form-data">
                    <div class="upload-top-section">
                        <h3>No Files Yet</h3>
                        <p>Drag and drop, or select a file</p>
                        <div class="upload-buttons">
                            <label for="file-upload" class="btn-blue-icon" style="cursor:pointer;">
                                <img src="/asset/header/Upload on.png" width="16"> Upload
                            </label>
                            <input type="file" id="file-upload" name="gambar_karya" style="display:none;" required>

                            <button type="button" class="btn-blue-icon">🔗 Add Link</button>

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
                                        <label>Judul Karya</label>
                                        <input type="text" name="judul" placeholder="Masukkan judul..." required>
                                    </div>
                                    <div class="input-group">
                                        <label>Description</label>
                                        <textarea name="deskripsi" placeholder="Ketik deskripsi karya di sini..."
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

        <script src="/js/script.js"></script>
    </body>

    </html>