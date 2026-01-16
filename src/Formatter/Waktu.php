<?php

namespace PHPNusantara\Formatter;

use PHPNusantara\App\Bulan;

class Waktu
{
    public static function jamMenit($waktu)
    {
        $time = self::toTime($waktu);
        return $time ? date('H:i', $time) : '-';
    }

    public static function lengkap($waktu)
    {
        $time = self::toTime($waktu);
        return $time ? date('H:i:s', $time) : '-';
    }

    public static function tanggalJamIndo($waktu)
    {
        $time = self::toTime($waktu);
        if (!$time) return '-';

        return date('d', $time) . ' ' .
               Bulan::nama(date('n', $time)) . ' ' .
               date('Y', $time) . ' ' .
               date('H:i', $time);
    }

    public static function sekarang()
    {
        return date('H:i:s');
    }

    public static function jam($waktu)
    {
        $time = self::toTime($waktu);
        return $time ? date('H', $time) : '-';
    }

    public static function menit($waktu)
    {
        $time = self::toTime($waktu);
        return $time ? date('i', $time) : '-';
    }

    public static function db($waktu)
    {
        $time = self::toTime($waktu);
        return $time ? date('Y-m-d H:i:s', $time) : null;
    }

    public static function selisih($awal, $akhir, $satuan = 'detik')
    {
        $tAwal  = self::toTime($awal);
        $tAkhir = self::toTime($akhir);

        if (!$tAwal || !$tAkhir) return 0;

        $detik = abs($tAkhir - $tAwal);

        switch ($satuan) {
            case 'menit': return floor($detik / 60);
            case 'jam':   return floor($detik / 3600);
            case 'hari':  return floor($detik / 86400);
            default:      return $detik;
        }
    }

    public static function selisihRelatif($awal, $akhir)
    {
        $detik = self::selisih($awal, $akhir, 'detik');

        if ($detik < 60) {
            return $detik . ' detik';
        }

        if ($detik < 3600) {
            $menit = floor($detik / 60);
            return $menit . ' menit';
        }

        if ($detik < 86400) {
            $jam = floor($detik / 3600);
            return $jam . ' jam';
        }

        $hari = floor($detik / 86400);
        return $hari . ' hari';
    }

    protected static function toTime($waktu)
    {
        if (!$waktu) return false;

        return is_numeric($waktu)
            ? (int) $waktu
            : strtotime($waktu);
    }
}
