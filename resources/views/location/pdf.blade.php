<!DOCTYPE html>
<html>

<head>
    <title>Daftar Lokasi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Daftar Lokasi</h2>
    <table>
        <thead>
            <tr>
                <th>Perusahaan</th>
                <th>Kode Lokasi</th>
                <th>Nama Lokasi</th>
                <th>Tipe Lokasi</th>
                <th>Informasi</th>
                <th>Jumlah Ruangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
            <tr>
                <td>{{ $location->company }}</td>
                <td>{{ $location->location_code }}</td>
                <td>{{ $location->location }}</td>
                <td>{{ $location->location_type }}</td>
                <td>{{ $location->information }}</td>
                <td>{{ $location->unit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>