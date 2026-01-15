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
        $detik = abs(strtotime($akhir) - strtotime($awal));
        return $detik . ' detik';
    }

    public static function selisihMenit($awal, $akhir)
    {
        $menit = floor(abs(strtotime($akhir) - strtotime($awal)) / 60);
        return $menit . ' menit';
    }

    public static function selisihJam($awal, $akhir)
    {
        $jam = floor(abs(strtotime($akhir) - strtotime($awal)) / 3600);
        return $jam . ' jam';
    }

    public static function selisihHari($awal, $akhir)
    {
        $hari = floor(abs(strtotime($akhir) - strtotime($awal)) / 86400);
        return $hari . ' hari';
    }
}
