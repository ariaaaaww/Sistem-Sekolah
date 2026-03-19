<?php
require_once '../app/config/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="/css/header.css">
</head>

<body>

    <div class="container">
        <aside class="sidebar">
            <div class="nav-links">
                <div class="putar">
                    <a href="#" style="display: flex;">
                        <img src="/asset/header/user.png" alt="">
                        <h4>Profil</h4>
                    </a>
                </div>
                <div class="putar">
                    <a href="#" style="display: flex;">
                        <img src="/asset/header/Notif.png" alt="">
                        <h4>Notifikasi</h4>
                    </a>
                </div>
                <div class="putar">
                    <div class="karya">
                        <a href="#" style="display: flex;">
                            <img src="/asset/header/Karya On.png" alt="">
                            <h4 style="color: white;">Karya</h4>
                        </a>
                    </div>
                </div>
                <div class="putar"> <a href="#" style="display: flex;">
                        <img src="/asset/header/Upload.png" alt="">
                        <h4>Unggah</h4>
                    </a></div>
            </div>
            <a href="#" class="logout" style="display: flex;">
                <img src="/asset/header/logout.png" alt="">
                <h4>Log out</h4>
            </a>
        </aside>

        <main class="main-content">
            <header>
                <h1>Berikut ini adalah hasil karya yang telah dibuat</h1>
            </header>

            <div class="card-grid">
                <article class="card">
                    <img src="/asset/deksripsi/image 1.png" alt="Manusia dan Sejarah">
                    <div class="card-body">
                        <h2 class="badge-title">Manusia dan Sejarah</h2>
                        <div class="description">
                            <h3>Deskripsi Karya</h3>
                            <p>Manusia dan sejarah memiliki hubungan yang erat karena setiap peristiwa dalam kehidupan
                                manusia menjadi bagian dari sejarah. Sejarah membantu manusia memahami masa lalu,
                                perubahan, serta hubungan sebab-akibat agar dapat menjadi pelajaran untuk masa kini dan
                                masa depan.</p>
                        </div>
                        <span class="category">Sejarah</span>
                        <div class="footer-info">
                            <span class="members">Frea Gisella - Chelsea Olivia</span>
                            <span class="members">Jumlah Anggota: 10</span>
                        </div>
                        <button class="detail-btn">Lihat Lebih Detail</button>
                        <div class="interactions">
                            <span><i class="far fa-thumbs-up"></i> Like</span>
                            <span><i class="far fa-comment"></i> Comment</span>
                        </div>
                    </div>
                </article>

                <article class="card">
                    <img src="/asset/deksripsi/image 2.png" alt="Sistem Tata Surya">
                    <div class="card-body">
                        <h2 class="badge-title">Sistem Tata Surya</h2>
                        <div class="description">
                            <h3>Deskripsi Karya</h3>
                            <p>Sistem tata surya adalah kumpulan benda langit yang berpusat pada Matahari dan
                                dikelilingi oleh planet-planet serta benda langit lainnya. Setiap planet bergerak
                                mengelilingi Matahari pada orbitnya karena adanya gaya gravitasi. Melalui karya ini,
                                diharapkan pembaca dapat...</p>
                        </div>
                        <span class="category">Ilmu Pengetahuan</span>
                        <div class="footer-info">
                            <span class="members">Dita Keyangan</span>
                            <span class="members">Jumlah Anggota: 1</span>
                        </div>
                        <button class="detail-btn">Lihat Lebih Detail</button>
                        <div class="interactions">
                            <span><i class="far fa-thumbs-up"></i> Like</span>
                            <span><i class="far fa-comment"></i> Comment</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="card-grid">
                <article class="card">
                    <img src="/asset/deksripsi/image 3.png" alt="Manusia dan Sejarah">
                    <div class="card-body">
                        <h2 class="badge-title">Manusia dan Sejarah</h2>
                        <div class="description">
                            <h3>Deskripsi Karya</h3>
                            <p>Manusia dan sejarah memiliki hubungan yang erat karena setiap peristiwa dalam kehidupan
                                manusia menjadi bagian dari sejarah. Sejarah membantu manusia memahami masa lalu,
                                perubahan, serta hubungan sebab-akibat agar dapat menjadi pelajaran untuk masa kini dan
                                masa depan.</p>
                        </div>
                        <span class="category">Sejarah</span>
                        <div class="footer-info">
                            <span class="members">Frea Gisella - Chelsea Olivia</span>
                            <span class="members">Jumlah Anggota: 10</span>
                        </div>
                        <button class="detail-btn">Lihat Lebih Detail</button>
                        <div class="interactions">
                            <span><i class="far fa-thumbs-up"></i> Like</span>
                            <span><i class="far fa-comment"></i> Comment</span>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <img src="/asset/deksripsi/image 4.png" alt="Sistem Tata Surya">
                    <div class="card-body">
                        <h2 class="badge-title">Sistem Tata Surya</h2>
                        <div class="description">
                            <h3>Deskripsi Karya</h3>
                            <p>Sistem tata surya adalah kumpulan benda langit yang berpusat pada Matahari dan
                                dikelilingi oleh planet-planet serta benda langit lainnya. Setiap planet bergerak
                                mengelilingi Matahari pada orbitnya karena adanya gaya gravitasi. Melalui karya ini,
                                diharapkan pembaca dapat...</p>
                        </div>
                        <span class="category">Ilmu Pengetahuan</span>
                        <div class="footer-info">
                            <span class="members">Dita Keyangan</span>
                            <span class="members">Jumlah Anggota: 1</span>
                        </div>
                        <button class="detail-btn">Lihat Lebih Detail</button>
                        <div class="interactions">
                            <span><i class="far fa-thumbs-up"></i> Like</span>
                            <span><i class="far fa-comment"></i> Comment</span>
                        </div>
                    </div>
                </article>
            </div>
        </main>
    </div>

</body>

</html>