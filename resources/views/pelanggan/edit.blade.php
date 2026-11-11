<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    <div class="container my-4 flex-grow-1">
        <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm">
            <h1 class="h2 text-primary m-0">
                <i class="fa-solid fa-clock-rotate-left me-2"></i>Edit Data Pelanggan
            </h1>
            <nav>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary btn-sm me-1">
                    <i class="fa-solid fa-users me-1"></i>Data Pelanggan
                </a>
            </nav>
        </div>
        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="table-responsive">
                <table class="table table-bordered align-middle m-0 w-100 bg-white shadow-sm">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width: 25%;">Nama Pelanggan</th>
                            <th style="width: 20%;">Nomor Telepon</th>
                            <th style="width: 20%;">Jumlah Berat</th>
                            <th class="text-center" style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="nama_pelanggan" class="form-control form-control-sm" value="{{ $pelanggan->nama_pelanggan }}" required>
                            </td>
                            <td>
                                <input type="tel" name="nomor_telepon" class="form-control form-control-sm" value="{{ $pelanggan->nomor_telepon }}" required>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <input type="number" name="berat" class="form-control" min="0" step="0.1" value="{{ $pelanggan->berat }}" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-success btn-sm w-100" title="Simpan Perubahan">
                                    <i class="fa-solid fa-save"></i> Simpan
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-1 fw-bold">102022500138 - Fariq Zahran | Kelas: SI-49-06</p>
            <p class="small text-muted mb-0">Modul: Data Pelanggan (Jadwal & Slot Layanan)</p>
        </div>
    </footer>
</body>
</html>