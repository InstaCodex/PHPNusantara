<?php

namespace PHPNusantara\Bahasa;

class StringHelper
{
    public static function judul($teks)
    {
        if (!$teks) return '';

        return ucwords(strtolower($teks));
    }

    public static function slug($teks)
    {
        if (!$teks) return '';

        $teks = strtolower($teks);
        $teks = preg_replace('/[^a-z0-9\s-]/', '', $teks);
        $teks = preg_replace('/[\s-]+/', '-', $teks);

        return trim($teks, '-');
    }

    public static function potong($teks, $panjang = 50)
    {
        if (strlen($teks) <= $panjang) {
            return $teks;
        }

        return substr($teks, 0, $panjang) . '...';
    }
}
