<?php

namespace PHPNusantara\Formatter;

class Angka
{
    public static function format($angka, $desimal = 0)
    {
        if (!is_numeric($angka)) {
            return '0';
        }

        return number_format($angka, $desimal, ',', '.');
    }

    public static function singkat($angka)
    {
        if (!is_numeric($angka)) {
            return '0';
        }

        if ($angka >= 1000000000) {
            return round($angka / 1000000000, 1) . ' M';
        }

        if ($angka >= 1000000) {
            return round($angka / 1000000, 1) . ' jt';
        }

        if ($angka >= 1000) {
            return round($angka / 1000, 1) . ' rb';
        }

        return (string) $angka;
    }
}
