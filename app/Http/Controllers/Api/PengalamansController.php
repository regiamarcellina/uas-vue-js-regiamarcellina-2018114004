<?php

namespace App\Http\Controllers\Api;

use App\Models\Pengalamans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengalamansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengalamans = Pengalamans::all();
        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data pengalaman',
            'data' => $pengalamans
        ], 200); //http status code sukses
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kerja'     => 'required',
            'usaha'   => 'required'
        ]);

        $pengalamans = Pengalamans::create([
            'kerja'     => $request->kerja,
            'usaha'     => $request->usaha
        ]);

        if($pengalamans)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'pengalaman berhasil di tambahkan',
                    'data' => $pengalamans
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'pengalaman gagal di tambahkan',
                'data' => $pengalamans
            ], 409);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengalamans = Pengalamans::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail data pengalamans',
            'data' => $pengalamans
        ], 200);
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
        $this->validate($request, [
            'kerja'     => 'required',
            'usaha'   => 'required'
        ]);

        $km = Pengalamans::find($id)->update([
            'kerja' => $request->kerja,
            'usaha' => $request->usaha,
        ]);

        if($km){
            return response()->json([ 
                'success' => true,
                'message' => 'pengalaman berhasil di update',
                'data' => $km
            ], 200); //http status code sukses
        }else{
            return response()->json([
                'success' => false,
                'message' => 'pengalaman gagal di update',
                'data' => $km
            ], 409); //http status code conflict
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Pengalamans::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'pengalaman berhasil dihapus',
            'data' => $del
        ], 200);
    }
}