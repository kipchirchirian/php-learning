<?php

require_once '../src/Task.php';
require_once '../src/TaskList.php';

$taskList = new \TaskList();

$task1 = new \Task('Do laundry', 'normal');

$taskList->addTask($task1);
$taskList->addTask(new \Task('Fix bug', 'high'));
$taskList->addTask(new \Task('Take a nap', 'low'));

$task1->markComplete();

$taskList->addTask(new \Task('Watch Naruto new episode', 'high'));

// $task1->markIncomplete();

$taskList->save('../data/tasks.json');

if (php_sapi_name() === 'cli') {
    $taskList->listTasks();
} else {
    $tasks = $taskList->getAllTasks();

    include_once '../views/list.php';
}