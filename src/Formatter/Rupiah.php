<?php

namespace PHPNusantara\Formatter;

class Rupiah
{
    public static function format($angka, $desimal = 0, $simbol = true)
    {
        if (!is_numeric($angka)) $angka = 0;

        $negatif = $angka < 0;
        $angka = abs($angka);

        $hasil = number_format($angka, $desimal, ',', '.');

        $hasil = $simbol ? 'Rp ' . $hasil : $hasil;

        return $negatif ? '-' . $hasil : $hasil;
    }

    public static function parse($teks)
    {
        if (!$teks) return 0;

        $teks = str_replace(['Rp', 'rp', ' ', '.'], '', $teks);
        $teks = str_replace(',', '.', $teks);

        return is_numeric($teks) ? (float) $teks : 0;
    }

    public static function singkat($angka)
    {
        if (!is_numeric($angka)) return 'Rp 0';

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

        $hasil = 'Rp ' . $hasil;

        return $negatif ? '-' . $hasil : $hasil;
    }

    public static function terbilang($angka)
    {
        if (!is_numeric($angka)) return '';

        $nilai = abs((int) $angka);

        return ucfirst(Angka::terbilang($nilai)) . ' rupiah';
    }

    public static function plain($angka)
    {
        return self::format($angka, 0, false);
    }
}
