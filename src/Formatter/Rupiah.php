<?php

namespace PHPNusantara\Formatter;

class Rupiah
{
    public static function format($angka, $desimal = 0, $simbol = true)
    {
        if (!is_numeric($angka)) {
            $angka = 0;
        }

        $hasil = number_format($angka, $desimal, ',', '.');

        return $simbol ? 'Rp ' . $hasil : $hasil;
    }
}
