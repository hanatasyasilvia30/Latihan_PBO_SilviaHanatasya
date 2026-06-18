<?php
// File: pendaftaran.php

require_once 'koneksi.php';

abstract class Pendaftaran
{
    // Atribut induk
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor
    public function __construct($id, $nama, $sekolah, $nilai, $biaya)
    {
        $this->id_pendaftaran = $id;
        $this->nama_calon = $nama;
        $this->asal_sekolah = $sekolah;
        $this->nilai_ujian = $nilai;
        $this->biayaPendaftaranDasar = $biaya;
    }

    // Method abstrak sesuai soal
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();

    // Getter
    public function getIdPendaftaran()
    {
        return $this->id_pendaftaran;
    }

    public function getNamaCalon()
    {
        return $this->nama_calon;
    }

    public function getAsalSekolah()
    {
        return $this->asal_sekolah;
    }

    public function getNilaiUjian()
    {
        return $this->nilai_ujian;
    }

    public function getBiayaPendaftaranDasar()
    {
        return $this->biayaPendaftaranDasar;
    }
}
?>