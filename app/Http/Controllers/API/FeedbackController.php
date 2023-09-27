<?php
namespace App\Http\Controllers\API;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller {
    public function addFeedback(Request $request) {
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
            $feedback = Feedback::create($request->all());
            $avg_rating = Feedback::where('wisata_id', $request->wisata_id)->avg('bintang');
            $wisata = Wisata::find($request->wisata_id);
            $wisata->update(['rating' => $avg_rating]);
            $response['data'] = $wisata;
            return response()->json($response, $response['meta']['code']);
            
        } catch(Exception $error) {
            $response['meta']['code'] = 500;
            $response['meta']['status'] = "Error";
            $response['meta']['Message'] = "Something went wrong";
            return response()->json($response, $response['meta']['code']);
        }
    }

    public function getWisataFeedback() {
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
            $id = request()->query('id');
            $feedback = Feedback::select('feedback.*', 'users.nama')->join('users', 'feedback.user_id', 'users.id')->where('wisata_id', $id)->get();
            $response['data'] = $feedback;
            return response()->json($response, $response['meta']['code']);
        } catch(Exception $error) {
            $response['meta']['code'] = 500;
            $response['meta']['status'] = "Error";
            $response['meta']['Message'] = "Something went wrong";
            return response()->json($response, $response['meta']['code']);
        }
    }

    public function getUserFeedback() {
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
            $id = request()->query('id');
            $feedback = Feedback::select('feedback.*', 'wisatas.nama_wisata')->join('wisatas', 'feedback.wisata_id', 'wisatas.id')->where('user_id', $id)->get();
            $response['data'] = $feedback;
            return response()->json($response, $response['meta']['code']);
        } catch(Exception $error) {
            $response['meta']['code'] = 500;
            $response['meta']['status'] = "Error";
            $response['meta']['Message'] = "Something went wrong";
            return response()->json($response, $response['meta']['code']);
        }
    }
}