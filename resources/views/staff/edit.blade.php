<!DOCTYPE html>
<html>
<head><title>Edit Staff</title></head>
<body style="padding:20px; font-family:sans-serif;">
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
        @csrf 
        @method('PUT')
        <p>Nama: <br><input type="text" name="nama" value="{{ $staff->nama }}" required></p>
        <p>Peran: <br>
            <select name="peran" required>
                <option value="Chef" {{ $staff->peran == 'Chef' ? 'selected' : '' }}>Chef</option>
                <option value="Waiter" {{ $staff->peran == 'Waiter' ? 'selected' : '' }}>Waiter</option>
                <option value="Kasir" {{ $staff->peran == 'Kasir' ? 'selected' : '' }}>Kasir</option>
            </select>
        </p>
        <p>Nomor Kontak: <br><input type="text" name="nomor_kontak" value="{{ $staff->nomor_kontak }}" required></p>
        <p>Jabatan Kerja: <br><input type="text" name="jabatan_kerja" value="{{ $staff->jabatan_kerja }}" required></p>
        <button type="submit">Update</button>
        <a href="{{ route('staff.index') }}">Batal</a>
    </form>
</body>
</html>