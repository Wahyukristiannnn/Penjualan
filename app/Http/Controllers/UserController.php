<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', '!=', '')->get();
        
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request = request();
    	$file = $request->file('foto');
 
	$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
	$tujuan_upload = 'foto';
	$file->move($tujuan_upload,$nama_file);
        $user = new User;
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->no_hp = $request->input('no_hp');
        $user->gender = $request->input('gender');
        $user->foto = $nama_file;
        $user->role = $request->input('role');
        $user->password = Hash::make($request->password);
        $user->save();

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $request, $id)
    {
        $user = User::where('id',$id)->first();
        return view('user.edit', compact('user'));
    }
    
    public function editprofile()
    {
    	$id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        return view('user.editprofile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	
    	
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('no_hp');
        $user->gender = $request->input('gender');
        if($request->foto){
    	$request = request();
    	$file = $request->file('foto');
 
		$nama_file = time()."_".$file->getClientOriginalName();
	 
	      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'foto';
		$file->move($tujuan_upload,$nama_file);
		$user->foto = $nama_file;
		}
        
        $user->role = $request->input('role');
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/user');
    }
    
    public function updateprofile(Request $request, $id)
    {
    	
    	$validated = $request->validate([
        'password' => 'nullable|min:8',
   		]);
    
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('no_hp');
        $user->gender = $request->input('gender');
        if($request->foto){
    	$request = request();
    	$file = $request->file('foto');
 
		$nama_file = time()."_".$file->getClientOriginalName();
	 
	      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'foto';
		$file->move($tujuan_upload,$nama_file);
		$user->foto = $nama_file;
		}
        
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->update();

        Alert::success('Diperbarui', 'Data Berhasil Diubah ');
        return redirect('/user/editprofile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user-> delete();

        Alert::success('Dihapus', 'Data Berhasil Dihapus ');
        return redirect('/user');
    }
}
