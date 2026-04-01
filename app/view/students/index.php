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
        <div class="mt-2">
            <!-- Cari Header Start -->
            <div class="bg-gray-500 shadow p-4 rounded-lg text-amber-50">
                <h1 class="font-bold text-black text-4xl">Daftar Siswa</h1>
                <p>Menampilkan daftar siswa yang terdaftar</p>
            </div>
            <!-- Cari Header End -->

            <!-- Card Content Start -->
            <div class="bg-gray-100 p-4 rounded-lg shadow mt-2">
                <table>
                    <thead class="bg-white">
                        <tr>
                            <th class="px-10 text-left">No</th>
                            <th class="px-10 text-left">Nama</th>
                            <th class="px-10 text-left">Kelas</th>
                            <th class="px-10 text-left">NIS</th>
                            <th class="px-10 text-left">No Telp</th>
                            <th class="px-10">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr>
                            <td class="px-4 py-4 text-left">1</td>
                            <td class="px-4 py-4 text-left">Sandi</td>
                            <td class="px-4 py-4 text-left">13 KLH</td>
                            <td class="px-4 py-4 text-left">19056</td>
                            <td class="px-4 py-4 text-left">083621237573</td>
                            <td class="px-4 py-4">
                                <div class="flex justify-center items-center" style="gap:10px">
                                    <a href="" class="text-green-500">Detail</a>
                                    <a href="" class="text-yellow-500">Edit</a>
                                    <a href="" class="text-red-500">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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