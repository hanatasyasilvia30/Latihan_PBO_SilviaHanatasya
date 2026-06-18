<?php
// File: PendaftaranReguler.php

class PendaftaranReguler extends Pendaftaran {
    // ... (atribut dan constructor tetap sama seperti sebelumnya)

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     * Aturan Jalur Reguler: Menggunakan biaya pendaftaran dasar tanpa perubahan.
     */
    public function hitungTotalBiaya() {
        // Mengembalikan nilai biaya dasar secara utuh
        return $this->biayaPendaftaranDasar;
    }

    // ... (method tampilkanInfoJalur dan ambilDataReguler)
}
?>