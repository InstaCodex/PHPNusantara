<?php

namespace PHPNusantara\Formatter;

class Angka
{
    public static function format($angka, $desimal = 0)
    {
        if (!is_numeric($angka)) return '0';

        return number_format($angka, $desimal, ',', '.');
    }

    public static function rupiah($angka, $prefix = 'Rp ')
    {
        return $prefix . self::format($angka);
    }

    public static function persen($angka, $desimal = 0)
    {
        if (!is_numeric($angka)) return '0%';

        return number_format($angka, $desimal, ',', '.') . '%';
    }

    public static function parse($teks)
    {
        if (!$teks) return 0;

        $teks = str_replace('.', '', $teks);
        $teks = str_replace(',', '.', $teks);

        return is_numeric($teks) ? (float) $teks : 0;
    }

    public static function singkat($angka)
    {
        if (!is_numeric($angka)) return '0';

        $negatif = $angka < 0;
        $angka = abs($angka);

        if ($angka >= 1000000000) {
            $hasil = round($angka / 1000000000, 1) . ' M';
        } elseif ($angka >= 1000000) {
            $hasil = round($angka / 1000000, 1) . ' jt';
        } elseif ($angka >= 1000) {
            $hasil = round($angka / 1000, 1) . ' rb';
        } else {
            $hasil = (string) $angka;
        }

        return $negatif ? '-' . $hasil : $hasil;
    }

    public static function terbilang($angka)
    {
        if (!is_numeric($angka)) return '';

        $angka = abs((int) $angka);

        $kata = ['', 'satu', 'dua', 'tiga', 'empat',
                 'lima', 'enam', 'tujuh', 'delapan', 'sembilan',
                 'sepuluh', 'sebelas'];

        if ($angka < 12) return $kata[$angka];
        if ($angka < 20) return self::terbilang($angka - 10) . ' belas';
        if ($angka < 100) return self::terbilang($angka / 10) . ' puluh ' . self::terbilang($angka % 10);
        if ($angka < 200) return 'seratus ' . self::terbilang($angka - 100);
        if ($angka < 1000) return self::terbilang($angka / 100) . ' ratus ' . self::terbilang($angka % 100);
        if ($angka < 2000) return 'seribu ' . self::terbilang($angka - 1000);
        if ($angka < 1000000) return self::terbilang($angka / 1000) . ' ribu ' . self::terbilang($angka % 1000);
        if ($angka < 1000000000) return self::terbilang($angka / 1000000) . ' juta ' . self::terbilang($angka % 1000000);

        return 'terlalu besar';
    }
}
