<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('judul')</title>
</head>

<body style="margin: 0px;">
    <div style="float:left; width: 150px; padding:20px; height:100vh; background-color:aliceblue">
        <h3>Menu</h3>
        <nav>
            <p><a href="{{ route('produk.index') }}">Produk</a></p>
            <p><a href="#">Pengguna</a></p>
            <hr style="opacity: 0.25">
            <p><a href="#">Logout</a></p>
        </nav>
    </div>
    <div style="float:left; width: 600px; padding:20px; height:100vh;">
        @yield('halaman')
    </div>
</body>

</html>