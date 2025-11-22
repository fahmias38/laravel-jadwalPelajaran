<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem;
        }

        .container-main {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
            animation: slideDown 0.6s ease-out;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .header p {
            font-size: 1rem;
            opacity: 0.9;
        }

        .card-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 2.5rem;
            animation: fadeIn 0.8s ease-out;
        }

        .select-wrapper {
            margin-bottom: 2rem;
        }

        .select-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }

        .form-select {
            border: 2px solid #667eea !important;
            border-radius: 12px !important;
            padding: 0.75rem 1rem !important;
            font-size: 1rem !important;
            transition: all 0.3s ease;
            color: #333;
            max-width: 300px;
        }

        .form-select:focus {
            border-color: #764ba2 !important;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25) !important;
        }

        .form-select:hover {
            border-color: #764ba2 !important;
        }

        .no-schedule {
            text-align: center;
            padding: 3rem 1rem;
            color: #999;
        }

        .no-schedule i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .table-wrapper {
            animation: fadeIn 1s ease-out;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
        }

        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .table thead th {
            border: none;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            border-bottom: 1px solid #e8e8e8;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9ff;
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.1);
        }

        .table tbody td {
            padding: 1.25rem 1.5rem;
            color: #333;
            vertical-align: middle;
            border: none;
        }

        .td-hari {
            font-weight: 600;
            color: #667eea;
            min-width: 100px;
        }

        .td-jam {
            background: rgba(102, 126, 234, 0.05);
            font-weight: 600;
            color: #333;
            border-radius: 8px;
            display: inline-block;
            padding: 0.5rem 1rem;
            white-space: nowrap;
            font-size: 0.95rem;
        }

        .td-mapel {
            font-weight: 600;
            color: #333;
            font-size: 1.05rem;
        }

        .td-guru {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
        }

        .td-guru i {
            color: #764ba2;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #999;
        }

        .empty-state i {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: 0.4;
        }

        .empty-state p {
            font-size: 1.1rem;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .card-container {
                padding: 1.5rem;
            }

            .header h1 {
                font-size: 1.8rem;
            }

            .table-responsive {
                font-size: 0.9rem;
            }

            .table thead th,
            .table tbody td {
                padding: 0.75rem 0.5rem;
            }

            .td-jam {
                padding: 0.4rem 0.6rem;
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-main">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-book"></i> Jadwal Pelajaran</h1>
            <p>Kelola dan lihat jadwal kelas Anda dengan mudah</p>
        </div>

        <!-- Main Card -->
        <div class="card-container">
            <!-- Select Kelas -->
            <div class="select-wrapper">
                <form method="GET">
                    <label class="select-label">
                        <i class="fas fa-graduation-cap"></i>
                        Pilih Kelas
                    </label>
                    <select name="kelas" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Semua Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}" {{ $selected == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <!-- Jadwal Table -->
            <div class="table-wrapper">
                @if ($selected)
                    @if (count($jadwal) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-calendar-alt"></i> Hari</th>
                                        <th><i class="fas fa-clock"></i> Jam</th>
                                        <th><i class="fas fa-book-open"></i> Mata Pelajaran</th>
                                        <th><i class="fas fa-chalkboard-user"></i> Guru Pengajar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwal as $j)
                                        <tr>
                                            <td class="td-hari">{{ $j->hari }}</td>
                                            <td><span class="td-jam">{{ substr($j->jam_mulai, 0, 5) }} - {{ substr($j->jam_selesai, 0, 5) }}</span></td>
                                            <td class="td-mapel">{{ $j->guru->mapel }}</td>
                                            <td class="td-guru"><i class="fas fa-user-circle"></i> {{ $j->guru->nama }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-calendar-xmark"></i>
                            <p>Belum ada jadwal pelajaran untuk kelas ini</p>
                        </div>
                    @endif
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>Silakan pilih kelas untuk melihat jadwal pelajaran</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>