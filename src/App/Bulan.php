<?php

namespace PHPNusantara\App;

class Bulan
{
    protected static $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus',
        'September', 'Oktober', 'November', 'Desember'
    ];

    public static function nama($angka)
    {
        return self::$bulan[(int) $angka] ?? '-';
    }
}
