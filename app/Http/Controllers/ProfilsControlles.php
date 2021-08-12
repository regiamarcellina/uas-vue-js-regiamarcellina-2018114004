<?php

namespace App\Http\Controllers;
Use App\Models\Profils;
use Illuminate\Http\Request;

class ProfilsController extends Controller
{
    public function index()
    {
     $profils = Profils::orderBy('id','desc')->paginate(10);
     
     return view ('profils.index', compact('profils'));
    }

    public function create()
    {
     
     return view ('profils.create');
    }

    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'nama' => 'required',
          'ttl' => 'required|unique:profils|max:255',
          'alamat' => 'required',
          'jk' => 'required',
      ]);
 
         $profils = new Profils;
 
         $profils->nama = $request->nama;
         $profils->ttl = $request->ttl;
         $profils->alamat = $request->alamat;
         $profils->jk = $request->jk;
 
         $profils->save();
 
         return redirect('/profils');
 
    }
    public function show($id)
    {
       $profil = Profils::where('id',$id)->first();
       return view('profils.show', ['profil' => $profil]);
    }
    public function edit($id)
    {
       $profil = Profils::where('id',$id)->first();
       return view('profils.edit', ['profil' => $profil]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'nama' => 'required',
         'ttl' => 'required|unique:profils|max:255',
         'alamat' => 'required',
         'jk' => 'required',
        ]);
   
         Profils::find($id)->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'jk' => $request->jk
         ]);
   
         return redirect ('/profils');
    }
    public function destroy($id)
    {
       Profils::find($id)->delete();
       return redirect ('/profils');
    }
}