<?php

namespace App\Http\Controllers;

//import model produk
use App\Models\ProdukModel;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProdukController extends Controller
{
    public function index(): View
    {
        // tampilkan data produk
        $produkModel = ProdukModel::all();

        // render view 
        return view('produk.index', compact('produkModel'));
    }

    // menampilkan halaman input produk
    public function create(): View
    {
        return view('produk.create');
    }

    // menyimpan kedalam tabel produk
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'foto'    => 'image|mimes:jpeg,jpg,png|max:800',
            'nama'    => 'required|max:20',
            'harga'   => 'required|numeric'
        ]);

        //upload image
        $fileName = "";
        $foto = $request->file('foto');
        if ($foto) : // jika ada foto yang diunggah
            // generate nama file
            $fileName = $foto->hashName();

            // simpan dalam folder 'gambar'
            $foto->move(public_path('/gambar'), $fileName);
        else :
            $fileName = "";
        endif;

        // simpan
        ProdukModel::create([
            'foto'  => $fileName,
            'nama'  => $request->nama,
            'harga' => $request->harga
        ]);

        //redirect to index
        return redirect()->route('produk.index')
            ->with(['sukses' => 'Data Berhasil Disimpan!']);
    }

    // tampilkan data produk berdasarkan id
    public function show(string $id): View
    {
        $produkModel = ProdukModel::findOrFail($id);

        return view('produk.info', compact('produkModel'));
    }

    // tampilkan data produk yang ingin diubah
    // berdasarkan id 
    public function edit(string $id): View
    {
        //get product by ID
        $produkModel = ProdukModel::findOrFail($id);

        //render view with product
        return view('produk.edit', compact('produkModel'));
    }

    // perbarui data produk
    public function update(Request $request, $id): RedirectResponse
    {
        // validasi form 
        $request->validate([
            'foto'    => 'image|mimes:jpeg,jpg,png|max:800',
            'nama'    => 'required|max:20',
            'harga'   => 'required|numeric'
        ]);

        // pilih data produk berdasarkan id
        $produkModel = ProdukModel::findOrFail($id);

        // unggah gambar
        $fileName = empty($request->temp_foto) ? "" : $request->temp_foto;
        $foto = $request->file('foto');
        if ($foto) : // jika ada foto yang diunggah
            $fileName = $foto->hashName();
            $foto->move(public_path('/gambar'), $fileName);
        endif;

        // perbarui 
        $produkModel->update([
            'foto'  => $fileName,
            'nama'  => $request->nama,
            'harga' => $request->harga
        ]);

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }    

    // hapus gambar
    public function removePhoto($foto, $id): RedirectResponse
    {
        //hapus file foto
        $path = public_path() . "/gambar/" . $foto;
        unlink($path);

        // kosongkan kolom foto pada tabel produk
        $produkModel = ProdukModel::findOrFail($id);
        $produkModel->update(['foto' => '']);

        return redirect()->route('produk.edit', $id)->with(['success' => 'Gambar telah dihapus!']);
    }

    // hapus data produk
    public function destroy($id): RedirectResponse
    {
      // pilih data produk berdasarkan id
      $produkModel = ProdukModel::findOrFail($id);
    
      // hapus foto (jika ada)
      if(!empty($produkModel->foto)):
          $path = public_path()."/gambar/".$produkModel->foto;
          unlink($path);
      endif;
      
      // hapus
      $produkModel->delete();
    
      //redirect to index
      return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
