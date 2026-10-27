<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tiket</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="kotak kotak-lebar">
        <h2>Daftar Tiket Tersimpan</h2>
        <a href="{{ route('tiket.create') }}" class="btn-nav btn-tambah">+ Tambah Baru</a>
        
        <table>
            <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Kuota</th>
                    <th>Benefit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tikets as $row)
                <tr>
                    <td>{{ $row->tipe_tiket }}</td>
                    <td>{{ $row->harga }}</td>
                    <td>{{ $row->kuota }}</td>
                    <td>{{ $row->benefit }}</td>
                    <td>
                        <div class="aksi-flex">
                            <a href="{{ route('tiket.edit', $row->id_tiket) }}" class="btn-edit" style="text-decoration:none;">Edit</a>
                            <form action="{{ route('tiket.destroy', $row->id_tiket) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus tiket me ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>