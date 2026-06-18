<?php
// File: PendaftaranReguler.php

require_once 'pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Atribut khusus untuk Jalur Reguler
    private $pilihan_prodi;
    private $lokasi_kampus;

    // Constructor Kelas Anak
    public function __construct($id, $nama, $sekolah, $nilai, $biaya, $prodi, $kampus) {
        // Memanggil constructor dari class induk (Pendaftaran)
        parent::__construct($id, $nama, $sekolah, $nilai, $biaya);
        $this->pilihan_prodi = $prodi;
        $this->lokasi_kampus = $kampus;
    }

    // Mengimplementasikan method abstrak dari induk
    public function hitungTotalBiaya() {
        // Contoh aturan: Reguler dikenakan biaya dasar + biaya pengembangan Rp1.500.000
        return $this->biayaPendaftaranDasar + 1500000;
    }

    // Mengimplementasikan method abstrak dari induk
    public function tampilkanInfoJalur() {
        echo "Jalur: Reguler<br>";
        echo "Pilihan Prodi: " . $this->pilihan_prodi . "<br>";
        echo "Lokasi Kampus: " . $this->lokasi_kampus . "<br>";
    }

    // Method khusus untuk mengambil semua data Jalur Reguler dari database
    public static function ambilDataReguler($db_conn) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db_conn->prepare($query);
        $stmt->execute();
        
        $hasil = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Membuat objek dari setiap baris data database
            $hasil[] = new self(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['pilihan_prodi'],
                $row['lokasi_kampus']
            );
        }
        return $hasil;
    }
}
?>