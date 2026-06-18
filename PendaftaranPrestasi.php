<?php
// File: PendaftaranPrestasi.php

class PendaftaranPrestasi extends Pendaftaran {
    // ... (atribut dan constructor tetap sama seperti sebelumnya)

    /**
     * IMPLEMENTASI METHOD OVERRIDING (POLYMORPHISM)
     * Aturan Jalur Prestasi: Potongan biaya sebesar Rp50.000 dari biaya dasar.
     */
    public function hitungTotalBiaya() {
        // Menghitung potongan penghargaan prestasi
        $potongan = 50000;
        $total = $this->biayaPendaftaranDasar - $potongan;
        
        // Memastikan biaya tidak bernilai negatif jika biaya dasar terlalu kecil
        return ($total < 0) ? 0 : $total;
    }

    // ... (method tampilkanInfoJalur dan ambilDataPrestasi)
}
?>