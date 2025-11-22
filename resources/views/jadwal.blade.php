<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

<h1 class="mb-4">Jadwal Pelajaran</h1>

<form>
    <select name="kelas" class="form-select w-25 mb-4" onchange="this.form.submit()">
        <option value="">Pilih Kelas</option>
        @foreach($kelas as $k)
        <option value="{{ $k->id }}" {{ $selected == $k->id ? 'selected' : '' }}>
            {{ $k->nama_kelas }}
        </option>
        @endforeach
    </select>
</form>

@if ($selected)
    @if (count($jadwal))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $j)
                <tr>
                    <td>{{ $j->hari }}</td>
                    <td>{{ substr($j->jam_mulai,0,5) }} - {{ substr($j->jam_selesai,0,5) }}</td>
                    <td>{{ $j->mata_pelajaran }}</td>
                    <td>{{ $j->guru->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">Tidak ada jadwal.</p>
    @endif
@endif

</body>
</html>