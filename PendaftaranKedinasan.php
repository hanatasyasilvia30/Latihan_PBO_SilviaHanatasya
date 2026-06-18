<?php
// File: PendaftaranKedinasan.php

class PendaftaranKedinasan extends Pendaftaran {
    // ... (atribut dan constructor tetap sama seperti sebelumnya)

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     * Aturan Jalur Kedinasan: Biaya tambahan sebesar 25% dari biaya dasar.
     */
    public function hitungTotalBiaya() {
        // Menghitung biaya tambahan 25% untuk keperluan administrasi kerja sama
        $biayaTambahan = $this->biayaPendaftaranDasar * 0.25;
        $total = $this->biayaPendaftaranDasar + $biayaTambahan;
        
        return $total;
    }

    // ... (method tampilkanInfoJalur dan ambilDataKedinasan)
}
?>