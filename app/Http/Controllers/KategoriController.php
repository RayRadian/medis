<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
      
           $search = $request->search;
       
           $data = Kategori::when($search, function ($query, $search) {
                       return $query->where('nama', 'like', "%{$search}%")
                                    ->orWhere('kode', 'like', "%{$search}%");
                   })
                   ->orderBy('kode', 'desc')
                   ->paginate(10)
                   ->withQueryString(); 
       
          

           if ($search && $data->isEmpty()) {
           return redirect()->back()->with('error', 'Data tidak ditemukan');
           }

           return view('kategori.index', compact('data'));
       
       
        
    }


     public function create()
    {
        return view('kategori/create');
    }


    public function store(Request $request)
    {
        

        $request->validate([
        'kode' => 'required|numeric',
        'nama' => 'required',
        ],[
         'kode.required' => 'Nomor induk wajib diisi',
         'kode.numeric' => 'Nomor induk harus angka',
         'nama.required' => 'Nama wajib diisi',
        ]);

        $data = [
        'kode' => $request->input('kode'),
        'nama' => $request->input('nama'),
        ];
        kategori::create($data);
        return redirect('kategori')->with('success', 'berhasil insert data'); 
    
    }







}
