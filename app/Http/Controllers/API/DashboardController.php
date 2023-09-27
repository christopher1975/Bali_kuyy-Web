<?php
namespace App\Http\Controllers\API;
use Exception;
use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller {
    public function getData() {
         //menyiapkan data response
        $response = [
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => null,
            ],
            'data' => null,
        ];
        
        try {
        $date = date('m-d');
        $upcoming_event = Event::whereRaw('DAYOFYEAR(curdate()) + 1 <= DAYOFYEAR(tanggal) and tanggal not like \'%-' . $date . '\'')
        ->orderBy('tanggal', 'asc')->first();
        
        $wisata_populer = Wisata::orderBy('rating', 'DESC')->first();
        Log::info($wisata_populer);
        $response['data'] = [
            'wisata_populer' => $wisata_populer,
            'upcoming_event' => $upcoming_event
        ];
        return response()->json($response, $response['meta']['code']);
        } catch(Exception $error) {
            $response['meta']['code'] = 500;
            $response['meta']['status'] = "Error";
            $response['meta']['Message'] = "Something went wrong";
            return response()->json($response, $response['meta']['code']);
        }
    }
}