<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
</head>

<body>
    <h1>Daftar Pelanggan</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $customer['id'] ?></td>
                <td><?= $customer['name'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['phone'] ?></td>
                <td><?= $customer['address'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>