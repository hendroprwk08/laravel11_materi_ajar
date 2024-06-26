@extends('layout.app')

<!-- section yang memiliki satu nilai -->
@section('judul', 'Data Produk')

<!-- section yang memiliki barisan kode -->
@section('halaman')
<p>
    <a href="{{ route('produk.create') }}">+ Produk</a>
    <a href="{{ route('pdf.cetak') }}" target="_blank">Cetak</a>
</p>

@if(session('sukses'))
<p>Penyimpanan berhasil!</p>
@endif

<table border="1" width="100%" style="border-collapse: collapse;">
    <thead>
        <th width="150">Foto</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>&nbsp;</th>
    </thead>
    <tbody>
        @forelse ($produkModel as $produk)
        <tr>
            <td>
                @if (!empty($produk->foto))
                <img src="{{ asset('/gambar/'. $produk->foto) }}" width="150px">
                @endif
            </td>
            <td><a href="{{ route('produk.show', $produk->idproduk) }}">{{ $produk->nama }}</a></td>
            <td>{{ "Rp " . number_format( $produk->harga, 2, ',', '.' ) }}</td>
            <td>
                <form action="{{ route('produk.destroy', $produk->idproduk) }}" method="POST">
                    <a href="{{ route('produk.edit', $produk->idproduk) }}">Ubah</a>

                    @csrf
                    @method('DELETE')

                    <!-- link yang berfungsi sebagai submit -->
                    <a href="#" onclick="event.target.parentNode.submit();">Hapus</a>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan='4'>Data belum Tersedia.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection