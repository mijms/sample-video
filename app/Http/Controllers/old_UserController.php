<?
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function Video()
    {
        return 'hi';
        return  response()->file(storage_path('storage/videos/1.mp4'),[
            'Content-Type' => "video/.mp4",
            ]);
    }
}