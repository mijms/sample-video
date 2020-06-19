<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class UserController extends Controller
{
    private Static $checks;
    //
    public function Video(Request $request){
        $token = $request->input('tk');
        $tokens = json_decode(file_get_contents(storage_path('/data.json')));
        // print_r(url('/'));
        // print_r($request->headers->get('referer'));
        if(strpos($request->headers->get('referer'), url('/'))!==false){
            // return 'hi';
            $ctokens = $tokens->$token ?? false;
            // if($ctokens){
            //     // return 'ctokens';
            //     return response('error', 404);    
            // }
            $tokens->$token = true;
            $newJsonString = json_encode($tokens, JSON_PRETTY_PRINT);
            file_put_contents(storage_path('/data.json'), stripslashes($newJsonString));
            // return UserController::$checks;
            // return array($tokens);
            return response()->file(storage_path('videos/1.mp4'),[
                'Content-Type' => "video/.mp4",
                ]);;
        }
        return response('error', 403);
    }
}
