<?php

namespace PHPNusantara\Formatter;

use PHPNusantara\App\Bulan;

class Tanggal
{
    public static function indo($tanggal)
    {
        if (!$tanggal) return '-';

        $time = strtotime($tanggal);
        if (!$time) return '-';

        return date('d', $time) . ' ' .
               Bulan::nama(date('m', $time)) . ' ' .
               date('Y', $time);
    }
}
