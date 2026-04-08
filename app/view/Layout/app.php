<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="/css/output.css">
</head>

<body class="flex flex-col min-h-screen">
    <?php
    require_once '../app/view/layout/partials/header.php';

    ?>

    <!-- Main Start -->
    <main class="grow container mx-auto p-5">
        <?php
        require_once $content;
        ?>
    </main>
    <!-- Main End -->

    <!-- Footer Start -->
    <footer class="bg-gray-500 text-amber-50 text-center">
        <?php
        require_once '../app/view/layout/partials/footer.php';
        ?>
    </footer>
    <!-- Footer End -->

</body>

</html>