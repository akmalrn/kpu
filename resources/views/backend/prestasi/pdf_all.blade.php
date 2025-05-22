{{-- filepath: resources/views/backend/prestasi/pdf_all.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap Data Prestasi{{ $tipe ? ' - ' . ucfirst($tipe) : '' }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #333; padding: 6px 8px; text-align: left; }
        th { background: #eee; }
        h2 { margin-bottom: 0; }
    </style>
</head>
<body>
    <h2>Rekap Data Prestasi{{ $tipe ? ' - ' . ucfirst($tipe) : '' }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tipe</th>
                <th>Poin</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $sorted = $prestasis->groupBy('id_siswa')->map(function($group) {
                    $siswa = $group->first()->siswa ?? null;
                    return [
                        'siswa' => $siswa,
                        'totalPoin' => $group->sum('poin'),
                    ];
                })->sortBy([
                    fn($a, $b) => strcmp($a['siswa']->tipe ?? '', $b['siswa']->tipe ?? ''),
                    fn($a, $b) => $b['totalPoin'] <=> $a['totalPoin'],
                ]);
            @endphp
            @foreach($sorted as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['siswa']->nama ?? '-' }}</td>
                    <td>{{ $item['siswa']->kelas ?? '-' }}</td>
                    <td>{{ ucfirst($item['siswa']->tipe ?? '-') }}</td>
                    <td>{{ $item['totalPoin'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if($prestasis->isEmpty())
        <p>Tidak ada data prestasi.</p>
    @endif
</body>
</html>
