<?php

namespace PHPNusantara\Identity;

class Email
{
    public static function valid(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Sensor email
     * contoh: example@gmail.com -> examp***@gmail.com
     */
    public static function mask(string $email, int $visible = 5): string
    {
        if (!self::valid($email)) return '-';

        [$name, $domain] = explode('@', $email, 2);

        if (strlen($name) <= $visible) {
            return str_repeat('*', strlen($name)) . '@' . $domain;
        }

        return substr($name, 0, $visible)
            . str_repeat('*', strlen($name) - $visible)
            . '@' . $domain;
    }
}
