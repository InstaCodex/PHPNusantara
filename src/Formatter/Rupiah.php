<?php

namespace PHPNusantara\Formatter;

class Rupiah
{
    public static function format($angka)
    {
        if (!is_numeric($angka)) {
            return 'Rp 0';
        }

        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}
