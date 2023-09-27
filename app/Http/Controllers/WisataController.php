<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    function index() {
        $list_wisata = Wisata::all();
        return view('daftar_wisata', ['list_wisata'=>$list_wisata]);
    }

    function tambah_wisata_view() {
        return view('tambah_wisata');
    }


    function tambah_wisata(Request $request) {
        $wisata = Wisata::create($request->all());
        $wisata->update(['rating' => 0]);
        if($request->file('gambar')) {
            $request->file('gambar')->store('public/images');
            $nama = $request->file('gambar')->hashName();
            $wisata->update(['gambar' => $nama]);
        }
        return redirect('/daftar_wisata');
    }

    function hapus(Request $request) {
        Log::info($request);
        $wisata = Wisata::find($request->id);
        Storage::delete('/public/images/'.$wisata->gambar);
        $wisata->delete();
        return redirect()->back();
    }

    function edit_view() {
        $id = last(request()->segments());
        $wisata = Wisata::find($id);
        return view('edit_wisata', ['wisata' => $wisata]);
    }

    function update(Request $request) {
        $id = last(request()->segments());
        $wisata = Wisata::find($id);
        $gambar_wisata = $wisata->gambar;
        $wisata->update($request->all());
        if($request->has('gambar')) {
            Log::info($request);
            $name = $request->file('gambar')->hashName();
            Storage::delete('/public/images/'.$gambar_wisata);
            $request->file('gambar')->store('public/images');
            $wisata->update(['gambar' => $name]);
        }

        return redirect('/daftar_wisata');
    }
}