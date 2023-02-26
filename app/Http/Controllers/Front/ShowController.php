<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class ShowController extends Controller
{
    public function __invoke(HtmxRequest $request, string $id)
    {
        $listItemValueObject = Generator::getItem($id);

        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('front.show', 'frag', compact('listItemValueObject'));
        }

        $listValueObject = Generator::getItems(intval($request->input('page')));

        return view('front.show', compact('id', 'listItemValueObject', 'listValueObject'));
    }
}
