<?php
// File: PendaftaranKedinasan.php

require_once 'pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Atribut khusus untuk Jalur Kedinasan
    private $sk_ikatan_dinas;
    private $instansi_sponsor;

    // Constructor Kelas Anak
    public function __construct($id, $nama, $sekolah, $nilai, $biaya, $sk, $sponsor) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biaya);
        $this->sk_ikatan_dinas = $sk;
        $this->instansi_sponsor = $sponsor;
    }

    // Mengimplementasikan method abstrak dari induk
    public function hitungTotalBiaya() {
        // Contoh aturan: Jalur kedinasan dibayar penuh oleh instansi sponsor, calon mahasiswa membayar Rp0
        return 0;
    }

    // Mengimplementasikan method abstrak dari induk
    public function tampilkanInfoJalur() {
        echo "Jalur: Kedinasan<br>";
        echo "No SK Ikatan Dinas: " . $this->sk_ikatan_dinas . "<br>";
        echo "Instansi Sponsor: " . $this->instansi_sponsor . "<br>";
    }

    // Method khusus untuk mengambil semua data Jalur Kedinasan dari database
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