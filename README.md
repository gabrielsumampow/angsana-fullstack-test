
# Angsana Asmara Fullstack Developer Test

## Prerequisites

Sebelum memulai, pastikan Anda telah menginstal hal berikut:

- [PHP](https://www.php.net/manual/en/install.php) (versi 7.3 atau lebih tinggi)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/) (versi 14 atau lebih tinggi)
- [npm](https://www.npmjs.com/get-npm) (biasanya sudah terpasang dengan Node.js)

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek ini di sistem Anda:

1. **Clone repositori:**

   ```bash
   git clone https://github.com/gabrielsumampow/angsana-fullstack-test.git
   ```

2. **Masuk ke direktori proyek:**

   ```bash
   cd angsana-fullstack-test
   ```

3. **Instal dependensi PHP:**

   ```bash
   composer install
   ```

4. **Instal dependensi Node.js:**

   ```bash
   npm install
   ```

5. **Instal Tailwind CSS:**

   Jika Anda menggunakan Tailwind CSS, jalankan perintah berikut untuk menginstal Tailwind:

   ```bash
   npm install tailwindcss
   ```

## Konfigurasi Tailwind CSS

Setelah menginstal Tailwind CSS, Anda perlu membuat file konfigurasi Tailwind dengan menjalankan:

```bash
npx tailwindcss init
```

Kemudian, tambahkan konfigurasi Tailwind ke file CSS Anda, misalnya `styles.css`:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

## Menjalankan Tailwind CSS

Untuk memproses file Tailwind CSS, jalankan perintah berikut di terminal:

```bash
npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch
```

Ganti `./src/input.css` dan `./dist/output.css` dengan jalur file input dan output yang sesuai.

## Menjalankan Proyek

Setelah semua langkah di atas selesai, Anda bisa menjalankan server lokal CodeIgniter dengan perintah:

```bash
php spark serve
```

Akses aplikasi Anda di browser dengan membuka `http://localhost:8080`.
