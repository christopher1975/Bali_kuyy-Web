<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    function index() {
        $feedbacks = Feedback::with('user')->with('wisata')->get();
        return view('daftar_feedback', ['feedbacks'=>$feedbacks]);
    }


    function hapus_feedback(Request $request) {
        Log::info($request);
        $wisata = Feedback::find($request->id);
        $wisata->delete();
        return redirect()->back();
    }
}