@extends('components.layouts.main-layout')
@section('title', 'Edit Attendance')
@section('content')



    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto mt-8 space-y-6 p-8 border-2 border-gray-300 rounded-lg shadow-lg bg-white dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAME</label>
            <input type="text" id="name" name="name" value="{{ old('name', $attendance->name ?? '') }}" required
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE</label>
            <input type="date" id="date" name="date"
                value="{{ old('date', $attendance->date ? \Carbon\Carbon::parse($attendance->date)->format('Y-m-d') : \Carbon\Carbon::now()->format('Y-m-d')) }}"
                readonly
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('date')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CAPTURE TIME FOR:</label>
            <div class="flex items-center mb-2">
                <input type="radio" id="start_radio" name="time_type" value="start"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    checked>
                <label for="start_radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start
                    Time</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="end_radio" name="time_type" value="end"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="end_radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">End Time</label>
            </div>
        </div>

        <div class="mb-5">
            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">START TIME</label>
            <input type="time" id="start_time" name="start_time"
                value="{{ old('start_time', $attendance->start_time ? \Carbon\Carbon::parse($attendance->start_time)->format('H:i:s') : '') }}"
                readonly
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('start_time')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">END TIME</label>
            <input type="time" id="end_time" name="end_time"
                value="{{ old('end_time', $attendance->end_time ? \Carbon\Carbon::parse($attendance->end_time)->format('H:i:s') : '') }}"
                readonly
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('end_time')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
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
                    <button type="button" onclick="takePicture()" id="takePictureButton"
                        class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded-lg transition duration-200">Take
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
                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-200 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                UPDATE
            </button>
            <a href="{{ route('attendances.index') }}"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition duration-200">CANCEL</a>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set initial date on page load
            document.getElementById('date').valueAsDate = new Date();

            // Initially disable time inputs
            document.getElementById('start_time').readOnly = true;
            document.getElementById('end_time').readOnly = true;

            // Update Take Picture button text based on initial radio selection
            updateTakePictureButtonText();
        });

        let currentPosition = null;
        let cameraStream = null;

        // Get user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    currentPosition = position;
                    console.log("Location acquired:", position.coords.latitude, position.coords.longitude);
                },
                (error) => {
                    console.warn("Error getting location:", error.message);
                }
            );
        } else {
            console.warn("Geolocation is not supported by this browser.");
        }

        function startCamera() {
            const video = document.getElementById('video');
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    video.srcObject = stream;
                    cameraStream = stream;
                    video.classList.remove('hidden');
                    console.log("Camera stream berhasil didapatkan:", stream); // Tambahkan log
                })
                .catch(err => {
                    console.error("Error accessing camera: " + err);
                });
        }

        function takePicture() {
            console.log("Tombol Take Picture diklik."); // Tambahkan log

            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');
            const imgElement = document.getElementById('captured-image');
            const retryButton = document.getElementById('retryButton');
            const photoInfo = document.getElementById('photo-info');
            const timestampElement = document.getElementById('timestamp');
            const coordinatesElement = document.getElementById('coordinates');
            const now = new Date();
            const currentDate = now.toISOString().slice(0, 10);
            const currentTime = now.toTimeString().slice(0, 8);
            const timeType = document.querySelector('input[name="time_type"]:checked').value;
            let photoInputName = 'photo'; // Default ke 'photo' untuk start time

            document.getElementById('date').value = currentDate;

            document.getElementById(timeType === 'start' ? 'start_time' : 'end_time').value = currentTime;
            document.getElementById(timeType === 'start' ? 'start_time' : 'end_time').readOnly = false;

            console.log("Video Width:", video.videoWidth); // Tambahkan log
            console.log("Video Height:", video.videoHeight); // Tambahkan log

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            console.log("Canvas Width:", canvas.width); // Tambahkan log
            console.log("Canvas Height:", canvas.height); // Tambahkan log

            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            console.log("drawImage() dipanggil."); // Tambahkan log

            const timestamp = now.toLocaleString();
            const latitude = currentPosition ? currentPosition.coords.latitude : 'N/A';
            const longitude = currentPosition ? currentPosition.coords.longitude : 'N/A';

            context.font = '20px Arial';
            context.fillStyle = 'white';
            context.fillText("Timestamp: " + timestamp, 10, canvas.height - 40);
            context.fillText("Location: Lat " + latitude + ", Lon " + longitude, 10, canvas.height - 10);

            const imageUrl = canvas.toDataURL('image/png');
            imgElement.src = imageUrl;
            imgElement.classList.remove('hidden');
            retryButton.classList.remove('hidden');
            photoInfo.classList.remove('hidden');

            // Tentukan nama input hidden berdasarkan time_type
            if (timeType === 'end') {
                photoInputName = 'end_photo';
            }

            const photoInput = document.createElement('input');
            photoInput.type = 'hidden';
            photoInput.name = photoInputName;
            photoInput.value = imageUrl;
            document.querySelector('form').appendChild(photoInput);

            document.querySelector('button[onclick="takePicture()"]').style.display = 'none';
            document.querySelector('button[type="submit"]').style.display = 'block';
            document.querySelector('button[onclick="takePicture()"]').disabled = true;

            video.classList.add('hidden');
            if (cameraStream) {
                let tracks = cameraStream.getTracks();
                tracks.forEach(track => track.stop());
                console.log("Camera stream dihentikan."); // Tambahkan log
            }
        }

        // Update the "Take Picture" button text
        function updateTakePictureButtonText() {
            const timeType = document.querySelector('input[name="time_type"]:checked').value;
            const takePictureButton = document.getElementById('takePictureButton');
            if (timeType === 'start') {
                takePictureButton.textContent = 'Take Picture (Start Time 07:00 - 09:00)';
            } else if (timeType === 'end') {
                takePictureButton.textContent = 'Take Picture (End Time 16:00 - 20:00)';
            }
        }

        // Listen for changes in the radio buttons
        document.querySelectorAll('input[name="time_type"]').forEach(radio => {
            radio.addEventListener('change', updateTakePictureButtonText);
        });

        // Retry taking picture
        function retryCapture() {
            const imgElement = document.getElementById('captured-image');
            const retryButton = document.getElementById('retryButton');
            const photoInfo = document.getElementById('photo-info');
            const videoElement = document.getElementById('video');

            imgElement.classList.add('hidden');
            retryButton.classList.add('hidden');
            photoInfo.classList.add('hidden');

            document.querySelector('button[onclick="takePicture()"]').disabled = false;
            document.querySelector('button[onclick="takePicture()"]').style.display = 'block';
            document.querySelector('button[type="submit"]').style.display = 'none';

            const photoInput = document.querySelector('input[name="photo"]');
            if (photoInput) {
                photoInput.remove();
            }

            videoElement.classList.remove('hidden');
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    videoElement.srcObject = stream;
                    cameraStream = stream;
                })
                .catch(err => {
                    console.error("Error accessing camera: " + err);
                });
        }
    </script>

@endsection