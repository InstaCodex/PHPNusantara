<?php

namespace PHPNusantara\App;

class WaktuRelatif
{
    public static function dariSekarang($waktu)
    {
        if (!$waktu) {
            return '-';
        }

        $timestamp = strtotime($waktu);

        if (!$timestamp) {
            return '-';
        }

        $selisih = time() - $timestamp;

        if ($selisih < 60) {
            return 'Baru saja';
        }

        if ($selisih < 3600) {
            return floor($selisih / 60) . ' menit lalu';
        }

        if ($selisih < 86400) {
            return floor($selisih / 3600) . ' jam lalu';
        }

        if ($selisih < 604800) {
            return floor($selisih / 86400) . ' hari lalu';
        }

        return date('d-m-Y H:i', $timestamp);
    }
}
