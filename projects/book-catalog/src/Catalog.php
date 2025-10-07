<?php

declare(strict_types=1);

class Catalog
{
    /** @var Book[] */
    private array $books = [];

    public function add(Book $book): void
    {
        $this->books[] = $book;
    }

    public function save(string $filePath)
    {
        $data = array_map(fn($b) => $b->toArray(), $this->books);
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function load(string $filePath): void
    {
        if (!file_exists($filePath)) return;

        $data = json_decode(file_get_contents($filePath), true);

        if (!$data) return;

        foreach ($data as $item) {
            $this->books[] = Book::fromArray($item);
        }
    }

    public function searchByAuthor(?string $query = null): array
    {
        return array_filter($this->books, fn($book) => stripos($book->getAuthor(), $query) !== false);
    }

    public function searchByGenre(?string $query = null): array
    {
        return array_filter($this->books, fn($book) => stripos($book->getGenre(), $query) !== false);
    }

    public function listAll(): void
    {
        foreach ($this->books as $book) {
            echo $book->getSummary() . "\n";
        }
    }

    public function getAll(): array
    {
        return $this->books;
    }
}