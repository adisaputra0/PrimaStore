# PrimaStore 🎓🛒

**PrimaStore** adalah platform marketplace digital yang dirancang khusus untuk memfasilitasi mahasiswa **Primakara University** dalam menjual karya digital mereka, seperti artikel, template, website, desain, dan video. Platform ini juga memungkinkan masyarakat umum untuk membeli produk-produk tersebut menggunakan sistem koin digital (**PrimaKoin/PK**), yang dapat di-top up dan ditukar kembali menjadi uang tunai oleh penjual.

---

## 🚀 Fitur Utama

-   🛍️ **Penjual (Mahasiswa Primakara)**

    -   Unggah dan kelola produk digital
    -   Pantau transaksi dan ulasan
    -   Ajukan penarikan koin ke uang

-   💸 **Pembeli (Umum)**

    -   Top up koin (via QRIS/Midtrans)
    -   Beli dan unduh produk digital
    -   Beri ulasan & chat dengan penjual

-   🛠️ **Admin**
    -   Verifikasi penjual dan produk
    -   Kelola top up dan withdraw
    -   Pantau transaksi & aktivitas pengguna

---

## ⚙️ Teknologi yang Digunakan

-   **Laravel 12** – Backend API & MVC Framework
-   **Tailwind CSS v4.1** – UI modern dan responsif
-   **MySQL** – Database relasional
-   **Midtrans QRIS API** – Pembayaran digital

---

## 🧩 Struktur Database (Utama)

-   `users` – Data pengguna (penjual/pembeli)
-   `products` – Produk digital yang dijual
-   `coins` – Saldo koin setiap user
-   `transactions` – Riwayat pembelian
-   `topups` – Riwayat top up koin
-   `withdraw_requests` – Penarikan koin ke uang
-   `reviews` – Penilaian produk
-   `chats` – Chat antar user

---

## 📦 Instalasi Lokal

```bash
git https://github.com/adisaputra0/PrimaStore.git
cd PrimaStore
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
