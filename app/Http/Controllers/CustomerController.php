<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\AlamatPengiriman;
class CustomerController extends Controller
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
        $users = User::paginate(20);
        //filter berdasarkan email
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $users=\App\User::where('nama', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        $data = array('title' => 'Data Member',
                      'users' => $users );
        return view('customer.index', $data)->with('no', ($request->input('page',1)-1)*20);
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
        //
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
        $customer = \App\User::findOrFail($id);
        $data = array('title' => 'Form Edit Customer',
                    'customer' => $customer);
        return view('customer.edit', $data);
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
        $customer = \App\User::findOrFail($id);
        $customer->name = $request->get('nama');
        $customer->role = $request->get('role');
        $customer->phone = $request->get('phone');
        $customer->alamat = $request->get('address');
        $customer->status = $request->get('status');
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            \App\Image::where('user_id', $id)->delete();
            \App\User::where('id', $id)->delete();
            return redirect()->route('customer.index')->with('success', 'Customer successfully Deleted');
        } catch (Exception $e) {
            return redirect()->route('customer.index')->with('gagal', $e->getMessage());
        }

    }
    
}
