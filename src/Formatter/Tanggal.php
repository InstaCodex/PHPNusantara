<?php

namespace PHPNusantara\Formatter;

use PHPNusantara\App\Bulan;

class Tanggal
{
    public static function indo($tanggal)
    {
        $time = self::toTime($tanggal);
        if (!$time) return '-';

        return date('d', $time) . ' ' .
               Bulan::nama(date('n', $time)) . ' ' .
               date('Y', $time);
    }

    public static function indoLengkap($tanggal)
    {
        $time = self::toTime($tanggal);
        if (!$time) return '-';

        return self::hari(date('w', $time)) . ', ' .
               date('d', $time) . ' ' .
               Bulan::nama(date('n', $time)) . ' ' .
               date('Y', $time);
    }

    public static function singkat($tanggal)
    {
        $time = self::toTime($tanggal);
        if (!$time) return '-';

        return date('d', $time) . ' ' .
               substr(Bulan::nama(date('n', $time)), 0, 3) . ' ' .
               date('Y', $time);
    }

    public static function sekarang()
    {
        return self::indo(time());
    }

    public static function db($tanggal)
    {
        $time = self::toTime($tanggal);
        if (!$time) return null;

        return date('Y-m-d', $time);
    }

    public static function valid($tanggal)
    {
        return (bool) self::toTime($tanggal);
    }

    public static function range($awal, $akhir)
    {
        $tAwal  = self::toTime($awal);
        $tAkhir = self::toTime($akhir);

        if (!$tAwal || !$tAkhir) return '-';

        if (date('Y', $tAwal) === date('Y', $tAkhir)) {
            return date('d', $tAwal) . ' ' .
                   Bulan::nama(date('n', $tAwal)) . ' – ' .
                   date('d', $tAkhir) . ' ' .
                   Bulan::nama(date('n', $tAkhir)) . ' ' .
                   date('Y', $tAkhir);
        }

        return self::indo($awal) . ' – ' . self::indo($akhir);
    }

    protected static function toTime($tanggal)
    {
        if (!$tanggal) return false;

        return is_numeric($tanggal)
            ? (int) $tanggal
            : strtotime($tanggal);
    }

    protected static function hari($angka)
    {
        $hari = [
            'Minggu', 'Senin', 'Selasa', 'Rabu',
            'Kamis', 'Jumat', 'Sabtu'
        ];

        return $hari[$angka] ?? '-';
    }
}
