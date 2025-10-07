<h2>Book Catalog</h2>
<ol>
    <?php foreach($books as $book): ?>
        <li><?= $book->getTitle() . "(" . $book->getYear() . ") by " . $book->getAuthor() . " - Genre: " . $book->getGenre() ?></li>
    <?php endforeach; ?>
</ol>