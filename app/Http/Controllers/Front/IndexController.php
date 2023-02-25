<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Mauricius\LaravelHtmx\Http\HtmxRequest;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;

class IndexController extends Controller
{
    public function __invoke(HtmxRequest $request)
    {
        $items = Generator::get();
        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('front.index', 'frag', compact('items'));
        }

        return view('front.index', compact('items'));
    }
}
