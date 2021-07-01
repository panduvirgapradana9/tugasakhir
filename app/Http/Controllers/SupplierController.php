<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Supplier;

class SupplierController extends Controller
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
        // kita ambil data kategori per halaman 20 data dan (paginate(20))
        // kita urutkan yang terakhir diiput yang paling atas (orderBy)
        $suppliers = Supplier::OrderBy('created_at', 'desc')->paginate(20);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword)
        {
            $suppliers = \App\Supplier::where("nama", "LIKE", "%$filterKeyword%")->paginate(10);
        }
        $data = array('title'=> 'Supplier Produk',
                        'suppliers' => $suppliers);
        return view('supplier.index', $data)->with('no', ($request->input('page',1)-1)*20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Supplier');
        return view('supplier.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "nama" => "required|min:5|max:100",
            "alamat" => "required",
            "email" => "required|email|unique:suppliers",
            "telp" => "required|numeric|digits_between:10,12"
        ])->validate();

        $new_supplier = new \App\Supplier;
        $new_supplier->nama = $request->get('nama');
        $new_supplier->alamat = $request->get('alamat');
        $new_supplier->email = $request->get('email');
        $new_supplier->telp = $request->get('telp');
        $new_supplier->save();

        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier_to_edit = \App\Supplier::FindOrFail($id);
        $data = array('title' => 'Form Edit Supplier',
                        'supplier' => $supplier_to_edit);
        return view('supplier.edit', $data);
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
        $supplier = \App\Supplier::FindOrFail($id);

        \Validator::make($request->all(), [
            "nama" => "required|min:5|max:100",
            "alamat" => "required|min:20|max:200",
            "email" => "required|email|unique:suppliers,email,".$supplier->id.",id",
            "telp" => "required|digits_between:10,12"
        ])->validate();
        
        $supplier->nama = $request->get('nama');
        $supplier->alamat = $request->get('alamat');
        $supplier->email = $request->get('email');
        $supplier->telp = $request->get('telp');
        $supplier->save();

        return redirect()->route('supplier.index')->with('success',  'Supplier successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = \App\Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier successfully Deleted');
    }
}
