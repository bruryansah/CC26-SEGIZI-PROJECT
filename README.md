<div align="center">

<img src="https://img.shields.io/badge/-%F0%9F%A5%97%20SeGizi-2d6a4f?style=for-the-badge&logoColor=white" alt="SeGizi" height="40"/>

#SeGizi

**Aplikasi Healthy Lives & Well-Being**

*Resep bergizi · Filter nutrisi · Kalkulator BMI & Kalori · Artikel edukasi*

<br/>

![Laravel](https://img.shields.io/badge/Laravel-12.53.0-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2.28-777BB4?style=flat-square&logo=php&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-3.5.29-4FC08D?style=flat-square&logo=vue.js&logoColor=white)
![Inertia](https://img.shields.io/badge/Inertia.js-2.3.17-9553E9?style=flat-square&logo=inertia&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-Latest-646CFF?style=flat-square&logo=vite&logoColor=white)
![Node](https://img.shields.io/badge/Node.js-v24.14.0-339933?style=flat-square&logo=node.js&logoColor=white)

</div>

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| 🍽️ **Resep Bergizi** | Kumpulan resep makanan sehat dengan informasi nutrisi lengkap |
| 🔍 **Filter Nutrisi** | Cari resep berdasarkan kandungan nutrisi & kategori diet |
| ⚖️ **Kalkulator BMI** | Hitung Body Mass Index dan interpretasi hasilnya |
| 🔥 **Kebutuhan Kalori** | Estimasi kalori harian berdasarkan usia, berat, tinggi, & aktivitas |
| 📰 **Artikel Edukasi** | Konten informatif seputar gaya hidup sehat |

---

## 🧱 Tech Stack

| Layer | Teknologi | Versi |
|-------|-----------|-------|
| Backend | Laravel | 12.53.0 |
| Runtime | PHP | 8.2.28 |
| Package Manager | Composer | 2.9.5 |
| Frontend | Vue 3 | 3.5.29 |
| SPA Bridge | Inertia.js (@inertiajs/vue3) | 2.3.17 |
| Build Tool | Vite | Laravel 12 Default |
| Runtime JS | Node.js | v24.14.0 |
| Package Manager JS | NPM | 10.8.2 |
| Database | MySQL / MariaDB | — |

---

## ⚙️ Requirements

Pastikan sudah terinstall di sistem kamu:

- **PHP** ≥ 8.2
- **Composer** ≥ 2.x
- **Node.js** ≥ 20
- **MySQL** atau **MariaDB**

---

## 🚀 Instalasi & Setup

### 1️⃣ Clone Repository

```bash
git clone https://github.com/bruryansah/CC26-SEGIZI-PROJECT.git
cd cc26-segizi-project
```

### 2️⃣ Install Backend Dependencies

```bash
composer install
```

### 3️⃣ Install Frontend Dependencies

```bash
npm install
```

### 4️⃣ Setup Environment

```bash
# Salin file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5️⃣ Konfigurasi Database

Edit file `.env` sesuai konfigurasi database lokal kamu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=segizi
DB_USERNAME=root
DB_PASSWORD=
```

### 6️⃣ Migrasi Database

```bash
php artisan migrate
```

> Jika tersedia seeder:
> ```bash
> php artisan db:seed
> ```

### 7️⃣ Jalankan Development Server

Karena menggunakan **Laravel + Vue (Vite)**, jalankan dua terminal secara bersamaan:

**Terminal 1 — Backend**
```bash
php artisan serve
```

**Terminal 2 — Frontend**
```bash
npm run dev
```

Akses aplikasi di browser:

```
http://127.0.0.1:8000
```

---

## 🏗️ Build Production

```bash
npm run build
```


## 👥 Tim CC26

> Proyek ini dikembangkan sebagai bagian dari program **Capstone CC26** dengan tema *Healthy Lives & Well-Being* (SDGs Goal 3).

---

<div align="center">

Made with 💚 by **CC26 Team** · 2026

</div>
