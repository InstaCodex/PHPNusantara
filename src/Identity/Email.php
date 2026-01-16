<?php

namespace PHPNusantara\Identity;

class Email
{
    public static function valid(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function normalize(string $email): string
    {
        return strtolower(trim($email));
    }

    public static function username(string $email): string
    {
        return self::valid($email)
            ? explode('@', $email)[0]
            : '';
    }

    public static function domain(string $email): string
    {
        return self::valid($email)
            ? explode('@', $email)[1]
            : '';
    }

    public static function validDomain(string $email): bool
    {
        if (!self::valid($email)) return false;

        return checkdnsrr(self::domain($email), 'MX');
    }

    public static function mask(string $email, int $visible = 5): string
    {
        if (!self::valid($email)) return '-';

        [$name, $domain] = explode('@', $email);

        if (strlen($name) <= $visible) {
            return str_repeat('*', strlen($name)) . '@' . $domain;
        }

        return substr($name, 0, $visible)
            . str_repeat('*', strlen($name) - $visible)
            . '@' . $domain;
    }

    public static function maskTengah(string $email, int $awal = 2, int $akhir = 1): string
    {
        if (!self::valid($email)) return '-';

        [$name, $domain] = explode('@', $email);

        if (strlen($name) <= ($awal + $akhir)) {
            return str_repeat('*', strlen($name)) . '@' . $domain;
        }

        return substr($name, 0, $awal)
            . str_repeat('*', strlen($name) - ($awal + $akhir))
            . substr($name, -$akhir)
            . '@' . $domain;
    }

    public static function provider(string $email): string
    {
        return self::domain($email);
    }

    public static function safe(string $email): string
    {
        return htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    }
}
