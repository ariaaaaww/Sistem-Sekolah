<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="/css/output.css">
</head>

<body class="flex flex-col min-h-screen">
    <!-- Header Start -->
    <header class="bg-blue-500 text-amber-200">
        <div class="flex items-center justify-between container mx-auto p-4">
            <a class="font-bold " href="/student/">Sistem Sekolah</a>
            <a class="py-2 px-4 bg-white text-amber-500 rounded-2xl" href="/student/create">+ Tambah Siswa</a>
        </div>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main class="grow container mx-auto p-5">
        <div class="mt-2 space-y-4">
            <!-- Cari Header Start -->
            <div class="bg-gray-500 shadow p-4 rounded-lg text-amber-50">
                <h1 class="font-bold text-black text-4xl">Tambah Siswa</h1>
                <p>Menambahkan siswa baru dalam sistem</p>
            </div>
            <!-- Cari Header End -->

            <!-- Card Content Start -->
            <div class="bg-gray-10 pz-4 rounded-lg shadow mt-2 ">
                <form action="" class="p-4 grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="font-bold block" for="name">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama"
                            class="border rounded-lg px-4 py-2 w-full">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold block" for="kelas">Kelas</label>
                        <input type="text" id="kelas" kelas="kelas" placeholder="Masukkan Kelas"
                            class="border rounded-lg px-4 py-2 w-full">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold block" for="nis">NIS</label>
                        <input type="text" id="nis" nis="nis" placeholder="Masukkan NIS"
                            class="border rounded-lg px-4 py-2 w-full">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold block" for="phone_number">No. Telepon</label>
                        <input type="text" id="phone_number" phone_number="phone_number"
                            placeholder="Masukkan Nomor Telepon" class="border rounded-lg px-4 py-2 w-full">
                    </div>

                    <div class="flex justify-end gap-4 col-span-2">
                        <a href="/student" class="border px-4 py-2 rounded-lg bg-amber-500 text-amber-50">Kembali</a>
                        <button type="submit"
                            class="border px-3 py-2 rounded-lg text-amber-50 bg-amber-800">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- Card Content End -->
        </div>
    </main>
    <!-- Main End -->

    <!-- Footer Start -->
    <footer class="bg-gray-500 text-amber-50 p-4 text-center">
        2026 - SMK Kristen Immanuel Pontianak - Sistem Sekolah
    </footer>
    <!-- Footer End -->

</body>

</html>