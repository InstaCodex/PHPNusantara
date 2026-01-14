<?php

namespace PHPNusantara\Formatter;

class Tanggal
{
    public static function indo($tanggal)
    {
        if (!$tanggal) {
            return '-';
        }

        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April',
            'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];

        $pecah = explode('-', date('Y-m-d', strtotime($tanggal)));

        return $pecah[2] . ' ' . $bulan[(int) $pecah[1]] . ' ' . $pecah[0];
    }
}
