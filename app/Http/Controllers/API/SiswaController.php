<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Siswa;
class SiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function index(Request $req)
    {
        $siswa = Siswa::all();
        return response()->json($siswa);
    }

    public function create(Request $req)
    {
        $this->validate($req,[
            'name' => 'required',
            'kelas' => 'required',
            'alamat' => 'required'
        ]);
      $data = Siswa::create($req->all());
      if ($data){

          return response()->json(['data berhasil ditambah']);
        }else{
            return response()->json(['data gagal ditambah']);
      }
    }
    public function show($id)
    {
        $var = Siswa::find($id);
        if($var){
            return response()->json($var);
        }else{
            return response()->json(['Data Siswa Tidak ditemukan']);
        }
    }
    public function update(Request $req,$id)
    {
        $this->validate($req,[
            'name' => 'required',
            'kelas' => 'required',
            'alamat' => 'required'
        ]);
        $siswa = Siswa::find($id);
        if($siswa){
            $var = Siswa::where(['id'=>$id])->update([
                'nama'=>$req->nama,
                'kelas'=>$req->kelas,
                'alamat'=>$req->alamat,
                'hobi'=>$req->hobi
            ]);
            return response()->json(['Data Berhasil Diubah']);
        }else{
            return response()->json(['Data gagal Diubah']);

        }
    }
    public function destroy($id)
    {
        $var = Siswa::find($id);
        if($var){
            $data = $var->delete();
            return response()->json(['data bserhasil dihapus']);
        }else{
            return response()->json(['data tidak dapat ditemukan']);
        }

    }
    //
}
