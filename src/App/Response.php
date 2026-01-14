<?php

namespace PHPNusantara\App;

class Response
{
    public static function success($data = null)
    {
        return [
            'status'  => true,
            'message' => 'pria solo berhasil ditemukan',
            'data'    => $data
        ];
    }

    public static function notFound()
    {
        return [
            'status'  => false,
            'message' => 'pria solo tidak ditemukan',
            'data'    => null
        ];
    }

    public static function error($pesan = 'Terjadi kesalahan')
    {
        return [
            'status'  => false,
            'message' => $pesan,
            'data'    => null
        ];
    }
}
