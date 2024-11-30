<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Laundry</title>
    <link rel="stylesheet" href="/assets/libs/bootstrap/css/bootstrap.min.css"> <!-- Bootstrap -->
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Layanan Laundry</h1>

        <!-- Cek jika data services ada -->
        <?php if (!empty($services) && is_array($services)): ?>
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>Nama Layanan</th>
                        <th>Deskripsi</th>
                        <th>Harga per Kg</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Looping data services -->
                    <?php foreach ($services as $service): ?>
                        <tr>
                            <td><?= esc($service['service_name']) ?></td>
                            <td><?= esc($service['description']) ?></td>
                            <td><?= esc($service['price_per_kg']) ?> .000/Kg</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada layanan yang tersedia.</p>
        <?php endif; ?>
    </div>
</body>

</html>