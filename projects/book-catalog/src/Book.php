<?php

declare(strict_types=1);

class Book
{
    private string $title;
    private string $author;
    private string $genre;
    private int $year;

    public function __construct(string $title, string $author, string $genre, int $year)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setGenre($genre);
        $this->setYear($year);
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'author' => $this->getAuthor(),
            'genre' => $this->getGenre(),
            'year' => $this->getYear()
        ];
    }

    public static function fromArray(array $data = []): Book
    {
        return new Book(
            $data['title'],
            $data['author'],
            $data['genre'],
            $data['year']
        );
    }

    public function getSummary(): string // For CLI
    {
        return "{$this->getTitle()}({$this->getYear()}) by {$this->getAuthor()} - Genre: {$this->getGenre()}";
    }
}