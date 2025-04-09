# 📦 User Stories CRUD – Users (Laravel View-Based)

## ✍️ User Stories

### 1. Create – Menambahkan User Baru
**User Story**  
Sebagai Admin, saya ingin dapat menambahkan user baru, sehingga user dapat mengakses sistem sesuai perannya.

**Acceptance Criteria**
- Admin dapat mengakses halaman tambah user
- Form memiliki field: email, password, role (admin, hrd, user)
- Validasi: semua field wajib diisi, email harus unik
- Data user disimpan ke database
- Ada pesan sukses setelah berhasil menambah user

**Task**
- Route GET `/users/create` & POST `/users`
- Controller method `create()` dan `store()`
- View `users/create.blade.php`
- Validasi input
- Simpan data dengan password di-hash
- Redirect ke list dengan pesan sukses

---

### 2. Read – Melihat Daftar User
**User Story**  
Sebagai Admin, saya ingin melihat daftar user, sehingga saya bisa mengetahui siapa saja yang memiliki akses sistem.

**Acceptance Criteria**
- Daftar user ditampilkan dalam bentuk list atau tabel
- Setiap user menampilkan email dan role
- Tersedia tombol "Edit" dan "Hapus" untuk setiap user

**Task**
- Route GET `/users`
- Controller method `index()`
- View `users/index.blade.php`
- Ambil semua user dari database dan tampilkan

---

### 3. Update – Mengedit Data User
**User Story**  
Sebagai Admin, saya ingin dapat mengedit data user, sehingga saya bisa memperbarui informasi seperti role atau password.

**Acceptance Criteria**
- Admin dapat mengakses halaman edit user
- Form menampilkan data lama (email, role)
- Password bisa diganti (atau biarkan kosong jika tidak diganti)
- Setelah update, redirect ke daftar user dengan pesan sukses

**Task**
- Route GET `/users/{id}/edit` dan PUT `/users/{id}`
- Controller method `edit()` dan `update()`
- View `users/edit.blade.php`
- Validasi input
- Update data di DB (hash password jika diubah)

---

### 4. Delete – Menghapus User
**User Story**  
Sebagai Admin, saya ingin dapat menghapus user, sehingga user yang tidak aktif atau tidak berhak bisa dihapus dari sistem.

**Acceptance Criteria**
- Ada tombol hapus di daftar user
- Konfirmasi sebelum penghapusan (opsional)
- Data user terhapus dari database
- Redirect ke daftar user dengan pesan sukses

**Task**
- Route DELETE `/users/{id}`
- Controller method `destroy()`
- Tambahkan form method spoofing `@method('DELETE')` di Blade
- Tambahkan konfirmasi hapus (opsional via JS)

---

## 🧱 Implementasi Laravel

### 1. Setup Branch
```bash
git checkout dev
git pull origin dev
git checkout -b feature/crud-users
2. Generate Model, Migration, Controller
```bash
php artisan make:model User -mc
```
3. Edit Migration
database/migrations/xxxx_xx_xx_create_users_table.php

``` php 
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('email')->unique();
    $table->string('password');
    $table->enum('role_name', ['admin', 'user', 'hrd']);
    $table->timestamps();
});
```

```bash
php artisan migrate
```
4. Tambahkan Seeder
database/seeders/UserSeeder.php

``` php 
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_name' => 'admin',
        ]);
        User::create([
            'email' => 'hrd@example.com',
            'password' => Hash::make('password'),
            'role_name' => 'hrd',
        ]);
        User::create([
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role_name' => 'user',
        ]);
    }
}
```

Daftarkan di DatabaseSeeder.php:

``` php 
public function run(): void
{
    $this->call(UserSeeder::class);
}
```

```bash
php artisan db:seed
```
5. Tambahkan Routes
routes/web.php

``` php 
use App\Http\Controllers\UserController;

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/', 'store');
    Route::get('/{id}/edit', 'edit');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});
```

6. Controller (View Based)
app/Http/Controllers/UserController.php

``` php 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_name' => 'required|in:admin,user,hrd',
        ]);

        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_name' => $validated['role_name'],
        ]);

        return redirect('/users')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_name' => 'required|in:admin,user,hrd',
        ]);

        $data = [
            'email' => $validated['email'],
            'role_name' => $validated['role_name'],
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/users')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users')->with('success', 'User berhasil dihapus.');
    }
}
```

7. Contoh View
resources/views/users/index.blade.php

``` blade
@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <h1>Daftar User</h1>
    <a href="{{ url('/users/create') }}">Tambah User</a>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->email }} - {{ $user->role_name }}</li>
        @endforeach
    </ul>
@endsection

```

📤 Cara Kirim Pull Request ke Branch dev
Commit semua perubahan di feature/crud-users:

```bash
git add .
git commit -m "feat: implementasi CRUD user view based"
```

Push ke remote:

```bash
git push origin feature/crud-users
```
Buka GitHub, dan buat Pull Request ke dev dari feature/crud-users

Tambahkan deskripsi:

Apa yang sudah kamu kerjakan

Link referensi (jika ada)

Mention reviewer (misal: @mentor @teamlead)

Tunggu review dan lakukan revisi jika diminta

✅ Selesai! Semoga bermanfaat 🎉
