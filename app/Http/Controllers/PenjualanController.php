<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('penjualan.index', compact('penjualan'));
    }
    
    public function user()
    {
    	$id = Auth::user()->id;
        $penjualan = Penjualan::where("id_user",$id)->get();
       
        return view('penjualan.user', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $user = User::where("role","customer")->get();
        $kode = Penjualan::kode();
        return view('penjualan.create',compact('user','kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjualan = new Penjualan();
        $penjualan->kode_penjualan = $request->input('kode_penjualan');
        $penjualan->id_user = $request->input('id_user');
        $penjualan->tanggal = $request->input('tanggal');
        $penjualan->deskripsi = $request->input('deskripsi');
        $penjualan->metode_pembayaran = $request->input('metode_pembayaran');
        $penjualan->nominal = $request->input('nominal');
        $penjualan->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/penjualan');
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show($kode_penjualan)
    {
        
        $penjualan = Penjualan::find($kode_penjualan);
        return view('penjualan.show', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $request, $kode_penjualan)
    {
        $user = User::where("role","customer")->get();
        $penjualan = Penjualan::where('kode_penjualan',$kode_penjualan)->first();
    
        return view('penjualan.edit', compact('penjualan','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_penjualan)
    {
        $penjualan = Penjualan::find($kode_penjualan);
        $penjualan->id_user = $request->input('id_user');
        $penjualan->tanggal = $request->input('tanggal');
        $penjualan->deskripsi = $request->input('deskripsi');
        $penjualan->metode_pembayaran = $request->input('metode_pembayaran');
        $penjualan->nominal = $request->input('nominal');
        $penjualan->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_penjualan)
    {
        $penjualan = Penjualan::find($kode_penjualan);
        $penjualan-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/penjualan');
    }
    
    public function filter(Request $request)
    {
    	
    	$role = Auth::user()->role;
        if($role == "admin"){
            return view('dashboard');
        }  else {
            return redirect()->to('logout');
        }
        
    }
}
