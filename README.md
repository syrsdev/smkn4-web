# Website SMKN 4 Tangerang

## Instalasi
Clone Repo ini
```bash
  git clone https://github.com/Suryanataa/smkn4-web.git
```

Pindah direktori
```bash
  cd smkn4-web
```

Install depedensi
```bash
  composer install
  npm install
```

Salin file .env.example
```bash
  cp .env.example .env
```

Buat database dan hubungkan di file .env
```bash
  DB_DATABASE=db_smkn4_web
```

Jalankan migrasi
```bash
  php artisan migrate --seed
  # atau
  php artisan migrate:fresh --seed
```

Jalankan server
```bash
  php artisan key:generate
  php artisan serve
  # start di terminal lain
  npm run dev
```

created by KuliKoding04
