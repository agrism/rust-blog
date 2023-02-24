<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class UpdateController extends Controller
{
    public function __invoke(HtmxRequest $request, string $id)
    {
        $id = Generator::update($id, $request->post('title'), $request->post('content'));

        $content = Generator::get($id);

        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('admin.index-item', 'frag-item', compact('content'));
        }

        return view('admin.show', compact('id', 'content'));
    }
}
