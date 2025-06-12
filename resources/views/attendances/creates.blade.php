@extends('components.layouts.main-layout')
@section('title', 'Attendance')
@section('content')

    @php
        $attendanceType = request()->get('type', 'end'); // default 'end'
    @endphp

    <p class="max-w-lg text-3xl font-semibold leading-loose text-gray-900 dark:text-white text-center">Form Attendance</p>
    <form
        class="max-w-lg mx-auto mt-8 space-y-6 p-8 border-2 border-gray-300 rounded-lg shadow-lg bg-white dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
        method="POST" action="{{ route('attendances.store') }}">
        @csrf
        <input type="hidden" name="attendance_type" value="{{ $attendanceType }}">
        <div class="mb-5">
            <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee</label>
            <select id="employee_id" name="employee_id"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE</label>
            <p id="current-date" class="text-gray-900 dark:text-white text-sm font-semibold"></p>
            <input type="hidden" name="date" id="hidden-date"> {{-- Input hidden untuk tanggal --}}
        </div>

        <div class="mb-5">
            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PHOTO</label>
            <button type="button" onclick="startCamera()"
                class="w-full bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-200">Open
                Camera</button>
            <div class="mt-4">
                <p id="time-status" class="mt-2 text-sm font-semibold"></p>

                <video id="video" width="100%" height="auto" autoplay class="mt-3 rounded-lg hidden shadow-md"></video>
                <canvas id="canvas" style="display: none;"></canvas>
                <div class="mt-3">
                    <button type="button" onclick="takePicture()"
                        class="bg-blue-700 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition duration-200">Take
                        Picture</button>
                    <button type="button" id="retryButton" onclick="retryCapture()"
                        class="bg-red-700 hover:bg-red-800 text-white py-2 px-4 rounded-lg transition duration-200 hidden">Retry</button>
                    <img id="captured-image" src="" alt="Captured Image" class="mt-3 w-full rounded-lg hidden shadow-md">
                    <div id="photo-info" class="mt-3 text-sm text-gray-600 dark:text-gray-300 hidden">
                        <p id="timestamp"></p>
                        <p id="coordinates"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-between">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-200 dark:bg-blue-700 dark:hover:bg-blue-700 dark:focus:ring-blue-700">
                SUBMIT
            </button>
            <button type="button" onclick="window.location='{{ route('attendances.index') }}'"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition duration-200">BACK</button>
        </div>
    </form>

   <script>
    // Variabel global untuk menyimpan stream kamera dan posisi
    let cameraStream = null;
    let currentPosition = null;

    // 1. Fungsi yang berjalan setelah DOM siap
    document.addEventListener('DOMContentLoaded', function() {
        // Sembunyikan tombol submit di awal
        document.querySelector('button[type="submit"]').style.display = 'none';

        // Tampilkan tanggal hari ini dan set nilai input hidden
        document.getElementById('current-date').textContent = getCurrentDateForDisplay();
        document.getElementById('hidden-date').value = getCurrentDateForDatabase();

        // Cek waktu absensi pulang
        checkAttendanceTime();

        // Dapatkan lokasi pengguna
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    currentPosition = position;
                    console.log("Lokasi berhasil didapat:", position.coords.latitude, position.coords.longitude);
                },
                (error) => {
                    console.warn("Error mendapatkan lokasi:", error.message);
                    alert("Gagal mendapatkan lokasi. Pastikan Anda mengizinkan akses lokasi.");
                }
            );
        } else {
            console.warn("Geolocation tidak didukung oleh browser ini.");
            alert("Browser Anda tidak mendukung Geolocation.");
        }
    });

    // 2. Fungsi untuk mengecek jam absensi PULANG
    function checkAttendanceTime() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const currentTime = hours * 60 + minutes;

        // Batas waktu untuk absensi pulang (misal: 16.00 - 20.00)
        // Anda menggunakan 13:00, saya akan tetap pakai itu.
        const startTime = 13 * 60; // 13:00
        const endTime = 20 * 60;   // 20:00
        const label = "13.00 - 20.00";

        const timeStatus = document.getElementById('time-status');

        if (currentTime >= startTime && currentTime <= endTime) {
            timeStatus.textContent = `Anda berada dalam waktu absensi pulang (${label}).`;
            timeStatus.classList.remove('text-red-600');
            timeStatus.classList.add('text-green-600');
        } else {
            timeStatus.textContent = `Waktu absensi pulang sudah lewat atau belum tiba! (${label})`;
            timeStatus.classList.remove('text-green-600');
            timeStatus.classList.add('text-red-600');
        }
    }

    // 3. Fungsi untuk memulai kamera
    function startCamera() {
        const video = document.getElementById('video');
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
                cameraStream = stream;
                video.classList.remove('hidden');
                // Sembunyikan tombol "Open Camera" setelah diklik
                document.querySelector('button[onclick="startCamera()"]').classList.add('hidden');
            })
            .catch(err => {
                console.error("Error mengakses kamera: ", err);
                alert("Tidak bisa mengakses kamera. Pastikan Anda memberikan izin.");
            });
    }

    // 4. Fungsi untuk mengambil gambar
    function takePicture() {
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        const imgElement = document.getElementById('captured-image');
        const retryButton = document.getElementById('retryButton');

        // **FIX UTAMA**: Pastikan video sudah punya dimensi sebelum menggambar
        if (video.videoWidth === 0 || video.videoHeight === 0) {
            console.error("Video stream belum siap.");
            alert("Kamera belum siap, silakan coba lagi sesaat.");
            return;
        }

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        const now = new Date();
        const timestamp = now.toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'medium' });
        const latitude = currentPosition ? currentPosition.coords.latitude.toFixed(6) : 'N/A';
        const longitude = currentPosition ? currentPosition.coords.longitude.toFixed(6) : 'N/A';

        // Tambahkan teks timestamp dan lokasi ke canvas
        context.font = '20px Arial';
        context.fillStyle = 'white';
        context.strokeStyle = 'black';
        context.lineWidth = 4;
        context.strokeText(timestamp, 10, canvas.height - 40);
        context.fillText(timestamp, 10, canvas.height - 40);
        context.strokeText(`Lokasi: ${latitude}, ${longitude}`, 10, canvas.height - 15);
        context.fillText(`Lokasi: ${latitude}, ${longitude}`, 10, canvas.height - 15);

        const imageUrl = canvas.toDataURL('image/png');
        imgElement.src = imageUrl;

        // Tampilkan gambar dan sembunyikan video
        imgElement.classList.remove('hidden');
        video.classList.add('hidden');
        retryButton.classList.remove('hidden');

        // Buat dan isi input hidden untuk foto
        let photoInput = document.querySelector('input[name="photo"]');
        if (!photoInput) {
            photoInput = document.createElement('input');
            photoInput.type = 'hidden';
            photoInput.name = 'photo';
            document.querySelector('form').appendChild(photoInput);
        }
        photoInput.value = imageUrl;

        // Atur tampilan tombol
        document.querySelector('button[onclick="takePicture()"]').style.display = 'none';
        document.querySelector('button[type="submit"]').style.display = 'block';

        // Matikan stream kamera
        if (cameraStream) {
            cameraStream.getTracks().forEach(track => track.stop());
        }
    }

    // 5. Fungsi untuk mengulang pengambilan gambar
    function retryCapture() {
        document.getElementById('captured-image').classList.add('hidden');
        document.getElementById('retryButton').classList.add('hidden');

        const photoInput = document.querySelector('input[name="photo"]');
        if (photoInput) {
            photoInput.value = '';
        }

        document.querySelector('button[onclick="takePicture()"]').style.display = 'block';
        document.querySelector('button[type="submit"]').style.display = 'none';

        startCamera(); // Panggil lagi fungsi startCamera
    }

    // 6. Fungsi utilitas untuk mendapatkan tanggal
    function getCurrentDateForDisplay() {
        const today = new Date();
        const day = String(today.getDate()).padStart(2, '0');
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const year = today.getFullYear();
        return `${day}-${month}-${year}`;
    }

    function getCurrentDateForDatabase() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
</script>