<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="5" style="text-align: center; font-size: 14px; font-weight: bold;">Laporan Data Karyawan</th>
            </tr>
            <tr>
                <th colspan="5" style="text-align: center; font-size: 10px; color: gray;">Tanggal Cetak: {{ date('d-m-Y H:i') }}</th>
            </tr>
            <tr>
                <th style="background-color: #f3f4f6; font-weight: bold;">No</th>
                <th style="background-color: #f3f4f6; font-weight: bold;">Nama</th>
                <th style="background-color: #f3f4f6; font-weight: bold;">Jabatan</th>
                <th style="background-color: #f3f4f6; font-weight: bold;">Alamat</th>
                <th style="background-color: #f3f4f6; font-weight: bold;">No HP</th>
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
