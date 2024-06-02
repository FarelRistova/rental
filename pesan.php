<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor - Pesan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>🛵 Rental Motor 🛵</h2>
        <form method="post" action="cetak.php">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>
            
            <label for="durasi">Durasi (hari):</label>
            <input type="number" id="durasi" name="durasi" required>
            
            <label for="jenis_motor">Jenis Motor:</label>
            <select id="jenis_motor" name="jenis_motor" required>
                <option value="" disabled selected>Pilih jenis motor</option>
                <option value="yamaha">YAMAHA</option>
                <option value="honda">HONDA</option>
                <option value="kawasaki">KAWASAKI</option>
                <option value="suzuki">SUZUKI</option>
            </select>
            
            <input type="submit" value="Pesan">
        </form>
    </div>
</body>
</html>
