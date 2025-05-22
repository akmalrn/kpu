<!DOCTYPE html>
<html>

<head>
    <title>Prestasi Siswa - {{ $siswa->nama }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        h2 {
            color: #333;
        }
    </style>
</head>

<body>

    <h2>Daftar Prestasi Siswa: {{ $siswa->nama }}</h2>
    <p>NIS: {{ $siswa->id }}</p>
    <p>Kelas: {{ $siswa->kelas }}</p>
        <p>
        <strong>Total Poin:
            {{ $prestasis->sum('poin') }}
        </strong>
    </p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jam</th>
                <th>Poin</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestasis as $index => $prestasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $prestasi->jam }}</td>
                    <td>{{ $prestasi->poin }}</td>
                    <td>{{ $prestasi->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
