<?php

namespace PHPNusantara\Identity;

class NIK
{
    public static function valid(string $nik): bool
    {
        if (!preg_match('/^[0-9]{16}$/', $nik)) {
            return false;
        }

        $tanggal = substr($nik, 6, 2);
        $bulan   = substr($nik, 8, 2);
        $tahun   = substr($nik, 10, 2);

        $tanggal = (int) $tanggal > 40 ? (int) $tanggal - 40 : (int) $tanggal;

        return checkdate((int) $bulan, $tanggal, (int) ('19' . $tahun));
    }
    public static function mask(string $nik): string
    {
        if (!self::valid($nik)) return '-';

        return substr($nik, 0, 6)
            . '********'
            . substr($nik, -2);
    }

    public static function tanggalLahir(string $nik): ?string
    {
        if (!self::valid($nik)) return null;

        $tgl   = substr($nik, 6, 2);
        $bln   = substr($nik, 8, 2);
        $thn   = substr($nik, 10, 2);

        $tgl = (int) $tgl > 40 ? (int) $tgl - 40 : (int) $tgl;

        return sprintf('19%02d-%02d-%02d', $thn, $bln, $tgl);
    }
}
