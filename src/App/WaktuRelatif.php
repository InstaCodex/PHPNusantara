<?php

namespace PHPNusantara\App;

class WaktuRelatif
{
    public static function dariSekarang($waktu, $singkat = false)
    {
        if (!$waktu) return '-';

        $timestamp = is_numeric($waktu) ? (int) $waktu : strtotime($waktu);
        if (!$timestamp) return '-';

        $selisih = time() - $timestamp;
        $abs     = abs($selisih);

        if ($abs < 60) {
            return 'Baru saja';
        }

        if ($abs < 3600) {
            $menit = floor($abs / 60);
            return self::format($menit, 'menit', 'm', $selisih, $singkat);
        }

        if ($abs < 86400) {
            $jam = floor($abs / 3600);
            return self::format($jam, 'jam', 'j', $selisih, $singkat);
        }

        if ($abs < 604800) {
            $hari = floor($abs / 86400);
            return self::format($hari, 'hari', 'h', $selisih, $singkat);
        }

        if ($abs < 2592000) {
            $minggu = floor($abs / 604800);
            return self::format($minggu, 'minggu', 'mg', $selisih, $singkat);
        }

        if ($abs < 31536000) {
            $bulan = floor($abs / 2592000);
            return self::format($bulan, 'bulan', 'bln', $selisih, $singkat);
        }

        $tahun = floor($abs / 31536000);
        return self::format($tahun, 'tahun', 'th', $selisih, $singkat);
    }

    protected static function format($nilai, $panjang, $pendek, $selisih, $singkat)
    {
        if ($singkat) {
            return $selisih > 0 ? "{$nilai}{$pendek} lalu" : "{$nilai}{$pendek} lagi";
        }

        return $selisih > 0
            ? "$nilai $panjang lalu"
            : "$nilai $panjang lagi";
    }

    public static function lalu($waktu, $singkat = false)
    {
        return self::dariSekarang($waktu, $singkat);
    }

    public static function lagi($waktu, $singkat = false)
    {
        return self::dariSekarang($waktu, $singkat);
    }
}
