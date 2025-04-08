# 🛠️ Laravel Project Development Guide

Panduan kerja sama dan standar pengembangan untuk proyek Laravel ini. Wajib diikuti semua anggota tim agar kerja lebih rapi dan efisien.

---

## 🚀 Branching Strategy

### Main Branches
- `main` → Kode final, siap produksi
- `dev` → Integrasi semua fitur, dasar pengembangan

### Feature Workflow
1. Buat branch dari `dev`
    ```bash
    git checkout dev
    git pull origin dev
    git checkout -b feature/nama-fitur
    ```

2. Setelah selesai, push ke GitHub:
    ```bash
    git push origin feature/nama-fitur
    ```

3. Buka Pull Request ke `dev`, tunggu review.

---

## 🧾 Commit Message Convention

Gunakan format berikut:

| Tipe | Contoh |
|------|--------|
| feat | `feat: tambah fitur registrasi user` |
| fix | `fix: perbaiki validasi input` |
| docs | `docs: update dokumentasi penggunaan` |
| chore | `chore: update package` |
| refactor | `refactor: pisahkan fungsi ke helper` |

---

## ⚙️ Artisan Command Guide

### Generate Model, Migration, Controller, Seeder, Factory
```bash
php artisan make:model Product -mcrsf
```

**Penjelasan Flag:**
- `-m` → migration
- `-c` → controller
- `-r` → resource controller
- `-s` → seeder
- `-f` → factory
---

## 🧠 Struktur Controller (Langsung Validasi & Return ke View)

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
```

---

## 🧼 Code Formatter (Laravel Pint)

### Install:
```bash
composer require laravel/pint --dev
```

### Jalankan:
```bash
./vendor/bin/pint
```

> Jalankan sebelum commit untuk menjaga konsistensi kode

---

## 📝 Penamaan (Naming Convention)

| Item | Format | Contoh |
|------|--------|--------|
| Controller | PascalCase | `ProductController` |
| Function | camelCase | `getList()`, `storeData()` |
| Variable | camelCase | `$userName`, `$totalPrice` |
| Route URL | kebab-case | `/user-profile`, `/product-list` |
| Blade File | kebab-case | `product-form.blade.php` |

---

## 📦 Tools Artisan yang Berguna

```bash
php artisan route:list               # Melihat semua route
php artisan migrate:fresh --seed    # Ulang migrasi & isi seeder
php artisan optimize:clear          # Hapus cache semua
```

---

## ✅ Checklist Developer

- [ ] Gunakan branch `feature/*` dari `dev`
- [ ] Commit pakai format `feat: ...`, `fix: ...`, dst.
- [ ] Jalankan `pint` sebelum push
- [ ] Jangan push langsung ke `main`
- [ ] Buka Pull Request ke `dev` dan minta review

---

## 💬 Flash Message di Blade

Tambahkan ini di file `resources/views/layouts/app.blade.php` atau layout utama:

```blade
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
```

---

Happy coding dan selamat berkolaborasi! 💻🔥
