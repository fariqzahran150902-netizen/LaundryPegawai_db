<!DOCTYPE html>
<html>
<head><title>Tambah Staff</title></head>
<body style="padding:20px; font-family:sans-serif;">
    <h2>Tambah Pegawai Baru</h2>
    <form action="{{ route('staff.store') }}" method="POST">
        @csrf
        <p>Nama: <br><input type="text" name="nama" required></p>
        <p>Peran: <br>
            <select name="peran" required>
                <option value="Chef">Chef</option>
                <option value="Waiter">Waiter</option>
                <option value="Kasir">Kasir</option>
            </select>
        </p>
        <p>Nomor Kontak: <br><input type="text" name="nomor_kontak" required></p>
        <p>Jabatan Kerja: <br><input type="text" name="jabatan_kerja" required></p>
        <button type="submit">Simpan</button>
        <a href="{{ route('staff.index') }}">Batal</a>
    </form>
</body>
</html>