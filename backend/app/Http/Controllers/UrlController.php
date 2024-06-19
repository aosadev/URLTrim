<?php namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $originalUrl = $request->input('url');
        $shortCode = Str::random(6);

        $url = new Url();
        $url->original_url = $originalUrl;
        $url->short_code = $shortCode;
        $url->user_id = Auth::id();
        $url->save();

        return response()->json(['shortenedUrl' => url($shortCode)], 201);
    }

    public function redirect($code)
    {
        $url = Url::where('short_code', $code)->firstOrFail();
        return redirect($url->original_url);
    }

    public function myUrls()
    {
        $urls = Url::where('user_id', Auth::id())->get();
        return response()->json($urls);
    }
}
