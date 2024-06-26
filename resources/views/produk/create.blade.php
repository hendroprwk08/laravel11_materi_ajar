@extends('layout.app')

<!-- section yang memiliki satu nilai -->
@section('judul', 'Tambah Produk')

<!-- section yang memiliki barisan kode -->
@section('halaman')
<a href="{{ route('produk.index') }}">&larr; Kembali</a>
<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <p>
        <label>Nama: </label>
        <input type="text" name="nama" placeholder="Nama Produk" maxlength="20" required >
        @error('nama')
        <small>{{ $message }}</small>
        @enderror
    </p>
    <p>
        <label>Harga</label>
        <input type="number" name="harga" placeholder="Harga" required >
        @error('harga')
        <small>{{ $message }}</small>
        @enderror
    </p>
    <p>
        <label>Gambar</label>
        <input type="file" name="foto" accept=".jpg, .png, .jpeg|image/*">
        @error('foto')
        <small>{{ $message }}</small>
        @enderror
    </p>

    <input type="submit" value="SIMPAN">
</form>
@endsection