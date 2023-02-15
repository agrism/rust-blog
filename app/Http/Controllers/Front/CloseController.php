<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class CloseController extends Controller
{
    public function __invoke(HtmxRequest $request, string $id)
    {
        $content = Generator::get($id);

        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('front.index-item', 'frag-item', compact('content'));
        }

        return view('front.show', compact('id', 'content'));
    }
}
