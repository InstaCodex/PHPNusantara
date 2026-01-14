<?php

namespace PHPNusantara\Formatter;

use PHPNusantara\App\Bulan;

class Waktu
{
    public static function jamMenit($waktu)
    {
        return $waktu ? date('H:i', strtotime($waktu)) : '-';
    }

    public static function lengkap($waktu)
    {
        return $waktu ? date('H:i:s', strtotime($waktu)) : '-';
    }

    public static function tanggalJamIndo($waktu)
    {
        if (!$waktu) return '-';

        $time = strtotime($waktu);
        if (!$time) return '-';

        return date('d', $time) . ' ' .
               Bulan::nama(date('m', $time)) . ' ' .
               date('Y', $time) . ' ' .
               date('H:i', $time);
    }

    public static function selisihDetik($awal, $akhir)
    {
        return abs(strtotime($akhir) - strtotime($awal));
    }

    public static function selisihMenit($awal, $akhir)
    {
        return floor(self::selisihDetik($awal, $akhir) / 60);
    }

    public static function selisihJam($awal, $akhir)
    {
        return floor(self::selisihDetik($awal, $akhir) / 3600);
    }

    public static function selisihHari($awal, $akhir)
    {
        return floor(self::selisihDetik($awal, $akhir) / 86400);
    }
}
