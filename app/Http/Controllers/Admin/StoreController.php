<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Illuminate\Support\Facades\Storage;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class StoreController extends Controller
{
    public function __invoke(HtmxRequest $request)
    {
        $data = Generator::get();

        $data[] = [
            'id' => count($data) + 1,
            'title' => $request->post('title'),
            'content' => $request->post('content'),
        ];

        Storage::disk('local')->put('data.json', json_encode($data));

        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('admin.show', 'frag');
        }

        $items = Generator::get();

        return view('admin.show', compact('items'));
    }
}
