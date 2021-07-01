<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\User;
use App\Order;
use App\Supplier;
use App\ProdukPromo;
use App\Cart;

class DashboardController extends Controller
{
    public function index(Request $request) {

        $produk = Produk::get()->count();
        $kategori = Kategori::get()->count();
        $user = User::get()->count();
        $supplier = Supplier::get()->count();
        $produkpromo = ProdukPromo::get()->count();
        $cart = Cart::get()->count();
        $data = array(
            'title' => 'Dashboard',
            'produk' => $produk,
            'kategori' => $kategori,
            'user' => $user,
            'supplier' => $supplier,
            'produkpromo' => $produkpromo,
            'cart' => $cart,
        );


        
        return view('dashboard.index', $data);
    }
}
