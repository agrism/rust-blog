<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Illuminate\Support\Facades\Storage;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class CreateController extends Controller
{
    public function __invoke(HtmxRequest $request)
    {
        $data = Storage::disk('local')->get('data.json');
        $data = json_decode($data, true);

        if($request->isHtmxRequest()){
            return HtmxResponse::addFragment('admin.show', 'frag');
        }

        $items = Generator::get();

        return view('admin.show', compact('items'));
    }
}
