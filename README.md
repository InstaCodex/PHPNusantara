# PHPNusantara

Library PHP sederhana berisi kumpulan helper berbahasa Indonesia untuk kebutuhan format **Rupiah, Tanggal, Waktu, Terbilang**, dan **Waktu Relatif** Dll.

---
## 📦 Instalasi

### ✅ Menggunakan Composer (Khusus Framework)

Library ini **sudah mendukung instalasi melalui Composer**, **hanya untuk framework berbasis Composer** seperti **Laravel** dan **CodeIgniter 4**.

```bash
composer require instacodex/phpnusantara
```

## 📁 Lokasi Penempatan

Letakkan folder **PHPNusantara** ke dalam folder `vendor/` pada project Anda.

### 📌 PHP Native

```text
project-native/
├── vendor/
│   └── PHPNusantara/
│       └── src/
├── index.php
```

### 📌 Laravel

```text
laravel-project/
├── vendor/
│   └── PHPNusantara/
│       └── src/
├── app/
├── public/
```

### 📌 CodeIgniter 4

```text
ci4-project/
├── vendor/
│   └── PHPNusantara/
│       └── src/
├── app/
├── public/
```

---

## 📂 Struktur Folder

```text
PHPNusantara/
├── src/
│   ├── App/
│   │   ├── Bulan.php
│   │   ├── Response.php
│   │   └── WaktuRelatif.php
│   │
│   ├── Bahasa/
│   │   └── StringHelper.php
│   │
│   ├── Formatter/
│   │   ├── Angka.php
│   │   ├── Persentase.php
│   │   ├── Rupiah.php
│   │   ├── Tanggal.php
│   │   ├── Terbilang.php
│   │   └── Waktu.php
│   │
│   └── Identity/
│       └── Email.php
│
├── composer.json
└── README.md


```

---

## 🚀 Cara Penggunaan

### 1️⃣ PHP Native – Format Rupiah

```php
<?php
require __DIR__ . '/vendor/PHPNusantara/src/Formatter/Rupiah.php';

use PHPNusantara\Formatter\Rupiah;

echo Rupiah::format(1500000);
// Output: Rp 1.500.000
```

---

### 2️⃣ Laravel – Format Tanggal Indonesia

```php
<?php
require base_path('vendor/PHPNusantara/src/Formatter/Tanggal.php');

use PHPNusantara\Formatter\Tanggal;

echo Tanggal::indo('2025-01-14');
// Output: 14 Januari 2025
```

---

### 3️⃣ CodeIgniter 4 – Terbilang Angka

```php
<?php
require ROOTPATH . 'vendor/PHPNusantara/src/Formatter/Terbilang.php';

use PHPNusantara\Formatter\Terbilang;

echo Terbilang::buat(2500);
// Output: dua ribu lima ratus
```

---

## ✨ Catatan

* Library ini **tidak bergantung Composer** (manual include).
* Cocok untuk PHP Native, Laravel, maupun CodeIgniter.

---

## 📄 Lisensi

MIT License © InstaCodex
