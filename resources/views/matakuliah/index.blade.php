<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mata Kuliah</title>
</head>
<body>
    <h1>Daftar Mata Kuliah</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jadwal</th>
        </tr>
        @foreach($data as $mk)
        <tr>
            <td>{{ $mk->kode }}</td>
            <td>{{ $mk->nama }}</td>
            <td>{{ $mk->jadwal }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
