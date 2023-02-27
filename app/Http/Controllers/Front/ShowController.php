<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use App\ValueObjects\ListValueObject;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class ShowController extends Controller
{
    public function __invoke(HtmxRequest $request, string $id, Generator $generator)
    {
        $listItemValueObject = $generator->getItem($id);

        if($request->isHtmxRequest()){
            $listValueObject = new ListValueObject(activePage: $request->input('page'));
            return HtmxResponse::addFragment('front.show', 'frag', compact('listItemValueObject', 'listValueObject'));
        }

        $listValueObject = $generator->getItems(intval($request->input('page')));

        return view('front.show', compact('id', 'listItemValueObject', 'listValueObject'));
    }
}
