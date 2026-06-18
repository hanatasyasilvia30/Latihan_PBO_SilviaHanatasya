<?php
// File: PendaftaranPrestasi.php

require_once 'pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Atribut khusus untuk Jalur Prestasi
    private $pilihan_prodi;
    private $jenis_prestasi;
    private $tingkat_prestasi;

    // Constructor Kelas Anak
    public function __construct($id, $nama, $sekolah, $nilai, $biaya, $prodi, $jenis, $tingkat) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biaya);
        $this->pilihan_prodi = $prodi;
        $this->jenis_prestasi = $jenis;
        $this->tingkat_prestasi = $tingkat;
    }

    // Mengimplementasikan method abstrak dari induk
    public function hitungTotalBiaya() {
        // Contoh aturan: Jika tingkat Nasional/Internasional diskon 100% (Gratis), selain itu diskon 50%
        if ($this->tingkat_prestasi == 'Nasional' || $this->tingkat_prestasi == 'Internasional') {
            return 0; 
        }
        return $this->biayaPendaftaranDasar * 0.5;
    }

    // Mengimplementasikan method abstrak dari induk
    public function tampilkanInfoJalur() {
        echo "Jalur: Prestasi<br>";
        echo "Pilihan Prodi: " . $this->pilihan_prodi . "<br>";
        echo "Jenis Prestasi: " . $this->jenis_prestasi . " (" . $this->tingkat_prestasi . ")<br>";
    }

    // Method khusus untuk mengambil semua data Jalur Prestasi dari database
    public static function ambilDataPrestasi($db_conn) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db_conn->prepare($query);
        $stmt->execute();
        
        $hasil = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $hasil[] = new self(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['pilihan_prodi'],
                $row['jenis_prestasi'],
                $row['tingkat_prestasi']
            );
        }
        return $hasil;
    }
}
?>