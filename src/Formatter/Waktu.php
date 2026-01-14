<?php

namespace PHPNusantara\Formatter;

class Waktu
{
    public static function jamMenit($waktu)
    {
        if (!$waktu) return '-';

        return date('H:i', strtotime($waktu));
    }

    public static function lengkap($waktu)
    {
        if (!$waktu) return '-';

        return date('H:i:s', strtotime($waktu));
    }

    public static function tanggalJamIndo($waktu)
    {
        if (!$waktu) return '-';

        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April',
            'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];

        $tanggal = date('Y-m-d', strtotime($waktu));
        $jam     = date('H:i', strtotime($waktu));

        $pecah = explode('-', $tanggal);

        return $pecah[2] . ' ' .
               $bulan[(int) $pecah[1]] . ' ' .
               $pecah[0] . ' ' .
               $jam;
    }

    public static function selisih($awal, $akhir)
    {
        $awal  = strtotime($awal);
        $akhir = strtotime($akhir);

        if (!$awal || !$akhir) {
            return 0;
        }

        return abs($akhir - $awal);
    }
}
