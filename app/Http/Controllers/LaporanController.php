<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Order;
use App\Cart;
use App\Cartdetail;
use App\Produk;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('admin-access') or Gate::allows('staff-access')) return $next($request); //bisa pakai OR atau elseif
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    public function index() {
        $data = array('title' => 'Form Laporan Penjualan');
        return view('laporan.index', $data);
    }

    public function proses(Request $request) {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $bulan_transaksi = date('Y-m', strtotime($request->tahun.'-'.$request->bulan));
        $itemtransaksi = Order::whereHas('cart', function($q) use ($bulan_transaksi) {
                                        $q->where('status_pembayaran', 'sudah');
                                        $q->where('created_at', 'like', $bulan_transaksi.'%');})
        ->get();
        $data = array('title' => 'Laporan Penjualan',
                    'itemtransaksi' => $itemtransaksi,
                    'bulan' => $this->cetakbulan($bulan),
                    'tahun' => $tahun);
        return view('laporan.proses', $data)->with('no', 1);
    }

    public function terlaris(Request $request) {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $bulan_transaksi = date('Y-m', strtotime($request->tahun.'-'.$request->bulan));
        //mengambil data transaksi yang sudah membayar
        $cart = Cart::orderBy('created_at', 'DESC')
                    ->where('created_at', 'like', $bulan_transaksi.'%')
                    ->where('status_pembayaran', 'sudah')
                    ->get();

        //mengambil produk yang laku terjual artikel::where('id_kategori','value')->count()
        $produk = cartdetail::select(DB::raw('produk_id, sum(subtotal) as sumtotal, sum(qty) as sumproduk'))
                            ->groupby('produk_id')
                            ->orderby('sumproduk','DESC')
                            ->whereHas('cart', function($q) use ($bulan_transaksi) {
                                $q->where('status_pembayaran', 'sudah');
                                $q->where('created_at', 'like', $bulan_transaksi.'%');})
                            ->get();

        $data = array('title' => 'Laporan Penjualan',
        'cart' => $cart,
        'produk' => $produk,
        // 'sold' => $this->countQtyItem($cart),
        // 'total'=> $this->countHargaItem($cart),
        'bulan' => $this->cetakbulan($bulan),
        'tahun' => $tahun);

        return view('laporan.terlaris', $data)->with('no', 1);
    }

    private function countHargaItem($cart)
    {
        //DEFAULT TOTAL BERNILAI 0
        $total = 0;
        //JIKA DATA ADA
        if ($cart->count() > 0) {
            //MENGAMBIL VALUE DARI TOTAL -> PLUCK() AKAN MENGUBAHNYA MENJADI ARRAY
            $sub_total = $cart->pluck('total')->all();
            //KEMUDIAN DATA YANG ADA DIDALAM ARRAY DIJUMLAHKAN
            $total = array_sum($sub_total);
        }
        return $total;
    }

    private function countQtyItem($cart)
    {
        //DEFAULT DATA 0
        $data = 0;
        //JIKA DATA TERSEDIA
        if ($cart->count() > 0) {
            //DI-LOOPING
            foreach ($cart as $row) {
                //UNTUK MENGAMBIL QTY 
                $qty = $row->cartdetail->pluck('qty')->all();
                //KEMUDIAN QTY DIJUMLAHKAN
                $val = array_sum($qty);
                $data += $val;
            }
        } 
        return $data;
    }

    public function cetakbulan($bulan) {
        switch ($bulan) {
            case '1':
                return "Januari";
                break;
            case '2':
                return "Februari";
                break;
            case '3':
                return "Maret";
                break;
            case '4':
                return "April";
                break;
            case '5':
                return "Mei";
                break;
            case '6':
                return "Juni";
                break;
            case '7':
                return "Juli";
                break;
            case '8':
                return "Agustus";
                break;
            case '9':
                return "September";
                break;
            case '10':
                return "Oktober";
                break;
            case '11':
                return "Nopember";
                break;
            case '12':
                return "Desember";
                break;

            default:
                return "";
                break;
        }
    }
}
