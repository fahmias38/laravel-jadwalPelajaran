<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Pelajaran</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; background: #f4f4f4; }
        .container { background: white; padding: 20px; border-radius: 10px; max-width: 700px; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        table th { background: #333; color: white; }
        h2 { text-align: center; }
    </style>
</head>

<body>
<div class="container">
    <h2>Jadwal Pelajaran</h2>

    <form method="POST" action="{{ route('jadwal.search') }}">
        @csrf
        <label>Pilih Kelas:</label><br>
        <select name="kelas" required>
            <option value="">-- pilih kelas --</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ isset($selected) && $selected == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
        <button type="submit">Lihat Jadwal</button>
    </form>

    @isset($jadwal)
        @if(count($jadwal))
            <table>
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $j)
                        <tr>
                            <td>{{ $j->hari }}</td>
                            <td>{{ $j->jam_mulai }}</td>
                            <td>{{ $j->jam_selesai }}</td>
                            <td>{{ $j->mata_pelajaran }}</td>
                            <td>{{ $j->guru->nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="margin-top:15px; color:gray;">Tidak ada jadwal untuk kelas ini.</p>
        @endif
    @endisset
</div>
</body>
</html>
