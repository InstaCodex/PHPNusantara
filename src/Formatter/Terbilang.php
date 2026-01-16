<?php

namespace PHPNusantara\Formatter;

class Terbilang
{
    protected static $angka = [
        '', 'Satu', 'Dua', 'Tiga', 'Empat',
        'Lima', 'Enam', 'Tujuh', 'Delapan',
        'Sembilan', 'Sepuluh', 'Sebelas'
    ];

    public static function buat($nilai, $kapital = true)
    {
        if (!is_numeric($nilai)) return '';

        $nilai = (int) $nilai;

        if ($nilai == 0) return 'Nol';

        if ($nilai < 0) {
            return 'Minus ' . self::buat(abs($nilai), $kapital);
        }

        if ($nilai < 12) {
            $hasil = self::$angka[$nilai];
        } elseif ($nilai < 20) {
            $hasil = self::buat($nilai - 10) . ' Belas';
        } elseif ($nilai < 100) {
            $hasil = self::buat($nilai / 10) . ' Puluh ' . self::buat($nilai % 10);
        } elseif ($nilai < 200) {
            $hasil = 'Seratus ' . self::buat($nilai - 100);
        } elseif ($nilai < 1000) {
            $hasil = self::buat($nilai / 100) . ' Ratus ' . self::buat($nilai % 100);
        } elseif ($nilai < 2000) {
            $hasil = 'Seribu ' . self::buat($nilai - 1000);
        } elseif ($nilai < 1000000) {
            $hasil = self::buat($nilai / 1000) . ' Ribu ' . self::buat($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            $hasil = self::buat($nilai / 1000000) . ' Juta ' . self::buat($nilai % 1000000);
        } elseif ($nilai < 1000000000000) {
            $hasil = self::buat($nilai / 1000000000) . ' Miliar ' . self::buat($nilai % 1000000000);
        } else {
            return 'Nilai Terlalu Besar';
        }

        $hasil = trim($hasil);

        return $kapital ? $hasil : strtolower($hasil);
    }

    public static function rupiah($nilai)
    {
        if (!is_numeric($nilai)) return '';

        return trim(self::buat($nilai)) . ' Rupiah';
    }

    public static function desimal($nilai)
    {
        if (!is_numeric($nilai)) return '';

        $pecah = explode('.', (string) $nilai);
        $hasil = self::buat((int) $pecah[0]);

        if (isset($pecah[1])) {
            $hasil .= ' Koma';
            foreach (str_split($pecah[1]) as $d) {
                $hasil .= ' ' . self::$angka[(int) $d];
            }
        }

        return trim($hasil);
    }

    public static function teks($nilai)
    {
        return self::buat($nilai);
    }
}
