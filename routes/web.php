<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomepageController@index');
Route::get('/kontak', 'HomepageController@kontak');
Route::get('/about', 'HomepageController@about');
Route::post('/kontak', 'KontakController@sendMail');
Route::get('/kategori', 'HomepageController@kategori');
Route::get('/kategori/{slug}', 'HomepageController@kategoribyslug');
Route::get('/produk', 'HomepageController@produk')->name('homepage.produk');
Route::get('/produk/{id}/{slug}', 'HomepageController@produkdetail');

Auth::routes();

// shopping cart
Route::group(['middleware' => 'auth'], function() {
  // cart
  Route::resource('cart', 'CartController');
  Route::patch('kosongkan/{id}', 'CartController@kosongkan');
  // cart detail
  Route::resource('cartdetail', 'CartDetailController');
  // alamat pengiriman
  Route::resource('alamatpengiriman', 'AlamatPengirimanController');
  // checkout
  Route::get('checkout', 'CartController@checkout');
});

// route dashboard
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('/', 'DashboardController@index');
  
    // route kategori
    Route::resource('admin/kategori', 'KategoriController');
    // route supplier
    Route::resource('supplier', 'SupplierController');
    // route produk
    Route::resource('produk', 'ProdukController');
    //route tambah stok produk
    Route::get('stok/{id}', 'ProdukController@stok')->name('produk.stok');
    //route update stok produk
    Route::post('stok/{id}', 'ProdukController@updatestok')->name('produk.updatestok');
    //cek stok produk
    Route::get('cekstok', 'ProdukController@cekstok')->name('produk.cekstok');
    Route::get('cekkadaluarsa', 'ProdukController@cekkadaluarsa')->name('produk.cekkadaluarsa');
    // route setting profil
    Route::get('setting', 'UserController@setting');
    Route::post('editprofil', 'UserController@editprofil')->name('produk.cekkadaluarsa');
    
    // form laporan
    Route::get('laporan', 'LaporanController@index');
    // proses laporan
    Route::get('proseslaporan', 'LaporanController@proses');
    // terlaris laporan
    Route::get('terlarislaporan', 'LaporanController@terlaris');
    // image
    Route::get('image', 'ImageController@index');
    // simpan image
    Route::post('image', 'ImageController@store');
    // hapus image by id
    Route::delete('image/{id}', 'ImageController@destroy');
    // upload image kategori
    Route::post('imagekategori', 'KategoriController@uploadimage');
    // hapus image kategori
    Route::delete('imagekategori/{id}', 'KategoriController@deleteimage');
    // upload image produk
    Route::post('produkimage', 'ProdukController@uploadimage');
    // hapus image produk
    Route::delete('produkimage/{id}', 'ProdukController@deleteimage');
    //up bukti trasnfer
    Route::post('admin/traansaksi/bukti', 'TransaksiController@bukti');
    // slideshow
    Route::resource('slideshow', 'SlideshowController');
    // produk promo
    Route::resource('promo', 'ProdukPromoController');
    // load async produk
    Route::get('loadprodukasync/{id}', 'ProdukController@loadasync');
    // wishlist
    Route::resource('wishlist', 'WishlistController');
  
    // route data customer
    Route::resource('customer', 'CustomerController');
    // route transaksi
    Route::resource('transaksi', 'TransaksiController');
    // route profil
    Route::resource('profil', 'UserController');
    
    Route::get('penyetokan', 'ProdukController@penyetokan')->name('produk.penyetokan');
    
  
});





// Route::get('/home', 'HomeController@index')->name('home');
// ubah route ke home menjadi admin
Route::get('/home', function() {
  return redirect('/admin');
});