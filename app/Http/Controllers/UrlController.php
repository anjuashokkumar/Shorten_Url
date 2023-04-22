<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Url;

class UrlController extends Controller
{
    public function url(){

        $urls = Url::latest()->paginate(10);   
        return view('url', compact('urls'));

    }

    public function shorten(Request $request)
    {
        $request->validate([
           'url' => 'required|url'
        ]);
   
        $input['title'] = Str::random(6);
        $input['url'] = $request->url;
        
   
        Url::create($input);

        $urls = Url::latest()->paginate(10);

        return response()->json([
            'status' => 200,
            'message' => 'Shorten URL Generated Successfully!',
            'urls' => $urls
        ]);

    }

    public function shortenurl($code)
    {
        $find = Url::where('title', $code)->first();
        return redirect($find->url);
    }

   
}
