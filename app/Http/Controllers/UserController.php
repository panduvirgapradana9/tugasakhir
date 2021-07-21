<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Order;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            //ini contoh yg elseif
            if(Gate::allows('member-access')) return $next($request);
            elseif (Gate::allows('admin-access'))return $next($request);
            elseif (Gate::allows('staff-access'))return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    
    public function index(Request $request) {
        $data = array('title' => 'User Profil');
        return view('user.index', $data);
    }

    public function show($id)
    {
        $itemuser = User::findOrFail($id);
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
        $data = array('title' => 'User Profil',
                    'itemorder' => $itemorder,
                    'user' => $itemuser);
        
        return view('user.show', $data);
    }   

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('user.setting', $data);
    }

    public function editprofil(Request $request) {
        if ($files = $request->file('fotoprofil')) {
            request()->validate([
                'fotoprofil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);
       // Define upload path
           $destinationPath = public_path('/images/profil'); // upload path
        // Upload Orginal Image           
           $Image = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $Image);
           $insert['image'] = "$Image";
        // Save In Database
        DB::table('users')->where('id', $request->id)->update([
            'foto' => $Image,
            'name' => $request->name,
            'phone' => $request->phone
            ]);
        }else{
            DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone
            ]);
        }
        return redirect('admin/setting')->with('success', 'Profil diupdate');
    }
}
