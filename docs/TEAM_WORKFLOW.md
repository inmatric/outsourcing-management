# 👥 Laravel Project – TEAM_WORKFLOW.md

Dokumentasi kerja kolaboratif tim engineer dalam proyek Laravel menggunakan GitHub, user story, dan standar kerja profesional.

---

## 📌 Struktur Utama

1. [📋 Panduan Workflow Git & Branching](#-panduan-workflow-git--branching)
2. [🧠 Panduan Harian Developer](#-panduan-harian-developer)
3. [🗂️ Format User Story](#-format-user-story)
4. [✅ Pull Request Template](#-pull-request-template)
5. [📦 User Stories CRUD – Produk](#-user-stories-crud--produk)
6. [💬 Komunikasi & Review Code](#-komunikasi--review-code)

---

## 🔀 Panduan Workflow Git & Branching

Gunakan strategi berikut:

```
main (produksi)
│
└── dev (penggabungan semua fitur)
     └── feature/nama-fitur
```

### Alur Branching:

1. Checkout ke `dev`:  
   `git checkout dev`

2. Pull terbaru:  
   `git pull origin dev`

3. Buat branch baru:  
   `git checkout -b feature/tambah-produk`

4. Setelah selesai:  
   `git add . && git commit -m "feat: tambah produk"`  
   `git push origin feature/tambah-produk`

5. Buat Pull Request ke `dev`

6. Review & merge setelah approved

---

## 🧠 Panduan Harian Developer

1. Ambil user story dari backlog
2. Kerjakan di branch `feature/...`
3. Commit kecil dan jelas
4. Push dan buat PR
5. Review & merge ke `dev`

---

## 🗂️ Format User Story

```
### User Story
Sebagai [tipe user], saya ingin [fitur], sehingga [manfaat]

### Acceptance Criteria
- [ ] Kriteria A
- [ ] Kriteria B

### Task
- [ ] Task 1
- [ ] Task 2
```

---

## ✅ Pull Request Template

> Simpan juga sebagai `.github/PULL_REQUEST_TEMPLATE.md`

```
### Ringkasan
Implementasi dari user story: [judul user story]

### Perubahan
- [x] Tambah controller method
- [x] Validasi input
- [x] View untuk create produk

### Checklist
- [x] Sudah dites di lokal
- [x] Sesuai acceptance criteria
- [x] Siap direview
```

---

## 📦 User Stories CRUD – Produk

### 1. Create – Menambahkan Produk Baru

#### User Story
Sebagai **Admin**, saya ingin dapat menambahkan produk baru, sehingga produk bisa muncul di katalog dan bisa dijual.

#### Acceptance Criteria
- [ ] Admin dapat mengakses halaman tambah produk
- [ ] Form memiliki field: nama produk, harga, stok
- [ ] Validasi: semua field wajib diisi, harga & stok harus angka
- [ ] Data produk disimpan ke database
- [ ] Ada pesan sukses setelah berhasil menambah produk

#### Task
- [ ] Route `GET /products/create` & `POST /products`
- [ ] Buat controller method `create()` dan `store()`
- [ ] Buat view `products/create.blade.php`
- [ ] Validasi input
- [ ] Redirect ke list dengan pesan sukses

---

### 2. Read – Melihat Daftar Produk

#### User Story
Sebagai **Admin**, saya ingin melihat daftar produk, sehingga saya bisa mengetahui produk apa saja yang tersedia.

#### Acceptance Criteria
- [ ] Produk ditampilkan dalam bentuk tabel
- [ ] Setiap produk menampilkan nama, harga, stok
- [ ] Tersedia tombol "Edit" dan "Hapus" di setiap baris

#### Task
- [ ] Route `GET /products`
- [ ] Controller method `index()`
- [ ] View `products/index.blade.php`
- [ ] Tampilkan semua data dari DB

---

### 3. Update – Mengedit Produk

#### User Story
Sebagai **Admin**, saya ingin dapat mengubah data produk, sehingga informasi produk tetap akurat.

#### Acceptance Criteria
- [ ] Admin bisa akses halaman edit produk
- [ ] Form terisi data lama dan bisa diedit
- [ ] Validasi seperti saat tambah
- [ ] Setelah update, redirect ke list dengan pesan sukses

#### Task
- [ ] Route `GET /products/{id}/edit` dan `PUT /products/{id}`
- [ ] Controller method `edit()` dan `update()`
- [ ] View `products/edit.blade.php`
- [ ] Validasi input
- [ ] Simpan perubahan ke DB

---

### 4. Delete – Menghapus Produk

#### User Story
Sebagai **Admin**, saya ingin dapat menghapus produk, sehingga produk yang tidak relevan tidak muncul lagi.

#### Acceptance Criteria
- [ ] Ada tombol hapus di list produk
- [ ] Konfirmasi sebelum hapus
- [ ] Produk terhapus dari database
- [ ] Redirect ke list dengan pesan sukses

#### Task
- [ ] Route `DELETE /products/{id}`
- [ ] Controller method `destroy()`
- [ ] Tambahkan form method spoofing `@method('DELETE')` di blade
- [ ] Konfirmasi JS sebelum hapus (opsional)

---

## 💬 Komunikasi & Review Code

Gunakan platform seperti Discord, WhatsApp, atau Slack untuk:

- Update harian:
  ```
  Hari ini: Kerjakan fitur update produk
  Kendala: Validasi belum muncul
  ```
- Review PR teman
- Koordinasi sebelum merge

---

## 🚀 Tips

- Commit kecil dan jelas: `feat: tambah validasi input`
- Satu fitur satu branch
- Selalu tarik `dev` terbaru sebelum mulai kerja
- Prioritaskan kolaborasi dan diskusi terbuka

---

Selamat berkontribusi! 🎉
