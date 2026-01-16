<?php

namespace PHPNusantara\Formatter;

class Persentase
{
    public static function format($nilai, $desimal = 0, $dariPecahan = true)
    {
        if (!is_numeric($nilai)) return '-';

        $angka = $dariPecahan ? $nilai * 100 : $nilai;

        return number_format($angka, $desimal, ',', '.') . '%';
    }

    public static function parse($teks, $kePecahan = true)
    {
        if ($teks === null || $teks === '') return 0;

        $teks = str_replace('%', '', $teks);
        $teks = str_replace(',', '.', $teks);

        if (!is_numeric($teks)) return 0;

        return $kePecahan ? ((float) $teks / 100) : (float) $teks;
    }

    public static function clamp($nilai)
    {
        if (!is_numeric($nilai)) return 0;

        if ($nilai < 0) return 0;
        if ($nilai > 100) return 100;

        return $nilai;
    }

    public static function dariTotal($nilai, $total, $desimal = 0)
    {
        if (!is_numeric($nilai) || !is_numeric($total) || $total == 0) {
            return '-';
        }

        return self::format(($nilai / $total) * 100, $desimal, false);
    }

    public static function nilai($persen, $total)
    {
        if (!is_numeric($persen) || !is_numeric($total)) return 0;

        return ($persen / 100) * $total;
    }

    public static function progress($nilai, $total, $desimal = 0)
    {
        if (!is_numeric($nilai) || !is_numeric($total) || $total == 0) {
            return 0;
        }

        return round(($nilai / $total) * 100, $desimal);
    }
}
