<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor - Cetak Struk</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Rental Motor</h2>
        <hr>
        <?php
        // Daftar nama member
        $members = array("farel", "raffa", "zidan", "arya");

        // Harga sewa per jenis motor per hari
        $harga_motor = array(
            "yamaha" => 50000,
            "honda" => 55000,
            "kawasaki" => 60000,
            "suzuki" => 65000
        );

        // Pajak tetap
        $tambahan_pajak = 10000;

        // Fungsi untuk menghitung total biaya
        function hitung_biaya($nama_pelanggan, $durasi, $jenis_motor, $tambahan_pajak, $members, $harga_motor) {
            // Cek apakah pelanggan adalah member
            $is_member = in_array(strtolower($nama_pelanggan), $members);
            $diskon = $is_member ? 0.05 : 0;

            // Hitung total harga sebelum pajak
            $total_harga = $harga_motor[$jenis_motor] * $durasi;

            // Hitung diskon
            $total_diskon = $total_harga * $diskon;

            // Hitung total harga setelah diskon dan tambahkan pajak
            $total_biaya = ($total_harga - $total_diskon) + $tambahan_pajak;

            return array('total_biaya' => $total_biaya, 'is_member' => $is_member);
        }

        // Proses input jika form disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $durasi = $_POST['durasi'];
            $jenis_motor = $_POST['jenis_motor'];

            // Hitung total biaya menggunakan fungsi
            $result = hitung_biaya($nama_pelanggan, $durasi, $jenis_motor, $tambahan_pajak, $members, $harga_motor);
            $total_biaya = $result['total_biaya'];
            $is_member = $result['is_member'];

            echo "<div class='result'>";
            echo "<p>Nama Pelanggan: " . htmlspecialchars($nama_pelanggan) . ($is_member ? "<b> (member) </b>" : "") . "</p>";
            echo "<p>Jenis Motor: " . ucfirst($jenis_motor) . "</p>";
            echo "<p>Pajak: Rp. " . number_format($tambahan_pajak, 2, ',', '.') . "</p>";
            if ($is_member) {
                echo "<p>Karena anda member, anda mendapatkan diskon 5%</p>";
            }
            echo "<p>Total yang harus dibayar adalah: Rp. <b>" . number_format($total_biaya, 2, ',', '.') . "</b></p>";
            echo "</div>";
        } else {
            echo "<div class='result'><p>Permintaan tidak valid.</p></div>";
        }
        ?>
        <hr>
        <div class="button-container">
            <button onclick="window.location.href='pesan.php'">Kembali</button>
        </div>
    </div>
</body>
</html>
