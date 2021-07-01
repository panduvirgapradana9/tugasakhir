<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\ProdukImage;
use App\Produk;
use App\Supplier;
use App\Kategori;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('admin-access')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);

        $data = array('title' => 'Produk',
                    'itemproduk' => $itemproduk);
        return view('produk.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        $itemsupplier = Supplier::orderBy('nama', 'asc')->get();
        $data = array('title' => 'Form Produk Baru',
                    'itemkategori' => $itemkategori,
                    'itemsupplier' => $itemsupplier);
        return view('produk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric'
        ]);

        $nama=$request->get('nama_produk');
        $new_produk = new \App\Produk;
        $new_produk->kategori_id = $request->get('kategori_id');
        $new_produk->supplier_id = $request->get('supplier_id');
        $new_produk->kode_produk = '';
        $new_produk->nama_produk = $nama;
        $new_produk->deskripsi_produk = $request->get('deskripsi_produk');
        $new_produk->exp_date=$request->get('exp_date');
        $new_produk->qty = $request->get('qty');
        $new_produk->satuan = $request->get('satuan');
        $new_produk->harga = $request->get('harga');
        $new_produk->status = $request->get('status');
        $new_produk->slug_produk = \Str::slug($nama, '-'); //buat slug dari input slug produk
        $new_produk->user_id = \Auth::user()->id; //ambil data user yang login
        $new_produk->save();
        
        return redirect()->route('produk.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemproduk = Produk::findOrFail($id);
        $data = array('title' => 'Foto Produk',
                'itemproduk' => $itemproduk);
        return view('produk.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemproduk = Produk::findOrFail($id);
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        $itemsupplier = Supplier::orderBy('nama', 'asc')->get();
        $data = array('title' => 'Form Edit Produk',
                        'itemproduk' => $itemproduk,
                        'itemkategori' => $itemkategori,
                        'itemsupplier' => $itemsupplier);
        return view('produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric'
        ]);

        $nama=$request->get('nama_produk');
        $itemproduk = \App\Produk::findOrFail($id);
        // kalo ga ada error page not found 404

        $itemproduk->kategori_id = $request->get('kategori_id');
        $itemproduk->supplier_id = $request->get('supplier_id');
        $itemproduk->kode_produk = '';
        $itemproduk->nama_produk = $nama;
        $itemproduk->slug_produk = \Str::slug($nama,'-');//slug kita gunakan nanti pas buka produk
        $itemproduk->deskripsi_produk = $request->get('deskripsi_produk');
        $itemproduk->exp_date=$request->get('exp_date');
        $itemproduk->qty = $request->get('qty');
        $itemproduk->satuan = $request->get('satuan');
        $itemproduk->harga = $request->get('harga');
        $itemproduk->status = $request->get('status');
        $itemproduk->save();

        return redirect()->route('produk.index')->with('success', 'Data berhasil diupdate');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $itemproduk = Produk::findOrFail($id);//cari berdasarkan id = $id, 
        // // kalo ga ada error page not found 404
        // if ($itemproduk->delete()) {
        //     return back()->with('success', 'Data berhasil dihapus');
        // } else {
        //     return back()->with('error', 'Data gagal dihapus');
        // }
        ProdukImage::where('produk_id',$id)->delete();
        Produk::where('id',$id)->delete();
        
        return redirect('admin/produk');
    }

    public function uploadimage(Request $request) {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'produk_id' => 'required',
        ]);
        $itemuser = $request->user();
        $itemproduk = Produk::where('user_id', $itemuser->id)
                                ->where('id', $request->produk_id)
                                ->first();
        if ($itemproduk) {
            $fileupload = $request->file('image');
            $folder = 'assets/images';
            $itemgambar = (new ImageController)->upload($fileupload, $itemuser, $folder);
            // simpan ke table produk_images
            $inputan = $request->all();
            $inputan['foto'] = $itemgambar->url;//ambil url file yang barusan diupload
            // simpan ke produk image
            \App\ProdukImage::create($inputan);
            // update banner produk
            $itemproduk->update(['foto' => $itemgambar->url]);
            // end update banner produk
            return back()->with('success', 'Image berhasil diupload');
        } else {
            return back()->with('error', 'Produk atau user tidak sesuai');
        }
    }

    public function deleteimage(Request $request, $id) {
        // ambil data produk image by id
        $itemprodukimage = \App\ProdukImage::findOrFail($id);
        // ambil produk by produk_id kalau tidak ada maka error 404
        $itemproduk = Produk::findOrFail($itemprodukimage->produk_id);
        // kita cari dulu database berdasarkan url gambar
        $itemgambar = \App\Image::where('url', $itemprodukimage->foto)->first();
        // hapus imagenya
        if ($itemgambar) {
            \Storage::delete($itemgambar->url);
            $itemgambar->delete();
        }
        // baru update hapus produk image
        $itemprodukimage->delete();
        //ambil 1 buah produk image buat diupdate jadi banner produk
        $itemsisaprodukimage = \App\ProdukImage::where('produk_id', $itemproduk->id)->first();
        if ($itemsisaprodukimage) {
            $itemproduk->update(['foto' => $itemsisaprodukimage->foto]);
        } else {
            $itemproduk->update(['foto' => null]);
        }
        //end update jadi banner produk
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function loadasync($id) {
        $itemproduk = Produk::findOrFail($id);
        $respon = [
            'status' => 'success',
            'msg' => 'Data ditemukan',
            'itemproduk' => $itemproduk
        ];
        return response()->json($respon, 200);
    }

    public function stok($id) {
        $itemproduk = Produk::where('id', $id)->get();
        
        $data = array('title' => 'Tambah Stok',
                'itemproduk' => $itemproduk);

        return view('produk.stok', $data);
    }

    public function updatestok(Request $request, $id) {
        $itemproduk = \App\Produk::findOrFail($id);
        // kalo ga ada error page not found 404
        $itemproduk->qty = $request->get('qty');
        $itemproduk->save();

        return redirect()->route('produk.index')->with('success', 'Data berhasil diupdate');
    }
}
