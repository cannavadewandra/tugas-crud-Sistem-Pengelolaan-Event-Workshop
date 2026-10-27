<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pengelolaan Event & Workshop</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="kotak">
        <h2>Ticketing Event Workshop</h2>
        
        <form method="POST" action="{{ isset($tiket) ? route('tiket.update', $tiket->id_tiket) : route('tiket.store') }}">
            @csrf
            @if(isset($tiket))
                @method('PUT')
            @endif

            <label>Tipe Tiket:</label> 
            <select name="tipe_tiket" required>
                <option value="">-- Pilih --</option>
                <option value="Early Bird" {{ (isset($tiket) && $tiket->tipe_tiket == 'Early Bird') ? 'selected' : '' }}>Early Bird</option>
                <option value="Regular" {{ (isset($tiket) && $tiket->tipe_tiket == 'Regular') ? 'selected' : '' }}>Regular</option>
                <option value="VIP" {{ (isset($tiket) && $tiket->tipe_tiket == 'VIP') ? 'selected' : '' }}>VIP</option>
            </select>
            
            <label>Harga:</label> 
            <input type="number" name="harga" value="{{ isset($tiket) ? $tiket->harga : '' }}" required>
            
            <label>Kuota:</label> 
            <input type="number" name="kuota" value="{{ isset($tiket) ? $tiket->kuota : '' }}" required>
            
            <label>Benefit:</label> 
            <textarea name="benefit" required rows="3">{{ isset($tiket) ? $tiket->benefit : '' }}</textarea>
            
            <button type="submit">Simpan Tiket</button>
        </form>
        <a href="{{ route('tiket.index') }}" class="btn-nav btn-kembali">Lihat Daftar Tiket &rarr;</a>
    </div>
</body>
</html>