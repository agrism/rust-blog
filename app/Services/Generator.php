<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Generator
{
    public static function get(?string $id = null): array
    {
        $data = json_decode(Storage::disk('local')->get('data.json'), true);

        if(!$data){
            return [];
        }

        if(!$id){
            return is_array($data) ? $data : [];
        }

        foreach ($data as $item){
            if(data_get($item, 'id') == $id){
                return $item;
            }
        }

        return [];
    }

    public static function create(string $title, string $content): void
    {
        $data = Generator::get();

        $data[] = [
            'id' => Str::slug($title),
            'title' => $title,
            'content' => $content,
        ];

        Storage::disk('local')->put('data.json', json_encode($data));
    }

    public static function update(string $id, string $title, string $content): string
    {
        $data = Generator::get();

        foreach ($data as &$dataItem){
            if(data_get($dataItem, 'id') != $id){
                continue;
            }
            $dataItem = [
                'id' => $id = Str::slug($title),
                'title' => $title,
                'content' => $content,
            ];
            break;
        }

        Storage::disk('local')->put('data.json', json_encode($data));

        return $id;

    }
}
