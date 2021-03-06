<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\AlamatPengiriman;
use App\Order;
use App\CartDetail;
use App\Produk;
use App\User;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            // kalo admin maka menampilkan semua cart
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'checkout');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        } else {
            // kalo member maka menampilkan cart punyanya sendiri
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'checkout');
                            $q->where('user_id', $itemuser->id);
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        }
        $data = array('title' => 'Data Transaksi',
                    'itemorder' => $itemorder,
                    'itemuser' => $itemuser);
        return view('transaksi.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'cart')
                        ->where('user_id', $itemuser->id)
                        ->first();
        if ($itemcart) {
            $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)
                                                    ->where('status', 'utama')
                                                    ->first();
            if ($itemalamatpengiriman) {
                // buat variabel inputan order
                $inputanorder['cart_id'] = $itemcart->id;
                $inputanorder['nama_penerima'] = $itemalamatpengiriman->nama_penerima;
                $inputanorder['no_tlp'] = $itemalamatpengiriman->no_tlp;
                $inputanorder['alamat'] = $itemalamatpengiriman->alamat;
                $inputanorder['provinsi'] = $itemalamatpengiriman->provinsi;
                $inputanorder['kota'] = $itemalamatpengiriman->kota;
                $inputanorder['kecamatan'] = $itemalamatpengiriman->kecamatan;
                $inputanorder['kelurahan'] = $itemalamatpengiriman->kelurahan;
                $inputanorder['ongkir'] = $itemalamatpengiriman->ongkir;
                $inputanorder['kodepos'] = $itemalamatpengiriman->kodepos;
                $itemorder = Order::create($inputanorder);//simpan order
                // update status cart
                $itemcart->update(['status_cart' => 'checkout']);
                return redirect()->route('transaksi.index')->with('success', 'Order berhasil disimpan');
            } else {
                return back()->with('error', 'Alamat pengiriman belum diisi');
            }
        } else {
            return abort('404');//kalo ternyata ga ada shopping cart, maka akan menampilkan error halaman tidak ditemukan
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            $itemorder = Order::findOrFail($id);
            $data = array('title' => 'Detail Transaksi',
                        'itemorder' => $itemorder);
            return view('transaksi.show', $data)->with('no', 1);            
        } else {
            $itemorder = Order::where('id', $id)
                            ->whereHas('cart', function($q) use ($itemuser) {
                                $q->where('user_id', $itemuser->id);
                            })->first();
            if ($itemorder) {
                $data = array('title' => 'Detail Transaksi',
                            'itemorder' => $itemorder);
                return view('transaksi.show', $data)->with('no', 1);                            
            } else {
                return abort('404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            $itemorder = Order::findOrFail($id);
            $data = array('title' => 'Form Edit Transaksi',
                        'itemorder' => $itemorder);
            return view('transaksi.edit', $data)->with('no', 1);            
        } else {
            return abort('404');//kalo bukan admin maka akan tampil error halaman tidak ditemukan
        }
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

        if(\Auth::user()->role == 'member'){     
            request()->validate([
                'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);
           if ($files = $request->file('bukti')) {
           // Define upload path
               $destinationPath = public_path('/images/buktitransfer'); // upload path
            // Upload Orginal Image           
               $Image = date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $Image);
               $insert['image'] = "$Image";
            // Save In Database
            DB::table('cart')->where('id', $request->id)->update([
                'status_pembayaran' => 'sudah',
                'bukti_transfer' => $Image
                ]);
            }
            return redirect('admin/transaksi')->with('success', 'Bukti Transfer berhasil diunggah');
        }

        $this->validate($request,[
            'status_pembayaran' => 'required',
            'status_pengiriman' => 'required',
            'subtotal' => 'required|numeric',
            'ongkir' => 'required|numeric',
            'diskon' => 'required|numeric',
            'total' => 'required|numeric',
        ]);
        $inputan = $request->all();
        $status2 = $request->get('status_pengiriman'); //value status_pengiriman yg akan berubah
        $inputan['status_pembayaran'] = $request->status_pembayaran;
        $inputan['status_pengiriman'] = $request->status_pengiriman;
        $inputan['subtotal'] = str_replace(',','',$request->subtotal);
        $inputan['ongkir'] = str_replace(',','',$request->ongkir);
        $inputan['diskon'] = str_replace(',','',$request->diskon);
        $inputan['total'] = str_replace(',','',$request->total);
        $itemorder = Order::findOrFail($id);

        //update qty/stok produk jika status_pengiriman berubah
        $status = $itemorder->cart->status_pengiriman;
        if (($status == 'belum' or $status == 'dibatalkan') && $status2 == 'sudah') 
        {
            //mencari mencari cart_detail.id dari table cart
            $CartDetail = CartDetail::where('cart_id',$itemorder->cart->id)->get();
            //mencari id produk lalu di update qty nya
            foreach($CartDetail as $cart){
                //mengabil nilai produk_id dan qty dari table Cart_detail
                $idproduk = $cart->produk_id;
                $cartqty = $cart->qty;

                //mengupdate qty dari table produk sesuai $idproduk
                $produk = Produk::findOrFail($idproduk);
                $produk->qty -= $cartqty;
                $produk->save();
            } 
        } 
        //jika status sebelumnya sudak terkirim lalu diubah menjadi dibatalkan
        //maka qty produk harus di kembalikan semula
        elseif ($status=='sudah' && $status2=='dibatalkan') 
        {
            //mencari mencari cart_detail.id dari table cart
            $CartDetail = CartDetail::where('cart_id',$itemorder->cart->id)->get();
            //mencari id produk lalu di update qty nya
            foreach($CartDetail as $cart){
                //mengabil nilai produk_id dan qty dari table Cart_detail
                $idproduk = $cart->produk_id;
                $cartqty = $cart->qty;

                //mengupdate qty dari table produk sesuai $idproduk
                $produk = Produk::findOrFail($idproduk);
                $produk->qty += $cartqty;
                $produk->save();
            } 
        }

        $itemorder->cart->update($inputan);
        return back()->with('success','Order berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bukti(Request $request, $id)
    {
        request()->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       if ($files = $request->file('bukti')) {
       // Define upload path
           $destinationPath = public_path('/public/image/buktitransfer'); // upload path
        // Upload Orginal Image           
           $Image = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $Image);
           $insert['image'] = "$Image";
        // Save In Database
        DB::table('cart')->where('id', $request->id)->update([
            'status_pembayaran' => 'sudah',
            'bukti_transfer' => $Image
            ]);
        }
        return redirect('admin/transaksi')->with('success', 'Image Upload successfully');
    }
}
