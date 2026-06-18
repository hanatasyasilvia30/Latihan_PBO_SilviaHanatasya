<?php
// File: Pendaftaran.php

// Menyertakan file koneksi database
require_once 'koneksi.php';

// Mendefinisikan abstract class sebagai induk pendaftaran
abstract class Pendaftaran {
    
    // Atribut bersama (protected agar hanya bisa diakses oleh class ini dan turunannya)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor untuk menginisialisasi properti dasar saat data diambil dari DB
    public function __construct($id, $nama, $sekolah, $nilai, $biaya) {
        $this->id_pendaftaran = $id;
        $this->nama_calon = $nama;
        $this->asal_sekolah = $sekolah;
        $this->nilai_ujian = $nilai;
        $this->biayaPendaftaranDasar = $biaya;
    }

    // =========================================================================
    // METHOD ABSTRAK (Wajib diimplementasikan oleh class anak)
    // =========================================================================
    
    /**
     * Menghitung total biaya pendaftaran.
     * Setiap jalur memiliki formula potongan atau tambahan biaya yang berbeda.
     */
    abstract public function hitungTotalBiaya();

    /**
     * Menampilkan informasi spesifik pendaftar sesuai dengan jalurnya.
     */
    abstract public function tampilkanAtributKhusus();
    
    // =========================================================================
    // GETTER METHODS (Method umum yang bisa langsung digunakan oleh class anak)
    // =========================================================================
    
    public function getIdPendaftaran() {
        return $this->id_pendaftaran;
    }

    public function getNamaCalon() {
        return $this->nama_calon;
    }

    public function getAsalSekolah() {
        return $this->asal_sekolah;
    }

    public function getNilaiUjian() {
        return $this->nilai_ujian;
    }
}
?>