@extends('layout.app')

<!-- section yang memiliki satu nilai -->
@section('judul', 'Tambah Produk')

<!-- section yang memiliki barisan kode -->
@section('halaman')
<a href="{{ route('produk.index') }}">+ Kembali</a>
<p>
    @if (!empty($produkModel->foto))
    <img src="{{ asset('/gambar/'. $produkModel->foto) }}" width="200px">
    @endif
</p>
<p>
    <small>Nama: </small><br>
    <b>{{ $produkModel->nama }}</b>
</p>
<p>
    <small>Harga</small><br>
    <b>{{ "Rp " . number_format( $produkModel->harga, 2, ',', '.' ) }}</b>
</p>
@endsection