<?php

namespace App\ValueObjects;

class ListValueObject
{
    public array $items = [];
    public ?int $totalItemsCount = null;
    public ?int $activePage = null;
    public ?int $nextPage = null;
    public ?int $prevPage = null;
    public ?int $totalPages = null;
    public ?int $activePageItemsCount = null;

    /**
     * @param array $items
     * @param int|null $totalItemsCount
     * @param int|null $activePage
     * @param int|null $nextPage
     * @param int|null $prevPage
     * @param int|null $totalPages
     * @param int|null $activePageItemsCount
     */
    public function __construct(array $items = [], ?int $totalItemsCount = null, ?int $activePage = null, ?int $nextPage = null, ?int $prevPage = null, ?int $totalPages = null, ?int $activePageItemsCount = null)
    {
        $this->items = $items;
        $this->totalItemsCount = $totalItemsCount;
        $this->activePage = $activePage;
        $this->nextPage = $nextPage;
        $this->prevPage = $prevPage;
        $this->totalPages = $totalPages;
        $this->activePageItemsCount = $activePageItemsCount;
    }
}
