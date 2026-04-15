<div class="mt-2 space-y-4">
    <!-- Cari Header Start -->
    <div class="bg-gray-500 shadow p-4 rounded-lg text-amber-50">
        <h1 class="font-bold text-ember-50 text-4xl">Daftar Siswa</h1>
        <p>Menampilkan daftar siswa yang terdaftar</p>
    </div>
    <!-- Cari Header End -->

    <!-- Card Content Start -->
    <div class="bg-gray-10 p-4 rounded-lg shadow mt-2 ">
        <table class="w-full -">
            <thead class="bg-gray-200 ">
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
                <?php foreach ($students as $index => $student): ?>
                    <tr>
                        <td class="px-4 py-4 text-left">
                            <?= $index + 1 ?>
                        </td>
                        <td class="px-4 py-4 text-left">
                            <?= $student['nis'] ?>
                        </td>
                        <td class="px-4 py-4 text-left">
                            <?= $student['name'] ?>
                        </td>
                        <td class="px-4 py-4 text-left">
                            <?= $student['class'] ?>
                        </td>
                        <td class="px-4 py-4 text-left">
                            <?= $student['phone_number'] ?>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex justify-center items-center gap-4">
                                <a href="/student/<?= $student['id']?>" class="text-green-500">Detail</a>
                                <a href="/student/<?= $student['id']?>/edit" class="text-yellow-500">Edit</a>
                                <a href="/student/" class="text-red-500">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- Card Content End -->

</div>