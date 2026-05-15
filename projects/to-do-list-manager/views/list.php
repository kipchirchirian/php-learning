<h2>To-do List</h2>
<?php foreach ($tasks as $task): ?>
    <?= $task->getSummary() ?><br>
<?php endforeach; ?>