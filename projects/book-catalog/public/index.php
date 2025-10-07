<?php

require_once '../src/Book.php';
require_once '../src/Catalog.php';

$catalog = new Catalog();
// $books = $catalog->load('../data/catalog.json');

$catalog->add(new Book('1984', 'Gorge Orwell', 'Dystopian', 1949));
$catalog->add(new Book('Harry Potter', 'J.K. Rowling', 'Fantasy', 1997));
$catalog->add(new Book('The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 1937));

$catalog->save('../data/catalog.json');

if (php_sapi_name() === 'cli') {
    // echo "All Books: \n";
    // $catalog->listAll();

    echo "\nSearh by author: 'Rowling' \n";
    foreach ($catalog->searchByAuthor('Rowling') as $book) {
        echo $book->getSummary() . "\n";
    }

    echo "\nSearh by genre: 'Fantasy' \n";
    foreach ($catalog->searchByGenre('Fantasy') as $book) {
        echo $book->getSummary() . "\n";
    }
} else {
    $books = $catalog->getAll();

    include_once '../views/list.php';
}
