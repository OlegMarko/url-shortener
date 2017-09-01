<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Link;

class ShorterController extends Controller
{
	/**
	 * Show index page
	 *
	 */
    public function index()
    {
    	return view('index');
    }

    public function make(LinkRequest $request)
    {
    	$url = $request->url;

        $code = Link::add($url);

        $short_url = $code;

    	return back()->with('url', $short_url);
    }

    public function get($code)
    {
        $url = Link::get($code);

        if ($url)
    	   return redirect($url);

        return redirect('/')->with('error', "This url doesn\'t exist ");
    }
}
