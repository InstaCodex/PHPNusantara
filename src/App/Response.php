<?php

namespace PHPNusantara\App;

class Response
{
    public static function success($data = null, $pesan = 'Berhasil')
    {
        return [
            'status'  => true,
            'message' => $pesan,
            'data'    => $data
        ];
    }

    public static function notFound($pesan = 'Data tidak ditemukan')
    {
        return [
            'status'  => false,
            'message' => $pesan,
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

    public static function empty($pesan = 'Data kosong')
    {
        return [
            'status'  => true,
            'message' => $pesan,
            'data'    => []
        ];
    }

    public static function make($status, $pesan, $data = null)
    {
        return [
            'status'  => (bool) $status,
            'message' => $pesan,
            'data'    => $data
        ];
    }

    public static function dd($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }
}
