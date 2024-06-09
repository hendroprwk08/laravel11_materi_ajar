@extends('layout.app')

<!-- section yang memiliki satu nilai -->
@section('judul', 'Ubah Produk')

<!-- section yang memiliki barisan kode -->
@section('halaman')
<a href="{{ route('produk.index') }}">+ Kembali</a>
<form action="{{ route('produk.update', $produkModel->idproduk) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="temp_foto" value="{{ $produkModel->foto }}">
    <p>
        <label>Nama: </label>
        <input type="text" name="nama" value="{{ old('nama', $produkModel->nama) }}" placeholder="Nama Produk" maxlength="20" required>
        @error('nama')
        <small>{{ $message }}</small>
        @enderror
    </p>
    <p>
        <label>Harga</label>
        <input type="number" name="harga" value="{{ old('harga', $produkModel->harga) }}" placeholder="Harga" required>
        @error('harga')
        <small>{{ $message }}</small>
        @enderror
    </p>
    <p>
        @if (!empty($produkModel->foto))
        <img src="{{ asset('/gambar/'. $produkModel->foto) }}" width="150px">
    <p><a href="{{ url('produk/removephoto/'. $produkModel->foto .'/'. $produkModel->idproduk  ) }}">Hapus gambar</a></p>
    @else
    <label>Gambar</label>
    <input type="file" name="foto" accept=".jpg, .png, .jpeg|image/*">
    @error('foto')
    <small>{{ $message }}</small>
    @enderror
    @endif
    </p>

    <input type="submit" value="SIMPAN">
</form>
@endsection