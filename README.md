# Pramige
Pramige adalah sebuah library PHP yang memungkinkan Anda untuk menghasilkan gambar acak dengan resolusi yang dapat disesuaikan. Library ini sangat berguna jika Anda ingin menghasilkan gambar dummy atau placeholder untuk pengembangan website atau aplikasi Anda.

## Cara Menggunakan
Anda dapat menggunakan Pramige dengan mengikuti langkah-langkah berikut:

### Install library menggunakan composer:

```
composer require wahyulingu/pramige
```

### Import library di dalam file PHP Anda:

```
use WahyuLingu\Pramige\Generator;
```

### Buat instance dari kelas Generator dan tentukan resolusi gambar yang diinginkan:

```
$generator = new Generator(800, 600); // resolusi lebar dan tinggi
```

### Panggil method save pada instance Generator untuk menyimpan gambar hasil generate ke dalam file:
```
$generator->save('random-image.png'); // menyimpan hasil ke dalam file
```

Anda dapat menyimpan gambar dengan format file yang berbeda dengan mengubah ekstensi file.

## Kontribusi
Jika Anda menemukan masalah atau ingin berkontribusi pada pengembangan Pramige, silakan buka isu (issue) atau kirim pull request di GitHub. Terima kasih!
