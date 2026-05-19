<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            padding: 0;
            color: #4f46e5;
        }
        .header p {
            margin: 5px 0 0 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
            color: #111827;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Data Karyawan</h2>
        <p>Sistem DataKaryawan - Tanggal Cetak: {{ date('d-m-Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 25%;">Nama</th>
                <th style="width: 20%;">Jabatan</th>
                <th style="width: 30%;">Alamat</th>
                <th style="width: 20%;">No HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->user->name }}</td>
                <td>{{ $k->jabatan->nama_jabatan }}</td>
                <td>{{ $k->alamat }}</td>
                <td>{{ $k->no_hp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
