<?php
// File: view.php

// 1. Me-require semua file yang dibutuhkan
require_once 'koneksi.php';
require_once 'pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 2. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

// 3. Mengambil data spesifik menggunakan method dari masing-masing class anak
$listReguler   = PendaftaranReguler::ambilDataReguler($db);
$listPrestasi  = PendaftaranPrestasi::ambilDataPrestasi($db);
$listKedinasan = PendaftaranKedinasan::ambilDataKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Pendaftaran Mahasiswa Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 40px; }
        h2 { color: #2980b9; border-bottom: 2px solid #2980b9; padding-bottom: 5px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #34495e; color: #fff; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .badge { display: inline-block; padding: 4px 8px; background: #e74c3c; color: white; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>

    <h1>Daftar Pendaftaran Mahasiswa Baru (PMB)</h1>

    <h2>1. Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>ID Pendaftaran</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($listReguler)): ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data pendaftar jalur reguler.</td></tr>
            <?php else: ?>
                <?php foreach ($listReguler as $reguler): ?>
                    <tr>
                        <td><strong><?= $reguler->getIdPendaftaran(); ?></strong></td>
                        <td><?= $reguler->getNamaCalon(); ?></td>
                        <td><?= $reguler->getAsalSekolah(); ?></td>
                        <td><?= $reguler->getNilaiUjian(); ?></td>
                        <td><?php $reguler->tampilkanInfoJalur(); ?></td>
                        <td class="text-right">Rp <?= number_format($reguler->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                        <td class="text-right"><strong>Rp <?= number_format($reguler->hitungTotalBiaya(), 0, ',', '.'); ?></strong></td>
                    </tr>
                <?php endforeach; ?> <?php endif; ?>
        </tbody>
    </table>


    <h2>2. Jalur Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID Pendaftaran</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya (Potongan Rp50k)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($listPrestasi)): ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data pendaftar jalur prestasi.</td></tr>
            <?php else: ?>
                <?php foreach ($listPrestasi as $prestasi): ?>
                    <tr>
                        <td><strong><?= $prestasi->getIdPendaftaran(); ?></strong></td>
                        <td><?= $prestasi->getNamaCalon(); ?></td>
                        <td><?= $prestasi->getAsalSekolah(); ?></td>
                        <td><?= $prestasi->getNilaiUjian(); ?></td>
                        <td><?php $prestasi->tampilkanInfoJalur(); ?></td>
                        <td class="text-right">Rp <?= number_format($prestasi->hitungTotalBiaya() + 50000, 0, ',', '.'); ?></td>
                        <td class="text-right" style="color: #27ae60;"><strong>Rp <?= number_format($prestasi->hitungTotalBiaya(), 0, ',', '.'); ?></strong></td>
                    </tr>
                <?php endforeach; ?> <?php endif; ?>
        </tbody>
    </table>


    <h2>3. Jalur Kedinasan</h2>
    <table>
        <thead>
            <tr>
                <th>ID Pendaftaran</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya (+25% Admin)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($listKedinasan)): ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data pendaftar jalur kedinasan.</td></tr>
            <?php else: ?>
                <?php foreach ($listKedinasan as $kedinasan): ?>
                    <tr>
                        <td><strong><?= $kedinasan->getIdPendaftaran(); ?></strong></td>
                        <td><?= $kedinasan->getNamaCalon(); ?></td>
                        <td><?= $kedinasan->getAsalSekolah(); ?></td>
                        <td><?= $kedinasan->getNilaiUjian(); ?></td>
                        <td><?php $kedinasan->tampilkanInfoJalur(); ?></td>
                        <td class="text-right">Rp <?= number_format($kedinasan->hitungTotalBiaya() / 1.25, 0, ',', '.'); ?></td>
                        <td class="text-right" style="color: #d35400;"><strong>Rp <?= number_format($kedinasan->hitungTotalBiaya(), 0, ',', '.'); ?></strong></td>
                    </tr>
                <?php endforeach; ?> <?php endif; ?>
        </tbody>
    </table>

</body>
</html>