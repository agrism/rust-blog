<?php

namespace App\Services;

use Carbon\Carbon;
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

        usort($data, function ($a, $b){
            return ($a['created_at'] ?? 0) < ($b['created_at'] ?? 0);
        });

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
            'created_at' => now()->timestamp,
            'updated_at' => now()->timestamp,
        ];

        Storage::disk('local')->put('data.json', json_encode($data));
    }

    public static function update(string $id, string $title, string $content, Carbon $createdAt = null): string
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
                'created_at' => $createdAt ? $createdAt->timestamp : data_get($dataItem, 'created_at', now()->timestamp),
                'updated_at' => now()->timestamp,
            ];
            break;
        }

        Storage::disk('local')->put('data.json', json_encode($data));

        return $id;

    }
}
