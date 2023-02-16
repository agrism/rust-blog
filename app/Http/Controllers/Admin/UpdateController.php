<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Illuminate\Support\Facades\Storage;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

class UpdateController extends Controller
{
    public function __invoke(HtmxRequest $request, string $id)
    {
        $data = Generator::get();

        foreach ($data as &$dataItem){
            if(data_get($dataItem, 'id') != $id){
                continue;
            }
            $dataItem = [
                'id' => $id,
                'title' => $request->post('title'),
                'content' => $request->post('content'),
            ];
            break;
        }

        Storage::disk('local')->put('data.json', json_encode($data));

        $show = Generator::get($id);

        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('admin.show', 'frag', compact('show'));
        }

        $items = Generator::get();

        return view('admin.show', compact('id', 'show', 'items'));
    }
}
