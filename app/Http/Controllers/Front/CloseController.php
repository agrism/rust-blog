<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use App\ValueObjects\ListValueObject;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class CloseController extends Controller
{
    public function __invoke(HtmxRequest $request, string $id)
    {
        $listItemValueObject = Generator::getItem($id);

        $listValueObject = new ListValueObject(
            activePage: $request->input('page')
        );

        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('front.index-item', 'frag-item', compact('listItemValueObject', 'listValueObject'));
        }

        return view('front.show', compact('id', 'listItemValueObject'));
    }
}
