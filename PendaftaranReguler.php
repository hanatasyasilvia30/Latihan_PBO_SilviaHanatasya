<?php
// File: PendaftaranReguler.php

require_once 'pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Atribut khusus Jalur Reguler
    private $pilihan_prodi;
    private $lokasi_kampus;

    // Constructor untuk menerima data dari database
    public function __construct($id, $nama, $sekolah, $nilai, $biaya, $prodi, $kampus) {
        // Melempar data umum ke constructor induk (Pendaftaran)
        parent::__construct($id, $nama, $sekolah, $nilai, $biaya);
        $this->pilihan_prodi = $prodi;
        $this->lokasi_kampus = $kampus;
    }

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     * Ini method yang menyebabkan error jika tidak ditulis
     */
    public function tampilkanInfoJalur() {
        echo "Prodi: " . $this->pilihan_prodi . "<br>";
        echo "Kampus: " . $this->lokasi_kampus;
    }

    // Method query yang dipanggil di index.php
    public static function ambilDataReguler($db_conn) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
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
                $row['lokasi_kampus']
            );
        }
        return $hasil;
    }
}
?>