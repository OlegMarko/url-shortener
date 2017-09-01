<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
    	'url',
    	'code'
    ];

    protected function add($url)
    {
    	$code = str_random(10);

    	$this->create([
    		'url' => $url,
    		'code' => $code
    	]);

    	return $code;
    }

    protected function get($code)
    {
    	$data = $this
	    	->select('url')
	    	->where('code', $code)
	    	->get()
	    	->first();

    	$url = isset($data->url) ? $data->url : null;

    	return $url;
    }
}
