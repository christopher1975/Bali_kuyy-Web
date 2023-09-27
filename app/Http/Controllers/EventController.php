<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    function index() {
        $list_event = Event::all();
        return view('daftar_event', ['list_event' => $list_event]);
    }

    function tambah_event_view()   {
        return view('tambah_event');
    }

    function tambah_event(Request $request) {
        $event = Event::create($request->all());
        if($request->file('gambar')) {
            $request->file('gambar')->store('public/images');
            $nama = $request->file('gambar')->hashName();
            $event->update(['gambar' => $nama]);
        }
        return redirect('/daftar_event');
    }

    function hapus(Request $request) {
        $event = Event::find($request->id);
        Storage::delete('/public/images/'.$event->gambar);
        $event->delete();
        return redirect()->back();
    }

    function edit_view() {
        $id = last(request()->segments());
        $event = Event::find($id);
        return view('edit_event', ['event' => $event]);
    }

    function update(Request $request) {
        $id = last(request()->segments());
        $event = Event::find($id);
        $gambar_event = $event->gambar;
        $event->update($request->all());
        if($request->file('gambar')) {
            $name = $request->file('gambar')->hashName();
            Storage::delete('/public/images/'.$gambar_event);
            $request->file('gambar')->store('public/images');
            $event->update(['gambar' => $name]);
        }

        return redirect('/daftar_event');
    }

}