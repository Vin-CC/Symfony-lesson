<?php
namespace App\Entity;

class Task {
    private $task;
    private $dueDate;

    public function getTask(): string
    {
        return $this->task;
    }

    public function setTask(string $task): void
    {
        $this->task = $task;
    }

    public function getDueDate(): ?\DateTime
    {
        return $this->dueDate;
    }

    public function setDueTime(?\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }
}