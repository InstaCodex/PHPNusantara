<?php
namespace PHPNusantara\Formatter;

class Terbilang
{
    protected static $angka = [
        '', 'Satu', 'Dua', 'Tiga', 'Empat',
        'Lima', 'Enam', 'Tujuh', 'Delapan',
        'Sembilan', 'Sepuluh', 'Sebelas'
    ];

    public static function buat($nilai)
    {
        if (!is_numeric($nilai)) return '';

        $nilai = (int) $nilai;

        if ($nilai == 0) {
            return '';
        }

        if ($nilai < 0) {
            return 'Minus ' . self::buat(abs($nilai));
        }

        if ($nilai < 12) {
            return self::$angka[$nilai];
        } elseif ($nilai < 20) {
            return self::buat($nilai - 10) . ' Belas';
        } elseif ($nilai < 100) {
            return self::buat((int) ($nilai / 10)) . ' Puluh ' . self::buat($nilai % 10);
        } elseif ($nilai < 200) {
            return 'Seratus ' . self::buat($nilai - 100);
        } elseif ($nilai < 1000) {
            return self::buat((int) ($nilai / 100)) . ' Ratus ' . self::buat($nilai % 100);
        } elseif ($nilai < 2000) {
            return 'Seribu ' . self::buat($nilai - 1000);
        } elseif ($nilai < 1000000) {
            $ribu = (int) ($nilai / 1000);
            $sisa = $nilai % 1000;

            $hasil = self::buat($ribu) . ' Ribu';
            if ($sisa > 0) {
                $hasil .= ' ' . self::buat($sisa);
            }

            return trim($hasil);
        }

        return 'Nilai Terlalu Besar';
    }
}

