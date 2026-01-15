<?php

namespace PHPNusantara\Formatter;

class Persentase
{
    public static function format($nilai, $desimal = 0, $dariPecahan = true)
    {
        if ($nilai === null || $nilai === '') {
            return '-';
        }

        if (!is_numeric($nilai)) {
            return '-';
        }

        $angka = $dariPecahan ? $nilai * 100 : $nilai;

        return number_format($angka, $desimal, ',', '.') . '%';
    }
}
