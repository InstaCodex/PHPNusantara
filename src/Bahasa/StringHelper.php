<?php

namespace PHPNusantara\Bahasa;

class StringHelper
{
    public static function judul($teks)
    {
        if (!$teks) return '';
        return ucwords(mb_strtolower($teks, 'UTF-8'));
    }

    public static function slug($teks)
    {
        if (!$teks) return '';

        $teks = iconv('UTF-8', 'ASCII//TRANSLIT', $teks);
        $teks = mb_strtolower($teks, 'UTF-8');
        $teks = preg_replace('/[^a-z0-9\s-]/', '', $teks);
        $teks = preg_replace('/[\s-]+/', '-', $teks);

        return trim($teks, '-');
    }

    public static function potong($teks, $panjang = 50)
    {
        if (mb_strlen($teks, 'UTF-8') <= $panjang) {
            return $teks;
        }

        return mb_substr($teks, 0, $panjang, 'UTF-8') . '...';
    }

    public static function potongKata($teks, $jumlah = 10)
    {
        $kata = preg_split('/\s+/', trim($teks));
        if (count($kata) <= $jumlah) return $teks;

        return implode(' ', array_slice($kata, 0, $jumlah)) . '...';
    }

    public static function besar($teks)
    {
        return mb_strtoupper($teks, 'UTF-8');
    }

    public static function kecil($teks)
    {
        return mb_strtolower($teks, 'UTF-8');
    }

    public static function mengandung($teks, $cari)
    {
        return mb_strpos($teks, $cari) !== false;
    }

    public static function diawali($teks, $awal)
    {
        return mb_substr($teks, 0, mb_strlen($awal)) === $awal;
    }

    public static function diakhiri($teks, $akhir)
    {
        return mb_substr($teks, -mb_strlen($akhir)) === $akhir;
    }

    public static function acak($panjang = 8)
    {
        $karakter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $hasil = '';

        for ($i = 0; $i < $panjang; $i++) {
            $hasil .= $karakter[random_int(0, strlen($karakter) - 1)];
        }

        return $hasil;
    }
}
