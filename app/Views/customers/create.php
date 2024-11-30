<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>
</head>

<body>
    <h1>Tambah Pelanggan</h1>
    <form action="/customers/store" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email"><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone"><br>

        <label for="address">Address:</label>
        <textarea name="address"></textarea><br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>