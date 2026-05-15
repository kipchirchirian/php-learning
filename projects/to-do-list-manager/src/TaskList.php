<?php

declare(strict_types=1);

class TaskList
{
    /** @var \Task[] */
    private array $tasks = [];

    public function addTask(\Task $task): void
    {
        $this->tasks[] = $task;
    }

    public function save(string $filePath): void
    {
        $data = array_map(fn($t) => $t->toArray(), $this->tasks);
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function load(string $filePath): void
    {
        if (!file_exists($filePath)) return;

        $data = json_decode(file_get_contents($filePath, true));

        if (!$data) return;

        foreach ($data as $item) {
            $this->tasks[] = \Task::fromArray($item);
        }
    }

    public function listTasks(): void
    {
        foreach ($this->tasks as $task) {
            echo $task->getSummary() . "\n";
        }
    }

    public function getAllTasks(): array
    {
        return $this->tasks;
    }
}
