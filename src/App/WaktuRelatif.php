<?php

namespace PHPNusantara\App;

class WaktuRelatif
{
    public static function dariSekarang($waktu)
    {
        if (!$waktu) return '-';

        $timestamp = strtotime($waktu);
        if (!$timestamp) return '-';

        $selisih = time() - $timestamp;
        $abs     = abs($selisih);

        if ($abs < 60) {
            return 'Baru saja';
        }

        if ($abs < 3600) {
            $menit = floor($abs / 60);
            return $selisih > 0 ? "$menit menit lalu" : "$menit menit lagi";
        }

        if ($abs < 86400) {
            $jam = floor($abs / 3600);
            return $selisih > 0 ? "$jam jam lalu" : "$jam jam lagi";
        }

        $hari = floor($abs / 86400);
        return $selisih > 0 ? "$hari hari lalu" : "$hari hari lagi";
    }
}
