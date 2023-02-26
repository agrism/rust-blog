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
        $page = $request->input('page', 1);

        $listValueObject = Generator::getItems(page: intval($page));

        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('front.index', 'frag', compact('listValueObject'));
        }

        return view('front.index', compact('listValueObject'));
    }
}
