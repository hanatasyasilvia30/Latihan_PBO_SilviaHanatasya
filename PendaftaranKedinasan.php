<?php
// File: PendaftaranKedinasan.php

require_once 'pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Atribut khusus Jalur Kedinasan
    private $sk_ikatan_dinas;
    private $instansi_sponsor;

    // Constructor
    public function __construct($id, $nama, $sekolah, $nilai, $biaya, $sk, $sponsor) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biaya);
        $this->sk_ikatan_dinas = $sk;
        $this->instansi_sponsor = $sponsor;
    }

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     */
    public function hitungTotalBiaya() {
        $biayaTambahan = $this->biayaPendaftaranDasar * 0.25;
        return $this->biayaPendaftaranDasar + $biayaTambahan;
    }

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     */
    public function tampilkanInfoJalur() {
        echo "SK: " . $this->sk_ikatan_dinas . "<br>";
        echo "Sponsor: " . $this->instansi_sponsor;
    }

    // Method query yang dipanggil di index.php
    public static function ambilDataKedinasan($db_conn) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
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
                $row['sk_ikatan_dinas'],
                $row['instansi_sponsor']
            );
        }
        return $hasil;
    }
}
?>