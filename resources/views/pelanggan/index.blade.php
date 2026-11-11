<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    <div class="container my-4 flex-grow-1">
       <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm">
            <h1 class="h2 text-primary m-0">
                <i class="fa-solid fa-users me-2"></i>Data Pelanggan
            </h1>
            <!-- Menampilkan Nama & Role Pengguna yang sedang Login -->
            <div class="d-flex align-items-center gap-3">
                @auth
                <span class="fw-bold text-secondary">
                    <i class="fa-solid fa-user-circle me-1"></i>
                    {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
                @endauth
            </div>
        </div>

        <div class="container-md p-3 bg-white rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 text-secondary m-0">Daftar Pelanggan</h2>
                <div class="d-flex gap-1">
                    
                   
                   @if(auth()->user()?->role === 'admin')
                   <form action="{{ route('pelanggan.deleteAll') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua data ini?');">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash me-1"></i>Hapus Semua</button>
                </form>
                @endif
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-plus me-1"></i>Tambah Pelanggan
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle border">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nomor Telepon</th>
                            <th>Jumlah Berat</th>
                            <th class="text-center" style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggan as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="fw-bold">{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->nomor_telepon }}</td>
                            <td class="fw-bold">{{ $item->berat }} Kg</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                   <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a>
                                    @if(auth()->user()?->role === 'admin')
                                    <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                   @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pelanggan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-1 fw-bold">102022500138 - Fariq Zahran | Kelas: SI-49-06</p>
            <p class="small text-muted mb-0">Modul: Individu C (Data Pelanggan & Penanganan Khusus)</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>