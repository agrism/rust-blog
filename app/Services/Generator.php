<?php

namespace App\Services;

use App\ValueObjects\ListItemValueObject;
use App\ValueObjects\ListValueObject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Generator
{
    protected int $itemsPerPage = 10;

    public function __construct()
    {
        $this->itemsPerPage = config('app.items-per-page');
    }


    public function get(?string $id = null): array
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


    public function getItems(?int $page = 1): ListValueObject|ListItemValueObject
    {
        $page = $page > 0 ? $page : 1;

        $data = json_decode(Storage::disk('local')->get('data.json'), true);


        usort($data, function ($a, $b) {
            return ($a['created_at'] ?? 0) < ($b['created_at'] ?? 0);
        });

        $pageItems = array_slice($data, ($page - 1) * $this->itemsPerPage, $this->itemsPerPage);

        /** @var array<ListItemValueObject> $items */
        $items = [];
        foreach ($pageItems as $pageItem){
            $items[] = new ListItemValueObject(
                data_get($pageItem, 'id'),
                data_get($pageItem, 'title'),
                data_get($pageItem, 'content'),
                data_get($pageItem, 'created_at'),
                data_get($pageItem, 'updated_at'),
            );
        }

        return new ListValueObject(
            items: $items,
            totalItemsCount: count($data),
            activePage: $page,
            nextPage: $page * $this->itemsPerPage < count($data) ? $page + 1 : null,
            prevPage: $page > 1 ? $page - 1 : null,
            totalPages: ceil(count($data) / $this->itemsPerPage),
            activePageItemsCount: count($pageItems)
        );
    }

    public function getItem(string $id): ?ListItemValueObject
    {
        $data = json_decode(Storage::disk('local')->get('data.json'), true);

        foreach ($data as $item) {
            if (data_get($item, 'id') == $id) {
                return new ListItemValueObject(
                    id: data_get($item, 'id'),
                    title: data_get($item, 'title'),
                    content: data_get($item, 'content'),
                    createdAt: data_get($item, 'created_at'),
                    updatedAt: data_get($item, 'updated_at'),
                );
            }
        }

        return null;
    }

    public function create(string $title, string $content): void
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

    public function update(string $id, string $title, string $content, Carbon $createdAt = null): string
    {
        $data = Generator::get();

        foreach ($data as &$dataItem) {
            if (data_get($dataItem, 'id') != $id) {
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
