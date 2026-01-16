<?php

namespace PHPNusantara\Identity;

class Telepon
{
    public static function normalize(string $nomor): string
    {
        $nomor = preg_replace('/[^0-9+]/', '', $nomor);

        if (strpos($nomor, '+62') === 0) {
            return '0' . substr($nomor, 3);
        }

        if (strpos($nomor, '62') === 0) {
            return '0' . substr($nomor, 2);
        }

        return $nomor;
    }

    public static function valid(string $nomor): bool
    {
        $nomor = self::normalize($nomor);

        return preg_match('/^08[1-9][0-9]{7,10}$/', $nomor) === 1;
    }

    public static function mask(string $nomor, int $depan = 5, int $belakang = 3): string
    {
        $nomor = self::normalize($nomor);

        if (!self::valid($nomor)) {
            return '-';
        }

        $panjang = strlen($nomor);

        if ($panjang <= ($depan + $belakang)) {
            return str_repeat('*', $panjang);
        }

        return substr($nomor, 0, $depan)
            . str_repeat('*', $panjang - ($depan + $belakang))
            . substr($nomor, -$belakang);
    }
}
