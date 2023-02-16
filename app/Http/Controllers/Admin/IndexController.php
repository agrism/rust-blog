<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class IndexController extends Controller
{
    public function __invoke(HtmxRequest $request)
    {
        $items = Generator::get();
        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('admin.index', 'frag', compact('items'));
        }
        return view('admin.index', compact('items'));
    }
}
