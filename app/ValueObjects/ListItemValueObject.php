<?php

namespace App\ValueObjects;

class ListItemValueObject
{
    public ?string $id = null;
    public ?string $title = null;
    public ?string $content = null;
    public ?int $createdAt = null;
    public ?int $updatedAt = null;

    /**
     * @param string|null $id
     * @param string|null $title
     * @param string|null $content
     */
    public function __construct(?string $id, ?string $title, ?string $content, ?int $createdAt, ?int $updatedAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }


}
