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

    public static function valid($angka)
    {
        return (int) $angka >= 1 && (int) $angka <= 12;
    }

    public static function semua()
    {
        return self::$bulan;
    }

    public static function singkat($angka)
    {
        $nama = self::nama($angka);
        return $nama !== '-' ? substr($nama, 0, 3) : '-';
    }

    public static function angka($nama)
    {
        return array_search(ucfirst(strtolower($nama)), self::$bulan, true) ?: 0;
    }

    public static function sekarang()
    {
        return self::nama(date('n'));
    }
}
