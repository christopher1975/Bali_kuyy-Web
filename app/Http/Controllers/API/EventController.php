<?php
namespace App\Http\Controllers\API;
use Exception;
use App\Models\Event;
use App\Http\Controllers\Controller;


class EventController extends Controller {
    public function getAllEvent() {
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
            $wisata = Event::all();
            $response['data'] = $wisata;
            return response()->json($response, $response['meta']['code']);
        } catch(Exception $error) {
            $response['meta']['code'] = 500;
            $response['meta']['status'] = "Error";
            $response['meta']['Message'] = "Something went wrong";
            return response()->json($response, $response['meta']['code']);
        }
    }
}