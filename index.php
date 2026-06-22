<?php
// index.php
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Slip Gaji Karyawan</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f8fafc; color: #334155; }
        h1 { text-align: center; color: #1e293b; font-weight: 700; margin-bottom: 5px; }
        .sub-title { text-align: center; font-style: italic; color: #64748b; margin-bottom: 40px; font-size: 14px; }
        
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); margin-bottom: 35px; }
        h2 { font-size: 18px; font-weight: 600; margin-top: 0; padding-bottom: 12px; }
        
        /* Pewarnaan Judul Kategori */
        h2.title-kontrak { color: #34495e; border-bottom: 2px solid #34495e; }
        h2.title-tetap { color: #16a085; border-bottom: 2px solid #16a085; }
        h2.title-magang { color: #6c5ce7; border-bottom: 2px solid #6c5ce7; }
        
        /* Desain Tabel Rapat Tanpa Jarak */
        table { width: 100%; border-collapse: collapse; border-spacing: 0; margin-top: 15px; background: #fff; border-radius: 8px; overflow: hidden; border: 1px solid #e2e8f0; }
        th, td { padding: 12px 16px; text-align: left; border: 1px solid #e2e8f0; font-size: 14px; }
        
        /* Warna Header */
        th.bg-kontrak { background-color: #34495e; color: white; font-weight: 500; }
        th.bg-tetap { background-color: #16a085; color: white; font-weight: 500; }
        th.bg-magang { background-color: #5c3d75; color: white; font-weight: 500; }
        
        /* Variasi Belang Lembut */
        .row-kontrak:nth-child(even) { background-color: #f1f5f9; }
        .row-tetap:nth-child(even) { background-color: #f0fdf4; }
        .row-magang:nth-child(even) { background-color: #faf5ff; }
        
        /* Highlight Gaji */
        .gaji-kontrak { color: #2c3e50; font-weight: 600; }
        .gaji-tetap { color: #15803d; font-weight: 600; }
        .gaji-magang { color: #6b21a8; font-weight: 600; }
        
        .text-right { text-align: right; }
        .text-center { text-align: center; }
    </style>
</head>
<body>

    <h1>SISTEM DAFTAR SLIP GAJI KARYAWAN</h1>
    <div class="sub-title">Format Basis Data: DB_UAS_PBO_AlyaDhitiNurIzdihar</div>

    <div class="container">
        <h2 class="title-kontrak">1. Kategori Karyawan Kontrak</h2>
        <table>
            <thead>
                <tr>
                    <th class="bg-kontrak text-center" style="width: 60px;">ID</th>
                    <th class="bg-kontrak">Nama Karyawan</th>
                    <th class="bg-kontrak">Departemen</th>
                    <th class="bg-kontrak text-center">Hari Masuk</th>
                    <th class="bg-kontrak text-right">Gaji / Hari</th>
                    <th class="bg-kontrak text-center">Durasi</th>
                    <th class="bg-kontrak">Agensi Penyalur</th>
                    <th class="bg-kontrak text-right">Gaji Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Kontrak'";
                $result = $koneksi->query($query);
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $k = new KaryawanKontrak($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['durasi_kontrak_bulan'], $row['agensi_penyalur']);
                        echo "<tr class='row-kontrak'>";
                        echo "<td class='text-center' style='color: #64748b;'>".$row['id_karyawan']."</td>";
                        echo "<td>".htmlspecialchars($row['nama_karyawan'])."</td>";
                        echo "<td>".htmlspecialchars($row['departemen'])."</td>";
                        echo "<td class='text-center'>".$row['hari_kerja_masuk']." hari</td>";
                        echo "<td class='text-right'>Rp ".number_format($row['gaji_dasar_per_hari'], 0, ',', '.')."</td>";
                        echo "<td class='text-center'>".$row['durasi_kontrak_bulan']." bln</td>";
                        echo "<td>".htmlspecialchars($row['agensi_penyalur'])."</td>";
                        echo "<td class='text-right gaji-kontrak'>Rp ".number_format($k->hitungGajiBersih(), 0, ',', '.')."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data karyawan kontrak.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2 class="title-tetap">2. Kategori Karyawan Tetap</h2>
        <table>
            <thead>
                <tr>
                    <th class="bg-tetap text-center" style="width: 60px;">ID</th>
                    <th class="bg-tetap">Nama Karyawan</th>
                    <th class="bg-tetap">Departemen</th>
                    <th class="bg-tetap text-center">Hari Masuk</th>
                    <th class="bg-tetap text-right">Gaji / Hari</th>
                    <th class="bg-tetap text-right">Tunjangan Kesehatan</th>
                    <th class="bg-tetap">Opsi Saham ID</th>
                    <th class="bg-tetap text-right">Gaji Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Tetap'";
                $result = $koneksi->query($query);
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $k = new KaryawanTetap($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['tunjangan_kesehatan'], $row['opsi_saham_id']);
                        echo "<tr class='row-tetap'>";
                        echo "<td class='text-center' style='color: #64748b;'>".$row['id_karyawan']."</td>";
                        echo "<td>".htmlspecialchars($row['nama_karyawan'])."</td>";
                        echo "<td>".htmlspecialchars($row['departemen'])."</td>";
                        echo "<td class='text-center'>".$row['hari_kerja_masuk']." hari</td>";
                        echo "<td class='text-right'>Rp ".number_format($row['gaji_dasar_per_hari'], 0, ',', '.')."</td>";
                        echo "<td class='text-right'>Rp ".number_format($row['tunjangan_kesehatan'], 0, ',', '.')."</td>";
                        echo "<td>".htmlspecialchars($row['opsi_saham_id'])."</td>";
                        echo "<td class='text-right gaji-tetap'>Rp ".number_format($k->hitungGajiBersih(), 0, ',', '.')."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data karyawan tetap.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2 class="title-magang">3. Kategori Karyawan Magang</h2>
        <table>
            <thead>
                <tr>
                    <th class="bg-magang text-center" style="width: 60px;">ID</th>
                    <th class="bg-magang">Nama Karyawan</th>
                    <th class="bg-magang">Departemen</th>
                    <th class="bg-magang text-center">Hari Masuk</th>
                    <th class="bg-magang text-right">Gaji / Hari</th>
                    <th class="bg-magang text-right">Uang Saku</th>
                    <th class="bg-magang">Sertifikat</th>
                    <th class="bg-magang text-right">Gaji Bersih (80%)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Magang'";
                $result = $koneksi->query($query);
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $k = new KaryawanMagang($row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']);
                        echo "<tr class='row-magang'>";
                        echo "<td class='text-center' style='color: #64748b;'>".$row['id_karyawan']."</td>";
                        echo "<td>".htmlspecialchars($row['nama_karyawan'])."</td>";
                        echo "<td>".htmlspecialchars($row['departemen'])."</td>";
                        echo "<td class='text-center'>".$row['hari_kerja_masuk']." hari</td>";
                        echo "<td class='text-right'>Rp ".number_format($row['gaji_dasar_per_hari'], 0, ',', '.')."</td>";
                        echo "<td class='text-right'>Rp ".number_format($row['uang_saku_bulanan'], 0, ',', '.')."</td>";
                        echo "<td>".htmlspecialchars($row['sertifikat_kampus_merdeka'])."</td>";
                        echo "<td class='text-right gaji-magang'>Rp ".number_format($k->hitungGajiBersih(), 0, ',', '.')."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data karyawan magang.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>