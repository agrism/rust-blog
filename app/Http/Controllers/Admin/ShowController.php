<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class ShowController extends Controller
{
    public function __invoke(HtmxRequest $request, string $id, Generator $generator)
    {
        $show = $generator->get($id);

        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('admin.show', 'frag', compact('show'));
        }

        $items = $generator->get();
        foreach ($items as &$item){
            if($item['id'] == $id){
                $item['active'] = true;
            }
        }

        return view('admin.show', compact('id', 'show', 'items'));
    }
}
