<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Staff - Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light p-4">

    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 text-primary font-weight-bold mb-0">
                <i class="fa-solid fa-users me-2"></i>Daftar Staff & Pegawai
            </h2>
            <a href="{{ route('staff.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Tambah Pegawai Baru
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle border">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Peran</th>
                        <th>Kontak</th>
                        <th>Jabatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($staffs as $s)
                    <tr>
                        <td class="fw-bold">{{ $s->nama }}</td>
                        <td><span class="badge bg-info text-dark">{{ $s->peran }}</span></td>
                        <td>{{ $s->nomor_kontak }}</td>
                        <td>{{ $s->jabatan_kerja }}</td>
                        <td class="text-center">
                            <a href="{{ route('staff.edit', $s->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="fa-solid fa-pen"></i> Edit
                            </a>
                            <form action="{{ route('staff.destroy', $s->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data pegawai.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>