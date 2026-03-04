CC26-SeGizi

Aplikasi bertema Healthy Lives & Well-Being berbasis Laravel 12 + Vue 3 untuk membantu pengguna menjalani pola hidup sehat melalui resep, filter nutrisi, kalkulator BMI & kebutuhan kalori, serta artikel edukasi.

🧱 Tech Stack

Laravel 12.53.0

PHP 8.2.28

Composer 2.9.5

Node.js v24.14.0

NPM 10.8.2

Vue 3.5.29

Inertia.js (@inertiajs/vue3 2.3.17)

Vite (default Laravel 12)

⚙️ Requirements

Pastikan sudah terinstall:

PHP ≥ 8.2

Composer ≥ 2.x

Node.js ≥ 20

MySQL / MariaDB

🚀 Installation & Setup
1️⃣ Clone Repository
git clone https://github.com/username/cc26-segizi.git
cd cc26-segizi
2️⃣ Install Backend Dependencies
composer install
3️⃣ Install Frontend Dependencies
npm install
4️⃣ Setup Environment

Copy file environment:

cp .env.example .env

Generate app key:

php artisan key:generate
5️⃣ Konfigurasi Database

Edit file .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=segizi
DB_USERNAME=root
DB_PASSWORD=
6️⃣ Migrasi Database
php artisan migrate

Jika terdapat seeder:

php artisan db:seed
7️⃣ Jalankan Development Server

Karena menggunakan Laravel + Vue (Vite), jalankan dua terminal:

Terminal 1:

php artisan serve

Terminal 2:

npm run dev

Akses aplikasi di:

http://127.0.0.1:8000
🏗️ Build Production
npm run build
