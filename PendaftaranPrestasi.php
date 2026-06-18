<?php
// File: PendaftaranPrestasi.php

require_once 'pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Atribut khusus Jalur Prestasi
    private $pilihan_prodi;
    private $jenis_prestasi;
    private $tingkat_prestasi;

    // Constructor
    public function __construct($id, $nama, $sekolah, $nilai, $biaya, $prodi, $jenis, $tingkat) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biaya);
        $this->pilihan_prodi = $prodi;
        $this->jenis_prestasi = $jenis;
        $this->tingkat_prestasi = $tingkat;
    }

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     */
    public function hitungTotalBiaya() {
        $potongan = 50000;
        $total = $this->biayaPendaftaranDasar - $potongan;
        return ($total < 0) ? 0 : $total;
    }

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     */
    public function tampilkanInfoJalur() {
        echo "Prodi: " . $this->pilihan_prodi . "<br>";
        echo "Prestasi: " . $this->jenis_prestasi . " (" . $this->tingkat_prestasi . ")";
    }

    // Method query yang dipanggil di index.php
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