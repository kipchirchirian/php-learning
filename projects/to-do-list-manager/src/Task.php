<?php
declare(strict_types=1);

class Task
{
    private string $description;
    private string $priority;
    private bool $completed;

    public function __construct(string $description, string $priority = 'normal')
    {
        $this->setDescription($description);
        $this->setPriority($priority);
        $this->completed = false;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPriority(): string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): void
    {
        $this->priority = $priority;
    }

    public function markComplete(): void
    {
        $this->completed = true;
    }

    public function markIncomplete(): void
    {
        $this->completed = false;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function toArray(): array
    {
        return [
            'description' => $this->getDescription(),
            'priority' => $this->getPriority(),
            'completed' => $this->isCompleted(),
        ];
    }

    public static function fromArray(array $data = []): Task
    {
        $task = new Task($data['description'], $data['priority']);

        if ($data['completed']) {
            $task->markComplete();
        }

        return $task;
    }

    public function getSummary(): string
    {
        $status = $this->isCompleted() ? "✅" : "⏳";
        return "{$status} - {$this->getDescription()}({$this->getPriority()})";
    }
}