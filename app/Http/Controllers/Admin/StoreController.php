<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Generator;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;
use Mauricius\LaravelHtmx\Http\HtmxRequest;

use function App\Http\Controllers\Front\IndexController;

class StoreController extends Controller
{
    public function __invoke(HtmxRequest $request)
    {
        Generator::create(
            $request->post('title'),
            $request->post('content'),
        );

        return (new IndexController())($request);

        if ($request->isHtmxRequest()) {
            return HtmxResponse::addFragment('admin.show', 'frag');
        }

        $items = Generator::get();

        return view('admin.show', compact('items'));
    }
}
