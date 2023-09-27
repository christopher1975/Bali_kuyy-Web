<?php
namespace App\Http\Controllers\API;
use Exception;
use App\Models\Wisata;
use App\Http\Controllers\Controller;


class WisataController extends Controller {
    public function getAllWisata() {
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
            $wisata = Wisata::all();
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